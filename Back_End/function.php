<?php
session_start();

function random_id_gen($length)
    {
        //the characters you want in your id
        $characters = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
        $max = strlen($characters) - 1;
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        $_SESSION['sid'] = $string;
        return $string;
    }
