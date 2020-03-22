    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/assets/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Post A Job</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
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
            <form class="p-4 p-md-5 border rounded" method="post">
              <h3 class="text-black mb-5 border-bottom pb-2">Job Summary</h3>
              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" class="form-control" id="job-title" placeholder="e.g. Product Designer">
              </div>
              <div class="form-group">
                <label for="job-type">Job Type</label>
                <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                  <option>Part Time</option>
                  <option>Full Time</option>
                </select>
              </div>
              <div class="form-group">
                <label for="job-location">Job Location</label>
                <input type="text" class="form-control" id="job-location" placeholder="e.g. New York">
              </div>
              <div class="form-group">
                <label for="job-region">Job Region</label>
                <select class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                  <option>Anywhere</option>
                  <option>San Francisco</option>
                  <option>Palo Alto</option>
                  <option>New York</option>
                  <option>Manhattan</option>
                  <option>Ontario</option>
                  <option>Toronto</option>
                  <option>Kansas</option>
                  <option>Mountain View</option>
                </select>
              </div>
              <div class="form-group">
                <label for="experience">Experience</label>
                <input type="text" class="form-control" id="experience" name="experience" placeholder="e.g. 2-3 years">
              </div>
              <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" placeholder="e.g. $60k - $100k">
              </div>
              <div class="form-group">
                <label for="vacancies">Vacancies</label>
                <input type="number" class="form-control" id="vacancies" name="vacancies" placeholder="e.g. 5">
              </div>
              <h3 class="text-black my-5 border-bottom pb-2">Job Details</h3>
              <div class="form-group">
                <label for="featured-image" class="form-label">Featured Image</label>
                <div class="custom-file">
                  <label class="custom-file-label" for="featured-image">Choose file...</label>
                  <input type="file" class="custom-file-input" id="featured-image">
                </div>
              </div>
              <div class="form-group">
                <label for="job-description">Job Description</label>
                <div class="editor" id="editor-1">
                  <p>Write Job Description!</p>
                </div>
              </div>
              <div class="form-group">
                <label for="roles_responsibilities">Roles and Responsibilities</label>
                <div class="editor" id="editor-2" data-placeholder="Enter roles and responsibilities"></div>
                <input type="hidden" class="form-control" id="roles_responsibilities" name="roles_responsibilities">
              </div>
              <div class="form-group">
                <label for="education_experience">Education and Experience</label>
                <div class="editor" id="editor-3" data-placeholder="Enter education and experience requirements"></div>
                <input type="hidden" class="form-control" id="education_experience" name="education_experience">
              </div>
              <div class="form-group">
                <label for="perks_benefits">Perks and Benefits</label>
                <div class="editor" id="editor-4" data-placeholder="Enter perks and benefits"></div>
                <input type="hidden" class="form-control" id="perks_benefits" name="perks_benefits">
              </div>
              <h3 class="text-black my-5 border-bottom pb-2">Company Details</h3>
              <div class="form-group">
                <label for="company-name">Company Name</label>
                <input type="text" class="form-control" id="company-name" placeholder="e.g. Puma">
              </div>
              <div class="form-group">
                <label for="company-logo">Company Logo</label>
                <div class="custom-file">
                  <label class="custom-file-label" for="company-logo">Choose file...</label>
                  <input type="file" class="custom-file-input" id="company-logo">
                </div>
              </div>
              <div class="form-group">
                <label for="company-website">Website (Optional)</label>
                <input type="text" class="form-control" id="company-website" placeholder="https://">
              </div>
              <div class="form-group">
                <label for="company-website-fb">Facebook Username (Optional)</label>
                <input type="text" class="form-control" id="company-website-fb" placeholder="companyname">
              </div>
              <div class="form-group">
                <label for="company-website-tw">Twitter Username (Optional)</label>
                <input type="text" class="form-control" id="company-website-tw" placeholder="@companyname">
              </div>
              <div class="form-group">
                <label for="company-website-tw">Linkedin Username (Optional)</label>
                <input type="text" class="form-control" id="company-website-tw" placeholder="companyname">
              </div>
            </form>
          </div>
        </div>
        <div class="row align-items-center mb-5">
          <div class="col-lg-4 ml-auto">
            <a href="#" class="btn btn-block btn-primary btn-md">Save Job</a>
          </div>
        </div>
      </div>
    </section>