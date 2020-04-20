<template>
    <div class="wrap">
        <notifications group="error" position="top center" :duration="6000" />
        <notifications group="success" position="top center" :duration="6000" />
        <v-header class="header"></v-header>
        <v-body class="content"></v-body>
        <v-footer class="footer"></v-footer>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style lang="scss" scoped>
    .wrap {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    .content {
        flex: 1 0 auto;
    }
    .footer {
        flex-shrink: 0;
    }
</style>
