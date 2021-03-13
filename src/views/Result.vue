<template>
<div class="small">
    <PolarArea />
    
  </div>
</template>

<script>
import PolarArea from './PolarArea.vue'

export default {
  components: {
      PolarArea
  },
  data() {
      return {
        datacollection: null
      }
  }
    
}

</script>

<style>
  .small {
    max-width: 350px;
    margin:  150px auto;
  }
</style>