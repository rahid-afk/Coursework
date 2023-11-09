<?php

class Login
{
    public function authenticate($username, $password){
        if ($username === 'user' && $password === 'password'){
            $usertype = 'user';
            return true;
        } else if ($username === 'admin' && $password === 'admin'){
            $usertype = 'admin';
            return true;
        } else if ($username === 'deliverer' && $password === 'deliverer'){
            $usertype = 'deliverer';
            return true;
        }
        return false;
    }
}