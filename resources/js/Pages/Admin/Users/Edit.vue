<template>
    <AdminLayout>
        <div class="w-5/6 items-center px-5 py-12 lg:px-20">
            <form @submit.prevent="update"
                  class="flex flex-col w-full p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-1/2">
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="text-base leading-7 text-blueGray-500">Name</label>
                        <input
                            v-model="user.name"
                            class="w-full px-4 py-2 mt-2 text-base border border-gray-400 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                            type="text" required>
                    </div>
                </div>
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="text-base leading-7 text-blueGray-500">Email</label>
                        <input
                            v-model="user.email"
                            class="w-full px-4 py-2 mt-2 text-base border border-gray-400 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                            type="email" required>
                    </div>
                </div>

                <div class="border-dashed w-full border-gray-600">
                    <span>Roles:</span>
                    <div class="w-full">
                        <div class="flex justify-around handle mb-2 w-full" v-for="(role) in user.roles"
                             :key="role.id">
                            <button
                                type="button"
                                class="flex justify-between items-center px-4 w-full mx-4 py-1 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-yellow-600  rounded-md  outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-yellow-700 ">
                                <span>{{ role.name }}</span>
                            </button>
                        </div>
                    </div>
                </div>
                <button
                    type="button"
                    @click="showChooseRoleModal"
                    class="py-2 my-2 px-1 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-700 ">
                    Add role
                </button>
                <div class="mb-4">
                    <div class="flex items-center w-full pt-4">
                        <button
                            type="submit"
                            class="w-full py-3 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-700 ">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Pages/Layouts/AdminLayout";
import {Link} from '@inertiajs/inertia-vue';
import RolesModal from "@/Components/Admin/RolesModal";
export default {
    name: "Edit",
    components: {AdminLayout, Link},
    props: ['user', 'roles'],
    methods: {
        update() {
            this.$inertia.put(`/admin/users/${this.user.id}`, this.user);
        },
        showChooseRoleModal() {
            this.$modal.show(RolesModal, {
                user_id: this.user.id,
                roles: this.roles
            }, {adaptive: true, draggable: true});
        }
    },
}
</script>

<style scoped>

</style>
