<?php
class Result {

    // подключение к базе данных и таблице 'test_result' 
    private $conn;
    private $table_name = "test_result";

    // свойства объекта 
    public $result_id;
    public $idt; //номер для поиска результатов
  	public $result;
    public $date;
    public $test_id;
    public $user_id;

    // конструктор для соединения с базой данных 
    public function __construct($db){
        $this->conn = $db;
    }

// метод readResultTest() - получение всех результатов по id test
function readResultTest(){

    // выбираем все записи 
    $query = "SELECT
                result_id, date, result, test_id, user_id
            FROM
                " . $this->table_name . "
            WHERE 
            	test_id = ?
            ORDER BY
                result_id ";

    // подготовка запроса 
    $stmt = $this->conn->prepare($query);
  
  	// привязываем id раздела, который будет обновлен 
    $stmt->bindParam(1, $this->idt);

    // выполняем запрос 
    $stmt->execute();

    return $stmt;
}
   
  // метод createResult - создание result_test 
function createResult(){

    // запрос для вставки (создания) записей 
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                result=:result, test_id=:test_id, user_id=:user_id";

    // подготовка запроса 
    $stmt = $this->conn->prepare($query);

    // очистка 
    $this->name=htmlspecialchars(strip_tags($this->result));
    $this->price=htmlspecialchars(strip_tags($this->test_id));
    $this->description=htmlspecialchars(strip_tags($this->user_id));

    // привязка значений 
    $stmt->bindParam(":result", $this->result);
    $stmt->bindParam(":test_id", $this->test_id);
    $stmt->bindParam(":user_id", $this->user_id);

    // выполняем запрос 
    if ($stmt->execute()) {
        return true;
    }

    return false;
}
}
?>