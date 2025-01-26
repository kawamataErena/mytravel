@extends('layouts.admin')

@section('title','しおりの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>しおり新規作成</h2>
                <form action="{{ route('admin.shiori.create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">    
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">しおり画像</label>
                        <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">旅先</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="tabisaki" rows="1">{{ old('tabisaki') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">出発日</label>
                        <div class="col-md-5">
                        <input type="text" class="form-control" name="shupatubi" value="{{ old('shupatubi') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="15">{{ old('memo') }}</textarea>
                    </div>


                    @csrf

                    <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                    <input type="submit" class="btn btn-primary" value="作成">

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection