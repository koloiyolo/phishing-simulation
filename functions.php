<?php
function get_translation($key) {

    $lang = "en";

    if ( isset($_ENV["SIMULATION_LANG"]) ) {
        $lang = $_ENV["SIMULATION_LANG"];
    } 

    $path = "lang/{$lang}.json";
    $content = json_decode(file_get_contents($path));

    if ( isset($content->$key) ) {
        return $content->$key;
    }
    return NAN;
}