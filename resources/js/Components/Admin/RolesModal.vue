<template>
    <ModalLayout>
        <template #title>Test title</template>
        <template #inputs>
            <div class="flex flex-col gap-2 h-full w-full justify-center items-center" >
                <button
                    v-for="role in roles"
                    @click="setChosenRole(role)"
                    type="button"
                    :class="chosenRole.id === role.id ? 'bg-yellow-700' : 'bg-yellow-600'"
                    class="flex justify-between items-center px-4 w-full mx-4 py-1 text-base font-semibold text-white transition duration-200 ease-in-out transform   rounded-md  outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-yellow-700 ">
                    <span>{{ role.name }}</span>
                </button>
            </div>
        </template>
        <template #buttons>
            <button @click="$emit('close')" class="p-4 bg-red-400 rounded-sm w-1/2">Close</button>
            <button @click="addRole" class="p-4 bg-blue-400 rounded-sm w-1/2">Add role</button>
        </template>
    </ModalLayout>
</template>

<script>
import ModalLayout from "./Layouts/ModalLayout";
export default {
    name: "RolesModal",
    props: ['roles', 'user_id'],
    data() {
        return {
            chosenRole: {
                id: 0
            }
        }
    },
    components: {ModalLayout},
    methods: {
        addRole() {
            if (this.chosenRole.id === 0) {
                return;
            }
            this.$inertia.put(`/admin/users/${this.user_id}/update-roles`,this.chosenRole);
            this.$emit('close');
        },
        setChosenRole(role) {
            this.chosenRole = role;
        }
    }
}
</script>

<style scoped>

</style>
