<?php

namespace App\Models\Lerova;

use App\Traits\Lerova\Orderable;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use Orderable, SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'time'
    ];

    protected $casts = [
        'tags' => 'array',
        'image_meta' => 'array'
    ];


    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getSlugAttribute(): string
    {
        return str_slug($this->title);
    }

    public function externalUrl()
    {
        return route('frontend.posts.show', [$this->uuid, $this->slug]);
    }

        public function getFontAwesomeIcon()
    {
        if($this->type === 'posts')
        {
            return 'fa-newspaper-o';
        }
        elseif ($this->type === 'images')
        {
            return 'fa-file-image-o';

        }
        elseif ($this->type === 'events')
        {
            return 'fa-calendar';

        }
        elseif ($this->type === 'links')
        {
            return 'fa-link';
        }
        else
        {
            return 'fa-question';
        }

    }

    public function validate()
    {

        if($this->type === 'posts')
        {
            $value = $this->getAttributes();
            unset($value['url']);
            unset($value['time']);
            unset($value['image_meta']);
            unset($value['deleted_at']);
            if(!in_array(null, $value, true)) { return true; }
            return false;
        }
        elseif ($this->type === 'images')
        {
            $value = $this->getAttributes();
            unset($value['teaser']);
            unset($value['body']);
            unset($value['url']);
            unset($value['time']);
            unset($value['image_meta']);
            unset($value['deleted_at']);
            if(!in_array(null, $value, true)) { return true; }
            return false;


        }
        elseif ($this->type === 'events')
        {
            $value = $this->getAttributes();
            unset($value['teaser']);
            unset($value['url']);
            unset($value['image_meta']);
            unset($value['deleted_at']);
            if(!in_array(null, $value, true)) { return true; }
            return false;

        }
        elseif ($this->type === 'links')
        {
            $value = $this->getAttributes();
            unset($value['teaser']);
            unset($value['body']);
            unset($value['time']);
            unset($value['image_meta']);
            unset($value['deleted_at']);
            if(!in_array(null, $value, true)) { return true; }
            return false;
        }
        else
        {
            return false;
        }

    }

    public function getFaceDetectUrl()
    {
        $data = json_decode($this->faces);

        if($data != null)
        {
            if($data->x != null)
            {
                $url = $this->image . '-/crop/' . $data->x_size . 'x' . $data->y_size . '/' . $data->x . ',' . $data->y . '/' ;
                return $url;
            }
        }

        return $this->image;
    }


}
