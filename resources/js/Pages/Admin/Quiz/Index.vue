<template>
    <AdminLayout>
        <div class="w-5/6">
            <div class="flex mb-4">
                <button @click="showQuizModal"
                        class="py-3 w-24 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-700 ">
                    Create quiz
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2  mx-4 lg:grid-cols-3 gap-5 justify-items-center">
                <div v-for="quiz in quizzes" :key="quiz.id"
                     class="flex w-full rounded-3xl p-4 bg-gray-200 shadow-md">
                    <div class=" w-full  items-center justify-between flex flex-col">
                        <h2 class="tracking-widest text-xs font-medium text-gray-800 my-6 text-center">Quiz</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3 text-center">{{
                                quiz.title
                            }}</h1>
                        <p class="leading-relaxed mb-3 text-center overflow-ellipsis break-all">
                            {{ cuttedInfo(quiz.info) }}</p>
                        <Link :href="'/admin/quiz/'+quiz.id+'/edit'"
                              class="bg-blue-500 rounded w-full hover:bg-blue-700 text-white text-center py-2 px-4 rounded">
                            Edit
                        </Link>
                    </div>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Pages/Layouts/AdminLayout";
import {Link} from '@inertiajs/inertia-vue';
import NewQuizModal from "@/Components/Admin/NewQuizModal";
import {eventBus} from '@/app';

export default {
    name: "Index",
    components: {
        AdminLayout,
        Link,
    },
    props: {
        quizzes: Array,
    },
    created() {
        eventBus.$on('quizCreated', quiz => this.pushNewQuiz(quiz))
    },
    methods: {
        cuttedInfo(info) {
            if (info.length > 100) {
                return info.substr(0, 100) + '...';
            }
            return info;
        },
        pushNewQuiz(quiz) {
            this.quizzes.push(quiz);
        },
        showQuizModal() {
            this.$modal.show(NewQuizModal, {}, {adaptive: true, draggable: true})
        }
    }


}
</script>

<style scoped>

</style>
