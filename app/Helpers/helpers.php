<?php

use App\Models\Setting;
use App\Models\Status;

if (!function_exists('profile')) {
    function profile($name)
    {
        return auth()->user()->profile->where('name', $name)->value('value');
    }
}

if (!function_exists('status')) {
    function status($status, $column = null)
    {
        if (is_int($status)) {
            return Status::whereCode($status)->value($column ?? 'name');
        } else {
            return Status::whereName($status)->orWhere('slug', $status)->value($column ?? 'code');
        }
    }
}

if (!function_exists('setting')) {
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param String $setting Setting name, slug or config key if available
     * @param String|NULL $default Returns if no value is found. NULL if no value is specified.
     * @return string
     **/
    function setting($setting, $default = null)
    {
        if (is_array($setting)) {
            $setting = Setting::updateOrCreate([
                'name' => $setting['name'] ?? $setting[0],
            ], [
                'value'     => json_encode($setting['value'] ?? $setting[1] ?? $default),
                'config'    => $setting['config'] ?? null,
                'model_type'    => $setting['model_type'] ?? null,
                'model_id'  => $setting['model_id'] ?? null,
            ]);

            return $setting->value ?? $default;
        }

        return Setting::whereName($setting)
            ->orWhere('slug', $setting)
            ->orWhere('config', $setting)
            ->value('value') ?? $default;
    }
}
