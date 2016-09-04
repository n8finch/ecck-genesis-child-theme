jQuery.noConflict();

// animate header
function header_animate() {
  var scrollPosition = jQuery(window).scrollTop();
  if (scrollPosition >= 50) {
    jQuery('#header').removeClass('fixed_header');
    jQuery('#header').addClass('header_animate');
  } else {
    jQuery('#header').removeClass('header_animate');
    jQuery('#header').addClass('fixed_header');
  }
}
// Portfolio items sizes
function zp_portfolio_item_width() {
  var container_width = jQuery('#gallery-items').width();

  if (container_width <= 480) {
    var item_width = Math.floor(( container_width - 30 ) / 1);
    jQuery('.portfolio-item').css({"width": item_width + "px", "max-width": item_width + "px"});
  } else if (container_width <= 600) {
    var item_width = Math.floor(( container_width - 60 ) / 2);
    jQuery('.portfolio-item').css({"width": item_width + "px", "max-width": item_width + "px"});
  } else {
    var item_width = Math.floor(( container_width - 90 ) / 3);
    jQuery('.portfolio-item').css({"width": item_width + "px", "max-width": item_width + "px"});
  }
}

// Maosnry blog item sizes
function zp_blog_item_width() {
  var container_width = jQuery('.masonry_blog_shortcode').width();

  if (container_width <= 480) {
    var item_width = Math.floor(container_width / 1);
    jQuery('.masonry_blog_3col .masonry_blog_item').css({"width": item_width + "px", "max-width": item_width + "px"});
    jQuery('.masonry_blog_2col .masonry_blog_item').css({"width": item_width + "px", "max-width": item_width + "px"});
  } else if (container_width <= 768) {
    var item_width = Math.floor(container_width / 2);
    jQuery('.masonry_blog_3col .masonry_blog_item').css({"width": item_width + "px", "max-width": item_width + "px"});
  } else {
    var item_width = Math.floor(( container_width  ) / 3);
    jQuery('.masonry_blog_3col .masonry_blog_item').css({"width": item_width + "px", "max-width": item_width + "px"});
  }
}

