@extends('admin.admin-master')

@section('content')
    @if(session()->has('message'))
        <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bola qo'shish</h6>
        </div>
        <div class="card-body">
            <form action="{{route('add-user')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Ismini kiriting:</label>
                    <input type="text" class="form-control" required name="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <label>Yoshini kiriting:</label>
                    <input type="number" class="form-control" required name="age" placeholder="age">
                </div>

                <div class="form-group">
                    <label>Gurugini tanlang:</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories = \App\Models\Category::get() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Ota-onasini ismini kiriting:</label>
                    <input type="text" class="form-control" required name="parent_name" placeholder="Ota-onasi">
                </div>

                <div class="form-group">
                    <label>Ota-onasini tel raqamini kiriting:</label>
                    <input type="text" class="form-control" name="parent_phone" placeholder="Tel">
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="email@gmail.com">
                </div>

                <div class="form-group">
                    <label>Ish xonasi:</label>
                    <input type="text" class="form-control" name="office" placeholder="Ish xona">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection


