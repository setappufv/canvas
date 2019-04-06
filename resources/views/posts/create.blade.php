@extends('canvas::index')

@section('context', 'Draft')

@section('actions')
    <a href="#" class="btn btn-sm btn-outline-primary my-auto" data-toggle="modal" data-target="#modal-publish">@lang('posts.create.save_publish')</a>
    <div class="dropdown">
        <a id="navbarDropdown" class="nav-link px-3 text-secondary" href="#" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fas fa-sliders-h fa-fw fa-rotate-270"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-settings">General settings</a>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-image">Featured image</a>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-seo">SEO & Social</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('canvas::components.forms.post.create')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if ($errors->has('slug'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#modal-settings').modal('show');
            });
        </script>
    @endif
@endpush