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
                    @guest
                    <a href="{{ route('quiz_no', $value->id) }}" class="btn btn-primary">{{ __('Take Quiz !') }}</a>
                    @endguest
                    @auth
                        @if(! App\Models\UserQuiz::where('user_id', Auth::user()->id)->where('quiz_id', $value->id)->first())
                        <a href="{{ route('quiz_no', $value->id) }}" class="btn btn-primary">{{ __('Take Quiz !') }}</a>
                        @else
                        <a href="{{ route('show_result', $value->id) }}" class="btn btn-success">{{ __('Show Result !') }}</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
        {!! $get_quizes->render() !!}
    </div>
</div>
@endsection
