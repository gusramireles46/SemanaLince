<?php if (isset($alert)) : ?>
    <div class="alert alert-<?= $alert->type ?>" role="alert" style="margin-bottom: 0;">
        <?= $alert->message ?>
    </div>
<?php endif; ?>
