<?php 
    $id = $_GET['id'];
    $conn = new mysqli('localhost', 'root', '', 'library');
    $query = "DELETE  FROM authors where id = '$id'";
    $result = $conn->query($query);
    if($result)
    {
        header('location:authorsListing.php');
    }
?>