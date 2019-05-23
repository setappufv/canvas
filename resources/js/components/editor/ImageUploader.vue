<template>
    <div v-cloak>
        <div class="modal fade" id="image-upload" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog" id="unsplash-modal" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="font-weight-bold lead">
                            {{ this.trans.posts.forms.editor.images.picker.uploader.label }}
                        </p>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div v-if="imageUrl" id="current-image">
                                    <img :src="imageUrl" class="w-100">

                                    <div class="input-group py-2">
                                        <input type="text"
                                               class="form-control border-0 px-0"
                                               v-model="caption"
                                               :placeholder="this.trans.posts.forms.editor.images.picker.uploader.caption.placeholder"
                                               ref="caption">
                                    </div>

                                    <div class="input-group py-2">
                                        <select class="custom-select border-0 px-0" v-model="layout">
                                            <option value="default">
                                                {{ this.trans.posts.forms.editor.images.picker.uploader.layout.default }}
                                            </option>
                                            <option value="wide">
                                                {{ this.trans.posts.forms.editor.images.picker.uploader.layout.wide }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <image-picker
                                        v-if="!imageUrl"
                                        @changed="updateImage"
                                        :unsplash="this.unsplash"
                                        :path="this.path">
                                </image-picker>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-link text-muted" data-dismiss="modal" @click="applyImage">
                            {{ this.trans.buttons.general.done }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery';

    /**
     * Upload an image from the editor.
     *
     * @author Mohamed Said <themsaid@gmail.com>
     */
    export default {
        props: {
            unsplash: {
                type: String,
                required: false
            },
            path: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                existingBlot: null,
                imageUrl: null,
                layout: 'default',
                caption: '',
                trans: i18n
            }
        },

        mounted() {
            this.$parent.$on('openingImageUploader', data => {
                if (data) {
                    this.toggleModal();
                    this.caption = data.caption;
                    this.imageUrl = data.url;
                    this.layout = data.layout || 'default';
                    this.existingBlot = data.existingBlot;
                }
            });
        },

        methods: {
            // Show/hide the modal
            toggleModal() {
                $('#image-upload').modal('show');
            },

            // Clear the image data
            clear() {
                this.existingBlot = null;
                this.imageUrl = null;
                this.layout = 'default';
                this.caption = '';
            },

            // Update the selected image
            updateImage({url, caption}) {
                this.imageUrl = url;
                this.caption = caption ? caption : '';
            },

            // Add the image to the editor
            applyImage() {
                if (!this.imageUrl) {
                    return;
                }
                this.$emit('updated', {
                    url: this.imageUrl,
                    caption: this.caption,
                    existingBlot: this.existingBlot,
                    layout: this.layout,
                });

                this.clear();
            }
        }
    }
</script>
