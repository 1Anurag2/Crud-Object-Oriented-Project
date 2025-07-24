<?php
include 'database.php';

$obj = new Database();
// $obj->insertData("information", array(
//     "Name" => "John Doe",
//     "Email" => "FtHbO@example.com",
//     "Age" => "22",
//     "DOB" => "2023-10-01"
// ));
// echo "Insert result is : ";
// print_r($obj->getResult());

$obj->updateData("information", array(
    "Name" => "John Doe",
    "Email" => "Fverma45example.com",
    "Age" => "25",
    "DOB" => "2025-10-01"
), 'id="4"');
echo "update result is : ";
print_r($obj->getResult());

?>