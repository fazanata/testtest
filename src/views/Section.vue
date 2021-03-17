<template>
    <div class="flex">
	<div class="mainitem">1</div>
	<div class="sideitem">
		2
	</div>
</div>

</template>


<style scoped>
body{ font-family:arial; padding:20px; }

.flex{
	display: flex;
	
	max-width: 700px; /* макс ширина блока */
	margin: 0 auto; /* выравниваем блок по центру */
	font-size:400%;
}

.mainitem{
	flex-grow:1; /* растягивание элементов */
	
	background:#b5ced8;
	
}

.mainitem{
	min-height:490px; /* высота основного блока */
	max-width: 350px;
}

.sideitem{
	/* flex:0 0 150px; */
	flex-basis:350px; /* ширина 350 */
	flex-shrink:0; /* Убираем уменьшение = 150 */				   
	
	display: flex;
	flex-direction: column;
	background: rgb(175, 175, 224);
}


/* меньше 600px */
@media screen and (max-width: 600px) {
	.flex{ flex-wrap: wrap; } /* для переноса */
	
	.sideitem{ flex-direction:row; flex-basis:350px;}
	
	
}

/* меньше 450px */
@media screen and (max-width: 450px) {
	.sideitem{ flex-wrap: wrap; } /* разрешаем перенос */
	https://coderoad.ru/47322875/Vue-js-%D0%B4%D0%B8%D0%BD%D0%B0%D0%BC%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B9-style-%D1%81-%D0%BF%D0%B5%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D0%BD%D1%8B%D0%BC%D0%B8

}
</style>