<div class="container-fluid flex-column bg-dark d-flex align-items-center flex-fill py-3" style="--bs-bg-opacity: .7;">

    <div class="container">
        <a href="<?= BASE_URL ?>/home" class="btn btn-danger mb-3 align-self-start" type="button">Back</a>
    </div>


    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Register Product</h3>
        <form class="w-100 d-flex flex-column" method="POST">
            <div class="mb-3 ">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="user-name" class="form-control" placeholder="Product Name">
            </div>
            <div class="mb-3 ">
                <label for="user_email" class="form-label">Price</label>
                <input min="0.01" step="0.01" type="number" name="user-email" class="form-control" placeholder="Product Price">
            </div>
            <div class="mb-3 ">
                <label for="user_phone" class="form-label">Brand</label>
                <input type="text" name="user-phone" class="form-control" placeholder="Product Brand">
            </div>
            <div class="mb-3">
                <label for="user-pass" class="form-label">Image</label>
                <input type="file" name="user-pass" class="form-control" placeholder="User password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>