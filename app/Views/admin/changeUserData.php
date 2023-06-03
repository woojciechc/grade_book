<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-6">
            <form action="/admin/postChangeUserData" method="post">
                <div class="mb-1">
                    <label for="InputForName" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="InputForName"
                        value="<?= esc($userData['email']) ?>">
                </div>
                <div class="mb-1">
                    <label for="InputForFirstName" class="form-label">Imie</label>
                    <input type="text" name="firstName" class="form-control" id="InputForFirstName"
                        value="<?= esc($userData['firstName']) ?>">
                </div>
                <div class="mb-1">
                    <label for="InputForLastName" class="form-label">Nazwisko</label>
                    <input type="text" name="lastName" class="form-control" id="InputForLastName"
                        value="<?= esc($userData['lastName']) ?>">
                </div>
                <div class="mb-1">
                    <label for="InputForSelect" class="form-label">Wybierz role</label>
                    <select class="form-select" name="role" aria-label="Default select example" id="InputForSelect">
                        <option value="3">Uczeń</option>
                        <option value="2">Nauczyciel</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button name="userId" value="<?= esc($userData['id']) ?>" type="submit" class="btn btn-primary">Zmień dane</button>
            </form>
        </div>

    </div>
</div>
<?= $this->endSection() ?>