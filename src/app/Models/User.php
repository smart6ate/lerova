<?php

namespace App;

use App\Notifications\Lerova\ResetPassword;
use App\Traits\Lerova\Magicable;
use App\Traits\Lerova\Orderable;
use App\Traits\Lerova\Roleable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, Roleable, Orderable, Magicable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'uuid','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_activity',
    ];

    public function getAvatar()
    {
        if(empty($this->avatar)) { return 'https://www.gravatar.com/avatar/' . md5($this->email) . 'x?s=500&d=mm';}

        return $this->avatar;
    }

    public function isSameAs(User $user)
    {
        return $this->id == $user->id;
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}
