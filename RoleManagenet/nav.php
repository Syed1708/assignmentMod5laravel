
<div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary card shadow-sm " class="navbar bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">User Role Management</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                      <?php if (!isset($_SESSION['email'])) : ?>

                      <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="registration.php">SignUp</a>
                      </li>
                      <?php else : ?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                      </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                      </li>
                        <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </nav>

</div>