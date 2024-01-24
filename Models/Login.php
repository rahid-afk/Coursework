<?php

class Login
{
    public function authenticate($username, $password){
        if ($username === 'deliverer' && $password === 'deliverer'){
            $usertype = 'deliverer';
            return true;
        } else if ($username === 'manager' && $password === 'manager'){
            $usertype = 'manager'; //get usertype from database instead
            return true;
        }
        return false;
    }
}