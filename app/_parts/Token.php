<?php
namespace MyApp;

class Token{
    public static function createToken()
    {
        if(!isset($_SESSION['token']))
        {
        $_SESSION['token'] = bin2hex(random_bytes(32));
        }
    }
    public static function validateToken()
        {
            if(
            empty($_SESSION['token']) ||
            $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
        ){
            exit ('Invalid post request');
        }
    }
    }