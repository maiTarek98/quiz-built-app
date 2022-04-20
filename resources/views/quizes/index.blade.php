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
                <div class="card-header">{{ __('All Quizes') }}</div>

                <div class="card-body">
                    <table>
                        <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>No of Question</th>
                        <th>Quiz Questions</th>
                        <th>Edit</th>
                    </tr>
                        <tbody>
                            @foreach($quizes as $key => $quiz)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$quiz->title}}</td>
                                <td>{{$quiz->no_question}}</td>
                                <td><a href="{{url('/quizes/'. $quiz->id)}}" class="btn btn-primary"> {{ __('questions') }}</a></td>
                                <td><a href="{{url('/quizes/'. $quiz->id.'/edit')}}" class="btn btn-warning"> {{ __('edit') }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $quizes->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
