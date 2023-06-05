<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Grade Book - Zaloguj się</title>
</head>

<body>
    <div class="bg">
        <div class="container">
            <div class="row justify-content-md-center">

                <div class="col-6" style="margin-top: 20%;">
                    <h1>Zaloguj się</h1>
                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/postLogin/" method="post">
                        <div class="mb-1">
                            <label for="InputForEmail" class="form-label">Adres email</label>
                            <input type="email" name="email" class="form-control" id="InputForEmail"
                                value="<?= set_value('email') ?>">
                        </div>
                        <div class="mb-1">
                            <label for="InputForPassword" class="form-label">Hasło</label>
                            <input type="password" name="password" class="form-control" id="InputForPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Zaloguj się</button>
                        <a class="m-3" href="/register">Zarejestruj się</a>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
</body>

</html>

<style>
    body,
    html {
        height: 100%;
    }

    .bg {
        /* The image used */
        background-image: url("https://images.pexels.com/photos/62693/pexels-photo-62693.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>