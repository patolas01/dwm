<?php
    $arrayName = array('joao@mail.pt' => 'João Silva', 'jorge@mail.pt' => 'Jorge Pereira', 'sonia@mail.pt' => 'Sónia Silva', 'ana@mail.pt' => 'Ana Duarte');
    foreach($arrayName as $mail =>$name){
        echo $mail." => ".$name."<br>";
    }
?>