<template>
    <MainLayout>
        <div class="flex justify-center my-10 h-auto w-full">
            <div class="flex flex-col bg-gray-300 rounded-md gap-4 w-2/3 lg:w-1/3 items-center">
                <div class="text-xl font-bold">User info</div>
                <div class="text-xl">{{ user.name }}</div>
                <div class="flex flex-col gap-2 items-center w-full">
                    <p>Completed quizzes count: {{ completedQuizzes.length }}</p>
                    <div v-if="completedQuizzes.length !==0" class="w-full text-center">
                        <p>Completed quizzes: </p>
                        <div
                            class="w-full items-center flex flex-col justify-center" v-for="q in completedQuizzes">
                            <Link :href="`/quizzes/${q.quiz.id}`" class="p-2 bg-indigo-400 w-full text-center">
                                <span>{{ q.quiz.title }}</span>
                                <span class="font-bold text-green-600">({{ q.correct_answers }}</span>
                                <span>/</span>
                                <span class="font-bold text-red-400">{{ q.incorrect_answers }})</span>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../Layouts/MainLayout';
import {Link} from '@inertiajs/inertia-vue';

export default {
    components: {MainLayout, Link},
    props: ['user', 'completedQuizzes', 'completedQuizzesCount'],
    name: "Show",
}
</script>

<style scoped>

</style>
