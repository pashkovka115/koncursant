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

if (!function_exists('getIntervalQuarter')){
    /**
     * @param $timestamp
     * @return array - границы квартала, номер квартала
     * start - начало квартала
     * end - конец квартала
     * number - номер квартала
     */
    function getIntervalQuarter($timestamp)
    {
        $kv = (int)((date('n', $timestamp) - 1) / 3 + 1);
        $year = date('y', $timestamp);
        return [
            'start' => date('Y-m-d', mktime(0, 0, 0, ($kv - 1) * 3 + 1, 1, $year)),
            'end' => date('Y-m-d', mktime(0, 0, 0, ($kv) * 3 + 1, 0, $year)),
            'number' => $kv
        ];
    }
}

if(!function_exists('delDir')){
    function delDir($dir)
    {
        $files = array_diff(scandir($dir), ['.', '..']);
        try {
            foreach ($files as $file) {
                (is_dir($dir . '/' . $file)) ? delDir($dir . '/' . $file) : unlink($dir . '/' . $file);
            }
            return rmdir($dir);
        } catch (Exception $e) {
        }
    }
}
