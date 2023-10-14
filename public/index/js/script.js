"use strict";
(function () {
	// Global variables
	var
		userAgent = navigator.userAgent.toLowerCase(),
		initialDate = new Date(),

		$document = $(document),
		$window = $(window),
		$html = $("html"),
		$body = $("body"),

		isDesktop = $html.hasClass("desktop"),
		isIE = userAgent.indexOf("msie") !== -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") !== -1 ? 11 : userAgent.indexOf("edge") !== -1 ? 12 : false,
		isSafari = navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1,
		isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
		isTouch = "ontouchstart" in window,
		detailsBlock = document.getElementsByClassName('block-with-details'),
		windowReady = false,
		isNoviBuilder = false,
		livedemo = false,

		plugins = {
			bootstrapDateTimePicker:    $('[data-time-picker]'),
			bootstrapModal:             $('.modal'),
			bootstrapModalNotification: $('.notification'),
			bootstrapTabs:              $('.tabs-custom'),
			bootstrapTooltip:           $('[data-toggle="tooltip"]'),
			buttonNina:                 $('.button-nina'),
			checkbox:                   $('input[type="checkbox"]'),
			customToggle:               $('[data-custom-toggle]'),
			customWaypoints:            $('[data-custom-scroll-to]'),
			d3Charts:                   $('.d3-chart'),
			facebookWidget:             $('#fb-root'),
			flickrfeed:                 $('.flickr'),
			gradientMove:               $('.gradient-move'),
			jPlayer:                    $('.jp-jplayer'),
			jPlayerInit:                $('.jp-player-init'),
			jPlayerVideo:               $('.jp-video-init'),
			lightGallery:               $('[data-lightgallery="group"]'),
			lightGalleryItem:           $('[data-lightgallery="item"]'),
			lightDynamicGalleryItem:    $('[data-lightgallery="dynamic"]'),
			owl:                        $('.owl-carousel'),
			preloader:                  $('.page-loader'),
			parallaxText:               $('.parallax-text'),
			popover:                    $('[data-toggle="popover"]'),
			productThumb:               $('.product-thumbnails'),
			radio:                      $('input[type="radio"]'),
			rdNavbar:                   $('.rd-navbar'),
			scroller:                   $('.scroll-wrap'),
			search:                     $('.rd-search'),
			searchResults:              $('.rd-search-results'),
			selectFilter:               $('.select-filter'),
			slick:                      $('.slick-slider'),
			statefulButton:             $('.btn-stateful'),
			stepper:                    $('input[type="number"]'),
			styleSwitcher:              $('.style-switcher'),
			swiper:                     $('.swiper-slider'),
			twitterfeed:                $('.twitter'),
			typedjs:                    $('.typed-text-wrap'),
			vide:                       $('.vide'),
			videoGallery:               $('#video-gallery'),
			viewAnimate:                $('.view-animate'),
			layoutPanel:                $('.layout-panel'),
			copyrightYear:              $('.copyright-year'),
			rdMailForm:                 $('.rd-mailform'),
			rdInputLabel:               $('.form-label'),
			regula:                     $('[data-constraints]'),
			captcha:                    $('.recaptcha'),
			campaignMonitor:            $('.campaign-mailform'),
			mailchimp:                  $('.mailchimp-mailform'),
			materialParallax:           $('.parallax-container'),
			wow:                        $('.wow'),
			maps:                       $('.google-map-container'),
			isotope:                    $('.isotope-wrap'),
			countDown:                  $('.countdown'),
			counter:                    document.querySelectorAll('.counter'),
			dateCountdown:              document.querySelectorAll('.DateCountdown'),
			progressLinear:             document.querySelectorAll('.progress-linear'),
			progressCircle:             document.querySelectorAll('.progress-circle'),
		};


	/**
	 * @desc Check the element was been scrolled into the view
	 * @param {object} elem - jQuery object
	 * @return {boolean}
	 */
	function isScrolledIntoView(elem) {
		if (isNoviBuilder) return true;
		return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
	}


	/**
	 * @desc Calls a function when element has been scrolled into the view
	 * @param {object} element - jQuery object
	 * @param {function} func - init function
	 */
	function lazyInit(element, func) {
		var scrollHandler = function () {
			if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
				func.call(element);
				element.addClass('lazy-loaded');
			}
		};

		scrollHandler();
		$window.on('scroll', scrollHandler);
	}


	// Initialize scripts that require a loaded window
	$window.on('load', function () {
		// Page loader & Page transition
		if (plugins.preloader.length && !isNoviBuilder) {
			pageTransition({
				target:            document.querySelector('.page'),
				delay:             0,
				duration:          50,
				classIn:           'fadeIn',
				classOut:          'fadeOut',
				classActive:       'animated',
				conditions:        function (event, link) {
					return link
						&& !/(\#|javascript:void\(0\)|callto:|tel:|mailto:|:\/\/)/.test(link)
						&& !event.currentTarget.hasAttribute('data-lightgallery')
						&& !event.currentTarget.hasClass('jp-playlist-item')
						&& !document.documentElement.classList.contains('navbar-demo');
				},
				onTransitionStart: function (options) {
					setTimeout(function () {
						plugins.preloader.removeClass('loaded');
					}, options.duration * .5);
				},
				onReady:           function () {
					plugins.preloader.addClass('loaded');
					windowReady = true;
				}
			});
		}

		// Material Parallax
		if (plugins.materialParallax.length) {
			if (!isNoviBuilder && !isIE && !isMobile) {
				plugins.materialParallax.parallax();
			} else {
				for (var i = 0; i < plugins.materialParallax.length; i++) {
					var $parallax = $(plugins.materialParallax[i]);

					$parallax.addClass('parallax-disabled');
					$parallax.css({"background-image": 'url(' + $parallax.data("parallax-img") + ')'});
				}
			}
		}

		// Isotope
		if (plugins.isotope.length) {
			for (var i = 0; i < plugins.isotope.length; i++) {
				var
					wrap = plugins.isotope[i],
					filterHandler = function (event) {
						event.preventDefault();
						for (var n = 0; n < this.isoGroup.filters.length; n++) this.isoGroup.filters[n].classList.remove('active');
						this.classList.add('active');
						this.isoGroup.isotope.arrange({filter: this.getAttribute("data-isotope-filter") !== '*' ? '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]' : '*'});
					},
					resizeHandler = function () {
						this.isoGroup.isotope.layout();
					};

				wrap.isoGroup = {};
				wrap.isoGroup.filters = wrap.querySelectorAll('[data-isotope-filter]');
				wrap.isoGroup.node = wrap.querySelector('.isotope');
				wrap.isoGroup.layout = wrap.isoGroup.node.getAttribute('data-isotope-layout') ? wrap.isoGroup.node.getAttribute('data-isotope-layout') : 'masonry';
				wrap.isoGroup.isotope = new Isotope(wrap.isoGroup.node, {
					itemSelector: '.isotope-item',
					layoutMode:   wrap.isoGroup.layout,
					filter:       '*',
					columnWidth:  (function () {
						if (wrap.isoGroup.node.hasAttribute('data-column-class')) return wrap.isoGroup.node.getAttribute('data-column-class');
						if (wrap.isoGroup.node.hasAttribute('data-column-width')) return parseFloat(wrap.isoGroup.node.getAttribute('data-column-width'));
					}())
				});

				for (var n = 0; n < wrap.isoGroup.filters.length; n++) {
					var filter = wrap.isoGroup.filters[n];
					filter.isoGroup = wrap.isoGroup;
					filter.addEventListener('click', filterHandler);
				}

				window.addEventListener('resize', resizeHandler.bind(wrap));
			}
		}
	});


	// Initialize scripts that require a finished document
	$(function () {
		isNoviBuilder = window.xMode;

		/**
		 * @desc Initialize Bootstrap tooltip with required placement
		 * @param {string} tooltipPlacement
		 */
		function initBootstrapTooltip(tooltipPlacement) {
			plugins.bootstrapTooltip.tooltip('dispose');

			if (window.innerWidth < 480) {
				plugins.bootstrapTooltip.tooltip({placement: 'bottom'});
			} else {
				plugins.bootstrapTooltip.tooltip({placement: tooltipPlacement});
			}
		}

		/**
		 * @desc Initialize owl carousel plugin
		 * @param {object} carousel - carousel jQuery object
		 */
		function initOwlCarousel(carousel) {
			var
				aliaces = ['-', '-sm-', '-md-', '-lg-', '-xl-', '-xxl-'],
				values = [0, 480, 768, 992, 1200, 1600],
				responsive = {};

			for (var j = 0; j < values.length; j++) {
				responsive[values[j]] = {};
				for (var k = j; k >= -1; k--) {
					if (!responsive[values[j]]['items'] && carousel.attr('data' + aliaces[k] + 'items')) {
						responsive[values[j]]['items'] = k < 0 ? 1 : parseInt(carousel.attr('data' + aliaces[k] + 'items'), 10);
					}
					if (!responsive[values[j]]['stagePadding'] && responsive[values[j]]['stagePadding'] !== 0 && carousel.attr('data' + aliaces[k] + 'stage-padding')) {
						responsive[values[j]]['stagePadding'] = k < 0 ? 0 : parseInt(carousel.attr('data' + aliaces[k] + 'stage-padding'), 10);
					}
					if (!responsive[values[j]]['margin'] && responsive[values[j]]['margin'] !== 0 && carousel.attr('data' + aliaces[k] + 'margin')) {
						responsive[values[j]]['margin'] = k < 0 ? 30 : parseInt(carousel.attr('data' + aliaces[k] + 'margin'), 10);
					}
				}
			}

			// Initialize lightgallery items in cloned owl items
			carousel.on('initialized.owl.carousel', function () {
				initLightGalleryItem(carousel.find('[data-lightgallery="item"]'), 'lightGallery-in-carousel');
			});

			carousel.owlCarousel({
				autoplay:           isNoviBuilder ? false : carousel.attr('data-autoplay') !== 'false',
				autoplayTimeout:    carousel.attr("data-autoplay-time-out") ? Number(carousel.attr("data-autoplay-time-out")) : 3000,
				autoplayHoverPause: true,
				URLhashListener:    carousel.attr('data-hash-navigation') === 'true' || false,
				startPosition:      'URLHash',
				loop:               isNoviBuilder ? false : carousel.attr('data-loop') !== 'false',
				items:              1,
				autoHeight:         carousel.attr('data-auto-height') === 'true',
				center:             carousel.attr('data-center') === 'true',
				dotsContainer:      carousel.attr('data-pagination-class') || false,
				navContainer:       carousel.attr('data-navigation-class') || false,
				mouseDrag:          isNoviBuilder ? false : carousel.attr('data-mouse-drag') !== 'false',
				nav:                carousel.attr('data-nav') === 'true',
				dots:               carousel.attr('data-dots') === 'true',
				dotsEach:           carousel.attr('data-dots-each') ? parseInt(carousel.attr('data-dots-each'), 10) : false,
				animateIn:          carousel.attr('data-animation-in') ? carousel.attr('data-animation-in') : false,
				animateOut:         carousel.attr('data-animation-out') ? carousel.attr('data-animation-out') : false,
				responsive:         responsive,
				navText:            carousel.attr('data-nav-text') ? $.parseJSON(carousel.attr('data-nav-text')) : [],
				navClass:           carousel.attr('data-nav-class') ? $.parseJSON(carousel.attr('data-nav-class')) : ['owl-prev', 'owl-next']
			});
		}

		/**
		 * @desc Sets the actual previous index based on the position of the slide in the markup. Should be the most recent action.
		 * @param {object} swiper - swiper instance
		 */
		function setRealPrevious(swiper) {
			var element = swiper.$wrapperEl[0].children[swiper.activeIndex];
			swiper.realPrevious = Array.prototype.indexOf.call(element.parentNode.children, element);
		}

		/**
		 * @desc Sets slides background images from attribute 'data-slide-bg'
		 * @param {object} swiper - swiper instance
		 */
		function setBackgrounds(swiper) {
			let swipersBg = swiper.el.querySelectorAll('[data-slide-bg]');

			for (let i = 0; i < swipersBg.length; i++) {
				let swiperBg = swipersBg[i];
				swiperBg.style.backgroundImage = 'url(' + swiperBg.getAttribute('data-slide-bg') + ')';
			}
		}

		/**
		 * @desc Animate captions on active slides
		 * @param {object} swiper - swiper instance
		 */
		function initCaptionAnimate(swiper) {
			var
				animate = function (caption) {
					return function () {
						var duration;
						if (duration = caption.getAttribute('data-caption-duration')) caption.style.animationDuration = duration + 'ms';
						caption.classList.remove('not-animated');
						caption.classList.add(caption.getAttribute('data-caption-animate'));
						caption.classList.add('animated');
					};
				},
				initializeAnimation = function (captions) {
					for (var i = 0; i < captions.length; i++) {
						var caption = captions[i];
						caption.classList.remove('animated');
						caption.classList.remove(caption.getAttribute('data-caption-animate'));
						caption.classList.add('not-animated');
					}
				},
				finalizeAnimation = function (captions) {
					for (var i = 0; i < captions.length; i++) {
						var caption = captions[i];
						if (caption.getAttribute('data-caption-delay')) {
							setTimeout(animate(caption), Number(caption.getAttribute('data-caption-delay')));
						} else {
							animate(caption)();
						}
					}
				};

			// Caption parameters
			swiper.params.caption = {
				animationEvent: 'slideChangeTransitionEnd'
			};

			initializeAnimation(swiper.$wrapperEl[0].querySelectorAll('[data-caption-animate]'));
			finalizeAnimation(swiper.$wrapperEl[0].children[swiper.activeIndex].querySelectorAll('[data-caption-animate]'));

			if (swiper.params.caption.animationEvent === 'slideChangeTransitionEnd') {
				swiper.on(swiper.params.caption.animationEvent, function () {
					initializeAnimation(swiper.$wrapperEl[0].children[swiper.previousIndex].querySelectorAll('[data-caption-animate]'));
					finalizeAnimation(swiper.$wrapperEl[0].children[swiper.activeIndex].querySelectorAll('[data-caption-animate]'));
				});
			} else {
				swiper.on('slideChangeTransitionEnd', function () {
					initializeAnimation(swiper.$wrapperEl[0].children[swiper.previousIndex].querySelectorAll('[data-caption-animate]'));
				});

				swiper.on(swiper.params.caption.animationEvent, function () {
					finalizeAnimation(swiper.$wrapperEl[0].children[swiper.activeIndex].querySelectorAll('[data-caption-animate]'));
				});
			}
		}

		/**
		 * initCustomScrollTo
		 * @description  init smooth anchor animations
		 */
		function initCustomScrollTo(obj) {
			var $this = $(obj);
			if (!isNoviBuilder) {
				$this.on('click', function (e) {
					e.preventDefault();
					$("body, html").stop().animate({
						scrollTop: $($(this).attr('data-custom-scroll-to')).offset().top
					}, 1000, function () {
						$window.trigger("resize");
					});
				});
			}
		}

		/**
		 * Parallax text
		 * @description  function for parallax text
		 */
		function scrollText($this) {
			var translate = (scrollTop - $($this).data('orig-offset')) / $window.height() * 35;
			$($this).css({transform: 'translate3d(0,' + translate + '%' + ', 0)'});
		}

		/**
		 * initNinaButtons
		 * @description  Make hover effect for nina buttons
		 */
		function initNinaButtons(ninaButtons) {
			for (var i = 0; i < ninaButtons.length; i++) {
				var btn = ninaButtons[i],
					origContent = btn.innerHTML.trim();

				if (!origContent) {
					continue;
				}

				var textNode = Array.prototype.slice.call(ninaButtons[i].childNodes).filter(function (node) {
					return node.nodeType === 3;
				}).pop();
				if (textNode == null) {
					continue;
				}

				var dummy = document.createElement('div');
				btn.replaceChild(dummy, textNode);
				dummy.outerHTML = textNode.textContent.split('').map(function (letter) {
					return "<span>" + letter.trim() + "</span>";
				}).join('');

				Array.prototype.slice.call(btn.childNodes).forEach(function (el, count) {
					el.style.transition = 'opacity .22s ' + 0.03 * count + 's,' + ' transform .22s ' + 0.03 * count + 's' + ', color .22s';
				});

				btn.innerHTML += "<span class='button-original-content'>" + origContent + "</span>";

				var delay = 0.03 * (btn.childElementCount - 1);
				// btn.getElementsByClassName('button-original-content')[0].style.transitionDelay = delay + 's';
				btn.getElementsByClassName('button-original-content')[0].style.transition = 'background .22s, color .22s, transform .22s ' + delay + 's';

				btn.addEventListener('mouseenter', function (e) {
					e.stopPropagation();
				});

				btn.addEventListener('mouseleave', function (e) {
					e.stopPropagation();
				});
			}
		}

		/**
		 * @desc Initialize the gallery with set of images
		 * @param {object} itemsToInit - jQuery object
		 * @param {string} [addClass] - additional gallery class
		 */
		function initLightGallery(itemsToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemsToInit).lightGallery({
					thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
					selector:  "[data-lightgallery='item']",
					autoplay:  $(itemsToInit).attr("data-lg-autoplay") === "true",
					pause:     parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
					addClass:  addClass,
					mode:      $(itemsToInit).attr("data-lg-animation") || "lg-slide",
					loop:      $(itemsToInit).attr("data-lg-loop") !== "false"
				});
			}
		}

		/**
		 * @desc Initialize the gallery with dynamic addition of images
		 * @param {object} itemsToInit - jQuery object
		 * @param {string} [addClass] - additional gallery class
		 */
		function initDynamicLightGallery(itemsToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemsToInit).on("click", function () {
					$(itemsToInit).lightGallery({
						thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
						selector:  "[data-lightgallery='item']",
						autoplay:  $(itemsToInit).attr("data-lg-autoplay") === "true",
						pause:     parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
						addClass:  addClass,
						mode:      $(itemsToInit).attr("data-lg-animation") || "lg-slide",
						loop:      $(itemsToInit).attr("data-lg-loop") !== "false",
						dynamic:   true,
						dynamicEl: JSON.parse($(itemsToInit).attr("data-lg-dynamic-elements")) || []
					});
				});
			}
		}

		/**
		 * @desc Initialize the gallery with one image
		 * @param {object} itemToInit - jQuery object
		 * @param {string} [addClass] - additional gallery class
		 */
		function initLightGalleryItem(itemToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemToInit).lightGallery({
					selector:            "this",
					addClass:            addClass,
					counter:             false,
					youtubePlayerParams: {
						modestbranding: 1,
						showinfo:       0,
						rel:            0,
						controls:       0
					},
					vimeoPlayerParams:   {
						byline:   0,
						portrait: 0
					}
				});
			}
		}

		/**
		 * layoutPanel
		 * @description  Enables layoutPanel
		 */
		if (plugins.layoutPanel.length > 0) {
			var altColorToggle = plugins.layoutPanel.find('.alt-color-toggle'),
				pageHead = document.head,
				defaultCss = $(pageHead).find('link[href="css/style.css"]');

			var altColorLink = document.createElement("link");
			altColorLink.href = "css/style-alt-colors.css";
			altColorLink.type = "text/css";
			altColorLink.rel = "stylesheet";


			if (altColorToggle[0].checked) {
				defaultCss.after(altColorLink);
			}

			altColorToggle.click(function (e) {
				if (e.target.checked) {
					defaultCss.after(altColorLink);
				} else {
					pageHead.removeChild(altColorLink);
				}
			});
		}

		// Copyright Year (Evaluates correct copyright year)
		if (plugins.copyrightYear.length) {
			plugins.copyrightYear.text(initialDate.getFullYear());
		}

		/**
		 * Is Mac os
		 * @description  add additional class on html if mac os.
		 */
		if (navigator.platform.match(/(Mac)/i)) $html.addClass("mac-os");

		/**
		 * Is Safari
		 * @description  add additional class on html if safari.
		 */
		if (isSafari) $html.addClass("safari");

		// Adds some loosing functionality to IE browsers (IE Polyfills)
		if (isIE) {
			if (isIE === 12) $html.addClass("ie-edge");
			if (isIE === 11) $html.addClass("ie-11");
			if (isIE < 10) $html.addClass("lt-ie-10");
			if (isIE < 11) $html.addClass("ie-10");
		}

		/**
		 * JQuery mousewheel plugin
		 * @description  Enables jquery mousewheel plugin
		 */
		if (plugins.scroller.length) {
			var i;
			for (i = 0; i < plugins.scroller.length; i++) {
				var scrollerItem = $(plugins.scroller[i]);

				scrollerItem.mCustomScrollbar({
					theme:         scrollerItem.attr('data-theme') ? scrollerItem.attr('data-theme') : 'minimal',
					scrollInertia: 100,
					scrollButtons: {enable: false}
				});
			}
		}

		/**
		 * Radio
		 * @description Add custom styling options for input[type="radio"]
		 */
		if (plugins.radio.length) {
			var i;
			for (i = 0; i < plugins.radio.length; i++) {
				var $this = $(plugins.radio[i]);
				$this.addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
			}
		}

		/**
		 * Checkbox
		 * @description Add custom styling options for input[type="checkbox"]
		 */
		if (plugins.checkbox.length) {
			var i;
			for (i = 0; i < plugins.checkbox.length; i++) {
				var $this = $(plugins.checkbox[i]);
				$this.addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
			}
		}

		/**
		 * Popovers
		 * @description Enables Popovers plugin
		 */
		if (plugins.popover.length) {
			if (window.innerWidth < 767) {
				plugins.popover.attr('data-placement', 'bottom');
				plugins.popover.popover();
			} else {
				plugins.popover.popover();
			}
		}

		/**
		 * Bootstrap Buttons
		 * @description  Enable Bootstrap Buttons plugin
		 */
		if (plugins.statefulButton.length) {
			$(plugins.statefulButton).on('click', function () {
				var statefulButtonLoading = $(this).button('loading');

				setTimeout(function () {
					statefulButtonLoading.button('reset')
				}, 2000);
			})
		}

		// RD Navbar
		if (plugins.rdNavbar.length) {
			var
				navbar = plugins.rdNavbar,
				aliases = {
					'-':      0,
					'-sm-':   480,
					'-md-':   768,
					'-lg-':   992,
					'-xl-':   1200,
					'-xxl-':  1600,
					'-xxxl-': 1800
				},
				responsive = {};

			for (var alias in aliases) {
				var link = responsive[aliases[alias]] = {};
				if (navbar.attr('data' + alias + 'layout')) link.layout = navbar.attr('data' + alias + 'layout');
				if (navbar.attr('data' + alias + 'device-layout')) link.deviceLayout = navbar.attr('data' + alias + 'device-layout');
				if (navbar.attr('data' + alias + 'hover-on')) link.focusOnHover = navbar.attr('data' + alias + 'hover-on') === 'true';
				if (navbar.attr('data' + alias + 'auto-height')) link.autoHeight = navbar.attr('data' + alias + 'auto-height') === 'true';
				if (navbar.attr('data' + alias + 'stick-up-offset')) link.stickUpOffset = navbar.attr('data' + alias + 'stick-up-offset');
				if (navbar.attr('data' + alias + 'stick-up')) link.stickUp = navbar.attr('data' + alias + 'stick-up') === 'true';
				if (isNoviBuilder) link.stickUp = false;
				else if (navbar.attr('data' + alias + 'stick-up')) link.stickUp = navbar.attr('data' + alias + 'stick-up') === 'true';
			}

			plugins.rdNavbar.RDNavbar({
				anchorNav:    !isNoviBuilder,
				stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false,
				responsive:   responsive,
				callbacks:    {
					onStuck:        function () {
						var navbarSearch = this.$element.find('.rd-search input');

						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
						}
					},
					onDropdownOver: function () {
						return !isNoviBuilder;
					},
					onUnstuck:      function () {
						if (this.$clone === null)
							return;

						var navbarSearch = this.$clone.find('.rd-search input');

						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
							navbarSearch.trigger('blur');
						}

					}
				}
			});
		}

		/**
		 * ViewPort Universal
		 * @description Add class in viewport
		 */
		if (plugins.viewAnimate.length) {
			var i;
			for (i = 0; i < plugins.viewAnimate.length; i++) {
				var $view = $(plugins.viewAnimate[i]).not('.active');
				$document.on("scroll", $.proxy(function () {
					if (isScrolledIntoView(this)) {
						this.addClass("active");
					}
				}, $view))
					.trigger("scroll");
			}
		}


		// Bootstrap tabs
		if (plugins.bootstrapTabs.length) {
			for (var i = 0; i < plugins.bootstrapTabs.length; i++) {
				var bootstrapTab = $(plugins.bootstrapTabs[i]);

				//If have slick carousel inside tab - resize slick carousel on click
				if (bootstrapTab.find('.slick-slider').length) {
					bootstrapTab.find('.tabs-custom-list > li > a').on('click', $.proxy(function () {
						var $this = $(this);
						var setTimeOutTime = isNoviBuilder ? 1500 : 300;

						setTimeout(function () {
							$this.find('.tab-content .tab-pane.active .slick-slider').slick('setPosition');
						}, setTimeOutTime);
					}, bootstrapTab));
				}

				var tabs = plugins.bootstrapTabs[i].querySelectorAll('.nav li a');

				for (var t = 0; t < tabs.length; t++) {
					var tab = tabs[t];

					if (t === 0) {
						tab.parentElement.classList.remove('active');
						$(tab).tab('show');
					}

					tab.addEventListener('click', function (event) {
						event.preventDefault();
						$(this).tab('show');
					});
				}
			}
		}

		/**
		 * Enable parallax by mouse
		 */
		var parallaxJs = document.getElementsByClassName('parallax-scene-js');
		if (parallaxJs && !isNoviBuilder) {
			for (var i = 0; i < parallaxJs.length; i++) {
				var scene = parallaxJs[i];
				new Parallax(scene);
			}
		}

		/**
		 * Button Nina
		 * @description Handle button Nina animation effect
		 */
		if (plugins.buttonNina.length && !isNoviBuilder) {
			initNinaButtons(plugins.buttonNina);
		}

		/**
		 * Stepper
		 * @description Enables Stepper Plugin
		 */
		if (plugins.stepper.length) {
			plugins.stepper.stepper({
				labels: {
					up:   "",
					down: ""
				}
			});
		}

		/**
		 *  Notification modal
		 * */
		if (plugins.bootstrapModalNotification.length) {
			$('body').css('overflow', 'visible')
			plugins.bootstrapModalNotification.on('shown.bs.modal', function () {
				$(this).addClass('notification-open');
			});
		}

		/**
		 * Parallax text
		 * */
		if (plugins.parallaxText.length && !isNoviBuilder) {
			var scrollTop = $window.scrollTop();

			plugins.parallaxText.each(function () {
				$(this).data('orig-offset', $(this).offset().top);
				scrollText($(this));
			});

			$window.scroll(function () {
				scrollTop = $window.scrollTop();
				plugins.parallaxText.each(function () {
					scrollText($(this));
				});
			});

			$window.on('resize', function () {
				scrollTop = $window.scrollTop();
				plugins.parallaxText.each(function () {
					$(this).data('orig-offset', $(this).offset().top);
					scrollText($(this));
				});
			});
		}

		/**
		 * Custom Waypoints
		 */
		if (plugins.customWaypoints.length && !isNoviBuilder) {
			initCustomScrollTo(plugins.customWaypoints);
		}

		// jQuery Countdown
		if (plugins.countDown.length) {
			var i;
			for (i = 0; i < plugins.countDown.length; i++) {

				var countDownItem = plugins.countDown[i],
					d = new Date(),
					time = countDownItem.getAttribute('data-time'),
					type = countDownItem.getAttribute('data-type'), // {until | since}
					format = countDownItem.getAttribute('data-format') ? countDownItem.getAttribute('data-format') : 'YYYY/MM/DD hh:mm:ss',
					expiryText = countDownItem.getAttribute('data-expiry-text') ? countDownItem.getAttribute('data-expiry-text') : 'Countdown finished',
					labels = countDownItem.getAttribute('data-labels') ? countDownItem.getAttribute('data-labels') : '',
					layout = countDownItem.getAttribute('data-layout') ? countDownItem.getAttribute('data-layout') : '{yn} {yl} {on} {ol} {dn} {dl} {hnn}{sep}{mnn}{sep}{snn}',
					settings = [];


				if (labels.length > 0) {
					settings['labels'] = JSON.parse(labels);
				}

				d.setTime(Date.parse(time)).toLocaleString();
				settings[type] = d;
				settings['expiryText'] = expiryText;
				settings['format'] = format;
				settings['alwaysExpire'] = true;
				settings['padZeroes'] = true;
				settings['layout'] = layout;
				settings['onExpiry'] = function () {
					this.classList += ' countdown-expired';
					this.innerHtml = expiryText;
				};

				$(countDownItem).countdown(settings);
			}
		}

		/**
		 * Style Switcher
		 * @description  Enable style switcher
		 */
		if (plugins.styleSwitcher.length) {
			for (i = 0; i < plugins.styleSwitcher.length; i++) {
				var $currentSwitcher = $(plugins.styleSwitcher[i]),
					$switcherContainer,
					$switcherSection = $($currentSwitcher.find('> .style-switcher-container > .section')[0]),
					$switcherPanel = $($currentSwitcher.find('> .style-switcher-panel-wrap .style-switcher-panel')[0]),
					$switcherToggle = $($currentSwitcher.find('.style-switcher-toggle')[0]);


				// Init section-reverse toggle
				if ($switcherToggle) {
					$switcherToggle.click((function ($switcherSection) {
						return function () {
							$switcherSection.toggleClass('section-reverse');
						}
					})($switcherSection));
				}

				// If switchable container is custom element (not .section)
				if ($currentSwitcher.attr('data-container')) {
					$switcherContainer = $($currentSwitcher.find($currentSwitcher.attr('data-container')));
				} else {
					$switcherContainer = $switcherSection;
				}

				// Find active switcher panel item
				var $activeButton = $($switcherPanel.find('li.active > .button')[0]);
				if (!$activeButton.length) {
					$activeButton = $($switcherPanel.find('li > .button')[0]);
				}

				if (!$activeButton.length) continue;

				// Add handler to style switcher controls
				$switcherPanel.find('li > .button').click((function ($switcherContainer, $activeButton) {
					var currentClassSet = '',
						currentButton = $activeButton,
						prevButton = $activeButton;

					return function () {
						currentButton.parent().removeClass('active');
						prevButton = currentButton;
						currentButton = $(this);
						var newClassSet = currentButton.attr('data-customize-class');
						currentButton.parent().addClass('active');

						$switcherContainer.removeClass(currentClassSet);
						$switcherContainer.addClass(newClassSet);
						currentClassSet = newClassSet;

						if (prevButton != currentButton) {
							// $switcherSection.removeClass('section-reverse');
						}
					}
				})($switcherContainer, $activeButton));

				$activeButton.click();
			}
		}

		/**
		 * Slick carousel
		 * @description  Enable Slick carousel plugin
		 */
		if (plugins.slick.length) {
			var i;
			for (i = 0; i < plugins.slick.length; i++) {
				var $slickItem = $(plugins.slick[i]);

				$slickItem.slick({
					slidesToScroll: parseInt($slickItem.attr('data-slide-to-scroll')) || 1,
					asNavFor:       $slickItem.attr('data-for') || false,
					dots:           $slickItem.attr("data-dots") === "true",
					infinite:       isNoviBuilder ? false : $slickItem.attr("data-loop") === "true",
					focusOnSelect:  true,
					arrows:         $slickItem.attr("data-arrows") === "true",
					prevArrow:      $slickItem.attr('data-custom-arrows') === 'true' ? $('.slick-prev[data-slick="' + $slickItem.attr('id') + '"]') : '',
					nextArrow:      $slickItem.attr('data-custom-arrows') === 'true' ? $('.slick-next[data-slick="' + $slickItem.attr('id') + '"]') : '',
					swipe:          $slickItem.attr("data-swipe") === "true",
					autoplay:       $slickItem.attr("data-autoplay") === "true",
					vertical:       $slickItem.attr("data-vertical") === "true",
					centerMode:     $slickItem.attr("data-center-mode") === "true",
					centerPadding:  $slickItem.attr("data-center-padding") ? $slickItem.attr("data-center-padding") : '0.50',
					mobileFirst:    true,
					touchMove:      false,
					adaptiveHeight: true,
					responsive:     [
						{
							breakpoint: 0,
							settings:   {
								slidesToShow: parseInt($slickItem.attr('data-items')) || 1,
							}
						},
						{
							breakpoint: 479,
							settings:   {
								slidesToShow: parseInt($slickItem.attr('data-xs-items')) || 1,
							}
						},
						{
							breakpoint: 767,
							settings:   {
								slidesToShow: parseInt($slickItem.attr('data-sm-items')) || 1,
							}
						},
						{
							breakpoint: 991,
							settings:   {
								slidesToShow: parseInt($slickItem.attr('data-md-items')) || 1,
							}
						},
						{
							breakpoint: 1199,
							settings:   {
								slidesToShow: parseInt($slickItem.attr('data-lg-items')) || 1,
							}
						}
					]
				})
					.on('afterChange', function (event, slick, currentSlide, nextSlide) {

						var $this = $(this),
							childCarousel = $this.attr('data-child');


						if (childCarousel) {
							$(childCarousel + ' .slick-slide').removeClass('slick-current');
							$(childCarousel + ' .slick-slide').eq(currentSlide).addClass('slick-current');
						}
					});

				window.addEventListener('resize', function () {
					$slickItem.slick('refresh');
				});
			}
		}

		if (plugins.productThumb.length) {
			var i;
			for (i = 0; i < plugins.productThumb.length; i++) {
				var thumbnails = $(plugins.productThumb[i]);
				thumbnails.find("li").on('click', function () {
					var item = $(this);
					item.parent().find('.active').removeClass('active');
					var image = item.parents(".product-single").find(".product-image-area");
					image.removeClass('animateImageIn');
					image.addClass('animateImageOut');
					item.addClass('active');
					setTimeout(function () {
						var src = item.find("img").attr("src");
						if (item.attr('data-large-image')) {
							src = item.attr('data-large-image');
						}
						image.attr("src", src);
						image.removeClass('animateImageOut');
						image.addClass('animateImageIn');
					}, 300);
				})
			}
		}

		var $body = $('body'),
			$pagination = $('.slick-books-wrap .slick-dots li'),
			$toggle = $('.block-with-details');

		/*
		* Booking products
		* */
		$toggle.each(function (index) {
			var $this = $($toggle[index]);

			$body.on('click', $this, function (event) {
				$this.removeClass('details-open');
				console.log('body click');
			});

			$this.on('click', function (event) {
				event.stopPropagation();
				$toggle.not($this).removeClass('details-open');
				$this.toggleClass('details-open');
				console.log('toggle click: ' + index);
			});

			$pagination.on('click', function (event) {
				$toggle.removeClass('details-open');
				console.log('pagination click');
			});

			$(this).children('.show-details').on('click', function (event) {
				event.preventDefault();
			});
		});

		/**
		 * D3 Charts
		 * @description Enables D3 Charts plugin
		 */
		if (plugins.d3Charts.length) {
			// for (i = 0; i < plugins.d3Charts.length; i++) {
			//   var d3ChartsItem = $(plugins.d3Charts[i]),
			//     d3ChartItemObject = parseJSONObject(d3ChartsItem, 'data-graph-object');
			//   c3ChartsArray.push(c3.generate(d3ChartItemObject));
			// }
		}

		function fillNumbers(n) {
			return Array.apply(null, {length: n}).map(Function.call, Number);
		}

		if($('#line-chart').length) {
			var lineChart,
				lineChartObject = {
					bindto:     '#line-chart',
					color:      {
						pattern: ['#d61f1f', '#ef991b']
					},
					point:      {
						show: false,
						r:    4
					},
					padding:    {
						left:   100,
						right:  80,
						top:    0,
						bottom: 0
					},
					data:       {
						x:       'x',
						columns: [
							global['stat']['labels'],
							global['stat']['inout']['fill'],
							global['stat']['inout']['payout']
						],
						axes:    {
							data1: 'y'
						},
						type:    'spline',
						names:   {
							data1: lang['footer-sum-fill'],
							data2: lang['footer-sum-payout']
						}
					},
					legend:     {
						show:     true,
						position: 'bottom'
					},
					grid:       {
						x: {
							show: true
						},
						y: {
							show: false
						}
					},
					labels:     true,
					axis:       {
						x: {
							type:    'timeseries',
							tick:    {
								format: '%d.%m'
							},
							padding: {
								left:  0,
								right: 10
							}
						},
						y: {
							min:     1,
							tick:    {
								format: function (x) {
									if (x > 1) {
										return Math.round(x / 1) + ' rub.';
									} else {
										return x;
									}
								},
								outer:  false
							},
							padding: {
								top:    0,
								bottom: 0
							}
						}
					},
					line:       {
						connectNull: true
					},
					oninit:     wrapLabels(),
					onrendered: wrapLabels(),
					onresized:  wrapLabels(),
					onmouseout: wrapLabels()
				};

			function wrap(text, width) {
				text.each(function () {
					var text = d3.select(this);
					if (text.selectAll('tspan').size() > 1) return;

					var words = text.text().split(/\s+/).reverse(),
						word,
						line = [],
						lineNumber = 0,
						lineHeight = 1.2, // ems
						y = text.attr("y"),
						dy = parseFloat(text.attr("dy")),
						tspan = text.text(null).append("tspan").attr("x", 0).attr("y", y).attr("dy", dy + "em");

					while (word = words.pop()) {
						line.push(word);
						tspan.text(line.join(" "));
						if (tspan.node().getComputedTextLength() > width) {
							line.pop();
							tspan.text(line.join(" "));
							line = [word];
							tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").text(word);
						}
					}
				});
			}

			lineChart = c3.generate(lineChartObject);
			wrapLabels();

			$window.on('resize orientationchange', function () {
				wrapLabels();
			});

			function wrapLabels() {
				d3.select('#line-chart').selectAll(".c3-axis-x .tick text")
					.attr('dy', '1.5em')
					.call(wrap, 30);
			}

			d3.select('.d3-chart-wrap').insert('div', '.d3-chart + *').attr('class', 'd3-chart-legend').selectAll('span')
				.data(['data1', 'data2'])
				.enter().append('span')
				.attr('data-id', function (id) {
					return id;
				})
				.html(function (id) {
					return lineChartObject.data.names[id] ? lineChartObject.data.names[id] : id;
				})
				.on('mouseover', function (id) {
					lineChart.focus(id);
				})
				.on('mouseout', function (id) {
					lineChart.revert();
				});
		}


		// lightGallery
		if (plugins.lightGallery.length) {
			for (var i = 0; i < plugins.lightGallery.length; i++) {
				initLightGallery(plugins.lightGallery[i]);
			}
		}

		// lightGallery item
		if (plugins.lightGalleryItem.length) {
			// Filter carousel items
			var notCarouselItems = [];

			for (var z = 0; z < plugins.lightGalleryItem.length; z++) {
				if (!$(plugins.lightGalleryItem[z]).parents('.owl-carousel').length &&
					!$(plugins.lightGalleryItem[z]).parents('.swiper-slider').length &&
					!$(plugins.lightGalleryItem[z]).parents('.slick-slider').length) {
					notCarouselItems.push(plugins.lightGalleryItem[z]);
				}
			}

			plugins.lightGalleryItem = notCarouselItems;

			for (var i = 0; i < plugins.lightGalleryItem.length; i++) {
				initLightGalleryItem(plugins.lightGalleryItem[i]);
			}
		}

		// Dynamic lightGallery
		if (plugins.lightDynamicGalleryItem.length) {
			for (var i = 0; i < plugins.lightDynamicGalleryItem.length; i++) {
				initDynamicLightGallery(plugins.lightDynamicGalleryItem[i]);
			}
		}

		// RD Input Label
		if (plugins.rdInputLabel.length) {
			plugins.rdInputLabel.RDInputLabel();
		}

		// Regula
		if (plugins.regula.length) {
			attachFormValidator(plugins.regula);
		}

		// Campaign Monitor ajax subscription
		if (plugins.campaignMonitor.length) {
			for (i = 0; i < plugins.campaignMonitor.length; i++) {
				var $campaignItem = $(plugins.campaignMonitor[i]);

				$campaignItem.on('submit', $.proxy(function (e) {
					var data = {},
						url = this.attr('action'),
						dataArray = this.serializeArray(),
						$output = $("#" + plugins.campaignMonitor.attr("data-form-output")),
						$this = $(this);

					for (i = 0; i < dataArray.length; i++) {
						data[dataArray[i].name] = dataArray[i].value;
					}

					$.ajax({
						data:       data,
						url:        url,
						dataType:   'jsonp',
						error:      function (resp, text) {
							$output.html('Server error: ' + text);

							setTimeout(function () {
								$output.removeClass("active");
							}, 4000);
						},
						success:    function (resp) {
							$output.html(resp.Message).addClass('active');

							setTimeout(function () {
								$output.removeClass("active");
							}, 6000);
						},
						beforeSend: function (data) {
							// Stop request if builder or inputs are invalide
							if (isNoviBuilder || !isValidated($this.find('[data-constraints]')))
								return false;

							$output.html('Submitting...').addClass('active');
						}
					});

					// Clear inputs after submit
					var inputs = $this[0].getElementsByTagName('input');
					for (var i = 0; i < inputs.length; i++) {
						inputs[i].value = '';
						var label = document.querySelector('[for="' + inputs[i].getAttribute('id') + '"]');
						if (label) label.classList.remove('focus', 'not-empty');
					}

					return false;
				}, $campaignItem));
			}
		}

		// Vide
		if (plugins.vide.length) {
			for (let i = 0; i < plugins.vide.length; i++) {
				let
					$element = $(plugins.vide[i]),
					options = $element.data('vide-options'),
					path = $element.data('vide-bg');

				if (!isMobile) {
					$element.vide(path, options);

					let
						videObj = $element.data('vide').getVideoObject(),
						scrollHandler = (function ($element) {
							if (isScrolledIntoView($element)) this.play();
							else this.pause();
						}).bind(videObj, $element);

					scrollHandler();
					if (isNoviBuilder) videObj.pause();
					else document.addEventListener('scroll', scrollHandler);
				} else {
					$element.css({'background-image': 'url(' + path + '.jpg)'});
				}
			}
		}

		// Owl carousel
		if (plugins.owl.length) {
			for (var i = 0; i < plugins.owl.length; i++) {
				var carousel = $(plugins.owl[i]);
				plugins.owl[i].owl = carousel;
				initOwlCarousel(carousel);
			}
		}

		// WOW
		if ($html.hasClass("wow-animation") && plugins.wow.length && !isNoviBuilder && isDesktop) {
			new WOW().init();
		}

		// UI To Top
		if (isDesktop && !isNoviBuilder) {
			$().UItoTop({
				easingType:     'easeOutQuad',
				containerClass: 'ui-to-top fas fa-arrow-up'
			});
		}

		// Swiper
		if (plugins.swiper.length) {
			for (var i = 0; i < plugins.swiper.length; i++) {

				var
					sliderMarkup = plugins.swiper[i],
					swiper,
					options = {
						loop:             sliderMarkup.getAttribute('data-loop') === 'true' || false,
						effect:           isIE ? 'slide' : sliderMarkup.getAttribute('data-slide-effect') || 'slide',
						direction:        sliderMarkup.getAttribute('data-direction') || 'horizontal',
						speed:            sliderMarkup.getAttribute('data-speed') ? Number(sliderMarkup.getAttribute('data-speed')) : 1000,
						separateCaptions: sliderMarkup.getAttribute('data-separate-captions') === 'true' || false,
						simulateTouch:    sliderMarkup.getAttribute('data-simulate-touch') && !isNoviBuilder ? sliderMarkup.getAttribute('data-simulate-touch') === "true" : false,
						watchOverflow: true
					};

				if (sliderMarkup.getAttribute('data-autoplay')) {
					options.autoplay = {
						delay:                Number(sliderMarkup.getAttribute('data-autoplay')) || 3000,
						stopOnLastSlide:      false,
						disableOnInteraction: true,
						reverseDirection:     false,
					};
				}

				if (sliderMarkup.getAttribute('data-keyboard') === 'true') {
					options.keyboard = {
						enabled:        sliderMarkup.getAttribute('data-keyboard') === 'true',
						onlyInViewport: true
					};
				}

				if (sliderMarkup.getAttribute('data-mousewheel') === 'true') {
					options.mousewheel = {
						releaseOnEdges: true,
						sensitivity:    .1
					};
				}

				if (sliderMarkup.querySelector('.swiper-button-next, .swiper-button-prev')) {
					options.navigation = {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev'
					};
				}

				if (sliderMarkup.querySelector('.swiper-pagination')) {
					options.pagination = {
						el:        '.swiper-pagination',
						type:      'bullets',
						clickable: true
					};
				}

				if (sliderMarkup.querySelector('.swiper-scrollbar')) {
					options.scrollbar = {
						el:        '.swiper-scrollbar',
						hide:      true,
						draggable: true
					};
				}

				options.on = {
					init: function () {
						setBackgrounds(this);
						setRealPrevious(this);
						initCaptionAnimate(this);

						// Real Previous Index must be set recent
						this.on('slideChangeTransitionEnd', function () {
							setRealPrevious(this);
						});
					}
				};

				swiper = new Swiper(plugins.swiper[i], options);
			}
		}

		// Counter
		if (plugins.counter) {
			for (var i = 0; i < plugins.counter.length; i++) {
				var
					node = plugins.counter[i],
					counter = aCounter({
						node:     node,
						duration: node.getAttribute('data-duration') || 2000
					}),
					scrollHandler = (function () {
						if (Util.inViewport(this) && !this.classList.contains('animated-first')) {
							this.counter.run();
							this.classList.add('animated-first');
						}
					}).bind(node),
					blurHandler = (function () {
						this.counter.params.to = parseInt(this.textContent, 10);
						this.counter.run();
					}).bind(node);

				if (isNoviBuilder) {
					node.counter.run();
					node.addEventListener('blur', blurHandler);
				} else {
					scrollHandler();
					window.addEventListener('scroll', scrollHandler);
				}
			}
		}

		// Countdown
		if (plugins.dateCountdown.length) {
			for (var i = 0; i < plugins.dateCountdown.length; i++) {
				var
					node = plugins.dateCountdown[i],
					countdown = aCountdown({
						node:  node,
						from:  node.getAttribute('data-from'),
						to:    node.getAttribute('data-to'),
						count: node.getAttribute('data-count'),
						tick:  100,
					});
			}
		}

		// Progress Bar
		if (plugins.progressLinear) {
			for (var i = 0; i < plugins.progressLinear.length; i++) {
				var
					container = plugins.progressLinear[i],
					counter = aCounter({
						node:     container.querySelector('.progress-linear-counter'),
						duration: container.getAttribute('data-duration') || 1000,
						onStart:  function () {
							this.custom.bar.style.width = this.params.to + '%';
						}
					});

				counter.custom = {
					container: container,
					bar:       container.querySelector('.progress-linear-bar'),
					onScroll:  (function () {
						if ((Util.inViewport(this.custom.container) && !this.custom.container.classList.contains('animated')) || isNoviBuilder) {
							this.run();
							this.custom.container.classList.add('animated');
						}
					}).bind(counter),
					onBlur:    (function () {
						this.params.to = parseInt(this.params.node.textContent, 10);
						this.run();
					}).bind(counter)
				};

				if (isNoviBuilder) {
					counter.run();
					counter.params.node.addEventListener('blur', counter.custom.onBlur);
				} else {
					counter.custom.onScroll();
					document.addEventListener('scroll', counter.custom.onScroll);
				}
			}
		}

		// Progress Circle
		if (plugins.progressCircle) {
			for (var i = 0; i < plugins.progressCircle.length; i++) {
				var
					container = plugins.progressCircle[i],
					counter = aCounter({
						node:     container.querySelector('.progress-circle-counter'),
						duration: 500,
						onUpdate: function (value) {
							this.custom.bar.render(value * 3.6);
						}
					});

				counter.params.onComplete = counter.params.onUpdate;

				counter.custom = {
					container: container,
					bar:       aProgressCircle({node: container.querySelector('.progress-circle-bar')}),
					onScroll:  (function () {
						if (Util.inViewport(this.custom.container) && !this.custom.container.classList.contains('animated')) {
							this.run();
							this.custom.container.classList.add('animated');
						}
					}).bind(counter),
					onBlur:    (function () {
						this.params.to = parseInt(this.params.node.textContent, 10);
						this.run();
					}).bind(counter)
				};

				if (isNoviBuilder) {
					counter.run();
					counter.params.node.addEventListener('blur', counter.custom.onBlur);
				} else {
					counter.custom.onScroll();
					window.addEventListener('scroll', counter.custom.onScroll);
				}
			}
		}

		// Bootstrap Tooltips
		if (plugins.bootstrapTooltip.length) {
			var tooltipPlacement = plugins.bootstrapTooltip.attr('data-placement');
			initBootstrapTooltip(tooltipPlacement);

			$window.on('resize orientationchange', function () {
				initBootstrapTooltip(tooltipPlacement);
			})
		}

		// Select 2
		if (plugins.selectFilter.length) {
			for (var i = 0; i < plugins.selectFilter.length; i++) {
				var select = $(plugins.selectFilter[i]);

				select.select2({
					theme:                   "bootstrap",
					dropdownParent:          $('.page'),
					placeholder:             select.attr('data-placeholder') || null,
					minimumResultsForSearch: select.attr('data-minimum-results-search') || Infinity,
					containerCssClass:       select.attr('data-container-class') || null,
					dropdownCssClass:        select.attr('data-dropdown-class') || null
				});
			}
		}

		// Bootstrap Modal
		if (plugins.bootstrapModal.length) {
			for (var i = 0; i < plugins.bootstrapModal.length; i++) {
				var modalItem = $(plugins.bootstrapModal[i]);

				modalItem.on('hidden.bs.modal', $.proxy(function () {
					var activeModal = $(this),
						rdVideoInside = activeModal.find('video'),
						youTubeVideoInside = activeModal.find('iframe');

					if (rdVideoInside.length) {
						rdVideoInside[0].pause();
					}

					if (youTubeVideoInside.length) {
						var videoUrl = youTubeVideoInside.attr('src');

						youTubeVideoInside
							.attr('src', '')
							.attr('src', videoUrl);
					}
				}, modalItem))
			}
		}

		// Custom Toggles
		if (plugins.customToggle.length) {
			for (var i = 0; i < plugins.customToggle.length; i++) {
				var $this = $(plugins.customToggle[i]);

				$this.on('click', $.proxy(function (event) {
					event.preventDefault();

					var $ctx = $(this);
					$($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
				}, $this));

				if ($this.attr("data-custom-toggle-hide-on-blur") === "true") {
					$body.on("click", $this, function (e) {
						if (e.target !== e.data[0]
							&& $(e.data.attr('data-custom-toggle')).find($(e.target)).length
							&& e.data.find($(e.target)).length === 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}

				if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
					$body.on("click", $this, function (e) {
						if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length === 0 && e.data.find($(e.target)).length === 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}
			}
		}
	});
}());
