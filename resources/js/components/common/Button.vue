<template>
    <button
        class="btn regular-btn"
        :class="'btn-' + type"
        :disabled="disabled"
        @click="callback($event)"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "Button",
        props: {
            type: String,
            disabled: Boolean
        },
        methods: {
            callback: function (e) {
                this.$emit('click', e);
            }
        }
    }
</script>

<style scoped>

</style>
