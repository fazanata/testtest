<template>

    <li v-on:click="$emit('answer-click', answer.answer_id)"
     class="AnswerItem">
        {{ answer.answer_text }}
    </li>
</template>

<script>

export default {
    props: ['answer']
}
</script>

<style scoped>
.AnswerItem {
    border: 1px solid #fff;
    border-radius: 5px;
    padding: 5px 10px;
    margin-bottom: 5px;
    cursor: pointer;
}

.AnswerItem:hover {
    background: white;
    transition: background .3s ease-in-out;
}

</style>
