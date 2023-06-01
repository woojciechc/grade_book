<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <h1>Witamy na stronie</h1>
</div>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection() ?>