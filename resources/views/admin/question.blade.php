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
                    <h4 class="m-0 font-weight-bold text-primary my-auto py-auto">Question - <a href="{{route('admin-level',['id'=>$level->game_id])}}">{{$level->name}}</a></h4>
                    <a  href="{{route('add.question',['id' => $level_id])}}" class="btn btn-success font-weight-bold"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Text</th>
                        <th>Answer</th>
                        <th>Photo</th>
                        <th>Position</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Text</th>
                        <th>Answer</th>
                        <th>Photo</th>
                        <th>Position</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$question->id}}</td>
                            <td>{{$question->text}}</td>
                            <td>{{$question->answer}}</td>
                            @if($question->photo == "null")
                                <td>{{$question->photo}}</td>
                            @endif
                            @if($question->photo != "null")
                                <td><img src="{{asset('template/img/blog/' . $question->photo)}}" width="100" alt=""></td>
                            @endif
                            <th>{{$question->position}}</th>
                            <td>{{$question->created_at}}</td>
                            <td>
                                <a href="{{route('question.edit',['id' => $question->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('question.delete',['id' => $question->id])}}" class="btn btn-denger"><i class="fa fa-trash"></i></a>
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
    <!-- Page question plugins -->
    <script src="{{asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page question custom scripts -->
    <script src="{{asset('back/js/demo/datatables-demo.js')}}"></script>

@endsection

