<template>
    <div class="flex">
	<div class="mainitem">1</div>
	<div class="sideitem">
		<div class="item"><Grid /></div>
	</div>
</div>

</template>
<script>
import Grid from '../components/Grid'

export default {
	components: {
		Grid
	}
}
</script>

<style scoped>
*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

.flex{
	display: flex;
	
	max-width: 700px; /* макс ширина блока */
	margin: 0 auto; /* выравниваем блок по центру */
}


.mainitem{
	flex-grow:1; /* растягивание элементов */
	display: flex;
	min-height:490px; /* высота основного блока */
	background:#b0ce00;
}

.sideitem{
	/* flex:0 0 150px; */
	flex-basis:315px; /* ширина 150 */				   
	background:#b5c6d8;

}

.item{
	flex-basis:100%;
	min-height:490px;
	min-width: 315px;
	
}


/* меньше 600px */
@media screen and (max-width: 600px) {
	.flex{ flex-wrap: wrap; } /* для переноса */
	.mainitem {min-width: 320px;}
	.sideitem{ flex-direction:row; flex-basis:100%; max-height: 200px;}
	
	.item{ max-height: 200px; }
	
}

/* меньше 450px */
@media screen and (max-width: 450px) {
	.mainitem {min-width: 320px;}
	.sideitem{  max-height: 200px;} /* разрешаем перенос */
	.item{ flex-basis:100%; max-height: 200px;} /* на всю ширину */
	
}
</style>