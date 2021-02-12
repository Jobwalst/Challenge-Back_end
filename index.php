<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>Backend - TODO LIST</title>
</head>
<body>
<?php 
    include("functions.php");
    $result = getAllLists();
    $items = getAllItems();

    $conn = null;
    //var_dump($result);
?> 
<div class="container">
    <header class="w3-container w3-teal w3-center">
        <h1>Maak een nieuwe lijst of voeg items toe aan een lijst.</h1>
    </header>
    <section class="w3-container w3-row">
        <?php
            foreach ($result as $list) {
        ?>
        <div class="w3-card w3-quarter w3-margin">
            <h4 class="w3-center w3-border-bottom"><?= $list["name"] ?></h4>
            <?php
                foreach ($items as $item) {
                    if($list["id"] == $item["list_id"]){
            ?>
            <p class="w3-center">- <?= $item["description"] ?></p>
            <?php
                    }
                }
            ?>
        </div>
        <?php 
            }
        ?>
    </section>
    <footer class="w3-container w3-teal w3-center">
        <h5>© - Job Walst 2021</h5>
    </footer>
</div>
</body>
</html>