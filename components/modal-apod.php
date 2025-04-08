<!-- Modal de Detalle de Imagen APOD -->
<div class="modal fade" id="modalDetalle" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content glass-card">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetalleLabel">Detalle de la Imagen</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <h4 id="detalleTitulo"></h4>
                <p class="fs-6 mb-2" id="detalleFecha"></p>
                <img id="detalleImagen" src="" alt="Imagen APOD" class="img-fluid rounded mb-3 d-none">
                <div class="ratio ratio-16x9 mb-3 d-none" id="detalleVideoContainer">
                    <iframe id="detalleVideo" src="" allowfullscreen></iframe>
                </div>
                <p id="detalleDescripcion" style="text-align: justify;"></p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modalDetalle');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const titulo = button.getAttribute('data-title');
        const fecha = button.getAttribute('data-date');
        const url = button.getAttribute('data-url');
        const descripcion = button.getAttribute('data-explanation');
        const tipo = button.getAttribute('data-type');

        document.getElementById('detalleTitulo').textContent = titulo;
        document.getElementById('detalleFecha').textContent = fecha;
        document.getElementById('detalleDescripcion').textContent = descripcion;

        const imagen = document.getElementById('detalleImagen');
        const videoContainer = document.getElementById('detalleVideoContainer');
        const video = document.getElementById('detalleVideo');

        if (tipo === 'image') {
            imagen.src = url;
            imagen.classList.remove('d-none');
            videoContainer.classList.add('d-none');
            video.src = '';
        } else if (tipo === 'video') {
            video.src = url;
            videoContainer.classList.remove('d-none');
            imagen.classList.add('d-none');
            imagen.src = '';
        }
    });
});
</script>
