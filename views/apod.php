<main class="container mt-5 pt-4">
    <?php if ($apod): ?>
        <h1 class="mb-4"><?= htmlspecialchars($apod->title) ?></h1>
        <p class="fs-6"><?= htmlspecialchars($apod->date) ?></p>
        <?php if ($apod->media_type === "image"): ?>
            <img src="<?= $apod->url ?>" alt="<?= htmlspecialchars($apod->title) ?>" class="img-center mb-3">
        <?php else: ?>
            <div class="ratio ratio-16x9 mb-3">
                <iframe src="<?= $apod->url ?>" title="APOD Video" allowfullscreen></iframe>
            </div>
        <?php endif; ?>
        <p class="justificado"><?= htmlspecialchars($apod->explanation) ?></p>
    <?php else:
        NasaAPI::alert("danger", "No se pudo obtener la imagen del dia");
    endif; ?>
</main>
