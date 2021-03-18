<template>
  <div id="home">
    <Section v-bind:back-color="backColor"/>
  </div>
</template>

<script>
import Section from '../views/Section'

export default {
  data() {
    return {
      backColor: "#787758",
    }
  },
  components: {
    Section
  }
}
</script>
