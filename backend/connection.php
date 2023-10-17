<?php
$connect = mysqli_connect("localhost", "nobelium24", "oluwatobi", "fullstack2");
if(!$connect){
    echo "Connection error" . mysqli_connect_error();
}else{
    echo "Connection successful";
}
?>