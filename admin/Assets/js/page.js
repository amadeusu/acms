//СУКА СКОЛЬКО ЖЕ НЕВРОВ МНЕ ПОМОТАЛИ ЭТИ AJAX ЗАРОСЫ!!!!!!!!
//ПИШУ В 4:18 УТРА
var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/pages/add',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
            }
        });
    },
    update: function () {
        var formData = new FormData();

        formData.append('page_id', $('#formPageID').val());
        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/pages/update',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (result) {
                console.log(result);
            }
        });
    }
};

console.log(page);