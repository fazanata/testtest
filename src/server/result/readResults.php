<?php

// необходимые HTTP-заголовки 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// подключение базы данных и файл, содержащий объекты 
include_once '../config/database.php';
include_once '../objects/result.php';

// получаем соединение с базой данных 
$database = new Database();
$db = $database->getConnection();

// инициализируем объект 
$result = new Result($db);

 // установим свойство ID записи для чтения 
$result->idt = isset($_GET['idt']) ? $_GET['idt'] : die();

// запрашиваем все категории
$stmt = $result->readResultTest();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей 
if ($num>0) {

    // массив res 
    $result_arr=array();

    // получаем содержимое нашей таблицы 
    // fetch() быстрее, чем fetchAll() 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // извлекаем строку 
        extract($row);

        $result_item=array(
              "result_id" =>  $result_id,
              "date" => $date,
              "result" => $result,
          	  "test_id" => $test_id,
              "user_id" => $user_id
        );

            array_push($result_arr, $result_item);
    }

    // устанавливаем код ответа - 200 OK 
    http_response_code(200);

    // выводим данные о категориях в формате JSON 
    echo json_encode($result_arr);
    
}

else {

    // установим код ответа - 404 Не найдено 
    http_response_code(404);

    // сообщаем пользователю, что Категории не найдены 
    echo json_encode(array("message" => "Результаты не найдены."), JSON_UNESCAPED_UNICODE);
}
?>