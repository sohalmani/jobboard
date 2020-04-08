    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('/assets/images/hero_1.jpg'); z-index: 3" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quas fugit ex!</p>
            </div>
            <form method="get" action="/jobs" class="search-jobs-form">
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" name="keyword" placeholder="Job title, Company..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" name="region" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
                    <option value="">Anywhere</option>
                    <option value="San Francisco" <?= (isset($_GET['region']) && $_GET['region'] == 'San Francisco') ? 'selected' : '' ?>>San Francisco</option>
                    <option value="Palo Alto" <?= (isset($_GET['region']) && $_GET['region'] == 'Palo Alto') ? 'selected' : '' ?>>Palo Alto</option>
                    <option value="New York" <?= (isset($_GET['region']) && $_GET['region'] == 'New York') ? 'selected' : '' ?>>New York</option>
                    <option value="Manhattan" <?= (isset($_GET['region']) && $_GET['region'] == 'Manhattan') ? 'selected' : '' ?>>Manhattan</option>
                    <option value="Ontario" <?= (isset($_GET['region']) && $_GET['region'] == 'Ontario') ? 'selected' : '' ?>>Ontario</option>
                    <option value="Toronto" <?= (isset($_GET['region']) && $_GET['region'] == 'Toronto') ? 'selected' : '' ?>>Toronto</option>
                    <option value="Kansas" <?= (isset($_GET['region']) && $_GET['region'] == 'Kansas') ? 'selected' : '' ?>>Kansas</option>
                    <option value="Mountain View" <?= (isset($_GET['region']) && $_GET['region'] == 'Mountain View') ? 'selected' : '' ?>>Mountain View</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" name="job_type" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option value="">Any</option>
                    <option value="Part Time" <?= (isset($_GET['job_type']) && $_GET['job_type'] == 'Part Time') ? 'selected' : '' ?>>Part Time</option>
                    <option value="Full Time" <?= (isset($_GET['job_type']) && $_GET['job_type'] == 'Full Time') ? 'selected' : '' ?>>Full Time</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                    <span class="icon-search icon mr-2"></span>Search Job
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 popular-keywords">
                  <h3>Trending Keywords:</h3>
                  <ul class="keywords list-unstyled m-0 p-0">
                    <li><a href="/jobs?keyword=UI%20Designer" class="">UI Designer</a></li>
                    <li><a href="/jobs?keyword=Python" class="">Python</a></li>
                    <li><a href="/jobs?keyword=Developer" class="">Developer</a></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>
    </section>
    <section class="site-section" id="next">
      <div class="container">
        <?php if (empty($jobs)): ?>
          <div class="row mb-5 justify-content-center">
            <div class="col-md-9 text-center">
              <?php if (isset($_GET['keyword']) || isset($_GET['region']) || isset($_GET['job_type'])): ?>
                <h2 class="section-title mb-4">No matching jobs found</h2>
                <p>We couldn't find any jobs matching your search criteria. Try adjusting your search or browse all available jobs.</p>
                <a href="/jobs" class="btn btn-primary btn-md mt-4">View All Jobs</a>
              <?php else: ?>
                <h2 class="section-title mb-4">No jobs available</h2>
                <p>There are currently no job listings available. Please check back later.</p>
              <?php endif; ?>
            </div>
          </div>
        <?php else: ?>
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2"><?= $total_jobs ?> Job(s) Listed</h2>
            </div>
          </div>
          <ul class="job-listings mb-5">
            <?php foreach ($jobs as $job): ?>
              <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="/job?id=<?= $job['id'] ?>"></a>
                <div class="job-listing-logo">
                  <img src="/assets/images/<?= $job['company_logo'] ?>" alt="Image" class="img-fluid">
                </div>
                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                  <div class="job-listing-position custom-width w-25 mb-3 mb-sm-0">
                    <h2><?= htmlspecialchars($job['title']) ?></h2>
                    <strong><?= htmlspecialchars($job['company_name']) ?></strong>
                  </div>
                  <div class="job-listing-location custom-width w-25 mb-3 mb-sm-0">
                    <span class="icon-room"></span> <?= htmlspecialchars($job['location']) ?>, <?= htmlspecialchars($job['region']) ?>
                  </div>
                  <div class="job-listing-meta custom-width w-25">
                    <span class="badge <?= (strtolower($job['type']) == 'full time') ? 'badge-success' : 'badge-danger' ?>"><?= htmlspecialchars($job['type']) ?></span>
                  </div>
                  <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="job-listing-actions custom-width w-25 mt-3 mt-sm-0">
                      <a class="btn btn-primary btn-sm" href="/job/edit?id=<?= $job['id'] ?>"><span class="icon-pencil"></span> <span class="d-none d-lg-inline">Edit</span></a>
                      <button class="btn btn-danger btn-sm delete-job-btn" data-job-id="<?= $job['id'] ?>"><span class="icon-delete"></span> <span class="d-none d-lg-inline">Delete</span></button>
                    </div>
                  <?php endif; ?>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="row pagination-wrap">
            <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
              <span>Loading...</span>
            </div>
            <div class="col-md-6 text-center text-md-right">
              <div class="custom-pagination ml-auto">
                <a href="javascript:void(0)" class="prev" aria-label="Previous page">Prev</a>
                <div class="d-inline-block">
                  <!-- Pagination numbers will be inserted here by JavaScript -->
                </div>
                <a href="javascript:void(0)" class="next" aria-label="Next page">Next</a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
    <?php if (!isset($_SESSION['user_id'])): ?>
      <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('/assets/images/hero_1.jpg');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h2 class="text-white">Post A Job?</h2>
              <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci
                impedit.</p>
            </div>
            <div class="col-md-3 ml-auto">
              <a href="/login" class="btn btn-warning btn-block btn-lg">Log In</a>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>