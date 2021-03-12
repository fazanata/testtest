<template>
  <div class="root">
    <div class="test">
      <Question />
    </div>

    <div class="gallery_container">
      <div class="gallery">
        <figure class="gallery__item gallery__item--1">
          <img class="gallery__img" src="../assets/buss@2x.png" alt="Image 1" />
        </figure>
        <figure class="gallery__item gallery__item--2">
          <img
            class="gallery__img"
            src="../assets/wheel@2x.png"
            alt="Image 2"
          />
        </figure>
        <figure class="gallery__item gallery__item--3">
          <img
            class="gallery__img"
            src="../assets/gamepad-yellow@2x.png"
            alt="Image 3"
          />
        </figure>
        <figure class="gallery__item gallery__item--4">
          <img class="gallery__img" src="../assets/bike@2x.png" alt="Image 4" />
        </figure>
      </div>
    </div>
  </div>
</template>

<script>
import Question from "../views/Question";
export default {
  components: {
    Question,
  },
};
</script>


<style lang="scss" scoped>
@import "../breakpoints.scss";

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
  display: flex;
  margin: 0 auto;
   text-align: center;
   flex-wrap: no-wrap;

  @include media(">tablet", "<desktop") {
    padding: 0 20px;
    flex-wrap: wrap;
  }
    @media screen and (max-width: 700px) {
        flex-wrap: wrap;
        }
}
.test {
  width: 389px;
  height: 100%;
  
   
}
.gallery_container {
  width: 315px;
  height: 100%;
  
}

.gallery {
  display: grid;
  grid-template-columns: repeat(4, 25%);
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
  grid-column-end: 5;
  grid-row-start: 1;
  grid-row-end: 5;
}

.gallery__item--2 {
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 5;
  grid-row-end: 9;
}
.gallery__item--3 {
  grid-column-start: 3;
  grid-column-end: 5;
  grid-row-start: 5;
  grid-row-end: 7;
}
.gallery__item--4 {
  grid-column-start: 3;
  grid-column-end: 5;
  grid-row-start: 7;
  grid-row-end: 9;
}
</style>

