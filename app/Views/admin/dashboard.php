<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-12">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">email</th>
                        <th scope="col">Imie</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $item) :
                    ?>


                        <tr>
                            <td>
                                <?= esc($item['id']) ?>
                            </td>
                            <td>
                                <?= esc($item['email']) ?>
                            </td>
                            <td>
                                <?= esc($item['firstName']) ?>
                            </td>
                            <td>
                                <?= esc($item['lastName']) ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <form action="/admin/changePassword" method="get">
                                        <button type="submit" name="userId" value="<?= esc($item['id']) ?>" class="btn btn-info"><i class="fa fa-edit"> Zmień hasło</i></button>
                                        </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="/admin/changeUserData" method="get">
                                            <button type="submit" name="userId" value="<?= esc($item['id']) ?>" class="btn btn-primary"><i class="fa fa-user-secret"> Zmień dane</i></button>
                                        </form>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="/admin/removeUser" method="get">
                                            <button type="submit" name="userId" value="<?= esc($item['id']) ?>" class="btn btn-danger"><i class="fa fa-trash"> Usuń</i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection() ?>