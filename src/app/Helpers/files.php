<?php

function getJSONFile($name)
{
    $path = base_path('data/'. $name. '.json');

    if(File::exists($path))
    {
        try
        {
            $json = json_decode(File::get($path));

            return $json;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}
