@extends('layouts.admin')

@section('title','メモ')

@section('content')
    <div class="container">
        <div classs="row">
            <div class="col-md-8 mx-auto">
                <h2>メモ</h2>
                <from action="{{ route('admin.memo.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">行きたいところリスト</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" >
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="保存">
                </from>
            </div>
        </div>
    </div>
@endsection