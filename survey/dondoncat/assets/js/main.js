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
  var slider = document.getElementById("question6");
  var output = document.getElementById("question6_value");
  output.innerHTML = slider.value;
  slider.oninput = function() {
    output.innerHTML = this.value;
  }


})(jQuery);

function submit() {
  // fbq('track', 'SubmitApplication');
  $('#mainSubmit').click();
}

const $q5_1 = $('#q5_1');
const $q5_2 = $('#q5_2');
const $q5_3 = $('#q5_3');
const $q5_4 = $('#q5_4');
const $q5_5 = $('#q5_5');
const $q5_6 = $('#q5_6');
const $q5_7 = $('#q5_7');
const $q5_8 = $('#q5_8');
const $q5_9 = $('#q5_9');
const $q5_10 = $('#q5_10');
const $q5_11 = $('#q5_11');
const $q5_12 = $('#q5_12');
const $q5_13 = $('#q5_13');

$q5_1.css("display", "none");
$q5_2.css('display', 'none');
$q5_3.css('display', 'none');
$q5_4.css('display', 'none');
$q5_5.css('display', 'none');
$q5_6.css('display', 'none');
$q5_7.css('display', 'none');
$q5_8.css('display', 'none');
$q5_9.css('display', 'none');
$q5_10.css('display', 'none');
$q5_11.css('display', 'none');
$q5_12.css('display', 'none');
$q5_13.css('display', 'none');

$('#q4_1').click(() => {
  $q5_1.css("display", "block");
  $q5_2.css('display', 'block');
  $q5_3.css('display', 'block');
  $q5_4.css('display', 'none');
  $q5_5.css('display', 'none');
  $q5_6.css('display', 'none');
  $q5_7.css('display', 'none');
  $q5_8.css('display', 'none');
  $q5_9.css('display', 'none');
  $q5_10.css('display', 'none');
  $q5_11.css('display', 'none');
  $q5_12.css('display', 'none');
  $q5_13.css('display', 'none');
});
$('#q4_2').click(() => {
  $q5_1.css("display", "none");
  $q5_2.css('display', 'none');
  $q5_3.css('display', 'none');
  $q5_4.css('display', 'block');
  $q5_5.css('display', 'block');
  $q5_6.css('display', 'block');
  $q5_7.css('display', 'none');
  $q5_8.css('display', 'none');
  $q5_9.css('display', 'none');
  $q5_10.css('display', 'none');
  $q5_11.css('display', 'none');
  $q5_12.css('display', 'none');
  $q5_13.css('display', 'none');
});
$('#q4_3').click(() => {
  $q5_1.css("display", "none");
  $q5_2.css('display', 'none');
  $q5_3.css('display', 'none');
  $q5_4.css('display', 'none');
  $q5_5.css('display', 'none');
  $q5_6.css('display', 'none');
  $q5_7.css('display', 'block');
  $q5_8.css('display', 'block');
  $q5_9.css('display', 'block');
  $q5_10.css('display', 'block');
  $q5_11.css('display', 'none');
  $q5_12.css('display', 'none');
  $q5_13.css('display', 'none');
});
$('#q4_4').click(() => {
  $q5_1.css("display", "none");
  $q5_2.css('display', 'none');
  $q5_3.css('display', 'none');
  $q5_4.css('display', 'none');
  $q5_5.css('display', 'none');
  $q5_6.css('display', 'none');
  $q5_7.css('display', 'none');
  $q5_8.css('display', 'none');
  $q5_9.css('display', 'none');
  $q5_10.css('display', 'none');
  $q5_11.css('display', 'block');
  $q5_12.css('display', 'block');
  $q5_13.css('display', 'block');
});