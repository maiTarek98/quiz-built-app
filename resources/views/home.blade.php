@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($get_quizes as $value)
        <div class="col-md-6" style="    margin-bottom: 20px;">
            <div class="card">
                <div class="card-header">{{ $value->title }}</div>

                <div class="card-body">
                    <p>
                    <strong>{{ __('no question') }} : </strong><span>{{$value->no_question}}</span></p>
                    <p>
                    <strong>{{ __('passing score') }} : </strong><span>{{$value->passing_score}}</span></p>
                </div>
                <div class="card-footer">
                    <a href="">{{ __('Take Quiz !') }}</a>
                </div>
            </div>
        </div>
        @endforeach
        {!! $get_quizes->render() !!}
    </div>
</div>
@endsection
