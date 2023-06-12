@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Question</h6>
        </div>
        <div class="card-body">
            <form action="{{route('add-question')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea name="text" id="" required placeholder="Text" rows="5" class="form-control"></textarea>
                    @error('text')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" required name="answer" placeholder="Answer">
                    @error('answer')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" name="photo"  class="form-control">
                    @error('photo')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <input type="hidden" name="level" value="{{$level->id}}">

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add Question</button>
                </div>
            </form>
        </div>
    </div>
@endsection


