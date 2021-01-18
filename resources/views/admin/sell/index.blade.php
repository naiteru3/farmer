@extends('layouts.admin')
@section('content')
<div class="col-lg-12">　
<div class="container mt-5 p-lg-5 bg-light">
        <div class="row">
            <h2>訳あり品出品一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\SellController@create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\SellController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-3">タイトル</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-sell col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="10%">区分</th>
                                <th width="10%">操作</th>
                                <th width="10%">購入者</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $sell)
                                <tr>
                                    <th>{{ $sell->id }}</th>
                                    <td>{{ \Str::limit($sell->title, 20) }}</td>
                                    <td>{{ \Str::limit($sell->type, 20) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\SellController@edit', ['id' => $sell->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\SellController@delete', ['id' => $sell->id]) }}">削除</a>
                                        </div>
                                        </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\SellController@buys_index', ['id' => $sell->id]) }}">一覧</a>
                                        </div>    
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="container">
    <div id=pagi>
        <div class="row">
    {{ $posts->links() }}
</div>
</div>
</div>
@endsection