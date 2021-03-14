<template>
  <div class="root">
    <div class="test">
      <ActiveQuiz
        v-bind:question="quiz[activeQuestion].question"
        v-bind:quiz-length="quiz.length"
        v-bind:answer-number="activeQuestion + 1"
        v-bind:answers="quiz[activeQuestion].answers"
        @answer-click="answerClick"
      />
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
import ActiveQuiz from "../components/activeQuiz";

export default {
  data() {
    return {
      activeQuestion: 0,
      activeCategory: 0,
      countCategory: 0,
      ballCategory: [],
      quiz: [
        {
          id: 1,
          question: "первый вопрос?",
          category: 1,
          answers: [
            {
              answer_id: 1,
              question_id: 1,
              answer_text: "ответ 1",
              answer_score: 4,
            },
            {
              answer_id: 2,
              question_id: 1,
              answer_text: "ответ 2",
              answer_score: 2,
            },
            {
              answer_id: 3,
              question_id: 1,
              answer_text: "ответ 3",
              answer_score: 3,
            },
            {
              answer_id: 4,
              question_id: 1,
              answer_text: "ответ 4",
              answer_score: 1,
            },
          ],
        },
        {
          id: 2,
          question: "второй вопрос?",
          category: 1,
          answers: [
            {
              answer_id: 1,
              question_id: 1,
              answer_text: "ответ 1",
              answer_score: 4,
            },
            {
              answer_id: 2,
              question_id: 1,
              answer_text: "ответ 2",
              answer_score: 2,
            },
            {
              answer_id: 3,
              question_id: 1,
              answer_text: "ответ 3",
              answer_score: 3,
            },
            {
              answer_id: 4,
              question_id: 1,
              answer_text: "ответ 4",
              answer_score: 1,
            },
          ],
        },
        {
          id: 4,
          question: "четвертый вопрос?",
          category: 2,
          answers: [
            {
              answer_id: 1,
              question_id: 1,
              answer_text: "ответ 1",
              answer_score: 4,
            },
            {
              answer_id: 2,
              question_id: 1,
              answer_text: "ответ 2",
              answer_score: 2,
            },
            {
              answer_id: 3,
              question_id: 1,
              answer_text: "ответ 3",
              answer_score: 3,
            },
            {
              answer_id: 4,
              question_id: 1,
              answer_text: "ответ 4",
              answer_score: 1,
            },
          ],
        },
        {
          id: 2,
          question: "второй вопрос?",
          category: 1,
          answers: [
            {
              answer_id: 1,
              question_id: 1,
              answer_text: "ответ 1",
              answer_score: 4,
            },
            {
              answer_id: 2,
              question_id: 1,
              answer_text: "ответ 2",
              answer_score: 2,
            },
            {
              answer_id: 3,
              question_id: 1,
              answer_text: "ответ 3",
              answer_score: 3,
            },
            {
              answer_id: 4,
              question_id: 1,
              answer_text: "ответ 4",
              answer_score: 1,
            },
          ],
        },
      ],
    };
  },
  mounted() {
    //здесь будет запрос данных теста
    this.activeCategory = this.quiz[0].category;
    this.ballCategory.push({
      id_cat: this.activeCategory,
      ball: 0,
      maxBall: 0,
    });
  },
  methods: {
    answerClick(id) {
      const timeout = window.setTimeout(() => {
        this.ballCategory[this.countCategory].ball =
          this.ballCategory[this.countCategory].ball +
          this.quiz[this.activeQuestion].answers[id - 1].answer_score;
        this.ballCategory[this.countCategory].maxBall =
          this.ballCategory[this.countCategory].maxBall +
          this.findMaxBall(this.quiz[this.activeQuestion].answers);

        console.log("ball cat=", this.ballCategory[this.countCategory].ball);

        if (this.isQuizFinished()) {
          console.log("finished");
          this.$router.push({ path: "result" })
        } else {
          
          //начинаем считать новую категорию
          if (
            this.activeCategory !==
            this.quiz[this.activeQuestion + 1].category
          ) {
            this.countCategory = this.countCategory + 1;
            this.ballCategory.push({
              id_cat: this.activeCategory,
              ball: 0,
              maxBall: 0
            })
            this.activeCategory = this.quiz[this.activeQuestion + 1].category;
          }
          this.activeQuestion = this.activeQuestion + 1;
        }

        window.clearTimeout(timeout);
      }, 1000);
    },
    isQuizFinished() {
      return this.activeQuestion + 1 === this.quiz.length;
    },
    findMaxBall(answers) {
      return Math.max(...answers.map((o) => o.answer_score));
    },
  },
  components: {
    Question,
    ActiveQuiz,
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
  height: 490px;
  background: #fbce26;
  display: inline-block;
  vertical-align: middle;
  margin-top: 100px;
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

