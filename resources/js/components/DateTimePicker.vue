<template>
    <div v-cloak>
        <div class="d-flex flex-row">
            <select class="input pr-2"
                    v-model="dateComponents.month">
                <option v-for="value in Array.from({length: 12}, (_, i) => String(i + 1).padStart(2, '0'))"
                        :value="value">{{ value }}
                </option>
            </select>
            <span class="px-1">/</span>
            <select class="input px-2" v-model="dateComponents.day">
                <option v-for="value in Array.from({length: 31}, (_, i) => String(i + 1).padStart(2, '0'))"
                        :value="value">{{ value }}
                </option>
            </select>
            <span class="px-1">/</span>
            <select class="input px-2" v-model="dateComponents.year">
                <option v-for="value in Array.from({length: 15}, (_, i) => i + (new Date()).getFullYear() - 10)"
                        :value="value">{{ value }}
                </option>
            </select>
            <span class="pl-3"> </span>
            <select class="input px-2" v-model="dateComponents.hour">
                <option v-for="value in Array.from({length: 24}, (_, i) => String(i).padStart(2, '0'))" :value="value">
                    {{ value }}
                </option>
            </select>
            <span class="px-1">:</span>
            <select class="input pl-2" v-model="dateComponents.minute">
                <option v-for="value in Array.from({length: 60}, (_, i) => String(i).padStart(2, '0'))" :value="value">
                    {{ value }}
                </option>
            </select>
        </div>

        <input hidden type="hidden" name="published_at" v-model="result">
    </div>
</template>

<script>
    import moment from 'moment'

    /**
     * Create the default date/time picker.
     *
     * @author Mohamed Said <themsaid@gmail.com>
     */
    export default {
        props: {
            value: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                dateComponents: {
                    day: '',
                    month: '',
                    year: '',
                    hour: '',
                    minute: '',
                },

                result: ''
            }
        },

        mounted() {
            this.buildComponents(this.value);
        },

        watch: {
            value(val) {
                this.buildComponents(val);
            },

            dateComponents: {
                handler: function () {
                    this.result = this.dateComponents.year + '-' + this.dateComponents.month + '-' + this.dateComponents.day + ' ' + this.dateComponents.hour + ':' + this.dateComponents.minute + ':00';

                    this.$emit('input', this.result);
                },
                deep: true
            },
        },

        methods: {
            buildComponents(val) {
                let date = moment(val + ' Z').utc();

                this.dateComponents = {
                    month: date.format('MM'),
                    day: date.format('DD'),
                    year: date.format('YYYY'),
                    hour: date.format('HH'),
                    minute: date.format('mm')
                };
            }
        }
    }
</script>

<style scoped>
    select {
        width: auto;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .input {
        border: none;
        background-color: transparent;
    }
</style>
