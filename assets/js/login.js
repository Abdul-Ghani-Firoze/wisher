$(function () {

    $("#login-btn").click(function (event) {
        event.preventDefault();
        var email = $("input#email").val();
        var password = $("input#password").val();
        $.ajax({
            method: "POST",
            url: $('#site-url').val() + "/user/login",
            dataType: 'JSON',
            data: {email: email, password: password},
            success: function (data) {
                if (data.status) {
                    window.location.href = $('#site-url').val() + data.redirectUrl;
                } else {
                    $("#error").html(data.errorMsg);
                    clear();
                }
            }
        });
    });

    function clear() {
        $("input#email").val('');
        $("input#password").val('');
    }
});