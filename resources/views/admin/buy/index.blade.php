@extends('layouts.admin')
@section('content')
<div class="col-lg-12">　
<div class="container mt-5 p-lg-5 bg-light">
        <div class="row">
            <h2>訳あり品購入一覧</h2>
        </div>

        <div class="row">
            <div class="list-sell col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th width="20%">タイトル</th>
                                
                                <th width="10%">商品ID</th>
                                <th width="10%">予約購入数</th>
                                <th width="10%">購入日時</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $buy)
                                <tr>
                                    <th>{{ \Str::limit($buy->sell->title, 50)}}</th>
                                    <td>{{ \Str::limit($buy->product_id, 50) }}</td>
                                    <td>{{ \Str::limit($buy->number, 50) }}</td>
                                    <td>{{ \Str::limit($buy->purchase_date, 50) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\BuyController@delete', ['id' => $buy->id]) }}">キャンセル</a>
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