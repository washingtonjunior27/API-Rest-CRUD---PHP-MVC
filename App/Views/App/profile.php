<div class="container-fluid flex-column bg-dark d-flex align-items-center flex-fill py-3" style="--bs-bg-opacity: .7;">

    <div class="container">
        <a href="<?= BASE_URL ?>/home" class="btn btn-danger mb-3 align-self-start" type="button">Back</a>
    </div>


    <div class="d-flex flex-column justify-content-center align-items-center bg-light p-4 rounded-2 w-100" style="max-width: 450px;">
        <h3 class="mb-4">Update Profile</h3>

        <form class="w-100 d-flex flex-column" method="POST">
            <div class="mb-3 ">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="user-name" class="form-control" placeholder="User name" value="<?= $user['name_user'] ?>">
            </div>
            <div class="mb-3 ">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" name="user-email" class="form-control" placeholder="User email" value="<?= $user['email_user'] ?>">
            </div>
            <div class="mb-3 ">
                <label for="user_phone" class="form-label">Phone</label>
                <input type="text" name="user-phone" class="form-control" placeholder="User phone" value="<?= $user['phone_user'] ?>">
            </div>
            <div class="mb-3 ">
                <label for="user_login" class="form-label">Username</label>
                <input type="text" name="user-login" class="form-control" placeholder="User login" value="<?= $user['login_user'] ?>">
            </div>
            <div class="mb-3">
                <label for="user-pass" class="form-label">Password</label>
                <input type="password" name="user-pass" class="form-control" placeholder="User password">
            </div>
            <div class="mb-3">
                <label for="user-pass-confirm" class="form-label">Confirm Password</label>
                <input type="password" name="user-pass-confirm" class="form-control" placeholder="Confirm password">
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Save Changes</button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete Account
            </button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="alert-container-delete-user" class="w-100 mt-3 px-2">

            </div>
            <div class="modal-body">
                <h3 class="text-center">Are you sure?</h3>
                <p>Do you really want to delete this account? This process cannot be undone.</p>
            </div>
            <form class="modal-footer" id="deleteUserForm">
                <input type="hidden" name="id_user" value="<?= $_SESSION['user_id'] ?>">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>