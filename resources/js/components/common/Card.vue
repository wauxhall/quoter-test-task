<template>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="quote-author"><i class="far fa-user mr-icon"></i>{{ quote.author_name }}</div>
                <div class="quote-date"><i class="far fa-clock mr-icon"></i>{{ quote.created_at_readable }}</div>
            </div>
            <blockquote class="card-text quote-text">{{ quote.text }}</blockquote>
            <div class="quote-tags">
                <span><i class="fas fa-hashtag mr-icon"></i>Теги: </span><span class="badge badge-primary mr-icon" v-for="tag in quote.tags">{{ tag.name }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Card",
        props: {
            quote: Object
        }
    }
</script>

<style lang="scss" scoped>
    .card {
        .card-title {
            display: flex;
            justify-content: space-between;
            align-items: center;

            .quote-author {
                font-weight: 600;
                letter-spacing: 1px;
                font-size: 16px;
            }
            .quote-date {
                font-size: 14px;

                &, i {
                    color: #a0a0a0 !important;
                }
            }
        }
    }
    .quote-text {
        position: relative;
        padding-left: 1em;
        border-left: 0.2em solid #4d91b3;
        font-family: 'Roboto', serif;
        font-weight: 300;
        font-size: 18px;
        margin: 20px 0 25px 0 !important;

        &:before, &:after {
            content: '\201C';
            color: #4d91b3;
        }
        &:after {
            content: '\201D';
        }
    }
    @media (max-width: 576px) {
        .card {
            .card-title {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    }
</style>
