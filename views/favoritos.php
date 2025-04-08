<main class="container mt-5 pt-4">
    <h1 class="mb-4">Mis Favoritos</h1>

    <?php if (!empty($favoritos)): ?>
        <div class="row">
            <?php foreach ($favoritos as $item): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm glass-card text-center">
                        <img src="<?= $item->url ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item->titulo) ?></h5>
                            <p class="text-muted"><?= $item->fecha ?></p>
                            <a href="controllers/favoritos.controller.php?action=delete&id=<?= $item->id_favorito ?>"
                               class="btn btn-sm btn-outline-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">No tienes favoritos aún.</div>
    <?php endif; ?>
</main>
