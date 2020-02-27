jQuery(function($){
    $("#userForm").validate({
        rules : {
            name: {
                required: true,
                maxlength : 20,
            },
            description: {
                maxlength : 1000,
            },
        },
        messages: {
            name:{
                required: "必須項目です。入力をお願いします。",
                maxlength: "名前は20文字まででお願いします。"
            },
            description:{
                maxlength: "備考は1000文字まででお願いします。"
            },
        },
    });
});
