(function ($) {

  var $window = $(window),
    $body = $('body'),
    $header = $('#header'),
    $banner = $('#banner');


  // Play initial animations on page load.
  $window.on('load', function () {
    window.setTimeout(function () {
      $body.removeClass('is-preload');
    }, 100);
  });

  // Dropdowns.
  $('#nav > ul').dropotron({
    alignment: 'right'
  });

  // NavPanel.

  // Button.
  // $(
  // 	'<div id="navButton">' +
  // 		'<a href="#navPanel" class="toggle"></a>' +
  // 	'</div>'
  // )
  // 	.appendTo($body);

  // Panel.
  $(
    '<div id="navPanel">' +
    '<nav>' +
    $('#nav').navList() +
    '</nav>' +
    '</div>'
  )
    .appendTo($body)
    .panel({
      delay: 500,
      hideOnClick: true,
      hideOnSwipe: true,
      resetScroll: true,
      resetForms: true,
      side: 'left',
      target: $body,
      visibleClass: 'navPanel-visible'
    });

  // Header.
  if (!browser.mobile
    && $header.hasClass('alt')
    && $banner.length > 0) {

    $window.on('load', function () {

      $banner.scrollex({
        bottom: $header.outerHeight(),
        terminate: function () { $header.removeClass('alt'); },
        enter: function () { $header.addClass('alt reveal'); },
        leave: function () { $header.removeClass('alt'); }
      });

    });

  }

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });

  //range
  var slider = document.getElementById("question5");
  var output = document.getElementById("question5_value");
  output.innerHTML = slider.value;
  slider.oninput = function() {
    output.innerHTML = this.value;
  }


})(jQuery);

function submit() {
  // fbq('track', 'SubmitApplication');
  $('#mainSubmit').click();
}
