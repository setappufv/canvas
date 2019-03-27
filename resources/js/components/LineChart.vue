<script type="text/ecmascript-6">
    import Vue from 'vue'
    import moment from 'moment';
    import Chart from 'vue2-frappe'

    Vue.use(Chart);
    Vue.prototype.moment = moment;

    export default {
        props: ['views'],

        data() {
            return {
                points: [{
                    values: Object.values(this.views)
                }],

                labels: Object.keys(this.views)
            }
        },

        methods: {
            pluralize(string, count) {
                if (count > 1 || count === 0) {
                    return ' ' + string + 's';
                } else {
                    return ' ' + string;
                }
            }
        }
    }
</script>

<template>
    <div v-cloak>
        <vue-frappe
                id="stats"
                :labels="this.labels"
                title="Views (Last 30 days)"
                type="line"
                :axisOptions="{
                    xIsSeries: true,
                }"
                :lineOptions="{
                    regionFill: 1,
                    hideDots: 1
                }"
                :height="250"
                :colors="['#3490dc']"
                :dataSets="this.points"
                :tooltipOptions="{
                    formatTooltipX: d => moment(d, 'YYYY-MM-DD').format('dddd, MMMM Do'),
                    formatTooltipY: d => d + pluralize('view', d),
                }">
        </vue-frappe>
    </div>
</template>