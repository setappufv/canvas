<template>
    <div v-cloak>
        <multiselect
                v-model="value"
                :placeholder="this.trans.topics.forms.select"
                :tag-placeholder="this.trans.topics.forms.tag"
                label="name"
                track-by="slug"
                :options="options"
                :taggable="true"
                @input="onChange"
                @tag="addTopic">
        </multiselect>

        <div class="topics">
            <template v-if="value.length !== 0">
                <input hidden type="hidden" :name="`topic[name]`" :value="value.name">
                <input hidden type="hidden" :name="`topic[slug]`" :value="value.slug">
            </template>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        props: {
            topics: {
                type: Array,
                required: false
            },
            assigned: {
                type: Object,
                required: false
            }
        },

        components: {
            Multiselect
        },

        data() {
            const allTopics = this.topics.map(obj => {
                let filtered = {};

                filtered['name'] = obj.name;
                filtered['slug'] = obj.slug;

                return filtered;
            });

            return {
                value: this.assigned ? this.assigned : [],
                options: allTopics,
                trans: i18n
            }
        },

        methods: {
            onChange(value, id) {
                if (this.value == null) {
                    this.value = [];
                }
            },

            addTopic(searchQuery) {
                const topic = {
                    name: searchQuery,
                    slug: this.slugify(searchQuery)
                };

                this.options.push(topic);

                this.value = {
                    name: topic.name,
                    slug: topic.slug
                };
            },

            /**
             * Convert a string to a slug.
             *
             * @source https://gist.github.com/mathewbyrne/1280286
             */
            slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/--+/g, '-')
            }
        }
    }
</script>

<style>
    @import "~vue-multiselect/dist/vue-multiselect.min.css";

    .multiselect__select {
        display: none;
    }

    .multiselect__tags {
        border: none;
        padding-left: 0;
        padding-right: 0;
    }

    .multiselect__tag,
    .multiselect__option--highlight,
    .multiselect__option--highlight::after,
    .multiselect__tag-icon:focus,
    .multiselect__tag-icon:hover {
        background: #3490dc;
    }

    .multiselect,
    .multiselect__input,
    .multiselect__single {
        font-size: 14px;
        padding: 0;
        border-radius: 0;
    }

    .multiselect__input:focus::placeholder,
    .multiselect__input:focus::-webkit-input-placeholder,
    .multiselect__input::placeholder,
    .multiselect__input::-webkit-input-placeholder,
    .multiselect__placeholder {
        color: #6c757d;
        opacity: 1;
        padding-top: 0;
        line-height: 1;
    }

    .multiselect__input {
        line-height: 1;
    }

    .multiselect__tag {
        padding-bottom: 2px;
    }
</style>
