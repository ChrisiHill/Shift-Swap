$(function() {
    $("#showPW").on("change", function(){
        if ($("#showPW:checked").val()) {
            $("#Password").attr('type', "text")
        } else {
            $("#Password").attr('type', "password")
        }
    })
});
