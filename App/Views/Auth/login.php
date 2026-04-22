<div class="container-fluid bg-dark vh-100 d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Login</h3>
        <form class="w-100" method="POST">
            <div class="mb-3 ">
                <label for="user_login" class="form-label">Username</label>
                <input type="text" name="user-login" class="form-control" placeholder="User login">
            </div>
            <div class="mb-3">
                <label for="user-pass" class="form-label">Password</label>
                <input type="password" name="user-pass" class="form-control" placeholder="User password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="mt-4 text-center">
                <span>Don't have an account? <a href="<?= BASE_URL ?>/register">Register Here</a></span>
            </div>
        </form>
    </div>
</div>