<template>
    <MainLayout>
        <div class="w-full grid grid-cols-1 my-4 md:grid-cols-2 mx-4 lg:grid-cols-3 gap-5 justify-items-center">
            <div v-for="quiz in quizzes" :key="quiz.id"
                 class="flex w-full rounded-3xl p-4 bg-gray-200 shadow-md">
                <div class="w-full items-center justify-between flex flex-col">
                    <h2 class="tracking-widest text-xs font-medium text-gray-800 my-6 text-center">Quiz</h2>
                    <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3 text-center">
                        {{ quiz.title }}
                    </h1>
                    <p class="leading-relaxed mb-3 text-center overflow-ellipsis break-all">
                        {{ quiz.info }}</p>
                    <Link
                        :href="`/quizzes/${quiz.id}`"
                        class="bg-blue-500 rounded w-full hover:bg-blue-700 text-white text-center py-2 px-4 rounded">
                        Pass
                    </Link>
                </div>


            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Pages/Layouts/MainLayout";
import {Link} from "@inertiajs/inertia-vue";

export default {
    name: "Application",
    props: ['quizzes'],
    components: {MainLayout, Link},
}
</script>

<style scoped>

</style>
