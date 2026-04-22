<div class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark position-sticky top-0">
        <div class="container">
            <a href="<?= BASE_URL ?>/home" class="navbar-brand text-light" href="#">API Rest - CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-lg-0 d-flex align-items-center">
                    <li class="nav-item ">
                        <a href="<?= BASE_URL ?>/profile" class="nav-link active text-light d-flex align-items-center gap-2" aria-disabled="true">
                            <span>Username</span>
                            <i class="bi bi-person-circle fs-4"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>/logout" class="nav-link active text-light" aria-disabled="true">
                            <i class="bi bi-box-arrow-left fs-4"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>