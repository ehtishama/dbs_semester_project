<?php

spl_autoload_register('MyAutoloader::controllerLoader');
spl_autoload_register('MyAutoloader::modelLoader');
spl_autoload_register('MyAutoloader::baseLoader');


class MyAutoloader
{
    public static function controllerLoader($className)
    {
         include_once 'controllers/'.$className . '.php';
    }


    public static function modelLoader($className)
    {
         include_once 'models/'.$className . '.php';
    }

    public static function baseLoader($className)
    {
         include_once 'core/'.$className . '.php';
    }
}