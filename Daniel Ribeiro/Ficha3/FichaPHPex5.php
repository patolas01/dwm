<?php
 $var=array();
 for($i=0;$i<10;$i++){
    $var[$i]=$i + 1;
 }
 for($i=0;$i<10;$i++){
    echo $var[$i]."<br>";
 }
 $i=0;
 do{
    echo $var[$i]."<br>";
    $i++;
 }while($i<10);
 $i=0;
 while($i<10){
    echo $var[$i]."<br>";
    $i++;
 }
?>