@extends('layouts.app')
<style type="text/css">
 </style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Question # {{$next_q}}</h3>
                <form action="{{route('store_answer', $question->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{$get_quiz->id}}">
                    <input type="hidden" name="question_id" value="{{$question->id}}">
                    <input type="hidden" name="next_q" value="{{($get_quiz-> no_question == $next_q) ? 0 : $next_q}}">
                    <div class="card">
                        <h5 class="card-header">{{ $question->question }}</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="user_answer" id="option_1" value="1">

                                                <label class="form-check-label text-dark" for="option_1">
                                                    {{ $question->option_1 }}
                                                </label>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="col-md-6">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="user_answer" id="option_2" value="2">
                                                <label class="form-check-label text-dark" for="option_2">
                                                    {{ $question->option_2 }}
                                                </label>
                                                
                                            </div>
                                        </li>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="user_answer" id="option_3" value="3">
                                                <label class="form-check-label text-dark" for="option_3">
                                                    {{ $question->option_3 }}
                                                </label>
                                                
                                            </div>
                                        </li>
                                    </div>
                                    <div class="col-md-6">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="user_answer" id="option_4" value="4">
                                                <label class="form-check-label text-dark" for="option_4">
                                                    {{ $question->option_4 }}
                                                </label>
                                                
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm float-right">
                                {{$next_q == $get_quiz->no_question
                                ? 'Submit'
                                : 'Next'
                                }}

                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
