<?php
include "config.php";

if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];


$sql="INSERT INTO users (firstname,lastname,email,password,gender) VALUES ('$firstname','$lastname','$email','$password','$gender')";

$result=$conn->query($sql);

if($result==TRUE)
{
    echo "new record created";
}
else
{
    echo "error".$sql . "<br>". $conn->error;
}
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>signup form</h2>
    <form action="" method="POST">
        <label for="firstname">FIRST NAME</label><br>
        <input type="text" name="firstname" id="firstname" required><br><br>
        <label for="lastname">LAST NAME</label><br>
        <input type="text" name="lastname" id="lastname" required><br><br>
        <label for="email">EMAIL</label><br>
        <input type="text" name="email" id="email" required><br><br>
        <label for="password">PASSWORD</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <label for="gender">GENDER</label><br>
        <input type="radio" name="gender" id="gender" value="male">MALE 
        <input type="radio" name="gender" id="gender" value="female">FEMALE<br><rb>
        <input type="submit" name="submit" value="submit">
    </form>


        

</body>
</html>