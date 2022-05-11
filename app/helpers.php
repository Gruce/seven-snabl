<?php

    function dg($data = 'dg' , $msg = 1) : void {
        if($msg == 1)
            $msg = 'info';
        elseif($msg == 2)
            $msg = 'error';
        else $msg = 'warning';
        \Debugbar::$msg($data);
    }
