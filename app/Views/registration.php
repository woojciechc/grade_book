<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Rejestracja</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-6">
                <h1>Sign Up</h1>
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="/save" method="post">
                    <div class="mb-1">
                        <label for="InputForName" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="InputForName"
                            value="<?= set_value('email') ?>">
                    </div>
                    <div class="mb-1">
                        <label for="InputForFirstName" class="form-label">Imie</label>
                        <input type="text" name="firstName" class="form-control" id="InputForFirstName"
                            value="<?= set_value('firstName') ?>">
                    </div>
                    <div class="mb-1">
                        <label for="InputForLastName" class="form-label">Nazwisko</label>
                        <input type="text" name="lastName" class="form-control" id="InputForLastName"
                            value="<?= set_value('lastName') ?>">
                    </div>
                    <div class="mb-1">
                        <label for="InputForPassword" class="form-label">Hasło</label>
                        <input type="password" name="password" class="form-control" id="InputForPassword">
                    </div>
                    <div class="mb-1">
                        <label for="InputForConfPassword" class="form-label">Potwierdź hasło</label>
                        <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                    </div>
                    <div class="mb-1">
                        <label for="InputForSelect" class="form-label">Wybierz role</label>
                        <select class="form-select" name="role" aria-label="Default select example" id="InputForSelect">
                            <option selected value="3">Uczeń</option>
                            <option value="2">Nauczyciel</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Zarejestruj</button>
                </form>
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