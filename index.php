<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="resources/css/style.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/02e839955c.js" crossorigin="anonymous"></script>
    <title>Backend - TODO LIST</title>
</head>
<body>
<?php 
    include("functions.php");
    $result = getAllLists();
    $items = getAllItems();
    //$joined = joinListItems();

    $conn = null;
    //var_dump($joined);
?> 
<div class="container">
    <header class="w3-container w3-teal w3-center w3-margin-bottom">
        <h1>Maak een nieuwe lijst of voeg items toe aan een lijst.</h1>
    </header>
    <section class="w3-container w3-row">
        <div>
        <?php
            if(isset($_GET["type"]) && $_GET["type"] == "DESC"){
                ?>
                    <a href="index.php?sort=time&type=ASC" class="w3-btn w3-blue">Filter op duur</a>
                <?php
            }
            else{
                ?>
                    <a href="index.php?sort=time&type=DESC" class="w3-btn w3-blue">Sorteer op duur</a>
                <?php
            }
        ?>
            <form action="sortStat.php" method="post">
                <label class="w3-text-blue" for="sortStatus">Filter op status: </label>
                <select class="w3-border" name="sortStatus" id="sortStatus">
                    <option value="voldaan"<?php if(isset($_GET["status"]) && $_GET["status"] == "voldaan"){ echo ' selected="selected"'; }?>>voldaan</option>
                    <option value="loopt"<?php if(isset($_GET["status"]) && $_GET["status"] == "loopt"){ echo ' selected="selected"'; }?>>loopt</option>
                    <option value="niet voldaan"<?php if(isset($_GET["status"]) && $_GET["status"] == "niet voldaan"){ echo ' selected="selected"'; }?>>niet voldaan</option>
                    <input type="submit" value="Filter" class="w3-blue">
                </select>
            </form>
            <a href="index.php" class="reset_a">Reset</a>
        </div>    
        <?php
            foreach ($result as $list) {
        ?>
        <div class="w3-card w3-quarter w3-margin">
            <div class="w3-center aboveList w3-border-bottom w3-padding">
                <form action="update_list.php" method="post">
                    <input type="text" name="name" value="<?= $list["name"] ?>" required>
                    <input type="text" name="id" value="<?= $list["id"] ?>" hidden>
                    <input class="w3-blue changeListSub" type="submit" value="Verander">
                </form>
                <a class="delete_a w3-margin-top " href="delete_list.php?list_id=<?= $list['id'] ?>" onclick="return confirm('Weet je zeker dat je deze lijst wilt verwijderen?')"><i class="far fa-trash-alt"></i> Verwijder</a>
            </div>    
            <?php
                foreach ($items as $item) {
                    if($list["id"] == $item["list_id"]){
            ?>
            <p class="itemText w3-margin-left">- <?= $item["description"] ?> <span>tijd: <?= $item["time"] ?> min. status: <?= $item["status"] ?></span><a onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')" href="delete_item.php?id=<?= $item["id"] ?>"> <i class="far fa-trash-alt"></i></a><a href="update_item_form.php?id=<?= $item["id"] ?>"> <i class="far fa-edit"></i></a></p>    
            <?php
                    }
                }
            ?>
            <div class="w3-center">
                <a href="createItemForm.php?id=<?= $list["id"] ?>" class="createItem_a"><i class="fas fa-plus"></i> Voeg item toe</a>
            </div>
        </div>
        <?php 
            }
        ?>
    </section>
    <section class="w3-container ">
        <a class="w3-large addList_a" href="create_list_form.php"><i class="fas fa-clipboard-list"></i> Maak nieuwe lijst</a>
    </section>
    <footer class="w3-container w3-teal w3-center">
        <h5>© - Job Walst 2021</h5>
    </footer>
</div>
</body>
</html>