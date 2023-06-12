@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit level</h6>
        </div>
        <div class="card-body">
            <form action="{{route('edit-level',['id' => $level->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$level->name}}" required name="name" placeholder="name">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$level->question_num}}" required name="question_num" placeholder="question_num">
                    @error('question_num')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <input type="hidden" name="game" value="{{$gmId}}">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection



