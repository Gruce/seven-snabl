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
        if(auth()->user()->is_admin == false)
            return true;
    }

