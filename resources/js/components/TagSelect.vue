<template>
    <div v-cloak>
        <multiselect
                v-model="value"
                :placeholder="this.trans.tags.forms.select"
                :tag-placeholder="this.trans.tags.forms.tag"
                label="name"
                track-by="slug"
                :options="options"
                :multiple="true"
                :taggable="true"
                @tag="addTag">
        </multiselect>

        <div class="tags">
            <template v-for="(tags, index) in value">
                <input hidden type="hidden" :name="`tags[${index}][name]`" :value="tags.name">
                <input hidden type="hidden" :name="`tags[${index}][slug]`" :value="tags.slug">
            </template>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        props: {
            tags: {
                type: Array,
                required: false
            },
            tagged: {
                type: Array,
                required: false
            }
        },

        components: {
            Multiselect
        },

        data() {
            const allTags = this.tags.map(obj => {
                let filtered = {};
                filtered['name'] = obj.name;
                filtered['slug'] = obj.slug;

                return filtered;
            });

            return {
                value: this.tagged ? this.tagged : [],
                options: allTags,
                trans: i18n
            }
        },

        methods: {
            addTag(newTag) {

                const tag = {
                    name: newTag,
                    slug: this.slugify(newTag)
                };

                this.options.push(tag);
                this.value.push(tag)
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
