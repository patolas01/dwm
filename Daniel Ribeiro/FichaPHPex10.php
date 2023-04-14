<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border:1px black solid;
        }
        table td{
            border:1px black solid;
        }
    </style>
</head>
<body>
    <?php
    $arrayName = array('joao@mail.pt' => 'João Silva', 'jorge@mail.pt' => 'Jorge Pereira', 'sonia@mail.pt' => 'Sónia Silva', 'ana@mail.pt' => 'Ana Duarte');
    FunctionName($arrayName);
    function FunctionName($arrayName)
    {
        ?><table><?php
        foreach($arrayName as $mail =>$name){
            ?>
                <tr>
                    <td>
            <?php
            echo $mail." => ".$name;
            ?>
                </td>
                    </tr>
            <?php
        }?></table><?php
    }
?>
</body>
</html>
