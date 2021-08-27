<template>
    <MainLayout>
        <div class="flex w-full justify-center items-center">
            <div class="shadow-md border border-dashed border-gray-300 bg-white p-6 w-2/3 lg:w-1/3">
                <form @submit.prevent="register">
                    <div class="flex flex-col w-full items-center gap-4 h-full">
                        <p class="text-2xl text-indigo-500 font-bold">Register</p>
                        <hr class="border-gray-200 border-1 w-full">
                        <div class="mt-4">
                            <label for="name" class="block text-gray-700 text-sm my-1 font-bold mb-2">
                                Name
                            </label>
                            <input
                                v-model="form.name"
                                id="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                                type="text" required>
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-gray-700 text-sm my-1 font-bold mb-2">
                                Email
                            </label>
                            <input
                                v-model="form.email"
                                id="email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                                type="email" required>
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block text-gray-700 text-sm my-1 font-bold mb-2">
                                Password
                            </label>
                            <input
                                v-model="form.password"
                                id="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline"
                                type="password" required>
                        </div>
                        <div class="flex items-center gap-3">
                            <Link href="/login" class="text-gray-500 text-sm font-bold underline">Log in</Link>
                            <button
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </MainLayout>
</template>


<script>
import MainLayout from "@/Pages/Layouts/MainLayout";
import {Link} from "@inertiajs/inertia-vue";

export default {
    name: "Register",
    components: {MainLayout, Link},
    data() {
        return {
            form:  {
                email: '',
                name: '',
                password: '',
            }
        }
    },
    methods: {
        register() {
            this.$inertia.post('/register',this.form);
        }
    }
}
</script>

<style scoped>

</style>
