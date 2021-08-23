<template>
    <AdminLayout>
        <div class="w-5/6 min-h-full">
            <div class="flex flex-col justify-center items-center">
                <div>Quiz</div>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Pages/Layouts/AdminLayout";
import Sidebar from "@/Components/Admin/Sidebar";

export default {
    name: "Dashboard",
    components: {
        Sidebar,
        AdminLayout,
    },
}
</script>

<style scoped>

</style>
