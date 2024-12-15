<?PHP
?>
<div class="sticky-top mb-2">
    <div class="d-flex flex-column flex-md-row bg-success container-fluid m-0 text-light">
        <div class="d-flex align-items-center me-md-3"><i class="bi bi-telephone ps-2 pe-2"></i> 09616669901</div>
        <div class="d-flex align-items-center"><i class="bi bi-envelope-at ps-2 pe-2"></i> cdofoodsphereecart@gmail.com</div>
    </div>
    <nav class="navbar navbar-expand-md bg-body-tertiary shadow
        <div class="container-fluid">
            <a class="navbar-brand" href="a_home.php"><img class="ps-3" src="../pics/logo.png" alt="Logo" style="height: 40px;"><span class="d-none d-sm-inline">CDO Foodsphere E-Cart</span><span class="d-sm-none" style="font-size: 15px;">CDO Foodsphere E-Cart</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navItem" aria-controls="navItem" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navItem">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a type="button" class="btn nav-link active d-flex align-items-center" href="messages.php">
                            <i class="bi bi-chat-left-dots me-2 fs-5"></i>
                            <span class="">Messages</span>
                        </a>
                    </li>
                    <a class="nav-item me-3 text-decoration-none" href="orders.php">
                        <button type="button" class="btn nav-link active d-flex align-items-center">
                            <i class="bi bi-basket me-2 fs-5"></i>
                            <span class="">Orders</span>
                        </button>
                    </a>
                    <a class="nav-item me-3 text-decoration-none" href="inventory.php">
                        <button type="button" class="btn nav-link active d-flex align-items-center">
                            <i class="bi bi-layers me-2 fs-5"></i>
                            <span class="">Inventory</span>
                        </button>
                    </a>
                    <a class="nav-item me-3 text-decoration-none" href="reports.php">
                        <button type="button" class="btn nav-link active d-flex align-items-center">
                            <i class="bi bi-flag me-2 fs-5"></i>
                            <span class="">Reports</span>
                        </button>
                    </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill me-2 fs-5"></i>
                            <span class="d-md-none">Profile</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="a_prof.php">My Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../index.php?logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<script>
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
    this.querySelector('i').classList.toggle('bi-list');
    this.querySelector('i').classList.toggle('bi-x'); // Toggle between "list" and "X" icons
});
</script>