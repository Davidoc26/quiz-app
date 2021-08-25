<template>
    <div class="flex flex-col h-full">
        <div class="flex flex-col bg-gray-200 justify-between h-full">
            <div class="flex justify-center">
                <p class="font-semibold text-md mt-4">
                    <slot name="title"></slot>
                </p>
            </div>
            <div class="flex justify-center">
                <slot name="inputs"></slot>
            </div>
            <div class="flex flex-shrink">
                <slot name="buttons"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalLayout"
}
</script>

<style scoped>

</style>
