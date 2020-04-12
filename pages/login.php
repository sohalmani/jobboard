    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/assets/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Login</h1>
            <div class="custom-breadcrumbs">
              <a href="/">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Log In</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <h2 class="mb-4">Log In To JobBoard</h2>
            <?php if (isset($_SESSION['error'])): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php 
                  echo htmlspecialchars($_SESSION['error']); 
                  unset($_SESSION['error']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                  echo htmlspecialchars($_SESSION['success']); 
                  unset($_SESSION['success']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <form method="post" class="p-4 border rounded">
              <?php
                // Generate CSRF token if not exists
                if (!isset($_SESSION['csrf_token'])) {
                  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                }
              ?>
              <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required minlength="6">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Log In" class="btn px-4 btn-primary text-white">
                </div>
              </div>
            </form>
            <div class="row mt-3">
              <div class="col-md-6 offset-md-6 text-right">
                <a href="/register" class="text-primary">New user? Register here</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>