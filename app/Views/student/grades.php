<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
<?php echo "<h1>" . $title ."</h1>" ?>
    <div class="row justify-content-md-center">
        <div class="col-12 m-3">
            <?php if (empty($grades)) {
                echo "Brak ocen";
            } ?>
            <?php foreach ($grades as $item): ?>
                <button data-toggle="tooltip" data-placement="bottom" title="<?php echo $item['description'] . ' - ' .  $item['created_at'] ?>"
                    type="button" class="btn btn-<?php echo $item['color'] ?>">
                    <?php echo $item['grade_value'] ?>
                </button>
            <?php endforeach ?>
        </div>

    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection() ?>