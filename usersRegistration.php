<?php 
    if(isset($_POST['save']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        if($_POST['role']<>'Select')
        {
            $role = $_POST['role'];
        }
        $student_id = "bsf-210".rand(1000,9999);
        $conn = new mysqli('localhost','root','','library');
        $insertQuery = "INSERT INTO users (name,email,password,contact,role) VALUES ('$name','$email','$password','$contact','$role')";
        if($conn->query($insertQuery))
        {
            $insert_id = mysqli_insert_id($conn);
            if($role=='Student')
            {
                $roleQuery = "UPDATE users set student_id = '$student_id' where user_id = '$insert_id'";
                if($conn->query($roleQuery))
                {
                    echo "location: usersListing.php";
                }
            }
            else if($role=='Staff')
            {
                header("location: usersListing.php");
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
        font-size: 3rem;
    }
    .main div {
        width: 550px;
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
        width: 400px;
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
        width: 400px;
        font-size: 1.5rem;
        padding-left: 10px;
    }
    </style>
        <link rel='stylesheet' href='bootstrap.css'>

</head>

<body>

    <div class="main">
        <h1>Register Here</h1>
        <form action="" method='post'>
            <div class="name-div">
                <label for="">Name</label>
                <input type="text" name='name' required>
            </div>
            <div class="email-div">
                <label for="">Email</label>
                <input type="email" name='email' required>
            </div>
            <div class="password-div">
                <label for="">Password</label>
                <input type="password" name='password' required>
            </div>
            <div class="contact-div">
                <label for="">Contact</label>
                <input type="text" name='contact' required>
            </div>
            <div class="role-div">
                <label for="">Role</label>
                <select name="role">
                    <option value="Select">Select</option>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="button-div">
                <button type='submit' name='save'>Register</button>
            </div>
        </form>
    </div>
</body>

</html>