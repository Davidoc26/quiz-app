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
        <div>
            <div class="flex relative h-full" v-if="$page.props.auth.user">
                <button @click="toggleUserMenu" class="p-4 bg-purple-500 text-white hover:bg-indigo-500 transition">
                    {{ $page.props.auth.user.name }}
                </button>
                <div v-if="userMenu"
                     v-on-clickaway="toggleUserMenu"
                     class="absolute top-14 right-2 w-10 text-center transform transition flex flex-col gap-1 bg-white rounded-xl shadow-md w-full h-auto">
                    <Link :href="`/user/${$page.props.auth.user.name}`" class="p-4 rounded-xl w-full hover:bg-gray-100">Profile</Link>
                    <button @click="logout" class="p-4 rounded-xl w-full hover:bg-gray-100">Logout</button>
                </div>
            </div>
            <div v-else class="h-full flex">
                <Link href="/login" class="p-4 bg-purple-500 text-white  hover:bg-indigo-500 transition">Sign in</Link>
            </div>
        </div>
    </div>

</template>
<script>
import {Link} from '@inertiajs/inertia-vue'
import {mixin as clickaway} from 'vue-clickaway';

export default {
    mixins: [clickaway],
    name: "Header",
    components: {
        Link,
    },
    data() {
        return {
            userMenu: false,
        }
    },
    methods: {
        toggleUserMenu() {
            this.userMenu = !this.userMenu;
        },
        logout() {
            this.toggleUserMenu();
            this.$inertia.post('/logout');
        }
    }
}
</script>

<style scoped>

</style>
