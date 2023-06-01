<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-12">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Nauczyciel</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($subjects as $item):
                        ?>


                        <tr>
                            <td>
                                <?= esc($item['id']) ?>
                            </td>
                            <td>
                                <?= esc($item['name']) ?>
                            </td>
                            <td>
                                <?= esc($item['firstName']) . " " . esc($item['lastName']) ?>
                            </td>
                            <td>
                                <form action="/grades/grades" method="get">
                                    <button type="submit" name="subjectId" value="<?= esc($item['id']) ?>"
                                        class="btn btn-info">Zobacz oceny</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?= $this->endSection() ?>