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
            foreach ($users as $item):
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
                        <form action="/admin/changePassword" method="get">
                            <button type="submit" name="userId" value="<?= esc($item['id']) ?>"
                                class="btn btn-info">Zmień hasło</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</div>

</div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection() ?>