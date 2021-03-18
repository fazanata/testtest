<template>
  <div class="flex" >
    <div class="mainitem" v-bind:style="{ background: backColor }">1</div>
    <div class="sideitem">2</div>
  </div>
</template>

<script>

export default {
	props: ['backColor']
}
</script>

<style scoped>
body {
  font-family: arial;
  padding: 20px;
}

.flex {
  display: flex;

  max-width: 700px; /* макс ширина блока */
  margin: 0 auto; /* выравниваем блок по центру */
  font-size: 400%;
}

.mainitem {
  flex-grow: 1; /* растягивание элементов */
  background: var(--background-color);
}

.mainitem {
  min-height: 490px; /* высота основного блока */
  max-width: 350px;
}

.sideitem {
  /* flex:0 0 150px; */
  flex-basis: 350px; /* ширина 350 */
  flex-shrink: 0; /* Убираем уменьшение = 150 */

  display: flex;
  flex-direction: column;
  background: rgb(175, 175, 224);
}

/* меньше 600px */
@media screen and (max-width: 600px) {
  .flex {
    flex-wrap: wrap;
  } /* для переноса */

  .sideitem {
    flex-direction: row;
    flex-basis: 350px;
  }
}

/* меньше 450px */
@media screen and (max-width: 450px) {
  .sideitem {
    flex-wrap: wrap;
  } /* разрешаем перенос */
}
</style>