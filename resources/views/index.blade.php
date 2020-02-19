@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">トップページ</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1" class="table table-striped">
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
        // デフォルトの設定を変更
        $.extend( $.fn.dataTable.defaults, {
            language: {
                url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
            }
        });

        $("#table1").DataTable({
            searching: true,    // 検索する？？
            ordering: true,     // 並べ替えする？？
            lengthChange: true, // ページごとに何件表示する？？
            serverSide: true,   // サーバーサイドを使う？？
            ajax: {
                url: '/datatable/ajax', // データ取得するURL
                dataFilter(data) {      // 取得したデータを加工する

                    let json = JSON.parse(data);
                    json.recordsTotal = json.total;
                    json.recordsFiltered = json.total;
                    return JSON.stringify(json);

                }
            },
            columns: [
                {
                    data: 'id',
                    title: 'コード'
                },
                {
                    data: 'title',
                    title: '名前'
                },
            ],
            order: [[ 0, 'asc' ]],   // 並べ替え項目を指定,
            language: { // 日本語対応
                url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Japanese.json'
            }
        });
    });
</script>
@endsection
