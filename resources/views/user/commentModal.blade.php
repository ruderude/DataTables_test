<!-- モーダルの設定 -->
<div class="modal fade" id="commentModal{{ $modalKey }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">コメント挿入</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="errors mt-1 text-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <form id="commentForm{{ $postId }}" action="{{ url('comments') }}" method="post">
                    @csrf
                    <input type="hidden" name="myId" value="{{ Auth::id() }}">
                    <input type="hidden" name="postId" value="{{ $postId }}">
                    <div class="form-group">
                        <label for="comment{{ $postId }}">コメント（120文字まで）：<span class="errorCode text-danger"></span></label>
                        <textarea name="comment" id="comment{{ $postId }}" type="text" class="form-control" placeholder="物申す！" cols="10" rows="6"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="comment btn btn-success" data-auth="{{ Auth::id() }}" data-user="{{ $userId }}" data-post="{{ $postId }}" data-modal="commentModal{{ $modalKey }}">コメント送信</button>
                        <!-- <input type="submit" name="submit" class="btn btn-success" value="コメント送信"> -->
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
