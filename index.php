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

// $obj->updateData("information", array(
//     "Name" => "Anurag Verma",
//     "Email" => "anurag5055ver@gmail.com",
//     "Age" => "22",
//     "DOB" => "2025-07-04"
// ), 'id="1"');
// echo "update result is : ";
// print_r($obj->getResult());


// $obj ->deleteData("information", 'id="1"');
// echo "delete result is : ";
// print_r($obj->getResult());

// $obj ->sql("SELECT * FROM information");
// echo "Select result is : ";
// print_r($obj->getResult());

// $obj->select('information', '*', null, 'age=22', 'Name', 2);
$obj->select('information', 'id,Name', null, 'age=22', 'Name', null);
echo "Select result is : ";
print_r($obj->getResult());
?>