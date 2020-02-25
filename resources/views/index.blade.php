@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">トップページ</div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table id="table1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">ユーザー</th>
                                    <th class="text-nowrap">記事数</th>
                                    <!-- <th class="text-nowrap">アクション</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td id="">{{ $user->id }}</td>
                                    <td id="">
                                        @if($user->image)
                                        <img class="mini-image-circle" src="/storage/img/{{$user->image}}" alt="トップ画像">
                                        @else
                                        <img class="mini-image-circle" src="/storage/images/noimage.jpeg" alt="トップ画像">
                                        @endif
                                    </td>
                                    <td><a href="/users/{{$user->id}}">{{ $user->name }}</a></td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">{{ count($user->posts) }}</span>
                                    </td>
                                    <!-- <td class="text-nowrap">
                                        <button title="編集" class="btn btn-default btn-sm" data-id="" data-flags="" data-url=""><i class="fas fa-edit"></i></button>
                                        <button title="ゴミ箱" class="btn btn-default btn-sm" data-id="" data-flags="" data-url=""><i class="fas fa-trash-alt"></i></button>
                                    </td> -->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
jQuery(function($){
    $.extend( $.fn.dataTable.defaults, {
    language: {
    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
    }
    });

    $('#table1').DataTable({
        columnDefs: [
            // 1列目を消す(visibleをfalseにすると消えます)
            { targets: 0, visible: false },
        ]
    });
});
</script>
@endsection
