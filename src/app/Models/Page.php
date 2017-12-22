<?php

namespace App\Models\Lerova;

use App\Traits\Lerova\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{

    use SoftDeletes, Orderable;

    protected $guarded = [];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'keywords' => 'array',
    ];


    public function posts()
    {
        return $this->hasMany(Blog::class);
    }

}
