<script>
    import 'moment-timezone'

    export default {
        props: {
            models: {
                type: Array,
                required: false
            },
            defaultTimezone: {
                type: String,
                required: false
            },
        },

        data() {
            return {
                search: '',
                postList: this.models ? this.models : [],
                limit: 7,
                load: false,
                timezone: this.defaultTimezone ? this.defaultTimezone : 'UTC',
            }
        },

        methods: {
            /**
             * Return a number formatted with a suffix.
             *
             * @return string
             */
            suffixedNumber(number) {
                let formatted = '';
                let suffix = '';

                if (number < 900) {
                    formatted = number;
                    suffix = '';
                } else if (number < 900000) {
                    let n_total = number / 1000;
                    formatted = parseFloat(n_total.toFixed(1));
                    suffix = 'K';
                } else if (number < 900000000) {
                    let n_total = number / 1000000;
                    formatted = parseFloat(n_total.toFixed(1));
                    suffix = 'M';
                } else if (number < 900000000000) {
                    let n_total = number / 1000000000;
                    formatted = parseFloat(n_total.toFixed(1));
                    suffix = 'B';
                } else {
                    let n_total = number / 1000000000000;
                    formatted = parseFloat(n_total.toFixed(1));
                    suffix = 'T';
                }

                return formatted + suffix;
            }
        },

        computed: {
            /**
             * Filter posts by their title.
             *
             * @source https://codepen.io/AndrewThian/pen/QdeOVa
             */
            filteredList() {
                let filtered = this.postList.filter(post => {
                    return post.title.toLowerCase().includes(this.search.toLowerCase())
                });

                this.load = Object.keys(filtered).length > this.limit;

                return this.limit ? filtered.slice(0, this.limit) : this.postList;
            }
        },
    }
</script>
