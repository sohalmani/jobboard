    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/assets/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?= htmlspecialchars($job['title']) ?></h1>
            <div class="custom-breadcrumbs">
              <a href="/">Home</a> <span class="mx-2 slash">/</span>
              <a href="/jobs">Jobs</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?= htmlspecialchars($job['title']) ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-12">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-none d-sm-inline-block mr-3 rounded">
                <img src="/assets/images/<?= htmlspecialchars($job['company_logo']) ?>" alt="Image">
              </div>
              <div>
                <h2><?= htmlspecialchars($job['title']) ?></h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?= htmlspecialchars($job['company_name']) ?></span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?= htmlspecialchars($job['location']) ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?= htmlspecialchars($job['type']) ?></span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <figure class="mb-5"><img src="/assets/images/job_single_img_1.jpg" alt="Image" class="img-fluid rounded"></figure>
            <?php if (!empty($job['description'])): ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
                <?= $job['description'] ?>
              </div>
            <?php endif; ?>
            <?php if (!empty($job['responsibilities'])): ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
                <ul class="list-unstyled mb-0 p-0">
                  <?php
                  $cleanContent = strip_tags($job['responsibilities']);
                  $lines = explode("\n", $cleanContent);
                  foreach ($lines as $line):
                    if (trim($line)): ?>
                      <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 mt-1 text-muted"></span><span><?= htmlspecialchars($line) ?></span></li>
                  <?php endif; endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if (!empty($job['requirements'])): ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
                <ul class="list-unstyled mb-0 p-0">
                  <?php
                  $cleanContent = strip_tags($job['requirements']);
                  $lines = explode("\n", $cleanContent);
                  foreach ($lines as $line):
                    if (trim($line)): ?>
                      <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 mt-1 text-muted"></span><span><?= htmlspecialchars($line) ?></span></li>
                  <?php endif; endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if (!empty($job['benefits'])): ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
                <ul class="list-unstyled mb-0 p-0">
                  <?php
                  $cleanContent = strip_tags($job['benefits']);
                  $lines = explode("\n", $cleanContent);
                  foreach ($lines as $line):
                    if (trim($line)): ?>
                      <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 mt-1 text-muted"></span><span><?= htmlspecialchars($line) ?></span></li>
                  <?php endif; endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <div class="row mb-5">
              <div class="col-12">
                <a href="mailto:<?= htmlspecialchars($job['user_email']) ?>?subject=Application for <?= urlencode($job['title']) ?> position" class="btn btn-block btn-primary btn-md">Apply Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong> <?= $job['formatted_date'] ?></li>
                <li class="mb-2"><strong class="text-black">Vacancy:</strong> <?= htmlspecialchars($job['vacancies']) ?></li>
                <li class="mb-2"><strong class="text-black">Employment Status:</strong> <?= htmlspecialchars($job['type']) ?></li>
                <li class="mb-2"><strong class="text-black">Experience:</strong> <?= htmlspecialchars($job['experience']) ?></li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> <?= htmlspecialchars($job['location']) ?></li>
                <li class="mb-2"><strong class="text-black">Salary:</strong> <?= htmlspecialchars($job['salary']) ?></li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> <?= $job['formatted_deadline'] ?></li>
              </ul>
            </div>
            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary mt-3 h5 pl-3 mb-3 ">Follow Us</h3>
              <div class="px-3">
                <a href="javascript:void(0)" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="javascript:void(0)" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="javascript:void(0)" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php if (!empty($relatedJobs)): ?>
      <section class="site-section" id="next">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">Related Jobs</h2>
            </div>
          </div>
          <ul class="job-listings mb-5">
            <?php foreach ($relatedJobs as $relatedJob): ?>
              <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="/job?id=<?= $relatedJob['id'] ?>"></a>
                <div class="job-listing-logo">
                  <img src="/assets/images/<?= htmlspecialchars($relatedJob['company_logo']) ?>" alt="Image" class="img-fluid">
                </div>
                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                  <div class="job-listing-position custom-width w-25 mb-3 mb-sm-0">
                    <h2><?= htmlspecialchars($relatedJob['title']) ?></h2>
                    <strong><?= htmlspecialchars($relatedJob['company_name']) ?></strong>
                  </div>
                  <div class="job-listing-location custom-width w-25 mb-3 mb-sm-0">
                    <span class="icon-room"></span> <?= htmlspecialchars($relatedJob['location']) ?>
                  </div>
                  <div class="job-listing-meta custom-width w-25">
                    <span class="badge badge-<?= strtolower($relatedJob['type']) === 'full time' ? 'success' : 'danger' ?>"><?= htmlspecialchars($relatedJob['type']) ?></span>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
    <?php endif; ?>
    <section class="bg-light pt-5 testimony-full">
      <div class="owl-carousel single-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="/assets/images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                <p><cite> &mdash; Chris Peters, @Google</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="/assets/images/person_transparent_1.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('/assets/images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Get The Mobile Apps</h2>
            <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
            <p class="mb-0">
              <a href="javascript:void(0)" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
              <a href="javascript:void(0)" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
            </p>
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="/assets/images/mobiles.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>