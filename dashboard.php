<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: login.php");
        exit;
    }
?>
<html>

<head>
    <link rel='stylesheet' href='bootstrap.css'>
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

    .sec1 h1{
        font-family:myFont;
        font-weight:bolder;
        padding:10px;
        text-align:center;
        color:white;
        font-size:3rem;
    }
    .details-div{
        margin-left:20px;
        color:white;
        float:left;
        width:500px;
        font-family:myFont;
    }
    .details-div p{
        font-size:1.2rem;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class='bg-dark'>
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
                    <a href="usersListing.php">REG STUDENTS</a>
                </div>
                <div class="sec2-divs ">
                    <a href="changePassword.php">CHANGE PASSWORD</a>
                </div>
            </div>
        </div>
    </div>

    <div class="sec1">
        <h1><?php if($_SESSION['role'] == 'Student'){echo "Student Dashboard";}else if($_SESSION['role'] == 'Staff'){echo "Staff Dashboard";}else if($_SESSION['role'] == 'Admin'){echo "Admin Dashboard";} ?></h1>
        <div class='details-div'>
            <h3>Details</h1>
            <p>User_id: <?php echo $_SESSION['user_id'];?></p>
            <?php if($_SESSION['student_id'] != 'NULL'){
                $student_id = $_SESSION['student_id'];
                echo "<p>Student_id: $student_id</p>";} ?>
            <p>Name: <?php echo $_SESSION['name'];?></p>
            <p>Email: <?php echo $_SESSION['email'];?></p>
            <p>Contact: <?php echo $_SESSION['contact'];?></p>
            <p>Role: <?php echo $_SESSION['role'];?></p>
            <p>Status: <?php echo $_SESSION['status'];?></p>
            <p>Registration Date: <?php echo $_SESSION['created_at'];?></p>
        </div>
        <div class="admin-dashboard-div">
            <div class="dashboard-divs">
                <i class="fa-solid fa-book"></i>
                <span></span>
                <p>Books Listed</p>
            </div>
            <div class="dashboard-divs">
                
            </div>
            <div class="dashboard-divs"></div>
            <div class="dashboard-divs"></div>
            <div class="dashboard-divs"></div>
        </div>
    </div>
</body>

</html>