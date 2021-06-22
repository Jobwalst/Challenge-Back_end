<?php include("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>TODO - update item</title>
</head>
<body>
<?php 
$id = $_GET["id"];

$item = getOneItem($id);
//var_dump($item);
?>
<header class="w3-container w3-teal w3-center w3-margin-bottom">
    <h1>Update item <?= $id ?> van lijst <?= $item["list_id"] ?></h1>
    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a>
</header>
<section class="w3-container">
    <form action="update_item.php" method="post">
        <label for="desc" class="w3-text-blue"><b>Beschrijving: </b></label>
        <textarea id="desc" class="w3-input w3-border w3-margin-bottom" name="desc" type="text" required><?= $item["description"] ?></textarea>
        <label for="time" class="w3-text-blue"><b>Tijd (min): </b></label>
        <input type="number" id="time" name="time" class="w3-input w3-border w3-margin-bottom" value="<?= $item["time"] ?>" required>
        <label for="status" class="w3-text-blue"><b>Status = <?= $item["status"] ?>. (Je moet een status selecteren!)</b></label>
        <select class="w3-select w3-border w3-margin-bottom" name="status" id="status" size="3" required>
            <option value="voldaan">voldaan</option>
            <option value="loopt">loopt</option>
            <option value="niet voldaan">niet voldaan</option>
        </select>
        <input type="number" id="id" name="id" value="<?= $id ?>" hidden>
        <input type="submit" value="Update item" class="w3-btn w3-blue">
    </form>
</section>
</body>
</html>