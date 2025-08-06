<?php
/**
  * Purpose of this library is to generate salt, password and other required
  * stuff of any authentication process to work.
  * @author Shahzad Fateh Ali <shahzad.fatehali@gmail.com>
**/

class Password
{
    public function generate()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()<>?:"{}+_=-~`';
        $length = 12;
        return substr(str_shuffle($chars), 0, $length);
    }

    public function validate($raw_password, $hash)
    {
        return password_verify($raw_password, $hash);
    }

    public function make($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
