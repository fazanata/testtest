<template>
  <div class="root" v-bind:style="{ background: backColor }">
    <div class="test">
      <transition name="slide-fade">
        <ActiveQuiz
          v-bind:question="quiz[activeQuestion].question"
          v-bind:quiz-length="quiz.length"
          v-bind:answer-number="activeQuestion + 1"
          v-bind:answers="quiz[activeQuestion].answers"
          v-bind:font-color="fontColor"
          @answer-click="answerClick"
          v-if="showQuestion"
        />
      </transition>
    </div>
    <transition name="slide-fade">
    <div>
      <img1 v-if="countCategory + 1 === 1" />
      <img2 v-if="countCategory + 1 === 2" />
      <img3 v-if="countCategory + 1 === 3" />
    </div>
    </transition>
  </div>
</template>

<script>
import api from "../api/api.js";
import Question from "../views/Question";
import ActiveQuiz from "../components/activeQuiz";
import Result from "../views/Result";
import img1 from "../components/img/img1";
import img2 from "../components/img/img2";
import img3 from "../components/img/img3";

export default {
  data() {
    return {
      showQuestion: false,
      activeQuestion: 0,
      activeCategory: 0,
      countCategory: 0,
      ballCategory: [],
      backColor: "",
      fontColor: "",
      categories: [],
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
          id: 3,
          question: "третий вопрос?",
          category: 3,
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
          category: 4,
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
    this.showQuestion = true;
    //получаем данные цветов категории
    this.getCategoryColors();
  },
  methods: {
    setBallsTest() {
      this.$store.dispatch("setBallsTest", this.ballCategory);
    },
    answerClick(id) {
      this.showQuestion = false;
      const timeout = window.setTimeout(() => {
        this.ballCategory[this.countCategory].ball =
          this.ballCategory[this.countCategory].ball +
          this.quiz[this.activeQuestion].answers[id - 1].answer_score;
        this.ballCategory[this.countCategory].maxBall =
          this.ballCategory[this.countCategory].maxBall +
          this.findMaxBall(this.quiz[this.activeQuestion].answers);

        if (this.isQuizFinished()) {
          this.setBallsTest();
          this.$router.push({ path: "result" });
        } else {
          //начинаем считать новую категорию

          this.activeQuestion = this.activeQuestion + 1;

          if (this.activeCategory !== this.quiz[this.activeQuestion].category) {
            //меняем цвет из бд
            this.backColor = this.categories.find(
              (c) =>
                c.category_id === this.quiz[this.activeQuestion].category + ""
            ).category_color;
            this.fontColor = this.categories.find(
              (c) =>
                c.category_id === this.quiz[this.activeQuestion].category + ""
            ).category_font;

            this.countCategory = this.countCategory + 1;
            this.activeCategory = this.quiz[this.activeQuestion].category;

            this.ballCategory.push({
              id_cat: this.activeCategory,
              ball: 0,
              maxBall: 0,
            });
          }
        }
        this.showQuestion = true;
        window.clearTimeout(timeout);
      }, 500);
    },
    isQuizFinished() {
      return this.activeQuestion + 1 === this.quiz.length;
    },
    findMaxBall(answers) {
      return Math.max(...answers.map((o) => o.answer_score));
    },
    getCategoryColors: async function () {
      var output = await api.axiosGetData(
        "http://test.ce74911.tmweb.ru/api_test/category/readCategories.php"
      );
      this.categories = output["data"];
      this.backColor = this.categories[0].category_color;
      this.fontColor = this.categories[0].category_font;
    },
  },
  components: {
    Question,
    ActiveQuiz,
    Result,
    img1,
    img2,
    img3,
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
  background: var(--background-color); //#fbce26;
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

.slide-fade-enter-active {
  transition: all 1s ease;
}
.slide-fade-leave-active {
  transition: all 3s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(-30px);
  opacity: 0;
}
</style>

