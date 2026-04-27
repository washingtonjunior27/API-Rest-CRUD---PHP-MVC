<div class="container-fluid flex-column bg-dark d-flex align-items-center flex-fill py-3" style="--bs-bg-opacity: .7;">

    <div class="container">
        <a href="<?= BASE_URL ?>/home" class="btn btn-danger mb-3 align-self-start" type="button">Back</a>
    </div>


    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Update Product</h3>
        <div id="alert-container-update-product" class="w-100">

        </div>
        <form class="w-100 d-flex flex-column" id="form-update-product">
            <input type="hidden" name="update-product-id" id="update-product-id" value="<?= $product['id_product'] ?>">
            <div class="mb-3 ">
                <label for="product-name" class="form-label">Name</label>
                <input value="<?= $product['name_product'] ?>" type="text" name="product-name" class="form-control" placeholder="Product Name">
            </div>
            <div class="mb-3 ">
                <label for="product_price" class="form-label">Price</label>
                <input value="<?= $product['price_product'] ?>" min="0.01" step="0.01" type="number" name="product-price" class="form-control" placeholder="Product Price">
            </div>
            <div class="mb-3 ">
                <label for="product_brand" class="form-label">Brand</label>
                <input value="<?= $product['brand_product'] ?>" type="text" name="product-brand" class="form-control" placeholder="Product Brand">
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <label class="form-label">Current Image:</label><br>
                    <img src="<?= BASE_URL ?>/public/Assets/img/<?= $product['image_product'] ?>" width="100" class="mb-2">
                </div>
                <div>
                    <label class="form-label">New Image:</label>
                    <input type="file" name="product-img" class="form-control" placeholder="Product image">
                </div>
                <small class="text-muted">Send form without new image to maintain the same image.</small>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>