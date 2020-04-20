<template>
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
                            © 2020, Цитатник. Тестовое задание
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style lang="scss" scoped>
    .footer-bottom {
        background-color: #555;
        min-height: 30px;
        width: 100%;
    }
    .copyright {
        width: 100%;
        color: #fff;
        line-height: 30px;
        min-height: 30px;
        padding: 7px 0;
        text-align: center;
    }
</style>
