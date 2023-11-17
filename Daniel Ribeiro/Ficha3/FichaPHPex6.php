<?php
    $var=array(123,32,"Leiria","Coimbra","Fig. Foz","Lisboa");
    func($var);
    function func($var){
        for($i=0;$i<count($var);$i++){
            echo $var[$i]."<br>";
        }
    }
    $var2="BMW";
    func2();
    function func2($var2="Volvo"){
        echo "Apólice referente ao automóvel de marca ".$var2;
    }
?>