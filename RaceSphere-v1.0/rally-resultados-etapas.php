<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceSphere Rally</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
    include 'navbar.php';
    include 'sqli/conn.php';
    $query="Select * from prova order by inicio_prova";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
        }
    }
    ?>
<?php
    include 'footer.php';
    ?>
</body>

</html>