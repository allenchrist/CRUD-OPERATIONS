<?php 
include "config.php";
$sql="SELECT * FROM users";

$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW PAGE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>GENDER</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {

                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id'];?>">
                        EDIT</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">delete
                    </a><td>
                   <?php }
                }
                ?>
                </tbody>
                <table>
            </div>
</body>
</html>