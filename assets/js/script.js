jQuery(function ($) {

  'use strict';

  $(".loader").delay(1000).fadeOut("slow");
  $("#overlayer").delay(1000).fadeOut("slow");

  var siteMenuClone = function () {
    $('.js-clone-nav').each(function () {
      var $this = $(this);
      $this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
    });


    setTimeout(function () {
      var counter = 0;

      $('.site-mobile-menu .has-children').each(function () {
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle': 'collapse',
          'data-target': '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class': 'collapse',
          'id': 'collapseItem' + counter,
        });

        counter++;
      });
    }, 1000);

    $('body').on('click', '.arrow-collapse', function (e) {
      var $this = $(this);

      if ($this.closest('li').find('.collapse').hasClass('show')) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }

      e.preventDefault();
    });

    $(window).resize(function () {
      var $this = $(this),
        w = $this.width();

      if (w > 768) {
        if ($('body').hasClass('offcanvas-menu')) {
          $('body').removeClass('offcanvas-menu');
        }
      }
    })

    $('body').on('click', '.js-menu-toggle', function (e) {
      var $this = $(this);

      e.preventDefault();

      if ($('body').hasClass('offcanvas-menu')) {
        $('body').removeClass('offcanvas-menu');
        $this.removeClass('active');
      } else {
        $('body').addClass('offcanvas-menu');
        $this.addClass('active');
      }
    })

    // click outisde offcanvas
    $(document).mouseup(function (e) {
      var container = $(".site-mobile-menu");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('offcanvas-menu')) {
          $('body').removeClass('offcanvas-menu');
        }
      }
    });
  };
  siteMenuClone();

  var sitePlusMinus = function () {
    $('.js-btn-minus').on('click', function (e) {
      e.preventDefault();
      if ($(this).closest('.input-group').find('.form-control').val() != 0) {
        $(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
      } else {
        $(this).closest('.input-group').find('.form-control').val(parseInt(0));
      }
    });
    $('.js-btn-plus').on('click', function (e) {
      e.preventDefault();
      $(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
    });
  };
  // sitePlusMinus();

  var siteIstotope = function () {
    /* activate jquery isotope */
    var $container = $('#posts').isotope({
      itemSelector: '.item',
      isFitWidth: true
    });

    $(window).resize(function () {
      $container.isotope({
        columnWidth: '.col-sm-3'
      });
    });

    $container.isotope({
      filter: '*'
    });

    // filter items on button click
    $('#filters').on('click', 'button', function (e) {
      e.preventDefault();
      var filterValue = $(this).attr('data-filter');
      $container.isotope({
        filter: filterValue
      });
      $('#filters button').removeClass('active');
      $(this).addClass('active');
    });
  }
  siteIstotope();

  var fancyBoxInit = function () {
    $('.fancybox').on('click', function () {
      var visibleLinks = $('.fancybox');

      $.fancybox.open(visibleLinks, {}, visibleLinks.index(this));

      return false;
    });
  }
  fancyBoxInit();

  var stickyFillInit = function () {
    $(window).on('resize orientationchange', function () {
      recalc();
    }).resize();

    function recalc() {
      if ($('.jm-sticky-top').length > 0) {
        var elements = $('.jm-sticky-top');
        Stickyfill.add(elements);
      }
    }
  }
  stickyFillInit();

  // navigation
  var OnePageNavigation = function () {
    var navToggler = $('.site-menu-toggle');
    $("body").on("click", ".main-menu li a[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a", function (e) {
      e.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        'scrollTop': $(hash).offset().top
      }, 600, 'easeInOutCirc', function () {
        window.location.hash = hash;
      });

    });
  };
  OnePageNavigation();

  var counterInit = function () {
    if ($('.section-counter').length > 0) {
      $('.section-counter').waypoint(function (direction) {

        if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

          var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
          $('.number').each(function () {
            var $this = $(this),
              num = $this.data('number');
            $this.animateNumber({
              number: num,
              numberStep: comma_separator_number_step
            }, 7000);
          });

        }

      }, {
        offset: '95%'
      });
    }

  }
  counterInit();

  var selectPickerInit = function () {
    $('.selectpicker').selectpicker();
  }
  selectPickerInit();

  var owlCarouselFunction = function () {
    $('.single-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      autoplay: true,
      items: 1,
      nav: false,
      smartSpeed: 1000
    });

  }
  owlCarouselFunction();

  var quillInit = function () {
    var toolbarOptions = [
      ['bold', 'italic', 'underline', 'strike'], // toggled buttons
      ['blockquote', 'code-block'],

      [{
        'header': 1
      }, {
        'header': 2
      }], // custom button values
      [{
        'list': 'ordered'
      }, {
        'list': 'bullet'
      }],
      [{
        'script': 'sub'
      }, {
        'script': 'super'
      }], // superscript/subscript
      [{
        'indent': '-1'
      }, {
        'indent': '+1'
      }], // outdent/indent
      [{
        'direction': 'rtl'
      }], // text direction

      [{
        'size': ['small', false, 'large', 'huge']
      }], // custom dropdown
      [{
        'header': [1, 2, 3, 4, 5, 6, false]
      }],

      [{
        'color': []
      }, {
        'background': []
      }], // dropdown with defaults from theme
      [{
        'font': []
      }],
      [{
        'align': []
      }],

      ['clean'] // remove formatting button
    ];

    if ($('.editor').length > 0) {
      $('.editor').each(function() {
        var editor = new Quill(this, {
          modules: {
            toolbar: toolbarOptions,
          },
          placeholder: $(this).data('placeholder') || 'Compose an epic...',
          theme: 'snow' // or 'bubble'
        });

        // Handle text changes
        editor.on('text-change', function() {
          $(editor.container).siblings('input[type="hidden"]').val(editor.root.innerHTML);
        });
      });
    }
  }
  quillInit();

  var paginationInit = function () {
    $(document).ready(function () {
      // Configuration
      const itemsPerPage = 5;
      const $jobItems = $('.job-listing');
      const totalJobs = $jobItems.length;
      const totalPages = Math.ceil(totalJobs / itemsPerPage);

      // Initially hide all jobs using Bootstrap classes
      $jobItems.addClass('d-none');

      function showPage(page) {
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        // Hide all jobs first using Bootstrap
        $jobItems.addClass('d-none').removeClass('d-block d-sm-flex');
        
        // Show jobs for current page using Bootstrap classes
        $jobItems.slice(startIndex, endIndex)
          .removeClass('d-none')
          .addClass('d-block d-sm-flex');

        // Update active state on pagination
        $('.custom-pagination .d-inline-block a')
          .removeClass('active')
          .eq(page - 1)
          .addClass('active');

        // Update counter text
        $('.pagination-wrap .col-md-6 span').text(
          `Showing ${startIndex + 1}-${Math.min(endIndex, totalJobs)} of ${totalJobs} Jobs`
        );

        // Handle prev/next button states with Bootstrap disabled class
        $('.custom-pagination .prev')
          .toggleClass('disabled', page === 1)
          .attr('aria-disabled', page === 1);
        
        $('.custom-pagination .next')
          .toggleClass('disabled', page === totalPages)
          .attr('aria-disabled', page === totalPages);
      }

      // Generate pagination buttons
      const $paginationContainer = $('.custom-pagination .d-inline-block');
      $paginationContainer.empty();

      for (let i = 1; i <= totalPages; i++) {
        $('<a>', {
          href: 'javascript:void(0)',
          text: i,
          class: 'px-2',
          click: function(e) {
            e.preventDefault();
            showPage(i);
          }
        }).appendTo($paginationContainer);
      }

      // Handle prev/next clicks
      $('.custom-pagination .prev').on('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('disabled')) return;
        
        const currentPage = $('.custom-pagination .d-inline-block a.active').index() + 1;
        if (currentPage > 1) showPage(currentPage - 1);
      });

      $('.custom-pagination .next').on('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('disabled')) return;
        
        const currentPage = $('.custom-pagination .d-inline-block a.active').index() + 1;
        if (currentPage < totalPages) showPage(currentPage + 1);
      });

      // Show first page initially or hide pagination if no jobs
      if (totalJobs > 0) {
        showPage(1);
      } else {
        $('.pagination-wrap').addClass('d-none');
      }
    });
  };
  paginationInit();

  var deleteJob = function () {
    document.querySelectorAll('.delete-job-btn').forEach((button) => {
      button.addEventListener('click', (e) => {
        e.preventDefault();

        const jobId = button.getAttribute('data-job-id');
        if (!jobId) return;

        fetch('/jobs', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            action: 'delete',
            jobId: jobId,
          }),
        })
          .then((response) => {
            if (response.status === 401) {
              // Handle unauthorized access
              alert('You must be logged in to delete a job.');
              return;
            }

            if (!response.ok) {
              throw new Error('An error occurred while deleting the job.');
            }

            return response.json();
          })
          .then((data) => {
            if (data && data.message) {
              alert(data.message);
              // Optionally reload the page or remove the job from the UI
              location.reload();
            }
          })
          .catch((error) => {
            console.error('Error:', error);
            alert('Failed to delete the job. Please try again later.');
          });
      });
    });
  }
  deleteJob();

  $('#save-job').on('click', function() {
    // Get the Quill content
    var quillContent = new Quill('#editor-1').root.innerHTML;

    // Set the value of the hidden input field
    document.getElementById('job-description').value = quillContent;

    // Submit the form
    $('#insert-form')[0].submit();
  });
});