@extends('layouts.app')

@section('content')
    <body>
    <div class="container">
        <div class="content">
            <div class="title">
                @if(session()->has('result'))
                    <div class="alert alert-success">{{(session()->get('result'))}} </div>
                @endif
                {{Form::open(['route'=>['edit',$id],'method' => 'PUT'])}}
                <input type="text" name="title" value="{{$articleData->title}}">
                <input type="text" name="content" value="{{$articleData->content}}">
                <button name="subject" type="submit" value="">Edit</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
    </body>
@endsection
