<?php require_once 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>
<style>
    .btn{
        color: white;
        background-color: lightskyblue;
        margin: 30px;
    }

    .btn:hover{
        background-color: #00fafa;
    }


    nav > a {
        color: lightskyblue;
        margin-left: 40px;
    }
    nav > a:hover{
        text-decoration: none;
        color: white;
    }
    h2{
        margin-right: 40px;
    }

</style>

<body>
<nav style="background-color: lightpink;" class="navbar">
    <a href="index.php"><h1>Baltic Talents</h1></a>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo BASE_URL; ?>/logout.php">
            <h2>Logout<h2></a></li>
    </ul>
</nav>





