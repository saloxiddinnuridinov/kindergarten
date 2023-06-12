@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Send Children</h6>
        </div>
        <div class="card-body">
            <form action="{{route('send', ['id' => $user->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Ismi</label>
                    <input type="text" class="form-control" value="{{$user->name}}" required name="name">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Guruhi</label>
                    <input type="text" class="form-control"
                           value="{{\App\Models\Category::find($user->category_id)->name}}" name="category_id">
                    @error('category_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ota-onasi</label>
                    <input type="text" class="form-control" value="{{\App\Models\ChildrenParent::find($user->parent_id)->name}}"
                           required name="parent_id">
                    @error('parent_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Keldi-Ketti</label>
                    <select name="xabar" id="" class="form-control">
                        <option value="ketdi">Ketdi</option>
                        <option value="keldi">Keldi</option>
                        <option value="kelmadi">Kelmadi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kim olib keldi | ketdi?</label>
                    <input type="text" class="form-control"  name="near">
                </div>
                <input type="hidden" name="userId" value="{{$user->id}}">
                <input type="hidden" name="parentId" value="{{\App\Models\ChildrenParent::find($user->parent_id)->id}}">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
