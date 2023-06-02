<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-12">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Numer</th>
                        <th scope="col">Naziwsko i Imię</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($classes as $item):
                        ?>


                        <tr>
                            <td>
                                <?= esc($item['id']) ?>
                            </td>
                            <td>
                                <?= esc($item['lastName']) . ' ' . esc($item['firstName'])?>
                            </td>
                            <td>
                                <form action="student/grades" method="get">
                                    <button type="submit" name="classId" value="<?= esc($item['id']) ?>"
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