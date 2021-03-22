<template>
  <div>
    <button @click="change">next</button>
    <transition name="component-fade" mode="out-in">
      <component v-bind:is="currenrView" />
    </transition>
     <component :is="img1"></component>
     <img1 />
  </div>
</template>
<script>
import img1 from "../img/img1";
import img2 from "../img/img2";
import img3 from "../img/img3";

export default {

  
  data() {
    return {
      section: 1,
      currentView: img1,
    };
  },
  components: {
    img1,
    img2,
    img3
  },
  methods: {
      change() {

          if (this.section === 1) {
              this.currentView = img1
              this.section = 2
          }
          if (this.section === 2) {
            this.currentView = img2
            this.section = 3
          }
          if (this.section === 3) {
            this.currentView = img3
            this.section = 1
          }

      }
  }
};
</script>

<style scoped>
  .component-fade-enter-active, .component-fade-leave-active {
    transition: opacity 2.0s ease;
  }

  .component-fade-enter, .component-fade-leave-to {
    opacity: 0;
  }
</style>
