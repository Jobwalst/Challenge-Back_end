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
    <header class="w3-container w3-teal w3-center">
        <h1>Maak een nieuwe lijst aan</h1>
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a>
    </header>
    <section class="w3-container">
        <form action="create_list.php" method="post">
            <label><b>Maak aan: </b></label>
            <input type="text" name="name" placeholder="Naam nieuwe lijst" required>
            <input type="submit" value="Maak lijst">
        </form>
    </section>
</body>
</html>