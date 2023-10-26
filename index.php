<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] == "user") {
    header("Location: User.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mx-auto mt-4 text-center">
        <h1>welcome
            <?php echo $_SESSION["name"] ?>
        </h1>
        <p>your email is:
            <?php echo $_SESSION["email"] ?>
        </p>
        <p>your role is:
            <?php echo $_SESSION["role"] ?>
        </p>
        <a type="button" class="btn btn-info mt-4" href="./logout.php">Logout</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>