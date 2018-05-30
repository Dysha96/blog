@extends('layouts.app')

@section('content')
    <body>
    <div class="container">
        <div class="content">
            <div class="title">@foreach($articleData as $data)
                    <div>
                       <h3> <a href="article/{{$data->id}}">{{$data->title}}</a> </h3><br>
                       <h5>{{$data->content}}</h5> <br>
                        <p style="text-align: right">{{$data->user->name}}</p>
                        <p style="text-align: right">{{$data->created_at}}</p>
                    </div>
                    <hr>
                @endforeach</div>
        </div>
    </div>
    </body>
@endsection