jQuery(document).ready(function () {
  //fitvids
  jQuery('.fitvids, .video_container').fitVids();

  // header animate on scroll
  jQuery(window).on('scroll', function (e) {
    header_animate();
  });

  // change all the select HTML tag into a dropdown
  jQuery("select").selectpicker({style: 'btn-lg btn-primary', menuStyle: 'dropdown'});

  // bootstrap carousel
  jQuery('.carousel').carousel({
    interval: 3000
  });

  // bootstrap carousel JUST for the mainpage slider
  jQuery('#fullwidth_slider.carousel').carousel({
    interval: 3000
  });

  // smooth scrolling
  jQuery('.home a[href*="#"]:not([href="#"])').not('#myCarousel a, .testimonial_section a, .modal-trigger a, .panel a, .tab_container ul li a, .accordion-toggle').click(function (o) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      || location.hostname == this.hostname) {

      var target = jQuery(this.hash);
      jQuery('.nav-primary ul li.menu-item').removeClass('active');

      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        jQuery(this).parent('li.menu-item').addClass('active');
        if (jQuery(".navbar").css("position") == "fixed") {
          jQuery('html,body').animate({
            scrollTop: target.offset().top - 72
          }, 700, 'swing');
        } else {
          jQuery('html,body').animate({
            scrollTop: target.offset().top
          }, 700, 'swing');
        }
        return false;
      }
    }
  });

  // tooltip
  jQuery("[data-toggle=tooltip]").tooltip();

  // popover
  jQuery('.popover-trigger').popover('hide');

  // tabs
  jQuery('.tab_container').find('.nav.nav-tabs > li:first-child').children('a[data-toggle="tab"]').tab('show');
  jQuery('.tab_container').find('.nav.nav-tabs > li:first-child').children('a[data-toggle="tab"]').parent().addClass('active');
  jQuery('.tab_container').find('.tab-content > div.tab-pane:first-child').addClass('in active');

  // Nav Spy
  jQuery('.nav-primary').onePageNav({
    currentClass: 'active',
    changeHash: false,
    scrollSpeed: 750,
    scrollOffset: -142,
    filter: ':not(.external)'
  });

  // Image pop-up
  jQuery('.gallery-image, .gallery-popup').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: 'true',
    mainClass: 'mfp-with-zoom',
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out',
      opener: function (openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });

  // Video Pop-up
  jQuery('.gallery-video').magnificPopup({
    delegate: 'a',
    type: 'iframe',
    closeOnContentClick: 'true',
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out'
    },
    disableOn: 700,
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // Mobile Menu
  jQuery('.nav-secondary .menu li, .nav-primary .menu li').each(function () {
    if (jQuery(this).children('ul.sub-menu').length > 0) {
      jQuery(this).children('a').after('<span class="indicator"><i class="fa fa-angle-down"></i></span>');
    }
  });

  jQuery('.nav-secondary .menu li span.indicator, .nav-primary .menu li span.indicator').toggle(function () {
    jQuery(this).next('ul.sub-menu').show();
    jQuery(this).children('.fa').removeClass('fa-angle-down');
    jQuery(this).children('.fa').addClass('fa-angle-up');
  }, function () {
    jQuery(this).next('ul.sub-menu').hide();
    jQuery(this).children('.fa').removeClass('fa-angle-up');
    jQuery(this).children('.fa').addClass('fa-angle-down');
  });

  jQuery('.mobile_menu').toggle(function () {
    jQuery('.nav-primary, .nav-secondary').slideDown(500);
  }, function () {
    jQuery('.nav-primary, .nav-secondary').slideUp(500);
  });


  // Set portfolio items width
  zp_portfolio_item_width();

  // initiate portfolio
  var jQuerycontainer = jQuery('#gallery-items');
  var jQueryoptionSets = jQuery('#filters .option-set'), jQueryoptionLinks = jQueryoptionSets.find('a');

  jQueryoptionLinks.click(function () {
    var jQuerythis = jQuery(this);
    // don't proceed if already selected
    if (jQuerythis.hasClass('selected')) {
      return false;
    }

    var jQueryoptionSet = jQuerythis.parents('.option-set');
    jQueryoptionSet.find('.selected').removeClass('selected active');
    jQuerythis.addClass('selected active');

    // make option object dynamically, i.e. { filter: '.my-filter-class' }
    var options = {},
      key = jQueryoptionSet.attr('data-option-key'),
      value = jQuerythis.attr('data-option-value');

    // parse 'false' as false boolean
    value = value === 'false' ? false : value;
    options[key] = value;

    if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
      // changes in layout modes need extra logic
      changeLayoutMode(jQuerythis, options)
    } else {
      // otherwise, apply new options
      jQuerycontainer.isotope(options);
    }
    return false;
  });

  // initiate blog
  zp_blog_item_width();
  var blogcontainer = jQuery('.masonry_blog_shortcode, .masonry_blog');
  blogcontainer.isotope({
    itemSelector: '.masonry_blog_item'
  });

});

// Re-initiate portfolio and blog when element are aalready loaded
jQuery(window).load(function () {
  jQuery('.portfolio_loader').fadeOut("slow").delay(500);
  jQuery('#gallery-items').fadeIn("slow").delay(500);

  //set portfolio item width
  zp_portfolio_item_width();

  var jQuerycontainer = jQuery('#gallery-items'),
    jQueryselect = jQuery('#filters select');

  jQuerycontainer.isotope({
    itemSelector: '.portfolio-item',
    filter: jQuery('#filters select option:selected').val()
  });

  jQueryselect.change(function () {
    var filters = jQuery(this).val();
    jQuerycontainer.isotope({
      filter: filters
    });
  });


  // blog

  zp_blog_item_width();
  var blogcontainer = jQuery('.masonry_blog_shortcode, .masonry_blog');
  blogcontainer.isotope({
    itemSelector: '.masonry_blog_item'
  });
});

// Re-initiate portfolio and blog when windows is resized
jQuery(window).resize(function () {
  //set portfolio item width
  zp_portfolio_item_width();

  var jQuerycontainer = jQuery('#gallery-items');
  jQuerycontainer.isotope({
    itemSelector: '.portfolio-item'
  });

  zp_blog_item_width();

  var blogcontainer = jQuery('.masonry_blog_shortcode, .masonry_blog');
  blogcontainer.isotope({
    itemSelector: '.masonry_blog_item'
  });
});


var accordian = jQuery('#eccknewsaccordian');

accordian.find('#eccknewsexcept').hide();

accordian.find('#eccknewstitle').on('click', function () {

});




jQuery(document).ready(function () {

  //Add text limit to My-Account Page on Company intro
  jQuery('#input_1_24').attr('maxlength', '1800');

  //Add add popup notification to member update
  jQuery('input').on('click', function () {
    if ( this.hasAttribute('name') ) {
      var update_check = this.getAttribute('name');
      if ( update_check === 'update_member_information') {
        alert('Thank you for submitting. Close this window to finish and send the submission.')
      }
    }
  });


});



