@extends('layouts.admin')

@section('title','メモ')

@section('content')
    <div class="container">
        <div classs="row">
            <div class="col-md-8 mx-auto">
                <h2>メモ</h2>
                <form action="{{ route('admin.memo.create') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="title1" value="{{ old('title1') }}" >
                            <input type="text" class="form-control" name="title2" value="{{ old('title2') }}">
                            <input type="text" class="form-control" name="title3" value="{{ old('title3') }}">
                            <input type="text" class="form-control" name="title4" value="{{ old('title4') }}">
                            <input type="text" class="form-control" name="title5" value="{{ old('title5') }}">
                            <input type="text" class="form-control" name="title6" value="{{ old('title6') }}">
                            <input type="text" class="form-control" name="title7" value="{{ old('title7') }}">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="保存">
                </form>
            </div>
        </div>
    </div>
@endsection