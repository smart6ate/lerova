<?php

function getSettingStatus($setting)
{
    if (!Cache::has('settings'))
    {
        $settings = json_decode(File::get(base_path('data/settings.json')));

        Cache::forever('settings', $settings);

        return getSettingBoolean($setting);
    }
    else
    {
        return getSettingBoolean($setting);
    }
}

function getSettingBoolean($setting)
{
    $settings = Cache::get('settings');

    return $settings->{$setting}->status;
}


