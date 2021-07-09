<?php

class Session{


    public static function init()
    {
        session_start();
    }
    public static function set($key,$value)
    {
        $_SESSION["$key"] = $value;
    }
    public static function get($key)
    {
       if(isset($_SESSION[$key]))
       {
            return $_SESSION["$key"];
       }
       else
       {
           return false;
       }
    }
    public static function destroy()
    {
       session_destroy();
    }
    public static function unset($key)
    {
        session_unset($key);
    }
    public static function checkSection(){
        self::init();
        if(self::get('login') == false)
        {
            self::destroy();
            header("location:".BASE_URL.'AdminController/ViewLoginAdmin');
        }
        else
        {
           
        }
    }
   

}
