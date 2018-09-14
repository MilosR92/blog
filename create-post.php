<?php
include('header.php');
include('footer.php');
include('sidebar.php');
include('povezivanjeBaze.php');

if(isset($_POST['Title'])){
   $title = $_POST['Title'];
}
if(isset($_POST['Body'])){
   $body = $_POST['Body'];
}
$author = rand(1, 5); // 5 je broj usera koji trenutno postoji u tabeli, bez sign up-a ne moze lepse
if(isset($title) && isset($body)){
   $sql = "INSERT INTO posts (Title, Body, Author) VALUES ('$title', '$body', '$author')";
   $statement = $connection->prepare($sql);
   $statement->execute();
   header("Location: index.php");
}

?>