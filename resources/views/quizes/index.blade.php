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
                <div class="card-header">{{ __('All Quizes') }}
                    <a href="{{url('quizes/create')}}" class="ml-auto btn btn-primary">{{ __('Add New Quiz') }}</a>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-error">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="card-body">
                    @isset($quizes)
                    <table>
                        <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>No of Question</th>
                        <th>Quiz Questions</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                        <tbody>
                            @foreach($quizes as $key => $quiz)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$quiz->title}}</td>
                                <td>{{$quiz->no_question}}</td>
                                <td><a href="{{url('/quizes/'. $quiz->id)}}" class="btn btn-primary"> {{ __('questions') }}</a></td>
                                <td><a href="{{url('/quizes/'. $quiz->id.'/edit')}}" class="btn btn-warning"> {{ __('edit') }}</a></td>
                                
                                <form method="post" action="{{route('quizes.destroy', $quiz->id)}}">
                                   
                                    @method('DELETE')
                                     @csrf
                                   <td> <button type="submit" class="btn btn-danger"> {{ __('delete') }}</button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $quizes->render() !!}
                    @endisset

                    @empty($quizes)
                        <p>{{__('There is no quizes added ')}}</p>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
