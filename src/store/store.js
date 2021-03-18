import Vuex from "vuex";
import Vue from "vue";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    id_test: 1, //номер теста
    ballCategory: [], // результаты тесты
  },

  getters: {
    ballsTest: state => {
        return state.ballCategory
    }
  },

  mutations: {
    setBallsTest(state, balls) {
        state.ballCategory = balls
    }
  },

  actions: {
    setBallsTest(context, balls) {
        context.commit('setBallsTest', balls)
    }
  },
});
