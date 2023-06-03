<?= $this->extend('common/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php echo "<h1>" . $title . "</h1>" ?>
    <div class="row justify-content-md-center">
        <div class="col-12 m-3">
        </div>
        <form class="col-12 m-3" action="/admin/postChangePassword" method="post">
            <div class="row">
                <div class="col-sm-2">
                    <input type="password" placeholder="Nowe hasło" name="password" class="form-control" value="<?= set_value('password') ?>">
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="userId" value="<?= esc($userData['id']) ?>" class="btn btn-success">Zmień hasło</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>