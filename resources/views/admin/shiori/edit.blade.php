@extends('layouts.admin')
@section('title','しおりの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>しおりの編集</h2>
                <form action="{{ route('admin.shiori.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">    
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $shiori_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">旅先</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="tabisaki" rows="1">{{ $shiori_form->tabisaki }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row" for="body">
                        <label class="col-md-2">出発日</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="shupatubi" rows="1">{{ $shiori_form->shupatubi }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row" for="body">
                        <label class="col-md-2">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="15">{{ $shiori_form->memo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row" for="image">
                        <label class="col-md-2">しおり画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $shiori_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $shiori_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>

                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($shiori_form->histories != null)
                                @foreach ($shiori_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection