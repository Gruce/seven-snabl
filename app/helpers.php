<?php

    function dg($data = 'dg' , $msg = 1) : void {
        if($msg == 1)
            $msg = 'info';
        elseif($msg == 2)
            $msg = 'error';
        else $msg = 'warning';
        \Debugbar::$msg($data);
    }

    function is_admin(){
        $user = auth()->user();
        $user->is_admin == false ?  $user : false;
        return $user;
    }

