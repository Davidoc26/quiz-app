<template>
    <AdminLayout>
        <div class="w-5/6 items-center px-5 py-12 lg:px-20">
            <div
                class="flex flex-col w-full p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-1/2">
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="text-base leading-7 text-blueGray-500" for="grid-title"> Title </label>
                        <input
                            class="w-full px-4 py-2 mt-2 text-base border border-gray-400 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                            id="grid-title" type="text" name="title" v-model="quiz.title" required>
                    </div>
                </div>
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="text-base leading-7 text-blueGray-500" for="description">Info</label>
                        <textarea
                            v-model="quiz.info"
                            rows="10"
                            class="w-full px-4 py-2 mt-2 text-base border border-gray-400 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 apearance-none autoexpand"
                            id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="mb-4">
                <Link class="flex items-center w-full pt-4 ">
                    <button @click="saveQuiz"
                            class="w-full py-3 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-700 ">
                        Save
                    </button>
                </Link>
                </div>
                <div v-for="question in quiz.questions">
                    <DraggableQuestion :question="question"/>
                </div>
                <button @click="showQuestionModal"
                        class="w-full py-3 text-base mb-2 font-semibold text-white transition duration-200 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-700 ">
                    New question
                </button>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Pages/Layouts/AdminLayout";
import DraggableQuestion from "@/Components/Admin/DraggableQuestion";
import NewQuestionModal from "@/Components/Admin/NewQuestionModal";
import {eventBus} from '@/app';

export default {
    name: "Edit",
    components: {DraggableQuestion, AdminLayout},
    props: {
        quiz: Object,
    },
    created() {
        eventBus.$on('questionCreated', question => this.pushNewQuestion(question))
    },
    methods: {
        saveQuiz() {
            axios.post(`/admin/quiz/${this.quiz.id}`, this.quiz);
        },
        showQuestionModal() {
            this.$modal.show(NewQuestionModal, {quiz_id: this.quiz.id}, {adaptive: true, draggable: true});
        },
        pushNewQuestion(question) {
            this.quiz.questions.push(question);
        }
    }
}
</script>

<style scoped>

</style>
