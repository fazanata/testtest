<template>
    <transition name="bounce">
  <div class="root"  v-if="showEffect">
    <div class="mainitem">
       
        <div class="centerdiv">
          <p class="font_main">
            eBay исполняется 25 лет!Проверьте, а все ли у вас сбалансировано в
            жизни
          </p>

          <button type="submit" class="button" v-on:click="gotoTest">
            Начать тест
          </button>
        </div>
       
    </div>

    
    <div class="img_container" >
      <figure class="gallery__item gallery__item--1">
        <img class="gallery__img" src="../assets/1@2x.png" alt="Image 1" />
      </figure>
      <figure class="gallery__item gallery__item--2">
        <img class="gallery__img" src="../assets/2@2x.png" alt="Image 2" />
      </figure>
    </div>
  </div>
    </transition>
</template>

<script>
export default {
  data() {
    return {
      showEffect: true,
      showText: true,
    };
  },
  methods: {
    gotoTest: function (event) {
      this.showText = ! this.showText;
      this.showEffect = !this.showEffect;
      setTimeout(() => this.$router.push({ path: "category" }), 1000);
      
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../breakpoints.scss";
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap");

*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}
.root {
  width: 700px;

  display: flex;
  max-width: 700px;
  margin: 0 auto;

  flex-wrap: no-wrap;
  background: #659eff;

  @include media(">tablet", "<desktop") {
    flex-wrap: wrap;
  }
  @media screen and (max-width: 700px) {
    flex-wrap: wrap;
  }
}
@media screen and (max-width: 700px) {
  .root {
    flex-wrap: wrap;
  } /* для переноса */
  .img_container {
    flex-wrap: wrap;
  } /* разрешаем перенос */
  .img_container {
    flex-basis: 100%;
  } /* на всю ширину */
}
/* меньше 450px */
@media screen and (max-width: 450px) {
  .root {
    flex-wrap: wrap;
  }
}

.mainitem {
  min-width: 482px;
  min-height: 490px;
  height: 490px;
  background: #659eff;
}
.centerdiv {
  margin: 14px 0;
}

.img_container {
  min-width: 218px;
  min-height: 490px;
  height: 100%;
  display: grid;
  grid-template-columns: repeat(2, 50%);
  grid-template-rows: repeat(8, 4vw);
  grid-gap: 0px;
}

.gallery__img {
  width: 100%;
  height: 100%;
  min-width: 50%;
  min-height: 50%;
  object-fit: cover;
}

.gallery__item--1 {
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-end: 5;
}

.gallery__item--2 {
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 5;
  grid-row-end: 9;
}

.font_main {
  font-family: Roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 32px;
  line-height: 40px;

  color: #ffffff;
  margin-left: 40px;
  margin-right: 40px;
  margin-bottom: 30px;
  margin-top: 140px;
}
.button {
  font-family: Roboto;
  font-style: normal;
  font-weight: bold;
  font-size: 16px;
  line-height: 19px;
  width: 138px;
  height: 50px;

  display: flex;
  align-items: center;
  text-align: center;

  color: #629dff;
  background: #ffffff;
  border: none;
  margin-left: 40px;
  padding: 15px 20px;
}
.button:hover {
  background: #2e5bfb;
  color: #ffffff;
  border: none;
}
.button:active {
  background: #3400f6;
  color: #ffffff;
  border: none;
}

.bounce-enter-active {
  animation: bounceIn 2s;
}
.bounce-leave-active {
  animation: bounceIn 2s;
}
@keyframes bounceIn {
  0% {
    transform: scale(0.1);
    opacity: 0;
  }
  60% {
    transform: scale(2);
    opacity: 1;
  }
  100% {
     transform: scale(1);
    transform: translateX(-90px);
  }
}

.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(-90px);
  opacity: 0;
}


</style>