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
            <form class="mt-5 pt-5" action="" method="POST">
                <div class="row mb-2 pb-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <label class="mt-1 pt-1" for="login">Login</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="login" name="login">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <label class="mt-1 pt-1" for="password">Password</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col mt-2 pt-3">
                        <input class="btn btn-primary" id="send_data" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<script>
    $('#send_data').on('click', function (){

        let login = $('#login').val();
        let password = $('password').val();

        $.ajax({
            type: "POST",
            url: location.origin+'/const.php',
            data: {
                'action': 'login'
                'login': login,
                'password': password
            },
            success: function (response){
                window.location.replace('https://music.yandex.by/artist/8550120')
            },
            error: function (xhr, textStatus){
                console.log(xhr.status, textStatus);
            },
        })
    })


</script>