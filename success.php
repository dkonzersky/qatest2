<?php
session_start();
if (isset($_POST['logout']) || $_SESSION['user'] == '') {
    $_SESSION['user'] = '';
    header("Location:http://qatest/");
    die();
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
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center" id="title"><?= $_SESSION['user'] ?>, you logged in!</h2>
        <hr>
        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <form role="form" method="post" action="">
                    <fieldset>
                        <div>
                            <input type="submit" name="logout" class="btn btn-secondary" value="Log Out">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>