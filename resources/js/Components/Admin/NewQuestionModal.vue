<template>
    <ModalLayout>
        <template #title>
            <p class="font-semibold text-md mt-4">Add new question</p>
        </template>
        <template #inputs>
            <input
                class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-    2"
                type="text" name="title" v-model="question.question" required>
        </template>
        <template #buttons>
            <button @click="$emit('close')" class="p-4 bg-red-400 rounded-sm w-1/2">Close</button>

            <button @click="createQuestion" class="p-4 bg-blue-400 rounded-sm w-1/2">Create</button>
        </template>
    </ModalLayout>
</template>

<script>
import {eventBus} from "@/app";
import ModalLayout from "./Layouts/ModalLayout";

export default {
    name: "NewQuestionModal",
    components: {ModalLayout},
    data() {
        return {
            question: {
                question: '',
            },
        }
    },
    props: ['quiz_id'],
    methods: {
        createQuestion() {
            if (this.question.question.trim() === '') {
                return;
            }

            axios.post('/admin/question/', {
                quiz_id: this.quiz_id,
                question: this.question.question,
            }).then(r => {
                eventBus.$emit('questionCreated', r.data);
            });

            this.$emit('close');
        },
    }
}
</script>

<style scoped>

</style>
