@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
                <div class="flash_message alert alert-success text-center py-3 my-2" role="alert">
                    <strong>{{ session('flash_message') }}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header">ユーザーページ
                    @if(Auth::id() === $user->id)
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#userModal">自分を編集する</button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="up ml-5">
                        @if($user->image)
                            <a href="/storage/img/{{$user->image}}" data-lightbox="top" data-title="トップ画像拡大">
                                <img class="image-circle-men" src="/storage/img/{{$user->image}}" alt="トップ画像">
                            </a>
                        @else
                            <a href="/storage/images/noimage.jpeg" data-lightbox="top" data-title="トップ画像拡大">
                                <img class="image-circle-men" src="/storage/images/noimage.jpeg" alt="トップ画像">
                            </a>
                        @endif
                    </div>
                    @if ($errors->any())
                    <div class="errors mt-1 text-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
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
                    <div class="row">
                        <div class="col-3">備考</div>
                        @if($user->description)
                        <div class="col-9">{!! nl2br(e($user->description)) !!}</div>
                        @else
                        <div class="col-9">なし</div>
                        @endif
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card-header alert alert-primary"><strong>記事一覧</strong> - 要チェック！
                        @if(Auth::id() === $user->id)
                        <a href="/posts" class="myButton float-right" style="margin-top: -6px">投稿する</a>
                        @endif
                    </div>
                </div>
                @foreach($posts as $key => $post)
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
                        <p class="card-text">{!! nl2br(e($post->body)) !!}</p>
                        <span class="commentModal pointer" data-post="{{ $post->id }}" data-toggle="modal" data-target="#commentModal{{$key}}">
                        <i class="far fa-comment"></i><span class="texts">コメントする</span>
                        </span>
                        @component('user.commentModal')
                            @slot('modalKey', $key)
                            @slot('userId', $post->user_id)
                            @slot('postId', $post->id)
                        @endcomponent
                        @if ($post->likedBy(Auth::user())->count() > 0)
                        <span class="like pointer" data-post="{{ $post->id }}">
                            <i class="fas fa-heart text-danger"></i><span class="count"> {{count($post->likes)}}</span><span class="texts text-info">いいねを取り消す</span>
                        </span>
                        @else
                        <span class="like pointer" data-post="{{ $post->id }}">
                            <i class="far fa-heart text-danger"></i><span class="count"> {{count($post->likes)}}</span><span class="texts text-info">いいねする</span>
                        </span>
                        @endif

                        @if($post->comments)
                            @foreach($post->comments as $comment)
                                @if($comment->post_id === $post->id)
                                    <!-- コメントの吹き出し -->
                                    <!-- <div class="d-flex">
                                        <div class="p-2">
                                            <div class="chat-face">
                                                <img src="/storage/img/{{ $comment->user->image }}" alt="自分のチャット画像です。" width="60" height="60">
                                                <div class="text-center small">{{ $comment->user->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 flex-grow-1">
                                            <div class="chat-area">
                                                <div class="chat-hukidashi small">
                                                {{ $comment->body }}
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="chat-face">
                                                        <img src="/storage/img/{{ $comment->user->image }}" alt="自分のチャット画像です。" width="60" height="60">
                                                        <div class="text-center">{{ $comment->user->name }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="arrow_box text-wrap">
                                                    {{ $comment->body }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>





    </div>
</div>

@include('user.updateModal')

@endsection

@section('script')
<script>
jQuery(document).ready(function() {
    // フラッシュメッセージのfadeout
    $('.flash_message').fadeOut(5000);

    // ファイルインプット
    $('#userImage').on('change',function(e){
        $(this).next('.custom-file-label').html($(this)[0].files[0].name);

        //ファイルオブジェクトを取得する
        var file = e.target.files[0];
        var reader = new FileReader();

        //画像でない場合は処理終了
        if(file.type.indexOf("image") < 0){
        alert("画像ファイルを指定してください。");
        return false;
        }

        $('#preview').remove();
        var file = $(this).prop('files')[0];
        if(!file.type.match('image.*')){
            return;
        }
        var fileReader = new FileReader();
        fileReader.onloadend = function() {
            $('#result').html('<img id="preview" style="max-width:300px;max-height:300px;" src="' + fileReader.result + '"/>');
        }
        fileReader.readAsDataURL(file);
    });

    var flag = 0;
    // いいねボタン
    $('.like').on('click',function(e){
        var $this = $(this);
        var postId = $(this).data('post');
        // console.log(postId);
        if(flag) return false;

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '/likes',
            data: { id: postId },
            timeout: 10000,
        }).done(function(data){
            // console.log('Ajax Success');
            // console.log(data);
            // いいねの総数を表示
            $this.children('i').toggleClass('far');
            $this.children('i').toggleClass('fas');
            $this.children('.count').html(data);
            if($this.children('.texts').html() === 'いいねする'){
                $this.children('.texts').html('いいねを取り消す');
            } else {
                $this.children('.texts').html('いいねする');
            }

        }).fail(function(msg) {
            console.log('Ajax Error');
        });
        flag = 1;
        setTimeout(function(){ flag = 0;}, 500);

    });

    // コメント投稿
    $('.comment').on('click',function(e){
        event.preventDefault();
        var $this = $(this);
        var post_id = $(this).data('post');
        var modal = $(this).data('modal');
        var authId = $(this).data('auth');
        var comment = $('#comment' + post_id).val();
        // console.log(modal);
        // 簡易的なバリデーション
        if (comment === null || comment === "") {
            $('.errorCode').text('空文字は禁止です');
            return false;
        } else if (comment.length > 120) {
            $('.errorCode').text('120文字以内でお願いします');
            return false;
        }

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '/comments',
            data: {
                user_id: authId,
                post_id: post_id,
                body: comment,
            },
        }).done(function(data){
            console.log('Ajax Success');
            window.location.reload();

        }).fail(function(msg) {
            console.log('Ajax Error');
        });
        flag = 1;
        setTimeout(function(){ flag = 0;}, 500);

    });

});
</script>
<script type="text/javascript" src="{{ asset('js/jobImage.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="/js/user.validate.handler.js"></script>

<style type="text/css">
form.cmxform label.error, label.error {
    color: red;
}
table {
  table-layout: fixed;
  word-break: break-all;
  word-wrap: break-word;
}
/* チャットレイアウト */
.chat-face img{
    border-radius: 50%;
    border: 1px solid #ccc;
    box-shadow: 0 0 4px #ddd;
}

.arrow_box{
    box-sizing:border-box;
    position:relative;
    width:100%;
    height:100%;
    background:#b9ffa1;
    padding:20px;
    text-align:left;
    color:#333333;
    font-size:14px;
    font-weight:bold;
    border-radius:15px;
    -webkit-border-radius:15px;
    -moz-border-radius:15px;
}
.arrow_box:after{
    border: solid transparent;
    content:'';
    height:0;
    width:0;
    pointer-events:none;
    position:absolute;
    border-color: rgba(90, 230, 40, 0);
    border-top-width:10px;
    border-bottom-width:10px;
    border-left-width:20px;
    border-right-width:20px;
    margin-top: -10px;
    border-right-color:#b9ffa1;
    right:100%;
    top:50%;
}

</style>

@endsection
