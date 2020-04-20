<template>
    <header>
        <nav class="navbar navbar-expand-sm bg-primary">
            <div class="container">
                <a class="navbar-brand" href="/">⚡Цитатник</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-item" aria-controls="navbar-item" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar-item">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <v-button class="nav-link" type="light" @click="showQuoteCreationModal">
                                Опубликовать цитату<i class="fas fa-pencil-alt ml-icon" style="color:#666"></i>
                            </v-button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <modal name="create-quote" transition="nice-modal-fade" :adaptive="true" height="auto" :width="500">
            <div class="modal-wrapper">
                <v-quote-creation-form @submitted="quoteCreationSubmitted"></v-quote-creation-form>
            </div>
        </modal>
    </header>
</template>

<script>
    export default {
        name: "Header",
        methods: {
            showQuoteCreationModal: function() {
                this.$modal.show('create-quote');
            },
            quoteCreationSubmitted: function(data) {
                this.$modal.hide('create-quote');

                if(data.success) {
                    this.$notify({
                        group: 'success',
                        type: 'success',
                        title: 'Успешно',
                        text: 'Ваша цитата опубликована!',
                        closeOnClick: true
                    });
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    nav {
        padding: 0.8rem 1rem;

        .navbar-brand {
            color: #fff !important;
        }
        .fas {
            color: #fff;
        }
        .btn {
            box-shadow: 1px 1px 9px -2px #0000005e;
        }
    }
    @media (max-width: 576px) {
        .navbar-expand-sm {
            .navbar-collapse {
                padding-top: 10px;
                margin-top: 10px;
                border-top: 1px solid #ffffff4f;

                .navbar-nav {
                    align-items: center;

                    .nav-link {
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }
                }
            }
        }
    }
</style>
