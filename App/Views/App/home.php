<div class="bg-dark flex-fill" style="--bs-bg-opacity: .7;">
    <div class="container pt-5">
        <form class="d-flex mb-3" role="search">
            <input id="searchInputProd" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
        </form>

        <a href="<?= BASE_URL ?>/product" class="btn btn-primary mb-3" type="button">New Product</a>

        <div id="alert-container-list-product" class="w-100 mt-3">

        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="product-itens-table">
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination-container">
            </ul>
        </nav>
    </div>
</div>
</div>

<?php require_once __DIR__ . "/modalDeleteProduct.php" ?>