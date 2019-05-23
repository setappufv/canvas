<template>
    <div v-cloak>
        <div style="position: relative">
            <div id="sidebar-controls" style="margin-top: -8px">
                <button id="show-controls" type="button" class="btn btn-outline-light btn-circle border"
                        @click="showSideControls" v-on:submit.prevent="onSubmit">
                    <i class="fas fa-plus fa-fw text-muted"></i>
                </button>

                <div class="controls pl-3 bg-white d-none">
                    <button class="btn btn-outline-light btn-circle border mr-1" type="button"
                            @click="openImageUploader()"
                            data-toggle="modal" data-target="#image-upload">
                        <i class="far fa-fw fa-image text-muted"></i>
                    </button>
                    <button class="btn btn-outline-light btn-circle border mr-1" type="button"
                            @click="$emit('openingHTMLEmbedder')" v-on:submit.prevent="onSubmit"
                            data-toggle="modal" data-target="#embed-html">
                        <i class="fas fa-fw fa-code text-muted"></i>
                    </button>
                    <button class="btn btn-outline-light btn-circle border mr-2" type="button"
                            @click="addDivider" v-on:submit.prevent="onSubmit">
                        <i class="fas fa-fw fa-ellipsis-h text-muted"></i>
                    </button>
                </div>
            </div>

            <div ref="editor"></div>
            <input type="hidden" name="body" ref="body"/>

            <image-uploader
                    @updated="applyImage"
                    :unsplash="this.unsplash"
                    :path="this.path">
            </image-uploader>
            <html-embedder
                    @adding="addHTML">
            </html-embedder>
        </div>
    </div>
</template>

<script>
    import Quill from 'quill'
    import Parchment from 'parchment'
    import HTMLBlot from './HTMLBlot'
    import ImageBlot from './ImageBlot'
    import DividerBlot from './DividerBlot'
    import HTMLEmbedder from './HTMLEmbedder'
    import ImageUploader from './ImageUploader'

    /**
     * Create an instance of the QuillJS editor.
     *
     * @author Mohamed Said <themsaid@gmail.com>
     */
    export default {
        components: {
            'html-embedder': HTMLEmbedder,
            'image-uploader': ImageUploader
        },

        props: {
            unsplash: {
                type: String,
                default: ''
            },
            path: {
                type: String,
                required: true
            },
            value: {
                type: String,
                default: ''
            }
        },

        data() {
            return {
                editor: null,
                editorBody: this.value,
                trans: i18n
            }
        },

        mounted() {
            this.editor = this.createEditor();
            this.handleEditorValue();
            this.handleClicksInsideEditor();
            this.initSideControls();
        },

        methods: {
            // Create the editor
            createEditor() {
                Quill.register(ImageBlot, true);
                Quill.register(DividerBlot, true);
                Quill.register(HTMLBlot, true);

                const icons = Quill.import('ui/icons');
                icons.header[3] = require('!html-loader!quill/assets/icons/header-3.svg');

                let quill = new Quill(this.$refs.editor, {
                    modules: {
                        syntax: true,
                        toolbar: [
                            ['bold', 'italic', 'code', 'link'],
                            [{'header': '2'}, {'header': '3'}],
                            ['blockquote', 'code-block'],
                        ]
                    },
                    theme: 'bubble',
                    scrollingContainer: 'html, body',
                    placeholder: this.trans.posts.forms.editor.body
                });

                /**
                 * Temporary workaround for customizing the link tooltip.
                 *
                 * @link https://github.com/quilljs/quill/issues/1107#issuecomment-259938173
                 */
                let tooltip = quill.theme.tooltip;
                let input = tooltip.root.querySelector("input[data-link]");
                input.dataset.link = this.trans.posts.forms.editor.link;

                return quill;
            },

            // Handle the editor value
            handleEditorValue() {
                this.editor.root.innerHTML = this.value;

                this.editor.on('text-change', () => {
                    let body = this.editor.getText() ? this.editor.root.innerHTML : '';
                    this.$refs['body'].value = body;
                    this.$emit('input', body);
                });
            },

            // Handle click events inside the editor
            handleClicksInsideEditor() {
                this.editor.root.addEventListener('click', (ev) => {
                    let blot = Parchment.find(ev.target, true);

                    if (blot instanceof ImageBlot) {
                        let values = blot.value(blot.domNode)['captioned-image'];

                        values.existingBlot = blot;

                        this.openImageUploader(values);
                    }
                });
            },

            // Initialize the side controls
            initSideControls() {
                let Block = Quill.import('blots/block');

                this.editor.on(Quill.events.EDITOR_CHANGE, (eventType, range) => {
                    let sidebarControls = document.getElementById('sidebar-controls');

                    if (eventType !== Quill.events.SELECTION_CHANGE) return;

                    if (range == null) return;

                    if (range.length === 0) {
                        let [block, offset] = this.editor.scroll.descendant(Block, range.index);

                        if (block != null && block.domNode.firstChild instanceof HTMLBRElement) {
                            let lineBounds = this.editor.getBounds(range);

                            sidebarControls.classList.remove('active');

                            sidebarControls.style.display = 'block';

                            sidebarControls.style.left = (lineBounds.left - 50) + 'px';
                            sidebarControls.style.top = (lineBounds.top - 2) + 'px';
                        } else {
                            sidebarControls.style.display = 'none';

                            sidebarControls.classList.remove('active');
                        }
                    } else {
                        sidebarControls.style.display = 'none';

                        sidebarControls.classList.remove('active');
                    }
                });
            },

            // Show the side controls
            showSideControls() {
                document.getElementById('sidebar-controls').classList.toggle('active');

                this.editor.focus();
            },

            // Open the image upload modal
            openImageUploader(data = null) {
                this.$emit('openingImageUploader', data);
            },

            // Add a new captioned image to the content
            applyImage({url, caption, existingBlot, layout}) {
                let values = {
                    url: url,
                    caption: caption,
                    layout: layout,
                };

                if (existingBlot) {
                    return existingBlot.replaceWith('captioned-image', values);
                }

                let range = this.editor.getSelection(true);

                this.editor.insertEmbed(range.index, 'captioned-image', values, Quill.sources.USER);

                this.editor.setSelection(range.index + 1, Quill.sources.SILENT);
            },

            // Add a divider to the content
            addDivider() {
                let range = this.editor.getSelection(true);

                this.editor.insertText(range.index, '\n', Quill.sources.USER);
                this.editor.insertEmbed(range.index + 1, 'divider', true, Quill.sources.USER);
                this.editor.setSelection(range.index + 2, Quill.sources.SILENT);
            },

            // Add a new HTML blot to the content
            addHTML({content}) {
                let range = this.editor.getSelection(true);

                this.editor.insertEmbed(range.index, 'html', {
                    content: content,
                }, Quill.sources.USER);

                this.editor.setSelection(range.index + 1, Quill.sources.SILENT);
            },
        }
    }
