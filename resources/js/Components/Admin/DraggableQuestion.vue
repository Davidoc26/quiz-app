<template>
    <div>
        <div
            class="flex my-16 flex-col h-auto border-2 border-dashed border-gray-600 w-full justify-center items-center">
            <div class="flex justify-between px-4 items-center  w-full">
                <p>Question: <span class="font-semibold w-auto block "> {{ question.question }}</span></p>
                <p>Correct answer: <input
                    @keyup.enter="updateCorrectAnswerId($event)" type="text"
                    class="font-bold w-10 border-2" :value="question.correct_answer_id"></p>
            </div>
            <draggable class="w-full" v-model="question.answers" :group="question.id" handle=".handle"
                       @start="drag=true"
                       @end="drag=false"
                       @change="updateAnswers">
                <div class="flex justify-around handle mb-2 w-full" v-for="(answer) in question.answers"
                     :key="answer.id">
                    <button
                        class="flex justify-between mx-4 w-full mx-4 py-1 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-yellow-600  rounded-md  outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-yellow-700 ">
                        <span>({{ answer.order }})</span>
                        <input type="text" class=" mr-12 form-control text-black"
                               @keyup.enter="updateAnswerText($event,answer.id,answer.text)"
                               v-model="answer.text"/>
                    </button>
                </div>
            </draggable>
            <button
                @click="showAnswerModal"
                class="py-1 my-2 px-1 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-700 ">
                New answer
            </button>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
import NewAnswerModal from "./NewAnswerModal";
import {eventBus} from '@/app';

export default {
    name: "DraggableQuestions",
    components: {draggable},
    data() {
        return {
            drag: true,
            correct_answer_id: this.question.correct_answer_id,
            real_answer_id: undefined,
        }
    },
    created() {
        eventBus.$on('answerCreatedFor' + this.question.id, answer => {
            this.pushNewAnswer(answer);
        });
    },
    mounted() {
        this.initCorrectAnswerId();
    },
    props: {
        question: Object,
    },
    methods: {
        initCorrectAnswerId() {
            this.question.answers.find(answer => {
                if (answer.id === this.question.correct_answer_id) {
                    this.real_answer_id = answer.id;
                    this.question.correct_answer_id = answer.order;
                }
            });
        },
        updateAnswerText(event,id, text) {
            axios.put(`/admin/answer/${id}/update-text`, {
                text
            });
            event.target.blur();
        },
        updateAnswers() {
            this.question.answers.map((answer, index) => {
                answer.order = index + 1;
            });

            this.question.answers.find(answer => {
                if (answer.id === this.real_answer_id) {
                    this.question.correct_answer_id = answer.order;
                }
            });

            axios.post('/admin/answer/update-order', {answers: this.question.answers});
        },
        showAnswerModal() {
            this.$modal.show(NewAnswerModal, {
                questionId: this.question.id,
                questionText: this.question.question,
                answerOrder: this.question.answers.length + 1,
            }, {adaptive: true, draggable: true});
        },
        pushNewAnswer(answer) {
            this.question.answers.push(answer);
        },
        updateCorrectAnswerId(event) {
            if (event.target.value < 0) {
                return;
            }
            this.question.correct_answer_id = event.target.value;
            event.target.blur();
            let answer = this.question.answers.find((answer) => {
                if (answer.order === parseInt(this.question.correct_answer_id)) {
                    this.real_answer_id = answer.id;
                    return answer.id;
                }
            });

            axios.put('/admin/question/' + this.question.id, {
                correct_answer_id: answer.id,
            });
        }
    }
}
</script>

<style scoped>

</style>
