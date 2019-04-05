<script type="text/ecmascript-6">
    export default {
        props: ['models'],

        data() {
            return {
                search: '',
                postList: this.models ? this.models : [],
                limit: 7,
                load: false
            }
        },

        methods: {
            /**
             * Return a number formatted with a suffix.
             *
             * @return string
             */
            suffixedNumber(n) {
                let format = '';
                let suffix = '';

                if (n < 900) {
                    format = n.toFixed();
                    suffix = '';
                } else if (n < 900000) {
                    let n_total = n / 1000;
                    format = parseFloat(n_total.toFixed(1));
                    suffix = 'K';
                } else if (n < 900000000) {
                    let n_total = n / 1000000;
                    format = parseFloat(n_total.toFixed(1));
                    suffix = 'M';
                } else if (n < 900000000000) {
                    let n_total = n / 1000000000;
                    format = parseFloat(n_total.toFixed(1));
                    suffix = 'B';
                } else {
                    let n_total = n / 1000000000000;
                    format = parseFloat(n_total.toFixed(1));
                    suffix = 'T';
                }

                return format + suffix;
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

                if (Object.keys(filtered).length > this.limit) {
                    this.load = true;
                } else {
                    this.load = false;
                }

                return this.limit ? filtered.slice(0, this.limit) : this.postList;
            }
        },
    }
</script>
