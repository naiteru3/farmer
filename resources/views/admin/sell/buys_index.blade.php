@extends('layouts.admin')
@section('content')
<div class="col-lg-12">　
<div class="container mt-5 p-lg-5 bg-light">
        <div class="row">
            <h2>購入者一覧</h2>
        </div>

        <div class="row">
            <div class="list-sell col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th width="20%">名前</th>
                                <th width="20%">電話番号</th>
                                <th width="10%">予約購入数</th>
                                <th width="20%">購入日時</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buys as $buy)
                                <tr>
                                    <td>{{ \Str::limit($buy->user->name, 50) }}</td>
                                    <td>{{ \Str::limit($buy->user->phone_number, 50) }}</td>
                                    <td>{{ \Str::limit($buy->number, 50) }}</td>
                                    <td>{{ \Str::limit($buy->purchase_date, 50) }}</td>
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection