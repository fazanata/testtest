<template>

  <div class="activeQuiz">
    <p class="question">
      
      <small>{{answerNumber}} из {{quizLength}}</small>
      <br />
      <div class="font"> {{ question }} </div>
      <br />
    </p>
    
    <AnswersList v-bind:answers="answers" v-on:answer-click="answerClick" />
    
    

  </div>

</template>
<script>
import AnswersList from "./answersList";

export default {
  props: ["answers", "question", "answerNumber", "quizLength"],
  data() {
    return {
      show: true,
    };
  },
  components: {
    AnswersList,
  },
  methods: {
    answerClick(id) {
      this.$emit("answer-click", id);
    },
  },
};
</script>

<style scoped>
.activeQuiz {
  margin-left: 25px;
}
.question {
    font: 24px;
}


.font {
  font-family: Roboto;
  font-size: 26px;
  font-style: normal;
  font-weight: 900;
  line-height: 33px;
  letter-spacing: 0px;
  font: #365001;
  text-align: center;
}
</style>
