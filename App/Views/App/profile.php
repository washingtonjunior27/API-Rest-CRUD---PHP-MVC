<div class="container-fluid flex-column bg-dark d-flex align-items-center flex-fill py-3" style="--bs-bg-opacity: .7;">

    <div class="container">
        <a href="<?= BASE_URL ?>/home" class="btn btn-danger mb-3 align-self-start" type="button">Back</a>
    </div>


    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Update Profile</h3>
        <form class="w-100 d-flex flex-column" method="POST">
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
                <input type="text" name="user-phone" class="form-control" placeholder="User phone">
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
            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
        </form>
    </div>
</div>