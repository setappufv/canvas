<script>
    export default {
        props: {
            models: {
                type: Array,
                required: false
            }
        },

        data() {
            return {
                search: '',
                topicList: this.models ? this.models : [],
                limit: 10,
                load: false
            }
        },

        computed: {
            /**
             * Filter topics by their name.
             *
             * @source https://codepen.io/AndrewThian/pen/QdeOVa
             */
            filteredList() {
                let filtered = this.topicList.filter(topic => {
                    return topic.name.toLowerCase().includes(this.search.toLowerCase())
                });

                this.load = Object.keys(filtered).length > this.limit;

                return this.limit ? filtered.slice(0, this.limit) : this.topicList;
            }
        },
    }
</script>
