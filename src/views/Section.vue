<template>
    <div class="flex">
	<div class="mainitem">1</div>
	<div class="sideitem">
		<div class="item">2</div>
		<div class="item">3</div>
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

.mainitem, .item{
	flex-grow:1; /* растягивание элементов */
	
	background:#b5ced8;
	display: flex; justify-content: center; align-items: center; /* цифры по центру */
}

.mainitem{
	min-height:300px; /* высота основного блока */
}

.sideitem{
	/* flex:0 0 150px; */
	flex-basis:150px; /* ширина 150 */
	flex-shrink:0; /* Убираем уменьшение = 150 */				   
	
	display: flex;
	flex-direction: column;
}

.item{
	flex-basis:50%;
	min-height:150px;
	margin-left:10px;
}
.item:first-child{ margin-bottom:10px; }

/* меньше 600px */
@media screen and (max-width: 600px) {
	.flex{ flex-wrap: wrap; } /* для переноса */
	
	.sideitem{ flex-direction:row; flex-basis:100%; }
	
	.item{ margin-left:0; margin-top:10px; }
	.item:first-child{ margin-bottom:0; margin-right:10px; }
}

/* меньше 450px */
@media screen and (max-width: 450px) {
	.sideitem{ flex-wrap: wrap; } /* разрешаем перенос */
	.item{ flex-basis:100%; } /* на всю ширину */
	.item:first-child{ margin-right:0; }
}
</style>