<template>
  <div class="root">
    <div class="main">
      <div class="font_main">
        eBay исполняется 25 лет!Проверьте, а все ли у вас сбалансировано в жизни
      </div>
      <button type="submit" class="button" v-on:click="gotoTest">
        Начать тест
      </button>
      <transition
      :duration="1000"
      name="custom-classes-transition"
      enter-active-class="animated tada"
      leave-active-class="animated bounceOutRight"
    >
    <p > test</p>
    </transition>
    </div>
    
      <div class="img_container">
        <figure class="gallery__item gallery__item--1">
          <img class="gallery__img" src="../assets/1@2x.png" alt="Image 1" />
        </figure>
        <figure class="gallery__item gallery__item--2">
          <img class="gallery__img" src="../assets/2@2x.png" alt="Image 2" />
        </figure>
      </div>
    
  </div>
</template>

<script>
export default {
  data() {
    return {
      showEffect: true,
    };
  },
  methods: {
    gotoTest: function (event) {
      this.showEffect = !showEffect;
      this.$router.push({ path: "category" });
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
  align-content: center;
  min-height: 490px;
  margin: 0 auto;
  display: flex;
  flex-wrap: no-wrap;
  background: #659eff;
  vertical-align: middle;

  @include media(">tablet", "<desktop") {
    padding: 0 20px;
    flex-wrap: wrap;
  }
  @media screen and (max-width: 700px) {
    flex-wrap: wrap;
  }
}
.main {
  width: 482px;
}
.img_container {
  width: 218px;
  height: 100%;
  display: grid;
  grid-template-columns: repeat(2, 50%);
  grid-template-rows: repeat(8, 4vw);
  grid-gap: 0px;
}

.gallery__img {
  width: 100%;
  height: 100%;
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
</style>