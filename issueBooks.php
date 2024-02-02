<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: login.php");
        exit;
    }
        $book_id = $_GET['id'];
        if(isset($_POST['save']))
        {
            $user_id= $_POST['user_id'];
            $conn = new mysqli('localhost','root','','library');
            $fetchQuery = "SELECT * FROM users where user_id = '$user_id'";
            $fetchQueryResult = $conn->query($fetchQuery);
            if($fetchQueryResult->num_rows > 0)
            {
                $fetchQueryData = mysqli_fetch_assoc($fetchQueryResult);
                $issuedBookUser = $fetchQueryData['user_id'];
                $issueBookQuery = "UPDATE books set status = 'issued', issued_to = '$issuedBookUser' where id='$book_id'";
                if($conn->query($issueBookQuery))
                {
                    echo "book issued successfully";
                }
                else
                {
                    echo 'there was an error';
                }
            }
            else
            {
                echo 'user not found';
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
        <h1>Enter the details of the student</h1>
        <form action="" method='post'>
            <div class="id-div">
                <label for="">Enter user_id</label>
                <input type="text" name='user_id'>
            </div>
            <div class="button-div">
                <button type='submit' name='save'>Issue</button>
            </div>
        </form>
        <button id='back' ><a href="dashboard.php">Dashboard</a></button>
    </body>
</html>