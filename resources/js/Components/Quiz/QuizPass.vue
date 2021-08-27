<template>
    <div class="lg:w-2/5 w-3/4 h-auto relative bg-gray-300">
        <div class="flex items-center flex-col justify-between">
            <div class="w-full">
                <div class="w-full" v-for="(question,i) in quiz.questions">
                    <div class="flex flex-col" v-if="(i+1) === currentQuestion">
                        <Question :question="question"/>
                    </div>
                </div>
            </div>
            <button v-if="showNextButton" class="p-4 absolute bottom-0 bg-purple-400 text-lg w-full"
                    @click="nextQuestion">Next
            </button>
        </div>
    </div>
</template>

<script>
import Question from "./Question";
import ResultsModal from "./ResultsModal";

export default {
    name: "QuizPass",
    props: ['quiz'],
    components: {Question},
    data() {
        return {
            questions: this.quiz.questions,
            currentQuestion: 1,
            answeredQuestions: {
                correct: 0,
                incorrect: 0,
            },
            showNextButton: false,
        }
    },
    created() {
        this.$on('questionAnswered', isCorrect => {
            if (isCorrect) {
                this.answeredQuestions.correct++;
            } else {
                this.answeredQuestions.incorrect++;
            }
            this.showNextButton = true;
        });
    },
    mounted() {
        console.dir(this.quiz.questions);
    },
    methods: {
        nextQuestion() {
            if (this.currentQuestion === this.questions.length) {
                this.$modal.show(ResultsModal, {
                    correctAnswers: this.answeredQuestions.correct,
                    incorrectAnswers: this.answeredQuestions.incorrect
                },{draggable:false, clickToClose: false})
            } else {
                this.showNextButton = false;
                this.currentQuestion++;
            }
        },
    }

}
</script>

<style scoped>

</style>
