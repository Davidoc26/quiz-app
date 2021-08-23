<template>
    <div class="flex flex-col">
        <div class="h-screen flex flex-col">
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

            <div class="flex flex-grow">
                <slot/>
            </div>
            <Footer/>
        </div>

    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue'
import Footer from "@/Components/Footer";

export default {
    name: "AdminLayout",
    components: {
        Link,
        Footer,
    },
}
</script>

<style scoped>

</style>
