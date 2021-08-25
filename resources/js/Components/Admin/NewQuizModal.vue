<template>
    <ModalLayout>
        <template #title>Create a new quiz</template>
        <template #inputs>
            <div class="flex flex-col gap-2">
                <label class="flex flex-col items-center justify-center">
                    <span class="font-semibold text-md">Title: </span>
                    <input
                        v-model="quiz.title"
                        class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-    2"
                        type="text" name="title" required>
                </label>
            </div>
        </template>
        <template #buttons>
            <button @click="$emit('close')" class="p-4 bg-red-400 rounded-sm w-1/2">Close</button>
            <button @click="createQuiz" class="p-4 bg-blue-400 rounded-sm w-1/2">Create</button>
        </template>
    </ModalLayout>
</template>

<script>
import ModalLayout from "@/Components/Admin/Layouts/ModalLayout";
export default {
    name: "NewQuizModal",
    components: {ModalLayout},
    data() {
        return {
            quiz: {
                title: '',
                info: '',
            }
        }
    },
    methods: {
        createQuiz() {
            this.$inertia.post('/admin/quiz', this.quiz);
            this.$emit('close');
        }
    },
}
</script>

<style scoped>

</style>
