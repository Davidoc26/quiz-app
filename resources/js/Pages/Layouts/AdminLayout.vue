<template>
    <MainLayout>
        <Sidebar/>
        <slot/>
    </MainLayout>
</template>

<script>
import Footer from "@/Components/Footer";
import Header from "@/Components/Header";
import Sidebar from "../../Components/Admin/Sidebar";
import MainLayout from "./MainLayout";

export default {
    name: "AdminLayout",
    components: {
        MainLayout,
        Sidebar,
        Header,
        Footer,
    },
}
</script>

<style scoped>

</style>
