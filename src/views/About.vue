<template>
  <div class="simpletext">
        <h1>О программе</h1>
    Vue js 2, Webpack 4, php, mysql
    <p>Vue Router</p><br />
    <br />
    http://test.ce74911.tmweb.ru/api_test/result/create.php - запись результата теста<br />
    {<br />
        result: array,<br />
        test_id: 1,<br />
        user_id: 1<br />
    }<br />
    <br /><br />
    http://test.ce74911.tmweb.ru/api_test/result/readResults.php?idt=1 -чтение результатов теста 1
    <br />
    http://test.ce74911.tmweb.ru/api_test/category/readCategories.php - чтение списка категорий
    <br />
    http://test.ce74911.tmweb.ru/api_test/category/readCategory.php?idc=3  - чтение данных категории 3
  <br />
  ERD:<br /><br />
  <img class="gallery__img" src="../assets/erd.jpg" alt="erd" />
  </div>
</template>

<style scoped>
.simpletext {
  align-items: baseline;
}
</style>
