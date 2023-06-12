@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Children</h6>
        </div>
        <div class="card-body">
            <form action="{{route('edit-user', ['id' => $user->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$user->name}}" required name="name">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$user->age}}" required name="age">
                    @error('age')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$user->category_id}}" name="category_id">
                    @error('category_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$user->parent_id}}" required name="number">
                    @error('parent_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <input type="hidden" name="userId" value="{{$user->id}}">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection



