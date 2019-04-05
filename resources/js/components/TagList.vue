<script type="text/ecmascript-6">
    export default {
        props: ['models'],

        data() {
            return {
                search: '',
                tagList: this.models ? this.models : [],
                limit: 10,
                load: false
            }
        },

        computed: {
            /**
             * Filter tags by their name.
             *
             * @source https://codepen.io/AndrewThian/pen/QdeOVa
             */
            filteredList() {
                let filtered = this.tagList.filter(tag => {
                    return tag.name.toLowerCase().includes(this.search.toLowerCase())
                });

                if (Object.keys(filtered).length > this.limit) {
                    this.load = true;
                } else {
                    this.load = false;
                }

                return this.limit ? filtered.slice(0, this.limit) : this.tagList;
            }
        },
    }
</script>
