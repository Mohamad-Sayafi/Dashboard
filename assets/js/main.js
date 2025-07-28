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

    $('#add_products').submit(function (e) {
        e.preventDefault();

        let name = $('#name').val();
        let caption = $('#caption').val();
        let cost = $('#cost').val();
        let category = $('#category').val();

        let file = $('#myFile')[0].files[0];

        let formData = new FormData();
        formData.append('action', 'add_products');
        formData.append('name', name);
        formData.append('caption', caption);
        formData.append('cost', cost);
        formData.append('category', category);
        if (file) {
            formData.append('myFile', file);
        }

        $.ajax({
            url: '../template/ajax.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    alert(response.success);
                    window.location.href = "../template/products.php";
                } else if (response.failed) {
                    alert(response.failed);
                }
            },
            error: function () {
            }
        });
    });

    $('#delete_product').submit(function (e) {
        e.preventDefault();
        $product_delet = $('#delet_pro').val();
        $.ajax({
            url: '../template/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'delet_products',
                product_delet: $product_delet
            }, success: function (response) {
                if (response.success) {
                    alert(response.success);
                    window.location.href = "../template/products.php";
                } else if (response.failed) {
                    alert(response.failed);
                }

            }, error: function () {

            }
        })
    });
    function myFunction() {
        confirm("are you sure you want to delete this.");
    }

    $('#searchForm #wordInput').keyup(function () {
        $word = $(this).val();

        if ($word.length > 1) {
            $.ajax({
                url: '../template/ajax.php',
                type: 'post',
                data: {
                    word: $word,
                    action: 'search',
                },
                success: function (response) {
                    $('#result').html(response);
                },
                error: function () {

                }
            });
        } else {
            $('#result').html('');
        }
    });
    $('#wordInput').on('focus', function () {
        $('#overlay').fadeIn();
        $('#result').fadeIn();

    });

    $('#wordInput').on('blur', function () {
        $('#overlay').fadeOut();
        $('#result').fadeOut();
        $(this).val('');
        

    });

    $('#overlay').on('click', function () {
        $(this).fadeOut();
    });

    $('.order_product').submit(function (e) {
        e.preventDefault();
        $product_id = $('#product_id').val();
        $.ajax({
            url: '../template/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'add_order',
                product_id: $product_id
            }, success: function (response) {
                if (response.success) {
                    alert(response.success);
                    
                } else if (response.failed) {
                    alert(response.failed);
                }

            }, error: function () {

            }
        })
    });
})


