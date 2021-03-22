<?php 
    include('dbconn.php');
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    // $name = $data['name'];
    // if (!$name) {
    //     $resp = array(
    //         'success' =>false,
    //         'message' => 'Invalid item name',
    //         'TYPE'=>$type,
    //         'DESCRIPTION'=>$description,
    //         'AMOUNT' => $amount,
    //         'ACTION' => $action
    //     );
    //     echo json_encode($resp);  
    //     exit;      
    // }
    $sql = "INSERT INTO incomeexpense (TYPE ,
    DESCRIPTION ,
    AMOUNT ,
    ACTION )
    VALUES ('income','salary','50000','delete')";
    $err = $conn->query($sql);
    
    
    $resp = array(
        'success' => true,
        'data' => $resp,
        'message' => 'Loaded successfully!!'
    );
    echo json_encode($resp);
?>