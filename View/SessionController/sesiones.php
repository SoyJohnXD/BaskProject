<?php
class Session 
{

public function add($key,$value)
{
    $_SESSION[$key] = $value;
}

public function get($key)
{
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
}

public function getAll()
{
    return $_SESSION;
}

public function remove($key)
{
    if (!empty($_SESSION[$key])) {
        unset($_SESSION[$key ]);
    }
}
public function getStatus()
{
    return session_status();
}

}

?>