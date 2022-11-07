/*
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	var	$window = $(window),
		$body = $('body'),
		$sidebar = $('#sidebar');

	// Breakpoints.
		breakpoints({
			xlarge:   [ '1281px',  '1680px' ],
			large:    [ '981px',   '1280px' ],
			medium:   [ '737px',   '980px'  ],
			small:    [ '481px',   '736px'  ],
			xsmall:   [ null,      '480px'  ]
		});

	// Hack: Enable IE flexbox workarounds.
		if (browser.name == 'ie')
			$body.addClass('is-ie');

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Forms.

		// Hack: Activate non-input submits.
			$('form').on('click', '.submit', function(event) {

				// Stop propagation, default.
					event.stopPropagation();
					event.preventDefault();

				// Submit form.
					$(this).parents('form').submit();

			});

	// Sidebar.
		if ($sidebar.length > 0) {

			var $sidebar_a = $sidebar.find('a');

			$sidebar_a
				.addClass('scrolly')
				.on('click', function() {

					var $this = $(this);

					// External link? Bail.
						if ($this.attr('href').charAt(0) != '#')
							return;

					// Deactivate all links.
						$sidebar_a.removeClass('active');

					// Activate link *and* lock it (so Scrollex doesn't try to activate other links as we're scrolling to this one's section).
						$this
							.addClass('active')
							.addClass('active-locked');

				})
				.each(function() {

					var	$this = $(this),
						id = $this.attr('href'),
						$section = $(id);

					// No section for this link? Bail.
						if ($section.length < 1)
							return;

					// Scrollex.
						$section.scrollex({
							mode: 'middle',
							top: '-20vh',
							bottom: '-20vh',
							initialize: function() {

								// Deactivate section.
									$section.addClass('inactive');

							},
							enter: function() {

								// Activate section.
									$section.removeClass('inactive');

								// No locked links? Deactivate all links and activate this section's one.
									if ($sidebar_a.filter('.active-locked').length == 0) {

										$sidebar_a.removeClass('active');
										$this.addClass('active');

									}

								// Otherwise, if this section's link is the one that's locked, unlock it.
									else if ($this.hasClass('active-locked'))
										$this.removeClass('active-locked');

							}
						});

				});

		}

	// Scrolly.
		$('.scrolly').scrolly({
			speed: 1000,
			offset: function() {

				// If <=large, >small, and sidebar is present, use its height as the offset.
					if (breakpoints.active('<=large')
					&&	!breakpoints.active('<=small')
					&&	$sidebar.length > 0)
						return $sidebar.height();

				return 0;

			}
		});

	// Spotlights.
		$('.spotlights > section')
			.scrollex({
				mode: 'middle',
				top: '-10vh',
				bottom: '-10vh',
				initialize: function() {

					// Deactivate section.
						$(this).addClass('inactive');

				},
				enter: function() {

					// Activate section.
						$(this).removeClass('inactive');

				}
			})
			.each(function() {

				var	$this = $(this),
					$image = $this.find('.image'),
					$img = $image.find('img'),
					x;

				// Assign image.
					$image.css('background-image', 'url(' + $img.attr('src') + ')');

				// Set background position.
					if (x = $img.data('position'))
						$image.css('background-position', x);

				// Hide <img>.
					$img.hide();

			});

	// Features.
		$('.features')
			.scrollex({
				mode: 'middle',
				top: '-20vh',
				bottom: '-20vh',
				initialize: function() {

					// Deactivate section.
						$(this).addClass('inactive');

				},
				enter: function() {

					// Activate section.
						$(this).removeClass('inactive');

				}
			});

})(jQuery);

function preview1(file) {
	var img = new Image(), url = img.src = URL.createObjectURL(file)
	var $img = $(img)
	img.onload = function() {
		URL.revokeObjectURL(url)
		$('#preview').empty().append($img)
	}
}
function preview2(file) {
	var reader = new FileReader()
	reader.onload = function(e) {
		var $img = $('<img>').attr("src", e.target.result)
		$('#preview').empty().append($img)
	}
	reader.readAsDataURL(file)
}
$(function() {
	$('[type=file]').change(function(e) {
	var file = e.target.files[0]
	preview1(file)
	})
})

function onlyNum() {
	if(!((document.getElementById('customer_tel').keyCode>=48&&
		document.getElementById('customer_tel').keyCode<=57)||
		document.getElementById('customer_tel').keyCode>=96&&
		document.getElementById('customer_tel').keyCode<=105)) {
			document.getElementById('customer_tel').innerText="";
	}
}

// Get the modal
var modal1 = document.getElementById("modal1");
var modal2 = document.getElementById("modal2");
var modal3 = document.getElementById("modal3");
var modal4 = document.getElementById("modal4");
var modal5 = document.getElementById("modal5");
// Get the button that opens the modal
var modalBtn1 = document.getElementById("modalBtn1");
var modalBtn2 = document.getElementById("modalBtn2");
var modalBtn3 = document.getElementById("modalBtn3");
var modalBtn4 = document.getElementById("modalBtn4");
var modalBtn5 = document.getElementById("modalBtn5");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");
// When the user clicks the button, open the modal 
modalBtn1.onclick = function() { modal1.style.display = "block";}
modalBtn2.onclick = function() { modal2.style.display = "block";}
modalBtn3.onclick = function() { modal3.style.display = "block";}
modalBtn4.onclick = function() { modal4.style.display = "block";}
modalBtn5.onclick = function() { modal5.style.display = "block";}
// When the user clicks on <span> (x), close the modal
span[0].onclick = function() { modal1.style.display = "none";}
span[0].onclick = function() { modal2.style.display = "none";}
span[0].onclick = function() { modal3.style.display = "none";}
span[0].onclick = function() { modal4.style.display = "none";}
span[0].onclick = function() { modal5.style.display = "none";}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal1) {
		modal1.style.display = "none";
	}
	else if (event.target == modal2) {
		modal2.style.display = "none";
	}
	else if (event.target == modal3) {
		modal3.style.display = "none";
	}
	else if (event.target == modal4) {
		modal4.style.display = "none";
	}
	else if (event.target == modal5) {
		modal5.style.display = "none";
	}
	else if(event.target == document.getElementById("modal_s1")) {
		document.getElementById("modal_s1").style.display="none";
	}
}

function openModal() {
	document.getElementById("modal_s1").style.display = "block";
  }
  
  function closeModal() {
	document.getElementById("modal_s1").style.display = "none";
  }
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
	showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
	showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	if (n > slides.length) {slideIndex = 1}
	if (n < 1) {slideIndex = slides.length}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slides[slideIndex-1].style.display = "block";
  }
	

	