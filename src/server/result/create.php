<?php

// необходимые HTTP-заголовки 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config/database.php';

include_once '../objects/result.php';

$database = new Database();
$db = $database->getConnection();

$result = new Result($db);
 
$data = json_decode(file_get_contents("php://input"));
 

if (
    !empty($data->result) &&
    !empty($data->test_id) &&
    !empty($data->user_id) 
) {

    $result->result = $data->result;
    $result->test_id = $data->test_id;
    $result->user_id = $data->user_id;
    $result->date = date('Y-m-d H:i:s');

    if($result->createResult()){

        
        http_response_code(201);

        
        echo json_encode(array("message" => "Запись результата создана."), JSON_UNESCAPED_UNICODE);
    }

    
    else {

        http_response_code(503);
        echo json_encode(array("message" => "Невозможно создать запись."), JSON_UNESCAPED_UNICODE);
    }
}

else {

    
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно создать запись. Данные неполные."), JSON_UNESCAPED_UNICODE);
}
?>