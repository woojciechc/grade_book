<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 m-3">
                <?php foreach ($grades as $item): ?>
                    <button data-toggle="tooltip" data-placement="bottom" title="<?php echo $item['description'] ?>"
                        type="button" class="btn btn-<?php echo $item['color'] ?>">
                        <?php echo $item['grade_value'] ?>
                    </button>
                <?php endforeach ?>
            </div>

        </div>
    </div>

</html>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection() ?>