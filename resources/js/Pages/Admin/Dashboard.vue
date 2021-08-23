<template>
    <AdminLayout>
        <div class="w-1/6 bg-yellow-200 border-r-2 border-gray-200">
            <div class="flex flex-col gap-1">
                <button
                    class="flex items-center justify-center gap-1 bg-yellow-500 py-4 w-full border-transparent border-l-8 hover:border-purple-600 sm:hover:scale-100 hover:translate-x-10 transform transition duration-300">
                    <i class="fas fa-book"></i>
                    <span class="text-purple-600 font-bold text-lg">Quizzes</span>
                </button>
                <button
                    class="flex items-center justify-center gap-1 bg-yellow-500 py-4 w-full border-transparent border-l-8 hover:border-purple-600 sm:hover:scale-100 hover:translate-x-10 transform transition duration-300">
                    <i class="fas fa-users"></i>
                    <span class="text-purple-600 font-bold text-lg">Users</span>
                </button>
            </div>
        </div>
        <div class="w-5/6 min-h-full">
            <div class="flex flex-col justify-center items-center">
                <!--                        -->
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Pages/Layouts/AdminLayout";

export default {
    name: "Dashboard",
    components: {
        AdminLayout,
    },
}
</script>

<style scoped>

</style>
