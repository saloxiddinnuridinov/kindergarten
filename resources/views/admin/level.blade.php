@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="py-3">
                <div class="justify-content-between row mx-2">
                    <h4 class="m-0 font-weight-bold text-primary my-auto py-auto">{{$game->subject}}</h4>
                    <a  href="{{route('add.level',['id' => $game->id])}}" class="btn btn-success font-weight-bold"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Question_number</th>
                        <th>Position</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Question_number</th>
                        <th>Position</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($levels as $level)
                    <tr>
                        <td>{{$level->id}}</td>
                        <td><a href="{{route('admin.question.by',['id' => $level->id])}}"> {{$level->name}}</a></td>
                        <td>{{$level->question_num}}</td>
                        <td>{{$level->position}}</td>
                        <td>{{$level->created_at}}</td>
                        <td>{{$level->updated_at}}</td>
                        <td>
                            <a href="{{route('level.edit',['id' => $level->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <a href="{{route('level.delete', ['id' => $level->id])}}" class="btn btn-denger"><i class="fa fa-trash"></i></a>
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
    <!-- Page level plugins -->
    <script src="{{asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('back/js/demo/datatables-demo.js')}}"></script>

@endsection

