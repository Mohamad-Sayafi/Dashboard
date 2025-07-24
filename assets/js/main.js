$(document).ready(function () {
    $('#form').submit(function (e) {
        e.preventDefault();

        $name = $('#name').val();
        $email = $('#email').val();
        $password = $('#password').val();
        $confirm_password = $('#confirmpassword').val();

        $.ajax({
            url: 'template/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'register',
                name: $name,
                email: $email,
                password: $password,
                confirm_password: $confirm_password
            }, success: function (response) {
                if (response.success) {
                    alert(response.success);
                    window.location.href = "template/panel.php";
                } else if (response.failed) {
                    alert(response.failed);
                }

            }, error: function () {

            }
        })
    });

    $('#loginForm').submit(function (e) {
        e.preventDefault();
        $email = $('#email').val();
        $password = $('#password').val();

        $.ajax({
            url: '../template/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'login',
                email: $email,
                password: $password,
            }, success: function (response) {
                if (response.success) {
                    alert(response.success);
                    window.location.href = "panel.php";
                } else if (response.failed) {
                    alert(response.failed);
                }

            }, error: function () {

            }
        })
    });

    $('#change_info').submit(function (e) {
        e.preventDefault();

        $name = $('#name').val();
        $email = $('#email').val();
        $password = $('#password').val();
        $confirm_password = $('#confirm_password').val();

        $.ajax({
            url: '../template/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'change_info',
                name: $name,
                email: $email,
                password: $password,
                confirm_password: $confirm_password
            }, success: function (response) {
                if (response.success) {
                    alert(response.success);
                    window.location.href = "user_info.php";
                } else if (response.failed) {
                    alert(response.failed);
                }

            }, error: function () {

            }
        })
    });
})