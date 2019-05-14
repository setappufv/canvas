@extends('canvas::layouts.app')

@section('actions')
    <a href="{{ route('canvas.index') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        {{ __('canvas::buttons.stats.index') }}
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5 class="text-muted small text-uppercase font-weight-bold mt-2">
                    {{ __('canvas::stats.details.published') }} {{ \Carbon\Carbon::parse($data['post']->published_at)->format('F d, Y') }}
                </h5>
                <h1 class="mb-4">{{ $data['post']->title }}</h1>

                <line-chart :views="{{ $data['views'] }}"></line-chart>
            </div>

            <div class="col-md-5 mt-4">
                <h5 class="text-muted small text-uppercase font-weight-bold">
                    {{ __('canvas::stats.details.views') }}
                </h5>

                @if($data['traffic'])
                    @foreach($data['traffic'] as $host => $views)
                        <div class="d-flex @if($loop->first) border-top @endif py-2 align-items-center">
                            <div class="mr-auto">
                                <p class="mb-0 py-1">
                                    @unless($host == __('canvas::stats.details.referer.other'))
                                        <img src="{{ sprintf('%s%s', 'https://favicons.githubusercontent.com/', $host) }}"
                                             alt="{{ $host }}" style="width: 15px; height: 15px;" class="mr-1">
                                        <a href="http://{{ $host }}" target="_blank">{{ $host }}</a>
                                    @else
                                        <img src="{{ sprintf('%s%s', 'https://favicons.githubusercontent.com/', $host) }}"
                                             alt="{{ $host }}" style="width: 15px; height: 15px;" class="mr-1">
                                        <a data-toggle="tooltip" data-placement="right"
                                                       style="cursor: pointer"
                                                       title="{{ __('canvas::stats.details.referer.unknown') }}">
                                            {{ $host }} <i class="far fa-fw fa-question-circle text-muted"></i>
                                        </a>
                                    @endunless
                                </p>
                            </div>
                            <div class="ml-auto">
                                <span class="text-muted">{{ \Canvas\SuffixedNumber::format($views) }} {{ __('canvas::stats.views') }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="py-4 border-top"><em>{{ __('canvas::stats.details.empty') }}</em>
                    </p>
                @endif
            </div>

            <div class="col-md-5 mt-4">
                <h5 class="text-muted small text-uppercase font-weight-bold">
                    {{ __('canvas::stats.details.reading.header') }}
                </h5>

                @if($data['popular_reading_times'])
                    @foreach($data['popular_reading_times'] as $range => $percentage)
                        <div class="d-flex py-2 @if($loop->first) border-top @endif align-items-center">
                            <div class="mr-auto">
                                <p class="mb-0 py-1">
                                    {{ $range }}
                                </p>
                            </div>
                            <div class="ml-auto">
                                <span class="text-muted">{{ sprintf('%s%%', $percentage) }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="py-4 border-top">
                        <em>{{ __('canvas::stats.details.empty') }}</em>
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
