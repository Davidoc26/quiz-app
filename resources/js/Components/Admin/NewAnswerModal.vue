<template>
    <ModalLayout>
        <template #title>
            <p class="font-semibold text-md mt-4">Add new answer to question: {{ questionText }}</p>
        </template>

        <template #inputs>
            <input
                class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-    2"
                type="text" name="title" v-model="answer.text" required>
        </template>
        <template #buttons>
            <button @click="$emit('close')" class="p-4 bg-red-400 rounded-sm w-1/2">Close</button>
            <button @click="createAnswer" class="p-4 bg-blue-400 rounded-sm w-1/2">Create</button>
        </template>

    </ModalLayout>
</template>

<script>
import {eventBus} from "@/app";
import ModalLayout from "./Layouts/ModalLayout";

export default {
    components: {ModalLayout},
    props: ['questionId', 'questionText', 'answerOrder', 'id'],
    data() {
        return {
            answer: {
                text: '',
                question_id: this.questionId,
                order: this.answerOrder,
            }
        }
    },
    name: "NewAnswerModal",
    methods: {
        createAnswer() {
            if (this.answer.text.trim() === '') {
                return;
            }

            axios.post('/admin/answer', this.answer).then(r => {
                eventBus.$emit('answerCreatedFor' + this.questionId, r.data);
            });

            this.$emit('close');
        }
    }
}
</script>

<style scoped>

</style>
