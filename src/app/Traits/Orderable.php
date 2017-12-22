<?php

namespace App\Traits\Lerova;

trait Orderable
{
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public function scopeLatestUpdatedFirst($query)
    {
        return $query->orderBy('updated_at','desc');
    }

    public function scopeOldestFirst($query)
    {
        return $query->orderBy('created_at','asc');
    }

    public function scopeOldestUpdatedFirst($query)
    {
        return $query->orderBy('updated_at','asc');
    }

    public function scopePublished($query)
    {
        return $query->where('published',true);
    }

    public function scopeFindByUuid($query, $uuid)
    {
        return $query->where('uuid','=',$uuid)->first();
    }

}