<div class="container-fluid bg-dark vh-100 d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Register</h3>
        <div id="alert-container-register-user" class="w-100">

        </div>
        <form class="w-100 d-flex flex-column" id="registerUserForm">
            <div class="mb-3 ">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="user-name" class="form-control" placeholder="User name">
            </div>
            <div class="mb-3 ">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" name="user-email" class="form-control" placeholder="User email">
            </div>
            <div class="mb-3 ">
                <label for="user_phone" class="form-label">Phone</label>
                <input type="number" name="user-phone" class="form-control" placeholder="User phone" min="0">
            </div>
            <div class="mb-3 ">
                <label for="user_login" class="form-label">Username</label>
                <input type="text" name="user-login" class="form-control" placeholder="User login">
            </div>
            <div class="mb-3">
                <label for="user-pass" class="form-label">Password</label>
                <input type="password" name="user-pass" class="form-control" placeholder="User password">
            </div>
            <div class="mb-3">
                <label for="user-pass-confirm" class="form-label">Confirm Password</label>
                <input type="password" name="user-pass-confirm" class="form-control" placeholder="Confirm password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <div class="mt-4 text-center">
                <span>Already has an account? <a href="<?= BASE_URL ?>/login">Login here</a></span>
            </div>
        </form>
    </div>
</div>