<template>
    <div class="quote-creation-form">
        <loading
            :active.sync="loading"
            :can-cancel="false"
            :is-full-page="true"
            :color="'#3490dc'"
        >
        </loading>
        <form @submit="formSubmit">
            <label>
                <span>Представтесь, пожалуйста:</span>
                <input type="text" class="form-control" v-model="author_name" placeholder="Ваше имя" required>
            </label>
            <br>
            <label>
                <span>Укажите теги:</span>
                <multiselect v-model="tags" :show-labels="false" :options="allTags" :multiple="true" :allow-empty="false" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Выберите тег" label="name" track-by="name" :max-height="165">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length > 1 && !isOpen">{{ values.length }} тега выбрано</span><span v-else-if="values.length === 1 && !isOpen">{{ values[0].name }}</span></template>
                </multiselect>
            </label>
            <br>
            <label>
                <span>Напищите свою цитату:</span>
                <textarea class="form-control" v-model="text" placeholder="Текст цитаты" required></textarea>
            </label>
            <br>
            <v-button class="nav-link" type="success">
                Отрпавить<i class="far fa-paper-plane ml-icon" style="color:#fff"></i>
            </v-button>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "QuoteCreationForm",
        components: {
            Multiselect
        },
        data: function () {
            return {
                author_name: '',
                text: '',
                tags: [],
                allTags: []
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
        created() {
            let app = this;

            axios.get('/api/tags')
                .then(function (resp) {
                    let tags = [];

                    resp.data.data.forEach(function(elem) {
                        tags.push({ id: elem.id, name: elem.name });
                    });

                    app.allTags = tags;
                })
                .catch(function (error) {
                    app.$notify({
                        group: 'error',
                        type: 'error',
                        title: 'Ошибка',
                        text: 'Не удалось загрузить список тегов',
                        closeOnClick: true
                    });
                });
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();

                let app = this;
                let tag_ids = [];

                for(let i in app.tags) {
                    tag_ids.push(app.tags[i].id);
                }

                axios.post('/api/quote/create', {
                    author_name: app.author_name,
                    text: app.text,
                    tag_ids: tag_ids
                })
                .then(function (resp) {
                    app.$store.dispatch('unshiftOne', resp.data.data[0]);

                    app.$emit('submitted', resp.data);
                })
                .catch(function (error) {
                    let message = 'Не удалось опубликовать цитату';

                    if(error.response !== undefined && error.response.status === 422) {
                        message = error.response.data.message;
                    }

                    app.$notify({
                        group: 'error',
                        type: 'error',
                        title: 'Ошибка',
                        text: message,
                        closeOnClick: true
                    });
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

</style>
