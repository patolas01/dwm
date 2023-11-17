<?php
     $Cambio_EuroReal = 5.7;
     fun(100);
     function fun($euros){
        global $Cambio_EuroReal;
        $euros=$euros * $Cambio_EuroReal;
        echo $euros;
     }
?>