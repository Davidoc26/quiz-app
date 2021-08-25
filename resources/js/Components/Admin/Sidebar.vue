<template>
    <div class="w-1/6 bg-yellow-200 border-r-2 border-gray-200">
        <div class="flex flex-col gap-1">
            <Link
                href="/admin/quiz"
                class="flex items-center justify-center gap-1 bg-yellow-500 py-4 w-full border-transparent border-l-8 hover:border-purple-600 sm:hover:scale-100 hover:translate-x-10 transform transition duration-300">
                <i class="fas fa-book"></i>
                <span class="text-purple-600 font-bold text-lg">Quizzes</span>
            </Link>
            <Link
                href="/admin"
                class="flex items-center justify-center gap-1 bg-yellow-500 py-4 w-full border-transparent border-l-8 hover:border-purple-600 sm:hover:scale-100 hover:translate-x-10 transform transition duration-300">
                <i class="fas fa-users"></i>
                <span class="text-purple-600 font-bold text-lg">Users</span>
            </Link>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue'

export default {
    name: "Sidebar",
    components: {
        Link,
    }
}
</script>

<style scoped>

</style>
