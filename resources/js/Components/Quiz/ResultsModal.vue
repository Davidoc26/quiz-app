<template>
    <div class="flex relative flex-col items-center h-full justify-center">
        <p class="text-lg font-bold">Correct answers: <span class="text-green-400">{{ correctAnswers }} </span></p>
        <p class="text-lg font-bold">Incorrect answers: <span class="text-red-600">{{ incorrectAnswers }} </span></p>
        <Link href="/" @click="$emit('close')" class="absolute bottom-0 p-4 bg-yellow-500 text-lg w-full" as="button">
            Home
        </Link>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue";
export default {
    props: ['correctAnswers', 'incorrectAnswers'],
    name: "ResultsModal",
    components:{
        Link,
    }
}
</script>

<style scoped>

</style>
