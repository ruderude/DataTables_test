@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ユーザーページ
                    @if(Auth::id() === $user->id)
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#userModal">編集する</button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="up ml-5">
                        @if($user->image)
                        <img class="image-circle-men" src="/storage/img/{{$user->image}}" alt="トップ画像">
                        @else
                        <img class="image-circle-men" src="/storage/images/noimage.jpeg" alt="トップ画像">
                        @endif
                    </div>
                </div>
                <div class="container-fluid" style="margin-top: -0.5rem">
                    <div class="row">
                        <div class="col-3 font-weight-bold">ID</div>
                        <div class="col-9 font-weight-bold">{{ $user->id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3 font-weight-bold">名前</div>
                        <div class="col-9 font-weight-bold">{{ $user->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">性別</div>
                        @if($user->sex)
                        <div id="sex" class="col-9" value="{{ $user->sex }}">{{ $user->sex }}</div>
                        @else
                        <div id="sex" class="col-9">？？？</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-3">年齢</div>
                        @if($user->age)
                        <div class="col-9">{{ $user->age }}</div>
                        @else
                        <div class="col-9">？？？</div>
                        @endif
                    </div>
                    <div class="row">
                        @if($user->job && !($user->job === "0"))
                        <div class="col-3"><img id="jobImage" class="" src="/storage/images/job/yoidore_tenshi.gif" alt="アイコン"></div>
                        <div class="col-9 mt-1" id="jobName">{{ $user->job }}</div>
                        @else
                        <div class="col-3"><img class="" src="/storage/images/job/yoidore_tenshi.gif" alt="アイコン"></div>
                        <div class="col-9 mt-1">無職</div>
                        @endif
                    </div>
                </div>
                <div class="mt-3">
                    <div class="alert alert-primary"><strong>記事一覧</strong> - 要チェック！</div>
                </div>
                @foreach($posts as $key => $post)
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>





    </div>
</div>

<!-- モーダルの設定 -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">ユーザー編集</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ url('users/'.$user->id) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}" placeholder="剣 桃太郎">
                    </div>
                    <div class="form-group">
                        <label for="sex" class="mr-2">性別</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="radio1" value="男性" <?php if($user->sex === "男性") echo "checked"; ?>>
                            <label for="radio1" class="form-check-label">男性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="radio2" value="中性" <?php if($user->sex === "中性") echo "checked"; ?>>
                            <label for="radio2" class="form-check-label">中性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="radio3" value="女性" <?php if($user->sex === "女性") echo "checked"; ?>>
                            <label for="radio3" class="form-check-label">女性</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age">年齢</label>
                        <select name="age" class="form-control" id="age">
                            <option value="10代" <?php if($user->age === "10代") echo "selected"; ?>>10代</option>
                            <option value="20代" <?php if($user->age === "20代") echo "selected"; ?>>20代</option>
                            <option value="30代" <?php if($user->age === "30代") echo "selected"; ?>>30代</option>
                            <option value="40代" <?php if($user->age === "40代") echo "selected"; ?>>40代</option>
                            <option value="50代" <?php if($user->age === "50代") echo "selected"; ?>>50代</option>
                            <option value="60代" <?php if($user->age === "60代") echo "selected"; ?>>60代</option>
                            <option value="70代" <?php if($user->age === "70代") echo "selected"; ?>>70代</option>
                            <option value="80代" <?php if($user->age === "80代") echo "selected"; ?>>80代</option>
                            <option value="90代" <?php if($user->age === "90代") echo "selected"; ?>>90代</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="job">JOB</label>
                        <select name="job" class="form-control" id="job">
                            <option value="0" <?php if($user->job === "0") echo "selected"; ?>>無職</option>
                            <option value="1" <?php if($user->job === "1") echo "selected"; ?>>ボクシング</option>
                            <option value="2" <?php if($user->job === "2") echo "selected"; ?>>キックボクシング</option>
                            <option value="3" <?php if($user->job === "3") echo "selected"; ?>>空手</option>
                            <option value="4" <?php if($user->job === "4") echo "selected"; ?>>カンフー</option>
                            <option value="5" <?php if($user->job === "5") echo "selected"; ?>>テコンドー</option>
                            <option value="6" <?php if($user->job === "6") echo "selected"; ?>>柔術</option>
                            <option value="7" <?php if($user->job === "7") echo "selected"; ?>>相撲</option>
                            <option value="8" <?php if($user->job === "8") echo "selected"; ?>>レスリング</option>
                            <option value="9" <?php if($user->job === "9") echo "selected"; ?>>総合格闘技</option>
                            <option value="10" <?php if($user->job === "10") echo "selected"; ?>>プロレス</option>
                            <option value="11" <?php if($user->job === "11") echo "selected"; ?>>剣道</option>
                            <option value="12" <?php if($user->job === "12") echo "selected"; ?>>弓道</option>
                            <option value="13" <?php if($user->job === "13") echo "selected"; ?>>侍</option>
                            <option value="14" <?php if($user->job === "14") echo "selected"; ?>>軍人</option>
                            <option value="15" <?php if($user->job === "15") echo "selected"; ?>>その他</option>
                        </select>
                    </div>
                    <div class="mb-2">トップ画像</div>
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                    </div>
                    <small class="input_condidion">*jpg,png,gif形式のみ</small></br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <input type="submit" name="submit" class="btn btn-success" value="変更を保存">
                    </div>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('script')
<script>
jQuery(document).ready(function() {
    // ファイルインプット
    $('.custom-file-input').on('change',function(){
    $(this).next('.custom-file-label').html($(this)[0].files[0].name);
    })
});
</script>
@endsection
