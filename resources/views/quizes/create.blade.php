@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adding New Quiz') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('quizes.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('title of quiz') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_question" class="col-md-4 col-form-label text-md-end">{{ __('no_question in quiz') }}</label>

                            <div class="col-md-6">
                                <input id="no_question" type="text" class="form-control @error('no_question') is-invalid @enderror" name="no_question" value="{{ old('no_question') }}" required autocomplete="no_question" autofocus>

                                @error('no_question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="score_question" class="col-md-4 col-form-label text-md-end">{{ __('mark per question') }}</label>

                            <div class="col-md-6">
                                <input id="score_question" type="text" class="form-control @error('score_question') is-invalid @enderror" name="score_question" value="{{ old('score_question') }}" required autocomplete="current-score_question">

                                @error('score_question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="passing_score" class="col-md-4 col-form-label text-md-end">{{ __('passing score in quiz') }}</label>

                            <div class="col-md-6">
                                <input id="passing_score" type="text" class="form-control @error('passing_score') is-invalid @enderror" name="passing_score" value="{{ old('passing_score') }}" required autocomplete="passing_score" autofocus>

                                @error('passing_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description of quiz') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="current-description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('status of quiz') }}</label>

                            <div class="col-md-6"> 
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="show">Show</option>
                                    <option value="hide">Hide</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
