<?php 
include "config.php";

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', gender='$gender', password='$password' WHERE id='$id'";

    $result = $conn->query($sql);

    if($result === TRUE)
    {
        echo "record updated";
    }
    else{
        echo "error: ".$sql."<br>".$conn->error;
    }
}
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id='$id'";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
            <h2>update form</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="firstname" >FIRST NAME</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                <label for="lastname" >LAST NAME</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                <label for="email" >EMAIL</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                <label for="password" >PASSWORD</label>
                <input type="text" name="password" id="password" placeholder="Enter new password">
                <input type="radio" name="gender" value="male" <?php if($gender == 'male'){echo "checked";}?>>Male
                <input type="radio" name="gender" value="female" <?php if($gender == 'female'){echo "checked";}?>>Female
                <input type="submit" value="update" name="update">
            </form>
        </body>
        </html>
        <?php
    }
    else{
        header('Location: view.php');
    }
}
?>