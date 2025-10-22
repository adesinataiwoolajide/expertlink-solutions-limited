<?php

    function RandomString($length)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length / strlen($x)))), 1, $length);
    }

    function getData($table_name, $opt)
    {
        return \DB::table($table_name)->orderBy('created_at', 'desc')->$opt();
    }

    function getInformation($table_name, $column_name, $val, $opt)
    {
        return \DB::table($table_name)->where([
            "$column_name" => $val,
        ])->orderBy('created_at', 'desc')->$opt();
    }

?>