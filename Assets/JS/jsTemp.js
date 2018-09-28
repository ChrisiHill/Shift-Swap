$(function() {
    $("#showPW").on("change", function(){
        if ($("#showPW:checked").val()) {
            $("#Password").attr('type', "text")
        } else {
            $("#Password").attr('type', "password")
        }
    });
    $(document).keypress(function (e) { 
        if(e.which == 13) {
            //login()

        }
    });
    $("#Login").on("click", function(){
        login()
    });
    login =  function() {
        $StoreID = $("#StoreID")
        $UserID = $("#UserID")
        $Password = $("#Password")
        $error = 0
        if ($StoreID.val() === ""){
            $StoreID.siblings(".error").html("Please Insert a Store ID")
            $error = 1
        } else {
            $StoreID.siblings(".error").html("")
        }
        if ($UserID.val() === ""){
            $UserID.siblings(".error").html("Please Insert your User ID")
            $error = 1
        } else {
            $UserID.siblings(".error").html("")
        }
        if ($Password.val() === ""){
            $Password.siblings(".error").html("Please Insert your Password")
            $error = 1
        } else {
            $Password.siblings(".error").html("")
        }
        if ($error !== 1){
            $.ajax({
                url: "checkLogin.php",
                method: "POST",
                data: {
                    "storeID": $StoreID.val(),
                    "UserID" :$UserID.val(),
                    "Password": $Password.val(),
                },
                success: function(data) {
                    console.log(data)
                    $r = JSON.parse(data);
                    $StoreError = $r["StoreError"]
                    $UserError = $r["UserError"]
                    $PasswordError = $r["PasswordError"]
                    $redirect = $r["redirect"]
                    if ($StoreError !== ""){
                        $StoreID.siblings(".error").html($StoreError)
                    }
                    if ($UserError !== ""){
                        $UserID.siblings(".error").html($UserError)
                    }
                    if ($PasswordError !== ""){
                        $Password.siblings(".error").html($PasswordError)
                    }
                    if ($redirect !== ""){
                        window.location.href = $redirect
                    }
                }
            })
        }
    };
    $(".logout").on("click", function(){
        window.location.href = "logout.php"
    })
});