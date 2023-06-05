<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-12">
            <form class="col-12 m-3" action="/admin/addUserToClass" method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-select" name="studentId" id="InputForSelect">
                        <?php
                    foreach ($studentsToAdd as $item):
                        ?>
                                <option selected value="<?= esc($item["id"]) ?>"><?= esc($item["lastName"]) . ' ' . esc($item["firstName"]) ?></option>
                        <?php endforeach ?>
                            </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="classId" value="<?= esc($classId) ?>"
                            class="btn btn-success">Dodaj ucznia</button>
                    </div>
                </div>
            </form>
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
                                <?= esc($item['lastName']) . ' ' . esc($item['firstName']) ?>
                            </td>
                            <td>
                                <form action="/admin/removeStudent" method="get">
                                <input type="hidden" name="classId" value="<?= esc($classId) ?>" />
                                    <button type="submit" name="entryId" value="<?= esc($item['entryId']) ?>"
                                        class="btn btn-danger">Usuń z klasy</button>
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