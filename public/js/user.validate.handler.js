jQuery(function($){
    $("#userForm").validate({
        rules : {
            name: {
                required: true,
                maxlength : 20,
            },
            sex: {
                required: true,
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
            sex: {
                required: "性別を選択してください。",
            },
            description:{
                maxlength: "備考は1000文字まででお願いします。"
            },
        },
        errorPlacement: function(error, element) {
            if(element.attr("name")=="sex")
            {
                error.insertAfter("#sex_error");
            }
            else{
                error.insertAfter(element);
            }

        }
    });
});
