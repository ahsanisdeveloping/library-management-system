<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: login.php");
        exit;
    }
    if(isset($_POST['save']))
    {
        $author_name = $_POST['author_name'];
        $author_gender = $_POST['gender'];
        $conn = new mysqli('localhost', 'root', '', 'library');
        $query = "INSERT INTO authors (author_name,gender) VALUES ('$author_name','$author_gender')";
        $result = $conn->query($query);
        if($result)
        {
            header('location:authorsListing.php');
        }
        else
        {
            echo "there was an error";
        }
    }
?>
<html>
    <head>
        <style>
            @font-face {
        font-family: myFont;
        src: url('fonts/anchor.ttf');
    }
    .bottom-line{
        border-bottom:black 2px solid;
    }
          .a-img {
        margin-left: 100px;
        height: 80px;
        width: 300px;
    }

    .logo-div h1 {
        width: 350px;
        font-size: 2rem;
        font-weight: bolder;
    }

    .log-out-button {
        padding: 10 20px;
        font-size: 0.8rem;
        float: right;
        font-family: myFont;
        margin-right: 20px;
        font-weight: bolder;
    }

    .log-out-button:hover {
        cursor: pointer;
    }

    .dash {
        width: 100%;
    }

    .right {
        float: right;
    }

    .dash-row {
        background-color: #5C574F;
        padding: 10px;
        border-radius: 50px;
        margin-top: 50px;
        width: 950px;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    .dash-row a {
        font-size: 1.2rem;
        text-decoration: none;
        color: white;
        font-weight: bold;
        transition: all 300ms ease;
        font-family: myFont;
    }

    .dash-row a:hover {
        color: #A28F9D;
        border-bottom: 1px solid red;
    }

    .button-div a {
        text-decoration: none;
        color: white;
    }
    .main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin: 10px auto;
        width: 600px;
        padding: 35px 0px 5px 0px;
        background: #5C574F;
        font-family: myFont;
        border-radius: 50px;
    }
    .main h1 {
        text-align: center;
        color: white;
        font-size: 2rem;
    }
    .main div {
        width: 520px;
    }

    .main label {
        color: white;
        font-size: 1.7rem;
    }

    .main input {
        float: right;
        border: none;
        border-radius: 10px;
        height: 35px;
        width: 300px;
        font-size: 1.5rem;
        padding-left: 10px;
    }

    .main button {
        margin-left: 200px;
        border: none;
        padding: 10px 20px;
        font-size: 1.3rem;
        border-radius: 10px;
        transition: all 300ms ease;
        margin-top: 30px;
    }
    .main button:hover {
        cursor: pointer;
        background: grey;
        color: white;
    }

        </style>
        <link rel='stylesheet' href='bootstrap.css'>

    </head>
    <body>
    <div class="navbar bg-white bottom-line ">

<div class="logo-div left">
    <h1>Online Library Management System</h1>
    <!-- <img class='a-img' src="library.jpg" alt=""> -->
</div>
<div class='right'>
    <div class="button-div ">
        <button class='log-out-button button bg-danger text-white rounded border'><a href="logout.php">LOG ME
                OUT</a></button>
    </div>
    <div class="dash-row sec2 ">
        <div class="sec2-divs ">
            <a href="dashboard.php">DASHBOARD</a>
        </div>
        <div class="sec2-divs ">
            <a href="booksCategoryListing.php">CATEGORIES</a>
        </div>
        <div class="sec2-divs ">
            <a href="authorsListing.php">AUTHORS</a>
        </div>
        <div class="sec2-divs ">
            <a href="booksListing.php">BOOKS</a>
        </div>
        <div class="sec2-divs ">
            <a href="issueBooksListing.php">ISSUE BOOKS</a>
        </div>
        <div class="sec2-divs ">
            <a href="#">REG STUDENTS</a>
        </div>
        <div class="sec2-divs ">
            <a href="changePassword.php">CHANGE PASSWORD</a>
        </div>
    </div>
</div>
</div>
    <div class='main'>
        <form action="" method='post'>
        <div class="main">
            <h1>Insert Authors Data</h1>
        </div>
        <div>
            <label for="">Author's Name</label>
            <input type="text" name='author_name'>
        </div>
        <div>
            <label for="">Author's Gender :</label>
            <div>
                <input style='margin-right:330px; width:60px;' type="radio" name='gender' value='Male'><label for="">Male</label>
            </div>
            <div>
                <input style='margin-right:330px; width:60px;' type="radio" name='gender' value='Female'><label for="">Female</label>
            </div>
        </div>
        <div>
            <button type='submit' name='save'>Add</button>
        </div>
        </form>
        </div>
    </body>
</html>