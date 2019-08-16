<form role="form" id="form-edit" method="POST" action="{{ route('canvas.post.update', $data['post']->id) }}"
      enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ method_field('PUT') }}

    <div class="form-group row my-3">
        <div class="col-lg-12">
            <textarea name="title" class="form-control-lg form-control border-0 pl-0 serif" rows="1"
                      placeholder="{{ __('canvas::posts.forms.editor.title') }}" style="font-size: 42px; resize: none;">{{ $data['post']->title }}</textarea>
        </div>
    </div>

    <editor value="{{ $data['post']->body }}"
            :unsplash="'{{ config('canvas.unsplash.access_key') }}'"
            :path="'{{ config('canvas.path') }}'">
    </editor>

    @include('canvas::components.modals.post.edit.settings')
    @include('canvas::components.modals.post.edit.publish')
    @include('canvas::components.modals.post.edit.image')
    @include('canvas::components.modals.post.edit.seo')
</form>
