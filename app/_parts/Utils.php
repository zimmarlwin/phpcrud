<?php
namespace MyApp;

Class Utils
{
    public static function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');        
    }

}