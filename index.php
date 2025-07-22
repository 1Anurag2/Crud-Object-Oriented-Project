<?php
include 'database.php';

$obj = new Database();
$obj->insertData("information", array(
    "Name" => "John Doe",
    "Email" => "FtHbO@example.com",
    "Age" => "22",
    "DOB" => "2023-10-01"
));
echo "Insert result is : ";
print_r($obj->getResult());


?>