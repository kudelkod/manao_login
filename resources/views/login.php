<?php
session_start();
if ($_SESSION['login'] === $_COOKIE['login']){
    header('Location: http://manao.loc/resources/views/user_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/vendor/components/jquery/jquery.js"></script>
    <link href="/vendor/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="text-center">
                <h1>Login form</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <form class="mt-5 pt-5" id="form" method="POST">
                <div class="row mb-2 pb-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <label class="mt-1 pt-1" for="login">Login</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="login" name="login" type="text" minlength="6" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <label class="mt-1 pt-1" for="password">Password</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="password" name="password" type="password" minlength="6" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col mt-2 pt-3">
                        <input class="btn btn-primary" id="send_data" type="submit" value="Submit">
                    </div>
                </div>
            </form>
            <div class="col mt-2 pt-3">
                <button class="btn-success btn" id="reg">Registration</button>
            </div>
        </div>
    </main>
</body>
<script>
    $('#reg').click(function (){
        location.href = 'registration.php';
    })
    $('#form').submit(function (){
        $.ajax({
            method: "POST",
            url: location.origin+'/index.php',
            data: $("#form").serialize(),
            success: function (response){
                let jsonData = JSON.parse(response);

                if (jsonData.success == '1'){
                    location.href = 'user_page.php';
                }
                else {
                    alert('Invalid Credentials!');
                }
            },
            error: function (xhr, textStatus){
                console.log(xhr.status, textStatus);
            },
        })
    })
</script>
</html>
