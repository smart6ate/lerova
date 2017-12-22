<?php

namespace App\Models\Lerova;

use App\Traits\Lerova\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use Orderable, SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'tags' => 'array'
    ];


    public function validate()
    {
            $value = $this->getAttributes();;
            unset($value['deleted_at']);
            if(!in_array(null, $value, true)) { return true; }
            return false;
    }

}
