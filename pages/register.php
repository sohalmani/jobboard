    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/assets/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Sign Up</h1>
            <div class="custom-breadcrumbs">
              <a href="/">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Sign Up</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mx-auto">
            <h2 class="mb-4">Sign Up To JobBoard</h2>
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
            <form method="post" class="p-4 border rounded" id="registerForm">
              <?php
                // Generate CSRF token if not exists
                if (!isset($_SESSION['csrf_token'])) {
                  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                }
              ?>
              <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email <span class="text-danger">*</span></label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email address" 
                         required value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
                  <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Password <span class="text-danger">*</span></label>
                  <input type="password" id="password" name="password" class="form-control" 
                         placeholder="Password" required minlength="8" 
                         pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$">
                  <small class="form-text text-muted">
                    Password must be at least 8 characters long and contain:
                    <ul class="mb-0">
                      <li>At least one uppercase letter</li>
                      <li>At least one lowercase letter</li>
                      <li>At least one number</li>
                    </ul>
                  </small>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="confirm-password">Re-Type Password <span class="text-danger">*</span></label>
                  <input type="password" id="confirm-password" name="confirm_password" class="form-control" 
                         placeholder="Re-type Password" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="terms" name="terms" required>
                    <label class="custom-control-label text-black" for="terms">
                      I agree to the <a href="#" class="text-primary">Terms and Conditions</a> and <a href="#" class="text-primary">Privacy Policy</a>
                    </label>
                  </div>
                  <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                </div>
              </div>
            </form>
            <div class="row mt-3">
              <div class="col-md-6 offset-md-6 text-right">
                <a href="/login" class="text-primary">Already have an email? Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>