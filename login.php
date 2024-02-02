<?php
    if(isset($_POST['save']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = new mysqli('localhost', 'root', '', 'library');
        $loginQuery = "SELECT * FROM users Where email = '$email' AND password = '$password'";
        $loginQueryResult = $conn->query($loginQuery);
        if($loginQueryResult->num_rows > 0)
        {
            $loginResultData = mysqli_fetch_assoc($loginQueryResult);
            session_start();
            $_SESSION['user_id'] = $loginResultData['user_id'];
            $_SESSION['student_id'] = $loginResultData['student_id'];
            $_SESSION['name'] = $loginResultData['name'];
            $_SESSION['email'] = $loginResultData['email'];
            $_SESSION['password'] = $loginResultData['password'];
            $_SESSION['contact'] = $loginResultData['contact'];
            $_SESSION['role'] = $loginResultData['role'];
            $_SESSION['status'] = $loginResultData['status'];
            $_SESSION['created_at'] = $loginResultData['created_at'];
            header("location: dashboard.php");

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

    .main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin: 100px auto;
        width: 600px;
        padding: 35px 0px 80px 0px;
        background: #5C574F;
        font-family: myFont;
        border-radius: 50px;
    }

    .main h1 {
        text-align: center;
        color: white;
        font-size: 3rem;
    }

    .main div {
        width: 450px;
    }

    .main label {
        color: white;
        font-size: 2rem;
        margin-top:30px;
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

    .login button {
        margin-left: 200px;
        border: none;
        padding: 10px 20px;
        font-size: 1.3rem;
        border-radius: 10px;
        transition: all 300ms ease;
        margin-top: 30px;
    }

    .login button:hover {
        cursor: pointer;
        background: grey;
        color: white;
    }
    .registerDiv{
        padding-top:20px;
        color:white;
        font-size:1.5rem;
    }
    .registerDiv a{
        color:red;
        text-decoration:none;
        border-bottom:1px solid red;
    }
    .registerDiv a:hover{
        color:white;
        border-bottom:1px solid white;
    }
    </style>
</head>

<body>
    <div class="main">
        <h1>Login</h1>
        <form action="" method='post'>
            <div class="email-div">
                <label for="">Email</label>
                <input type="text" name='email' required>
            </div>
            <div class="password-div">
                <label for="">Password</label>
                <input type="password" name='password' required>
            </div>
            <div class="login">
                <button type='submit' name='save'>Login</button>
            </div>
            <div class='registerDiv'><span>Not already registered? <a href="usersRegistration.php">click here</a></span></div>
        </form>
    </div>
</body>

</html>