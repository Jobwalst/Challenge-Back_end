<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Voeg een nieuw item toe</title>
</head>
<body>
    <?php 
    $id = $_GET["id"];
    ?>
    <header class="w3-container w3-teal w3-center w3-margin-bottom">
        <h1>Voeg een item toe</h1>
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a>
    </header>
    <section>
        <form class="w3-container" action="createItem.php" method="post">
            <label class="w3-text-blue"><b>Beschrijving: </b></label>
            <textarea class="w3-input w3-border w3-margin-bottom" type="text" name="description" required></textarea>
            <label class="w3-text-blue"><b>Tijd (min): </b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="number" name="time" required>
            <label class="w3-text-blue"><b>Status: </b></label>
            <select class="w3-select w3-border w3-margin-bottom" name="status" id="status" size="3" required>
                <option value="voldaan">voldaan</option>
                <option value="loopt">loopt</option>
                <option value="niet voldaan">niet voldaan</option>
            </select>
            <input type="number" name="list_id" id="list_id" value="<?= $id ?>" hidden>
            <input class="w3-btn w3-blue w3-margin-bottom" type="submit" value="Voeg item toe">
        </form>
    </section>
    <footer class="w3-container w3-teal w3-center">
        <h5>&copy - Job Walst 2021</h5>
    </footer>
</body>
</html>