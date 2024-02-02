<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: login.php");
        exit;
    }
    else
    {
        if(isset($_POST['save']))
        {
            if($_POST['oldPassword'] == $_SESSION['password'] && $_POST['newPassword'] == $_POST['reNewPassword'])
            {
                $newPassword = $_POST['newPassword'];
                $user_id = $_SESSION['user_id'];
                $conn = new mysqli('localhost', 'root','','library');
                $passChangeQuery = "UPDATE users set password = '$newPassword' where user_id = '$user_id'";
                if($conn->query($passChangeQuery))
                {
                    echo "password changed successfully";
                }
                else
                {
                    echo "there was an error while changing the password";
                }
            }
            else
            {
                echo "values are incorrect";
            }
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
        width: 700px;
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
        width: 580px;
    }

    .main label {
        color: white;
        font-size: 1.5rem;
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
    <div class="main">
        <form action="" method='post'>
            <div class="oldPassDiv">
                <label for="">Enter old password</label>
                <input type="text" name='oldPassword' required>
            </div>
            <div class="newPassDiv">
                <label for="">Enter new password</label>
                <input type="text" name='newPassword' required>
            </div>
            <div class="reNewPassDiv">
                <label for="">Re-enter new password</label>
                <input type="text" name='reNewPassword' required>
            </div>
            <div class="buttonDiv">
                <button type='submit' name='save'>Change Password</button>
            </div>
        </form>
        </div>
    </body>
</html>