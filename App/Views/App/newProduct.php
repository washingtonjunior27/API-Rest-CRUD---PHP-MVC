<div class="container-fluid flex-column bg-dark d-flex align-items-center flex-fill py-3" style="--bs-bg-opacity: .7;">

    <div class="container">
        <a href="<?= BASE_URL ?>/home" class="btn btn-danger mb-3 align-self-start" type="button">Back</a>
    </div>


    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Register Product</h3>
        <div id="alert-container-new-product" class="w-100">

        </div>
        <form class="w-100 d-flex flex-column" id="form-create-product">
            <div class="mb-3 ">
                <label for="product-name" class="form-label">Name</label>
                <input type="text" name="product-name" class="form-control" placeholder="Product Name">
            </div>
            <div class="mb-3 ">
                <label for="product_price" class="form-label">Price</label>
                <input min="0.01" step="0.01" type="number" name="product-price" class="form-control" placeholder="Product Price">
            </div>
            <div class="mb-3 ">
                <label for="product_brand" class="form-label">Brand</label>
                <input type="text" name="product-brand" class="form-control" placeholder="Product Brand">
            </div>
            <div class="mb-3">
                <label for="product-img" class="form-label">Image</label>
                <input type="file" name="product-img" class="form-control" placeholder="Product image">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>