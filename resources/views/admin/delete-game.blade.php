@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{route("delete_g",['id' => $game->id])}}" method="POST">
        @csrf
        <div class="card">
            <h5 class="card-header">{{$game->subject}}</h5>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <button type="submit" class="btn btn-danger">Ha</button>
                <a href="{{route("admin.game",['id' => $game->id])}}" class="btn btn-secondary">Yo'q</a>
            </div>
        </div>
    </form>

@endsection

@section('footer_asset')
    <!-- Page level plugins -->
    <script src="{{asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('back/js/demo/datatables-demo.js')}}"></script>

@endsection

