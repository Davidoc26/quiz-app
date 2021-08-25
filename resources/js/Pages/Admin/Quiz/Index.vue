<template>
    <AdminLayout>

        <div class="flex lg:flex-row gap-5 flex-col w-5/6  items-center justify-center">
            <div v-for="quiz in quizzes" :key="quiz.id"
                 class="flex h-1/2 lg:w-1/5 w-full rounded-3xl p-4 bg-gray-200 shadow-md">
                <div class=" w-full  items-center justify-between flex flex-col">
                    <h2 class="tracking-widest text-xs font-medium text-gray-800 my-6 text-center">Quiz</h2>
                    <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3 text-center">{{
                            quiz.title
                        }}</h1>
                    <p class="leading-relaxed mb-3 text-center overflow-ellipsis ">{{ quiz.info }}</p>

                    <Link :href="'/admin/quiz/'+quiz.id+'/edit'"
                          class="bg-blue-500 rounded w-full hover:bg-blue-700 text-white text-center py-2 px-4 rounded">
                        Edit
                    </Link>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Pages/Layouts/AdminLayout";
import {Link} from '@inertiajs/inertia-vue';

export default {
    name: "Index",
    components: {
        AdminLayout,
        Link,
    },
    props: {
        quizzes: Array,
    },

}
</script>

<style scoped>

</style>
