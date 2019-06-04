@extends('canvas::layouts.app')

@section('actions')
    <a href="{{ route('canvas.post.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        {{ __('canvas::buttons.posts.create') }}
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mt-2">{{ __('canvas::stats.header') }}</h1>

                @if($data['posts']['all']->isNotEmpty())
                    <p class="mt-3 mb-4">{{ __('canvas::stats.subtext') }}</p>

                    <div class="card-deck mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted small text-uppercase font-weight-bold">{{ __('canvas::stats.cards.views.title') }}</h5>
                                <p class="card-text display-4">{{ \Canvas\SuffixedNumber::format($data['views']['count']) }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted small text-uppercase font-weight-bold">{{ __('canvas::stats.cards.posts.title') }}</h5>
                                <p class="card-text display-4">{{ $data['posts']['published_count'] + $data['posts']['drafts_count'] }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted small text-uppercase font-weight-bold">{{ __('canvas::stats.cards.publishing.title') }}</h5>
                                <ul>
                                    <li>{{ $data['posts']['published_count'] }} {{ __('canvas::stats.cards.publishing.details.published') }}</li>
                                    <li>{{ $data['posts']['drafts_count'] }} {{ __('canvas::stats.cards.publishing.details.drafts') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <line-chart :views="{{ $data['views']['trend'] }}"></line-chart>

                    <post-list :models="{{ $data['posts']['all'] }}" inline-template>
                        <div class="mt-4">
                            <div v-cloak>
                                <div class="d-flex border-top py-3 align-items-center" v-for="post in filteredList">
                                    <div class="mr-auto">
                                        <p class="mb-1 mt-2">
                                            <a :href="'/' + '{{ config('canvas.path') }}' + '/stats/' + post.id" class="font-weight-bold lead">@{{ post.title }}</a>
                                        </p>
                                        <p class="text-muted mb-2">
                                            @{{ post.read_time }} ―
                                            <a :href="'/' + '{{ config('canvas.path') }}' + '/posts/' + post.id + '/edit'">{{ __('canvas::buttons.posts.edit') }}</a> ―
                                            <a :href="'/' + '{{ config('canvas.path') }}' + '/stats/' + post.id">{{ __('canvas::buttons.stats.show') }}</a>
                                        </p>
                                    </div>
                                    <div class="ml-auto d-none d-lg-block">
                                        <span class="text-muted mr-3">@{{ suffixedNumber(post.views_count) }} {{ __('canvas::stats.views') }}</span>
                                        {{ __('canvas::stats.details.created') }} @{{ moment(post.created_at).fromNow() }}
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <a href="#!" class="btn btn-link" @click="limit += 7" v-if="load">{{ __('canvas::buttons.general.load') }} <i class="fa fa-fw fa-angle-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </post-list>
                @else
                    <p class="mt-4">{{ __('canvas::stats.empty') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
