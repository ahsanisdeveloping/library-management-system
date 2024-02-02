<?php 
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: login.php");
        exit;
    }
    $conn = new mysqli('localhost', 'root', '', 'library');
    $query = 'SELECT * FROM books';
    $result = $conn->query($query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
        <div class="navbar bg-dark"><button class='button bg-primary text-white p-2'>
            <a class='text-white' href="booksInsertion.php">Add Books</a>
        </button></div>
        <table class='table table-striped'>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Author</th>
                <th>Book Number</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php 
            if(isset($data))
            {
                foreach($data as $row): ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['book_name'];?></td>
                    <td><?php echo $row['category'];?></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo $row['isbn'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td>
                        <button class='button p-1 border bg-primary text-white'><a href="#" class='text-white'>Edit</a></button>
                        <button class='button border  bg-danger p-1 text-white'><a class='text-white'  href="booksDeletion.php?id=<?php echo $row['id']; ?>">Delete</a></button>
                    </td>
                </tr>
                <?php endforeach;}?>
        </table>     
    </body>
</html>