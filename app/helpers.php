<?php

use Carbon\Carbon;

if(!function_exists('formatDate')){
    function formatDate($date, $format = 'd F Y')
    {
        return Carbon::parse($date)->format($format);
    }
}
