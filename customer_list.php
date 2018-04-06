<?php
include_once('config.php');
$result = mysqli_query($conn, "SELECT customer_id, first_name, last_name, email_address, is_active FROM `customer` ORDER BY customer_id ASC;");
if(isset($result))
{
    $data =array();
    while($d = mysqli_fetch_array($result)){
        extract($d);
        $data[] = array("customer_id" => $customer_id, "first_name" => $first_name, "last_name" => $last_name, "email_address" => $email_address, "is_active" => $is_active);
    }
    $json = array("status" => 1, "info" => $data);
}else{
    $json = array("status" => 0, "msg" => "An error occurred.");
}
@mysqli_close($conn);

// Output json header
header('Content-type: application/json');
echo json_encode($json);
?>