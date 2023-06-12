@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Game</h6>
        </div>
        <div class="card-body">
            <form action="{{route('edit-game', ['id' => $game->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$game->subject}}" required name="subject" placeholder="subject">
                    @error('subject')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <input type="hidden" name="gameId" value="{{$game->id}}">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Edit Game</button>
                </div>
            </form>
        </div>
    </div>
@endsection


