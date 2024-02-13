<?php
include('database1.php');

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$passwords = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($passwords == $confirm_password && $first_name !="" && $middle_name !="" && $last_name !="" && $passwords !="" ) {
    $check_query = "SELECT * FROM formuser WHERE firstname='$first_name' AND middlename='$middle_name' AND lastname='$last_name'";
    $result = mysqli_query($conn, $check_query);

 
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists.";
    } else {
        
        $sql = "INSERT INTO formuser (firstname, middlename, lastname, passwords) VALUES ('$first_name', '$middle_name', '$last_name', '$passwords')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Kindly enter correct data";
}
?>
