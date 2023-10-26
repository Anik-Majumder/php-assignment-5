<?php

session_start();

$email = $_POST["email"] ?? ""; // getting values from input fields
$password = $_POST["password"] ?? ""; // getting values from input fields

$errorMessege = "";


$fp = fopen("./data.txt", "r"); // reading data from data.txt

$roles = array();
$emails = array();
$passwords = array();
$names = array();

while ($line = fgets($fp)) { // reading each line from data.txt with loop
    $values = explode(",", $line); //separationg data from coma and keeping then in a array

    array_push($roles, trim($values[0])); // keeping all the roles in a array
    array_push($emails, trim($values[1])); // keeping all the emails in a array
    array_push($passwords, trim($values[2])); // keeping all the passwords in a array
    array_push($names, $values[3]); // keeping all the names in a array
}

fclose($fp);

// mathching the email and password with the database

for ($i = 0; $i < count($roles); $i++) {

    if ($email == $emails[$i] && $password == $passwords[$i]) {
        $_SESSION["role"] = $roles[$i];
        $_SESSION["email"] = $emails[$i];
        $_SESSION["name"] = $names[$i];
        header("Location: index.php");
    } else {
        $errorMessege = "invalid username or password";
    }


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
    <div class="container w-50 bg-warning text-dark p-4 my-4">
        <form action="login.php" method="POST">
            <div>
                <h1 class="pb-4 text-center">Login to your account.</h1>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <p>
                <?php echo $errorMessege ?>
            </p>

            <div class="pt-2">
                <p>dosen't have an account? <a href="registration.php">create</a></p>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>