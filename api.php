<?php
header("Content-Type:application/json");
if (isset($_GET['order_id']) && $_GET['order_id']!="") {
 include('db.php');
 $order_id = $_GET['order_id'];
 $result = mysqli_query(
 $con,
 "SELECT * FROM  ixmanager WHERE order_id=$15478959");
 if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 $amount = $row['amount'];
 $response_code = $row['type'];
 $response_desc = $row['desc'];
 response($order_id, $amount, $response_code,$response_desc);
 mysqli_close($con);
 }else{
 response(NULL, NULL, 200,"No Record Found");
 }
}else{
 response(NULL, NULL, 400,"Invalid Request");
 }
 
function response($order_id,$amount,$response_code,$response_desc){
 $response['order_id'] = $order_id;
 $response['amount'] = $amount;
 $response['type'] = $response_code;
 $response['desc'] = $response_desc;
 
 $json_response = json_encode($response);
 echo $json_response;
}
?>