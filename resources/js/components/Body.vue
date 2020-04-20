<template>
    <div>
        <div class="main ml-auto mr-auto">
            <loading
                :active.sync="loading"
                :can-cancel="false"
                :is-full-page="true"
                :color="'#3490dc'"
            >
            </loading>
            <div class="title text-center">
                <h1>Цитатник - коллекция цитат со всего интернета каждый день</h1>
            </div>
            <div class="quotes-wrap">
                <div v-for="quote in quotes" class="quote-item">
                    <v-card :quote="quote"></v-card>
                </div>
            </div>
            <div class="load-more" v-if="!all_content_loaded">
                <v-button class="btn-lg" type="primary" @click="loadMore">
                    Загрузить еще
                </v-button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Body",
        data: function () {
            return {
                current_page: 0,
                all_content_loaded: true
            }
        },
        computed: {
            quotes() {
                return this.$store.state.quotes
            },
            loading() {
                return this.$store.state.loading
            }
        },
        mounted() {
            let app = this;

            axios.get('/api/quotes')
                .then(function (resp) {
                    let data = resp.data.data;

                    app.$store.dispatch('pushMany', data.data);

                    app.current_page = data.current_page;

                    if(app.current_page < data.last_page) {
                        app.all_content_loaded = false;
                    }
                })
                .catch(function (error) {
                    app.$notify({
                        group: 'error',
                        type: 'error',
                        title: 'Ошибка',
                        text: 'Не удалось загрузить список цитат',
                        closeOnClick: true
                    });
                });
        },
        methods: {
            loadMore() {
                let app = this;
                let page = app.current_page + 1;

                if(app.all_content_loaded) {
                    return;
                }

                axios.get('/api/quotes', { params: { 'page': page } })
                    .then(function (resp) {
                        let data = resp.data.data;

                        if(data.data.length === 0) {
                            app.all_content_loaded = true;
                        } else {
                            app.$store.dispatch('pushMany', data.data);

                            if(page === data.last_page) {
                                app.all_content_loaded = true;
                            } else {
                                app.current_page = page;
                            }
                        }
                    })
                    .catch(function (error) {
                        app.$notify({
                            group: 'error',
                            type: 'error',
                            title: 'Ошибка',
                            text: 'Не удалось загрузить список цитат',
                            closeOnClick: true
                        });
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>
    .main {
        max-width: 900px;
    }
    .title {
        padding: 9vh 0;
    }
    .quote-item {
        margin-bottom: 20px;
        padding: 0 10px;
    }
    .load-more {
        text-align: center;
        margin: 20px 0 40px 0;
    }
    h1 {
        padding: 0 10px;
    }
</style>
