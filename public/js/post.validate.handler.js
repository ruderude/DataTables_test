jQuery(function($){
    // 投稿バリデーション
    $("#postForm").validate({
        rules : {
            title: {
                required: true,
                maxlength : 30,
            },
            body: {
                required: true,
                maxlength : 300,
            },
        },
        messages: {
        title:{
                required: "タイトルは必須項目です。",
                maxlength: "タイトルは30文字まででお願いします。"
            },
            body: {
                required: "投稿本文は必須項目です。",
                maxlength: "投稿本文は300文字まででお願いします。"
            },
        },
    });
});
