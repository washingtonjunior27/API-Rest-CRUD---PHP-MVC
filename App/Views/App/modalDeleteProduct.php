<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5">Excluir Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="alert-container-delete-product" class="w-100 mt-3 px-2">

            </div>
            <form id="delete-form-product">
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o produto <strong id="delete-product-name"></strong>?</p>
                    <input type="hidden" name="delete-product-id" id="delete-product-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="btn-confirm-delete">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>