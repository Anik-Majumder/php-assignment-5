<?php

session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: login.php");
}

if ($_SESSION["role"] == "user") {
    header("Location: user.php");
}

$fullname = $_POST["fullname"] ?? "";
$email = $_POST["Email"] ?? "";
$password = $_POST["Password"] ?? "";
$role = $_POST["role"] ?? "";

$errorMessege = "";


if ($email != "" && $password != "" && $role != "") {
    $fp = fopen("./data.txt", "a");
    fwrite($fp, "\n {$role},{$email}, {$password}, {$fullname}");
    fclose($fp);

    header("Location: login.php");
} else {
    $errorMessege = "please enter all the information";
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container w-50 bg-info text-dark p-4 my-4">
        <form action="role.php" method="POST">
            <div>
                <h1 class="pb-4 text-center">Add a Member</h1>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" placeholder="admin / user">
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">Username</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="enter your name">

            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="Email"
                    placeholder="enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="Password"
                    placeholder="enter your password">
            </div>


            <div>
                <button type="submit" class="btn btn-primary bg-warning text-dark border-0">Add</button>
                <button class="btn btn-primary bg-warning text-dark border-0 "><a type="button" class=""
                        href="./admin.php">go to admin</a></button>
            </div>

            <div>
                <p>
                    <?php echo $errorMessege ?>
                </p>
            </div>

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>