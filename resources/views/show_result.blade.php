@extends('layouts.app')
<style type="text/css">
    .test_result_fail{
        font-weight: bolder;
        color: red;
    }
    .test_result_pass{
        font-weight: bolder;
        color: green;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="offset-3 col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Your Result ') }}</div>

                <div class="card-body">
                    <ul>
                        <li><strong>{{ __('Your Name ') }} : </strong>{{Auth::user()->name}}</li>
                        <li><strong>{{ __('Your Email ') }} : </strong>{{Auth::user()->email}}</li>
                        <li><strong>{{ __('Test Name ') }} : </strong> {{ $get_quiz->title }}</li>
                        <li><strong>{{ __('Number Of Correct Answers ') }} : </strong> {{ $correct_answers }}</li>
                        <li><strong>{{ __('Result in Percentage ') }} : </strong> {{ $findPercentage }}</li>
                        <li><strong>{{ __('Result ') }} : </strong>
                            @if($result == 'Fail')
                            <span class="test_result_fail">{{ $result }}</span> </li>
                            @elseif($result == 'Pass')
                            <span class="test_result_pass">{{ $result }}</span> </li>
                            @endif
                    </ul>
                </div>
                <div class="card-footer">
                    <p>{{ __('Thank you for your participation') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
