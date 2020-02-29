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
                <form id="commentForm" action="{{ url('comments') }}" method="post">
                    @csrf
                    <input type="hidden" name="myId" value="{{ Auth::id() }}">
                    <input type="hidden" name="userId" value="{{ $userId }}">
                    <input type="hidden" name="postId" value="{{ $postId }}">
                        <div class="form-group">
                            <label for="comment">コメント（200文字まで）：</label>
                            <textarea name="comment" id="comment" type="text" class="form-control" placeholder="物申す！" cols="10" rows="6"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <input type="submit" name="submit" class="btn btn-success" value="コメント送信">
                        </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
