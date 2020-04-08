    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/assets/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Post A Job</h1>
            <div class="custom-breadcrumbs">
              <a href="/">Home</a> <span class="mx-2 slash">/</span>
              <a href="/jobs">Jobs</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-12 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2>Post A Job</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form method="post" action="/job/add" enctype="multipart/form-data">
              <div class="p-4 p-md-5 border rounded">
                <h3 class="text-black mb-5 border-bottom pb-2">Job Summary</h3>
                <div class="form-group">
                  <label for="job-title">Job Title</label>
                  <input type="text" class="form-control" id="job-title" name="job_title" placeholder="e.g. Product Designer" required>
                </div>
                <div class="form-group">
                  <label for="job-type">Job Type</label>
                  <select class="selectpicker border rounded" id="job-type" name="job_type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type" required>
                    <option value="Part Time">Part Time</option>
                    <option value="Full Time">Full Time</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="job-location">Job Location</label>
                  <input type="text" class="form-control" id="job-location" name="job_location" placeholder="e.g. New York" required>
                </div>
                <div class="form-group">
                  <label for="job-region">Job Region</label>
                  <select class="selectpicker border rounded" id="job-region" name="job_region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region" required>
                    <option value="Anywhere">Anywhere</option>
                    <option value="San Francisco">San Francisco</option>
                    <option value="Palo Alto">Palo Alto</option>
                    <option value="New York">New York</option>
                    <option value="Manhattan">Manhattan</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Mountain View">Mountain View</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="experience">Experience</label>
                  <input type="text" class="form-control" id="experience" name="experience" placeholder="e.g. 2-3 years" required>
                </div>
                <div class="form-group">
                  <label for="salary">Salary</label>
                  <input type="text" class="form-control" id="salary" name="salary" placeholder="e.g. $60k - $100k" required>
                </div>
                <div class="form-group">
                  <label for="vacancies">Vacancies</label>
                  <input type="number" class="form-control" id="vacancies" name="vacancies" placeholder="e.g. 5" required>
                </div>
                <div class="form-group">
                  <label for="application-deadline">Application Deadline</label>
                  <input type="date" class="form-control" id="application-deadline" name="application_deadline" required>
                </div>
                <h3 class="text-black my-5 border-bottom pb-2">Job Details</h3>
                <div class="form-group">
                  <label for="job-description">Job Description</label>
                  <div class="editor" data-placeholder="Write Job Description!"></div>
                  <input type="hidden" id="job-description" name="job_description" required>
                </div>
                <div class="form-group">
                  <label for="roles-responsibilities">Roles and Responsibilities</label>
                  <div class="editor" data-placeholder="Enter roles and responsibilities"></div>
                  <input type="hidden" id="roles-responsibilities" name="roles_responsibilities">
                </div>
                <div class="form-group">
                  <label for="education-experience">Education and Experience</label>
                  <div class="editor" data-placeholder="Enter education and experience requirements"></div>
                  <input type="hidden" id="education-experience" name="education_experience">
                </div>
                <div class="form-group">
                  <label for="perks-benefits">Perks and Benefits</label>
                  <div class="editor" data-placeholder="Enter perks and benefits"></div>
                  <input type="hidden" id="perks-benefits" name="perks_benefits">
                </div>
                <h3 class="text-black my-5 border-bottom pb-2">Company Details</h3>
                <div class="form-group">
                  <label for="company-name">Company Name</label>
                  <input type="text" class="form-control" id="company-name" name="company_name" placeholder="e.g. Puma" required>
                </div>
                <div class="form-group">
                  <label for="company-logo">Company Logo</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="company-logo" name="company_logo" required>
                    <label class="custom-file-label" for="company-logo">Choose file...</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="company-website">Website (Optional)</label>
                  <input type="url" class="form-control" id="company-website" name="company_website" placeholder="https://">
                </div>
                <div class="form-group">
                  <label for="company-facebook">Facebook Username (Optional)</label>
                  <input type="text" class="form-control" id="company-facebook" name="company_facebook" placeholder="companyname">
                </div>
                <div class="form-group">
                  <label for="company-twitter">Twitter Username (Optional)</label>
                  <input type="text" class="form-control" id="company-twitter" name="company_twitter" placeholder="@companyname">
                </div>
                <div class="form-group">
                  <label for="company-linkedin">LinkedIn Username (Optional)</label>
                  <input type="text" class="form-control" id="company-linkedin" name="company_linkedin" placeholder="companyname">
                </div>
              </div>
              <div class="row align-items-center mt-5">
                <div class="col-lg-4 ml-auto">
                  <button type="submit" class="btn btn-block btn-primary btn-md">Post Job</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>