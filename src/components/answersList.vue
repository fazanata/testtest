<template>
    <div>
        <ul class="AnswersList">
            <AnswerItem 
                v-for="(answer, i) of answers"
                v-bind:answer="answer"
                v-bind:key="i"
                v-on:answer-click="answerClick"
            />
        </ul>
    </div>
</template>

<script>
import AnswerItem from './answerItem';

export default {
    props: ['answers'],
    components: {
        AnswerItem
    },
    methods: {
        answerClick(id) {
            this.$emit('answer-click', id)
        }
    }
}
</script>

<style scoped>
.AnswersList {
    list-style: none;
    margin: 25px;
    padding: 0;
}
</style>
