<script>
    export default {
        props: {
            model: {
                type: Object,
                required: false
            }
        },

        data() {
            return {
                name: this.model ? this.model.name : ''
            }
        },

        computed: {
            slug() {
                return this.slugify(this.name);
            }
        },

        methods: {
            /**
             * Trim an alphanumeric string and convert to a slug.
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
