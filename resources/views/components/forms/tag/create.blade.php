<form role="form" id="form-create" method="POST" action="{{ route('canvas.tag.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" hidden value="{{ $tag_id }}">

    <slug-component inline-template>
        <div v-cloak>
            <div class="form-group row my-5">
                <div class="col-lg-12">
                    <input type="text" name="name" v-model="name" title="Name"
                           class="form-control-lg form-control border-0 px-0"
                           value="{{ old('name') }}" required placeholder="{{ __('canvas::tags.forms.placeholder') }}">
                    @if ($errors->has('slug'))
                        <div class="invalid-feedback d-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <p class="lead text-muted" style="cursor: default"><span class="text-primary">@{{ slug }}</span></p>
                    <input type="hidden" name="slug" v-model="slug" readonly>
                </div>
            </div>
        </div>
    </slug-component>
</form>
