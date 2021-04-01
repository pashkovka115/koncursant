<?php

if (!function_exists('option')) {
    function option($key)
    {
        return \App\Models\Contact::where('key', $key)->firstOrFail();
    }
}

if (!function_exists('options')) {
    function options(array $keys)
    {
        return \App\Models\Contact::whereIn('key', $keys)->get();
    }
}

if (!function_exists('array_cut')) {
    function array_cut(&$array, $key)
    {
        if (!isset($array[$key])){
            return null;
        }
        $el = $array[$key];
        unset($array[$key]);

        return $el;
    }
}
