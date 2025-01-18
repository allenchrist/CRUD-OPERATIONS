<?php 
include "config.php";

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="DELETE FROM users WHERE id='$id'";

    $result=$conn->query($sql);

    if($result==TRUE)
    {
        echo "record deleted";
    }
    else
    {
        echo "error:".$sql."<br>" .$conn->error;
    }
}
?>