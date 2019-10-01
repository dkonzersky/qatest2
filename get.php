<?php
if (!$_GET['comand']) {
    $_SESSION['user'] = '';
    header("Location:http://qatest/");
    die();
}
$dbConnect = mysqli_connect('localhost', 'root', '', 'qatest');
$sql = $_GET['comand'];
$reponses = mysqli_query($dbConnect, $sql);
$responseArray = [];
while ($response = mysqli_fetch_array($reponses)) {
    $responseArray[] = $response;
}
if ($responseArray[0]['pass']) {
    echo $responseArray[0]['pass'];
} else {
    echo 'no';
}