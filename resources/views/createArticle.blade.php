@extends('layouts.app')

@section('content')
    <body>
    <div class="container">
        <div class="content">
            <div class="title">
                @if(session()->has('result'))
                    <div class="alert alert-success">{{(session()->get('result'))}} </div>
                @endif
                <form action="{{route('create')}}" method="post">
                    <input type="text" name="title" placeholder="Title"> <br> <br>
                    <textarea name="content" rows="2" cols="50"></textarea> <br>
                    <button name="subject" type="submit" value="fav_HTML">Publish</button>
                </form>

            </div>
        </div>
    </div>
    </body>
@endsection
