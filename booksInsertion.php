<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location: login.php");
        exit;
    }
    $connection = new mysqli('localhost', 'root', '', 'library');
    $sqr = "SELECT * FROM bookcatergories";
    $result = $connection->query($sqr);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $second_query = "SELECT * FROM authors";
    $second_query_result = $connection->query($second_query);
    $second_query_data = mysqli_fetch_all($second_query_result, MYSQLI_ASSOC);

    if(isset($_POST['save']))
    {
        $count=0;
        $conn = new mysqli('localhost', 'root', '', 'library');
        foreach($_POST as $key => $value)
        {
            if($value == '' && $key <> 'save')
            {
                $count++;
            }
        }
        if($count==0)
        {
            $book_name = $_POST['book_name'];
            $category = $_POST['category'];
            $author = $_POST['authors'];
            $book_num = $_POST['book_num'];
            $price = $_POST['price'];
            $insertion_query = "INSERT INTO books (book_name,category,author,isbn,price) VALUES ('$book_name','$category', '$author', '$book_num','$price')";
            if($conn->query($insertion_query))
            {
                header("location: booksListing.php");
            }
        }
        else
        {
            echo "kindly enter the value on $key field" . "<br>";
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
        width: 350px;
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
    .main select{
        
        float: right;
        border: none;
        border-radius: 10px;
        height: 35px;
        width: 350px;
        font-size: 1.5rem;
        padding-left: 10px;
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
        <div class="main">
            <h1>Insert Books Data</h1>
        </div>
        <div>
            <label for="">Book Name</label>
            <input type="text" name='book_name'>
        </div>
        <div>
            <label for="">Category</label>
            <select name="category">
            <?php 
                if(isset($data))
                {
                foreach($data as $row):
            ?>
            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
            <?php endforeach;} ?>
            </select></div>
            <div>
            <label for="">Authors</label>
            <select name="authors">
            <?php 
                if(isset($second_query_data))
                {
                foreach($second_query_data as $second_query_row):?>
            <option><?php echo $second_query_row['author_name']; ?></option>
            <?php endforeach;} ?>
            </select></div>
            <div>
                <label for="">Book#</label>
                <input type="text" name='book_num'>
            </div>
            <div>
                <label for="">Price</label>
                <input type="number" name='price'>
            </div>
        <div>
            <button type='submit' name='save'>Add</button>
        </div>
        </form>
        </div>
    </body>
</html>