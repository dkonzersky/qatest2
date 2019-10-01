<?php
session_start();
$message = '';
include ('Bmw.php');
if ($_POST['email']) {
    $dbConnect = mysqli_connect('localhost', 'root', '', 'qatest');
    $user = $_POST['username'];
    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "select pass from users where mail = '$mail'";
    $reponses = mysqli_query($dbConnect, $sql);
    $responseArray = [];
    while ($response = mysqli_fetch_array($reponses)) {
        $responseArray[] = $response;
    }
    if (count($responseArray) != 0) {
        $_SESSION['user'] = $_POST['username'];
        header("Location:http://qatest/register.php?log=n");
        die();
    }
    $sql = "insert into users (name, mail, pass) values ('$user', '$mail', '$pass')";
    mysqli_query($dbConnect, $sql);
    mysqli_close($dbConnect);
    $_SESSION['user'] = $_POST['username'];
    header("Location:http://qatest/register.php?log=y");
    die();
} elseif ($_POST['usernamelog']) {
    $dbConnect = mysqli_connect('localhost', 'root', '', 'qatest');
    $mail = $_POST['usernamelog'];
    $sql = "select pass from users where mail = '$mail'";
    $reponses = mysqli_query($dbConnect, $sql);
    mysqli_close($dbConnect);
    $responseArray = [];
    while ($response = mysqli_fetch_array($reponses)) {
        $responseArray[] = $response;
    }
    if ($responseArray[0]['pass'] == $_POST['passwordlog']) {
        $_SESSION['user'] = $_POST['usernamelog'];
        header("Location:http://qatest/success.php");
        die();
    } else {
        $message = 'Wrong password!';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta
            charset="UTF-8">
    <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta
            http-equiv="X-UA-Compatible"
            content="ie=edge">
    <title>
        Singup
    </title>
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
    </script>
    <style>
        .good {
            color: #217523 !important;
        }

        .bad {
            color: #a22525 !important;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center" id="title">QA Test</h2>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <form role="form" method="post" action="">
                    <fieldset>
                        <p class="text-uppercase pull-center">SIGN UP:</p>
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control input-lg"
                                   placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-lg"
                                   placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password2" id="password2" class="form-control input-lg"
                                   placeholder="Password2">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <form role="form" method="post" action="">
                    <fieldset>
                        <p class="text-uppercase"> Login using your account: </p>

                        <div class="form-group">
                            <input type="email" name="usernamelog" id="usernamelog" class="form-control input-lg"
                                   placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="text" name="passwordlog" id="passwordlog" class="form-control input-lg"
                                   placeholder="Password">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-secondary" value="Sign In">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <p class="text-center">
        <small id="passwordHelpInline" class="text-muted"></small>
    </p>
</div>
<script>
    $(document).ready(function () {
        $('#passwordHelpInline').addClass('bad');
        $('#passwordHelpInline').text("<?=$message?>");
    });
    $('#usernamelog').on('keyup', function () {
        $isUser = $.ajax({
            url: "http://qatest/get.php",
            type: "GET",
            async: false,
            data: {
                "comand": `select pass from users where mail = '${$('#usernamelog').val()}'`
            }
        }).responseText;
        if ($isUser != 'no') {
            $('#passwordHelpInline').removeClass('bad');
            $('#passwordHelpInline').addClass('good');
            $('#passwordHelpInline').text($('#usernamelog').val() + ' is registered!');
        } else {
            $('#passwordHelpInline').removeClass('good');
            $('#passwordHelpInline').addClass('bad');
            $('#passwordHelpInline').text('No such user ' + $('#usernamelog').val() + '!');
        }
    });
</script>
</body>
</html>