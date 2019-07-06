@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> <!-- viewから渡ってきた$drillsを渡している-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Practice').'「'.$drill->title.'」' }}</div>
                <div class="card-body text-center">
                    <p>{{ $drill->problem0 }}</p>
                    <p>{{ $drill->problem1 }}</p>
                    <p>{{ $drill->problem2 }}</p>
                    <div id="app">
                        <example-component
                        title="{{ __('Practice').'「'.$drill->title.'」' }}"  :drill="{{$drill}}">
                        </example-component>
                    </div>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</div>
@endsection