</script>

<style>
    @import "~quill/dist/quill.bubble.css";

    .ql-container {
        box-sizing: border-box;
        font-family: "Merriweather", serif;
        height: 100%;
        margin: 0;
        position: relative;
    }

    .ql-editor {
        font-family: "Merriweather", serif;
        font-weight: 300;
        color: hsla(0, 0%, 0%, 0.9);
        font-size: 1.1rem;
        line-height: 1.9;
        padding: 0;
        overflow-y: visible;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .ql-editor p,
    .ql-editor ul,
    .ql-editor ol,
    .ql-editor h1,
    .ql-editor h2,
    .ql-editor h3,
    .ql-editor blockquote,
    .ql-editor pre {
        min-width: 100%;
    }

    .ql-editor h2 {
        margin-top: 0 !important;
        margin-bottom: 33px !important;
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 2.6rem;
    }

    .ql-editor h3 {
        margin-bottom: 33px !important;
        font-size: 17px !important;
        font-weight: bold;
        line-height: 2.6rem;
    }

    .ql-editor p,
    .ql-editor ol,
    .ql-editor ul,
    .ql-editor pre,
    .ql-editor blockquote {
        margin-bottom: 33px !important;
    }

    .ql-editor blockquote {
        font-style: italic !important;
    }

    .ql-bubble .ql-editor pre.ql-syntax {
        background-color: rgba(0, 0, 0, 0.05);
        border: none;
        color: #000;
        overflow-x: auto;
        padding: 1em;
    }

    .ql-editor h1,
    .ql-editor h2 {
        margin-top: 56px;
        margin-bottom: 15px;
    }

    .ql-editor ol,
    .ql-editor ul {
        padding-left: 0;
    }

    .ql-editor ol li,
    .ql-editor ul li {
        margin-bottom: 20px;
    }

    .ql-editor.ql-blank::before {
        left: 0;
        font-style: normal;
    }

    .ql-bubble .ql-editor a {
        color: #3490dc;
        text-decoration: none !important;
    }

    .ql-container hr {
        margin-top: 0;
        border: none;
        color: #111;
        letter-spacing: 1em;
        text-align: center;
    }

    .ql-container hr:before {
        content: '...';
    }

    .btn-circle {
        width: 40px;
        height: 40px;
        padding: 6px 0;
        border-radius: 9999px;
        text-align: center;
        line-height: 1.42857;
    }

    #sidebar-controls {
        display: none;
        position: absolute;
        z-index: 10;
        left: -60px !important;
    }

    #sidebar-controls button:focus {
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
        outline: none !important;
    }

    #sidebar-controls.active .controls {
        display: inline-block !important;
    }

    .embedded_image {
        margin-bottom: 33px !important;
        cursor: default;
    }

    .embedded_image[data-layout="wide"] img {
        max-width: 1024px;
    }

    .embedded_image img {
        max-width: 100%;
        height: auto;
        margin: 0 auto;
        display: block;
    }

    .embedded_image:hover img {
        cursor: pointer !important;
        box-shadow: 0 0 0 3px #3490dc !important;
    }

    div.embedded_image[data-laout="wide"] {
        width: 100vw !important;
        position: relative !important;
        left: 50% !important;
        margin-left: -50vw !important;
    }

    .embedded_image p {
        margin-bottom: 0 !important;
        color: #6c757d;
        padding-top: 1rem;
        font-size: 0.9rem;
        line-height: 1.6;
        font-weight: 400;
        text-align: center;
        font-family: "Nunito", sans-serif;
    }

    @media screen and (max-width: 1024px) {
        .embedded_image[data-layout="wide"] img {
            max-width: 100%
        }
    }

    @media (max-width: 767px) {
        #sidebar-controls {
            display: none !important;
        }
    }
</style>
