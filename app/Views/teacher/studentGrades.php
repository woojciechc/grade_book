<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php echo "<h1>" . $title . "</h1>" ?>
    <div class="row justify-content-md-center">
        <div class="col-12 m-3">
            <?php if (empty($grades)) {
                echo "Brak ocen";
            } ?>
            <form class="col-12 m-3" action="/grades/addGrade" method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <input type="number" placeholder="Ocena" name="grade" class="form-control" max=6 min=1 id="InputForDescription" value="<?= set_value('description') ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Komentarz" name="description" class="form-control" id="InputForDescription" value="<?= set_value('description') ?>">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="studentId" value="<?= esc($studentId) ?>" class="btn btn-success">Dodaj ocenę</button>
                    </div>
                </div>
            </form>

            <div class="col-12">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Ocena</th>
                            <th scope="col">Komentarz</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($grades as $item) :
                        ?>


                            <tr>
                                <td>
                                    <button type="button" class="btn btn-<?php echo $item['color'] ?>">
                                        <?php echo $item['grade_value'] ?>
                                    </button>
                                </td>
                                <td>
                                    <?= esc($item['description']) ?>
                                </td>
                                <td>
                                    <form action="/grades/removeGrade" method="post">
                                        <div>
                                            <input type="hidden" name="studentId" class="form-control" value="<?= esc($studentId) ?>">
                                        </div>
                                        <button type="submit" name="gradeId" value="<?= esc($item['id']) ?>" class="btn btn-danger">Usuń ocenę</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection() ?>