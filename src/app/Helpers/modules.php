<?php

function getModuleStatus($module)
{
    if (!Cache::has('modules'))
    {
        $modules = json_decode(File::get(base_path('data/modules.json')));

        Cache::forever('modules', $modules);

        return getModuleBoolean($module);
    }
    else
    {
        return getModuleBoolean($module);
    }
}

function getModuleBoolean($module)
{
    $modules = Cache::get('modules');

    return $modules->{$module}->status;
}


function getBlogStatus($blog)
{
    if (!Cache::has('md-blog'))
    {
        $blogs = json_decode(File::get(base_path('data/md-blog.json')));

        Cache::forever('md-blog', $blogs);

        return $blogs->{$blog}->status;
    }
    else
    {
        $blogs = Cache::get('md-blog');

        return $blogs->{$blog}->status;
    }

}

