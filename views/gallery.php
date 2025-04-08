<main class="container mt-5 pt-4">
    <h1 class="mb-4">Galería Astronómica del Mes</h1>

    <?php if (!empty($galeria)): ?>
        <div class="row">
            <?php foreach ($galeria as $item): ?>
                <?php if ($item->media_type !== 'image') continue; ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm glass-card text-center">
                        <img src="<?= $item->url ?>" alt="<?= htmlspecialchars($item->title) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title"><?= htmlspecialchars($item->title) ?></h5>
                            <p class="text-muted"><?= $item->date ?></p>
                            <div class="mt-auto">
                                <button class="btn btn-sm btn-outline-primary mb-2" data-bs-toggle="modal"
                                        data-bs-target="#modalDetalle"
                                        data-title="<?= htmlspecialchars($item->title) ?>"
                                        data-date="<?= $item->date ?>"
                                        data-url="<?= $item->url ?>"
                                        data-explanation="<?= htmlspecialchars($item->explanation) ?>"
                                        data-type="<?= $item->media_type ?>">
                                    Ver más
                                </button>
                                <form method="POST" action="favoritos.controller.php?action=add">
                                    <input type="hidden" name="url" value="<?= $item->url ?>">
                                    <input type="hidden" name="titulo" value="<?= htmlspecialchars($item->title) ?>">
                                    <input type="hidden" name="fecha" value="<?= $item->date ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-warning">
                                        ⭐ Agregar a favoritos
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <li class="page-item <?= ($i == $pagina) ? 'active' : '' ?>">
                        <a class="page-link" href="?action=gallery&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php else: ?>
        <div class="alert alert-warning">No hay imágenes para mostrar este mes.</div>
    <?php endif; ?>
</main>

<?php include "components/modal-apod.php"; ?>
