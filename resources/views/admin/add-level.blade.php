@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Level</h6>
        </div>
        <div class="card-body">
            <form action="{{route('add-level')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" required name="name" placeholder="Name">
                    @error('Name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" required name="question_num" placeholder="question_num">
                    @error('question_num')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <input type="hidden" name="game" value="{{$game->id}}" >
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection


