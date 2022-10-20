<?php

class Output{

    function secToMin($sec){
        $min = ($sec / 60) % 60;
        $newSec = $sec % 60;

        $time = $min . ":" . $newSec;
        return $time;
    }
}

?>