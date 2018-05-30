@extends('layouts.app')

@section('content')
    <body>
    <div class="container">
        <div class="content">
            <div class="title">
                <div>
                    <h3> {{$articleData->title}}</h3><br>
                    <h5>{{$articleData->content}}</h5> <br>
                    <p style="text-align: right">{{$articleData->user->name}}</p>
                    <p style="text-align: right">{{$articleData->created_at}}</p>
                </div>
            </div>
            @if(session()->has('result'))
                <div class="alert alert-danger">{{(session()->get('result'))}} </div>
            @endif
            @if(auth()->check())
                <div style="text-align: center">
                    <a href="/article/edit/{{$articleData->id}}">
                        <button>Edit</button>
                    </a>
                </div>
                <div style="text-align: right">
                    {{Form::open(['route'=>['delete',$articleData->id],'method' => 'DELETE'])}}
                    <input type="submit" name="submit-delete" value="Delete">
                    {{Form::close()}}
                </div>

            @endif
        </div>
    </div>
    </body>
@endsection
