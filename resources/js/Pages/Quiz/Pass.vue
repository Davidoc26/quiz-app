<template>
    <MainLayout>
        <div class="w-full flex flex-col justify-start  gap-y-12 items-center">
            <div class="flex flex-col items-center gap-4">
                <h1 class="text-3xl font-bold text-blue-500">{{ quiz.title }}</h1>
                <h2 class="p-3 text-lg bg-gray-200">Question count: {{ quiz.questions.length }}</h2>
                <h3 class="p-6 text-lg bg-gray-200">{{quiz.info}}</h3>
            </div>
            <QuizPass :quiz="quiz"></QuizPass>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Pages/Layouts/MainLayout";
import QuizPass from "@/Components/Quiz/QuizPass";
export default {
    name: "Pass",
    components: {QuizPass, MainLayout},
    props: ['quiz'],
}
</script>

<style scoped>

</style>
