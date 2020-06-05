<?php
require_once './protected/errors.php';
?>

<?php if (errors_exist()): ?>
    <?php foreach (get_errors() as $error) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
    <?php clear_errors(); ?>
<?php endif; ?>