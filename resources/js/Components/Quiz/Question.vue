<template>
  <div class="flex flex-col gap-4 justify-start items-center">
    <h3 class="text-2xl font-semibold text-purple-500">{{ question.question }}</h3>
    <div class="mb-20 w-full flex flex-col gap-0.5">
      <div class="flex flex-col w-full items-center cursor-pointer" v-for="answer in question.answers">
        <button
            :disabled="!answering"
            :data-id="answer.order"
            class="flex items-center gap-2 p-6 w-full" @click="selectAnswer(answer.order)"

            :class="(answer.order === selectedAnswer) ? 'bg-yellow-400 font-bold text-indigo-500' : 'bg-blue-400 text-white'">
          <i class="far fa-dot-circle cursor-pointer"></i>
          <p class="text-lg">{{ answer.text }}</p>
        </button>
      </div>
    </div>
    <button v-if="answering" class="p-4 absolute bottom-0 bg-yellow-500 text-lg w-full" @click="makeAnswer">Answer
    </button>
  </div>
</template>

<script>
export default {
  name: "Question",
  props: ['question'],
  data() {
    return {
      selectedAnswer: undefined,
      answering: true,
    }
  },
  methods: {
    makeAnswer() {
      if (this.selectedAnswer === undefined) {
        return;
      }
      this.answering = false;
      let answer = this.question.answers[this.selectedAnswer - 1];
      if (answer.id === this.question.correct_answer_id) {
        this.showCorrectAnswer();
        this.$parent.$emit('questionAnswered', true);
      } else {
        this.showCorrectAnswer();
        this.$parent.$emit('questionAnswered', false);
      }

    },
    showCorrectAnswer() {
      let answer = this.question.answers.find(answer => {
        if (this.question.correct_answer_id === answer.id) {
          return answer;
        }
      });
      let element = this.$el.querySelector(`[data-id='${answer.order}']`);
      if (element.classList.contains('bg-blue-400')) {
        element.classList.replace('bg-blue-400', 'bg-green-400');
      } else {
        element.classList.replace('bg-yellow-400', 'bg-green-400');
      }
    },

    selectAnswer(answerOrder) {
      this.selectedAnswer = answerOrder;
    },
  }
}
</script>

<style scoped>

</style>
