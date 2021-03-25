<?php

// необходимые HTTP-заголовки 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// подключение базы данных и файл, содержащий объекты 
include_once '../config/database.php';
include_once '../objects/category_q.php';

// получаем соединение с базой данных 
$database = new Database();
$db = $database->getConnection();

// инициализируем объект 
$category = new category_q($db);

 
// запрашиваем все категории
$stmt = $category->readCategories();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей 
if ($num>0) {

    // массив категорий 
    $categories_arr=array();

    // получаем содержимое нашей таблицы 
    // fetch() быстрее, чем fetchAll() 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // извлекаем строку 
        extract($row);

        $category_item=array(
              "category_id" =>  $category_id,
              "category_name" => $category_name,
              "category_color" => $category_color,
          	  "category_font" => $category_font,
              "category_image1" => $category_image1,
              "category_image2" => $category_image2,
              "category_image3" => $category_image3,
              "category_image4" => $category_image4,
              "category_icon" => $category_icon
        );

            array_push($categories_arr, $category_item);
    }

    // устанавливаем код ответа - 200 OK 
    http_response_code(200);

    // выводим данные о категориях в формате JSON 
    echo json_encode($categories_arr);
    
}

else {

    // установим код ответа - 404 Не найдено 
    http_response_code(404);

    // сообщаем пользователю, что Категории не найдены 
    echo json_encode(array("message" => "Категории не найдены."), JSON_UNESCAPED_UNICODE);
}
?>