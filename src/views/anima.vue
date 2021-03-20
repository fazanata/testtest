<template>
  <div>
    <button v-on:click="goShow">
      <h2>{{ title }}</h2>
    </button>

    <transition name="bounce">
      <div v-if="show" class="sq">
        <ul>
          <li>sdds</li>
          <li>sdds</li>
          <li>sd33jj3</li>
        </ul>
        <button type="button">Click Me!</button>
      </div>
    </transition>
  </div>
</template>
<script>
export default {
  data() {
    return {
      title: "нажми меня",
      show: true,
      description: 'пропорпорнепен'
    };
  },
  methods:{
    goShow: function (event) {
      this.show = !this.show;
      console.log(this.show);
    },
  }
};
</script>
<style scoped>
.bounce-enter-active {
  animation: bounceIn 2s;
}
.bounce-leave-active {
  animation: bounceIn 2s reverse;
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
    transform: scale(4);
  }
}

</style>