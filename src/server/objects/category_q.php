<?php
class category_q {

    // подключение к базе данных и таблице 'category_q' 
    private $conn;
    private $table_name = "category_q";

    // свойства объекта 
    public $category_id;
    public $id_category;//запрашиваемая категория
    public $category_name;
    public $category_color;
  	public $category_font;
    public $category_image1;
    public $category_image2;
    public $category_image3;
    public $category_image4;
    public $category_icon;

    // конструктор для соединения с базой данных 
    public function __construct($db){
        $this->conn = $db;
    }

// метод readCategories() - получение всех категорий теста
function readCategories(){

    // выбираем все записи 
    $query = "SELECT
                category_id, category_name, category_color, category_font, category_image1, category_image2, category_image3, category_image4, category_icon
            FROM
                " . $this->table_name . "
            ORDER BY
            category_id ";

    // подготовка запроса 
    $stmt = $this->conn->prepare($query);
  
    // выполняем запрос 
    $stmt->execute();

    return $stmt;
}
  
  // используется для получения данных одной категории
function readOneCategory() {

    // запрос для чтения одной категории 
     $query = "SELECT
                category_id, category_name, category_color, category_font, category_image1, category_image2, category_image3, category_image4, category_icon
            FROM
                " . $this->table_name . "
            WHERE 
            category_id = ?";

    // подготовка запроса 
    $stmt = $this->conn->prepare( $query );

    // привязываем id категории, которую ищем
    $stmt->bindParam(1, $this->id_category);

    // выполняем запрос 
    $stmt->execute();

    // получаем извлеченную строку 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // установим значения свойств объекта 
    $this->category_id = $row['category_id'];
    $this->category_name = $row['category_name'];
    $this->category_color = $row['category_color'];
  	$this->category_font = $row['category_font'];
    $this->category_image1 = $row['category_image1'];
    $this->category_image2 = $row['category_image2'];
    $this->category_image3 = $row['category_image3'];
    $this->category_image4 = $row['category_image4'];
    $this->category_icon = $row['category_icon'];
}
  
  
}
?>