<template>
    <div v-cloak>
        <div v-if="imageUrl" id="current-image">
            <img :src="imageUrl" class="w-100">

            <div class="input-group py-2">
                <input type="text" class="form-control border-0 px-0"
                       name="featured_image_caption"
                       title="Featured Image Caption"
                       v-model="imageCaption"
                       :placeholder="this.trans.posts.forms.editor.images.picker.uploader.caption.placeholder">
            </div>
        </div>

        <input hidden type="hidden" name="featured_image" v-model="imageUrl">

        <image-picker
                @changed="updateImage"
                @uploading="uploading = true"
                :unsplash="this.unsplash"
                :path="this.path">
        </image-picker>
    </div>
</template>

<script>
    /**
     * Upload a featured image.
     *
     * @author Mohamed Said <themsaid@gmail.com>
     */
    export default {
        props: {
            post: {
                type: String,
                required: true
            },
            url: {
                type: String,
                required: false
            },
            caption: {
                type: String,
                default: ''
            },
            unsplash: {
                type: String,
                required: false
            },
            path: {
                type: String,
                required: true
            },
        },

        data() {
            return {
                imageUrl: '',
                imageCaption: '',
                uploading: false,
                trans: i18n
            }
        },

        mounted() {
            this.imageUrl = this.url;
            this.imageCaption = this.caption;
        },

        methods: {
            // Save the image
            saveImage() {
                this.$emit('changed', {url: this.imageUrl, caption: this.imageCaption});

                this.close();
            },

            // Close the modal
            close() {
                this.modalShown = false;
            },

            // Update the selected image
            updateImage({url, caption}) {
                this.imageUrl = url;
                this.imageCaption = caption;

                this.uploading = false;
            },
        }
    }
</script>
