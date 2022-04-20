@extends('layouts.app')
<style type="text/css">
    table, th,td{
            border: 1px solid #d1d1d1;
    }
    table{
        width: 100%;
    text-align: center;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adding Questions') }}</div>

                <div class="card-body">
                @if($totalQustions <= $quiz->no_question)
                    <h1>Question # {{$totalQustions}}</h1>
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">

                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">{{ __('question of quiz') }}</label>

                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="option_1" class="col-md-4 col-form-label text-md-end">{{ __('option_1 in quiz') }}</label>

                            <div class="col-md-6">
                                <input id="option_1" type="text" class="form-control @error('option_1') is-invalid @enderror" name="option_1" value="{{ old('option_1') }}" required autocomplete="option_1" autofocus>

                                @error('option_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="option_2" class="col-md-4 col-form-label text-md-end">{{ __('mark per question') }}</label>

                            <div class="col-md-6">
                                <input id="option_2" type="text" class="form-control @error('option_2') is-invalid @enderror" name="option_2" value="{{ old('option_2') }}" required autocomplete="current-option_2">

                                @error('option_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="option_3" class="col-md-4 col-form-label text-md-end">{{ __('passing score in quiz') }}</label>

                            <div class="col-md-6">
                                <input id="option_3" type="text" class="form-control @error('option_3') is-invalid @enderror" name="option_3" value="{{ old('option_3') }}" required autocomplete="option_3" autofocus>

                                @error('option_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="option_4" class="col-md-4 col-form-label text-md-end">{{ __('option_4 of quiz') }}</label>

                            <div class="col-md-6">
                                <input id="option_4" type="text" class="form-control @error('option_4') is-invalid @enderror" name="option_4" required autocomplete="current-option_4">

                                @error('option_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="correct_option" class="col-md-4 col-form-label text-md-end">{{ __('correct_option of quiz') }}</label>

                            <div class="col-md-6"> 
                                <select id="correct_option" class="form-control @error('correct_option') is-invalid @enderror" name="correct_option">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select>

                                @error('correct_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ $totalQustions == $quiz->no_question
                                    ? 'Publish Quiz'
                                    : 'Next' }}
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                @php 
                    $questions= \App\Models\Question::where('quiz_id', $quiz->id)->paginate(10);
                @endphp
                    <strong>Quiz Questions is Completed</strong>
                    <table>
                        <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>Correct Option</th>
                    </tr>
                        <tbody>
                            @foreach($questions as $key => $qustion)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$qustion->question}}</td>
                                <td>{{$qustion->option_1}}</td>
                                <td>{{$qustion->option_2}}</td>
                                <td>{{$qustion->option_3}}</td>
                                <td>{{$qustion->option_4}}</td>
                                <td>{{$qustion->correct_option}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $questions->render() !!}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
