@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">投稿ページ
                    <div class="float-right">あなたは{{ $user->name }}さんです</div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="errors mt-1 text-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form id="postForm" action="{{ url('posts') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input name="title" type="text" class="form-control" id="title" value="" placeholder="今日の出来事・・・">
                        </div>
                        <div class="form-group">
                            <label for="body">投稿本文</label>
                            <textarea name="body" id="body" type="text" class="form-control" placeholder="カタツムリに塩をかけてみました・・・" cols="10" rows="6"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success float-right" value="投稿する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="/js/post.validate.handler.js"></script>

<style type="text/css">
form.cmxform label.error, label.error {
    color: red;
}
</style>

@endsection
