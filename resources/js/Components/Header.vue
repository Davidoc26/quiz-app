<template>
    <div class="flex flex-shrink-0 justify-between h-auto border-b-2 bg-white border-gray-200 ">
        <div class="flex items-center mx-4">
            <div>
                <Link href="/"
                      as="button"
                      type="button"
                      class="flex items-center">
                    <i class="fas fa-clipboard-list fa-3x text-purple-600 cursor-pointer"></i>
                    <span class="font-bold text-black text-2xl text-green-600 ml-1.5 mt-1">Quiz</span>
                </Link>
            </div>
        </div>

        <div>
            <div class="flex w-full items-center justify-center gap-x-1">
                <div>
                    <Link href="/"
                          as="button"
                          type="button"
                          class="bg-purple-500 h-full px-5 py-4 font-semibold text-white hover:bg-indigo-500 transition-colors"
                    >Home
                    </Link>
                </div>
            </div>
        </div>
        <div></div>
    </div>

</template>
<script>
import {Link} from '@inertiajs/inertia-vue'

export default {
    name: "Header",
    components: {
        Link,
    }
}
</script>

<style scoped>

</style>
