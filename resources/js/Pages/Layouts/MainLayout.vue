<template>
    <div class="flex flex-col">
        <div class="h-screen flex flex-col">
            <Header/>
            <div class="flex flex-grow">
                <slot/>
            </div>
            <Footer/>
        </div>
    </div>
</template>

<script>
import Footer from "@/Components/Footer";
import Header from "@/Components/Header";

export default {
    name: "MainLayout",
    components: {
        Footer,
        Header
    }
}
</script>

<style scoped>

</style>
