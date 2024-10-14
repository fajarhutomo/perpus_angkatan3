

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css//bootstrap.min.css">
</head>

<body>
    <div class="wraapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Selamat Datang di Perpus App</h5>
                                <p>silakan masuk dengan akun anda</p>
                            </div>
                            <form action="actionLogin.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        email
                                    </label>
                                    <input type="text" class="form-control" name="email" placeholder="Masukan email anda">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Masuk
                                        </button>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>