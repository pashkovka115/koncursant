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
