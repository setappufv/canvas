<script type="text/ecmascript-6">
    /**
     * Embed a block of HTML.
     *
     * @author Mohamed Said <themsaid@gmail.com>
     */
    export default {
        data() {
            return {
                content: '',

                modalShown: false,
            }
        },

        mounted() {
            this.$parent.$on('openingHTMLEmbedder', data => {
                this.modalShown = true;

                this.$nextTick(() => this.$refs.content.focus());
            });
        },

        methods: {
            addHTML() {
                this.$emit('adding', {
                    content: this.content,
                });

                this.content = '';
            }
        }
    }
</script>

<template>
    <div class="modal fade" id="embed-html" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="font-weight-bold lead">Embed HTML</p>
                    <div class="form-group row">
                        <div class="col-lg-12 mx-0 px-0">
                            <textarea ref="content" cols="30" rows="10" class="form-control border-0"
                              placeholder="Paste your HTML here" style="resize: none" v-model="content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link text-muted" data-dismiss="modal" @click="addHTML">Done</button>
                </div>
            </div>
        </div>
    </div>
</template>
