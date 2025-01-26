@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                        <メニュー>
                        <li class="nav-item @if(Request::routeIs('shiori.add')) active @endif"><a href="{{ route('admin.shiori.add')}}">しおりの新規作成</li>
                        <li class="nav-item @if(Request::routeIs('shiori.index')) active @endif"><a href="{{ route('admin.shiori.index')}}">しおり一覧</li>
                        <li class="nav-item @if(Request::routeIs('memo.add')) active @endif"><a href="{{ route('admin.memo.add')}}">メモ</li>
                        
                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
