<?php
// необходимые HTTP-заголовки 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

// подключение файла для соединения с базой и файл с объектом 
include_once '../config/database.php';
include_once '../objects/category_q.php';

// получаем соединение с базой данных 
$database = new Database();
$db = $database->getConnection();

// подготовка объекта 
$category = new category_q($db);

// установим свойство ID записи для чтения 
$category->id_category = isset($_GET['idc']) ? $_GET['idc'] : die();

// прочитаем данные выбранной категории по id
$category->readOneCategory();

if ($category->category_name!=null) {

    // создание массива 
    $category_arr = array(
        "category_id" =>  $category->category_id,
        "category_name" => $category->category_name,
        "category_color" => $category->category_color,
        "category_font" => $category->category_font,
        "category_image1" => $category->category_image1,
        "category_image2" => $category->category_image2,
        "category_image3" => $category->category_image3,
        "category_image4" => $category->category_image4,
        "category_icon" => $category->category_iсon
    );

    // код ответа - 200 OK 
    http_response_code(200);

    // вывод в формате json 
    echo json_encode($category_arr);
}

else {
    // код ответа - 404 Не найдено 
    http_response_code(404);

    // сообщим пользователю, что категории не существует 
    echo json_encode(array("message" => "Категория не существует."), JSON_UNESCAPED_UNICODE);
}
?>