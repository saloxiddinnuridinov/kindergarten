@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Question</h6>
        </div>
        <div class="card-body">
            <form action="{{route('edit-question', ['id' => $question->id])}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <textarea name="text" id="" required placeholder="text" cols="30" rows="10" class="form-control">{{$question->text}}</textarea>
                    @error('text')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" value="{{$question->answer}}" required name="answer" placeholder="Answer">
                    @error('answer')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <input type="hidden" name="level" value="{{$qlId}}">
                <div class="form-group">
                </div>
                <div class="form-group">
                    <img src="{{asset('template/img/blog/' . $question->photo)}}" width="250" alt="">
                </div>
                <input type="hidden" name="questionId" value="{{$question->id}}">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Edit Question</button>
                </div>
            </form>
        </div>
    </div>
@endsection


