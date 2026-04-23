<div class="bg-dark flex-fill" style="--bs-bg-opacity: .7;">
    <div class="container pt-5">
        <form class="d-flex mb-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-success" type="submit">Search</button>
        </form>

        <a href="<?= BASE_URL ?>/product" class="btn btn-primary mb-3" type="button">New Product</a>

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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="<?= BASE_URL ?>/Assets/img/img1.jpg" class="rounded img-product">
                        </td>
                        <td>PlayStation 5</td>
                        <td>R$6000,00</td>
                        <td>Sony</td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>
                            <img src="<?= BASE_URL ?>/Assets/img/img1.jpg" class="rounded img-product">
                        </td>
                        <td>PlayStation 5</td>
                        <td>R$6000,00</td>
                        <td>Sony</td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <img src="<?= BASE_URL ?>/Assets/img/img1.jpg" class="rounded img-product">
                        </td>
                        <td>PlayStation 5</td>
                        <td>R$6000,00</td>
                        <td>Sony</td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>