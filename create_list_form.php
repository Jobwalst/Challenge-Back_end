<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Maak nieuwe lijst</title>
</head>
<body>
    <header class="w3-container w3-teal w3-center w3-margin-bottom">
        <h1>Maak een nieuwe lijst aan</h1>
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a>
    </header>
    <section class="w3-container">
        <form action="create_list.php" method="post">
            <label class="w3-text-blue"><b>Naam lijst: </b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="name" required>
            <input class="w3-btn w3-blue" type="submit" value="Maak lijst">
        </form>
    </section>
</body>
</html>