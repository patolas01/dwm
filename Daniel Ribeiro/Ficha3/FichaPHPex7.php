<?php
    $corda="Olá";
    funcao($corda);
    echo $corda;
    function funcao(&$corda){
        $corda .=" e Adeus";
    }
?>