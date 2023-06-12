@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Ismi</th>
                        <th>Yoshi</th>
                        <th>guruhi</th>
                        <th>Ota-onasi</th>
                        <th>kelgan kuni</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->category_id}}</td>
                            <td>{{$user->parent_id}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('user.delete',['id' => $user->id])}}" class="btn btn-info"><i class="fa fa-trash"></i></a>
                                <a href="{{route('user.send',['id' => $user->id])}}" class="btn btn-info"><i class="fa fa-envelope"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer_asset')
    <!-- Page user plugins -->
    <script src="{{asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page user custom scripts -->
    <script src="{{asset('back/js/demo/datatables-demo.js')}}"></script>

@endsection

