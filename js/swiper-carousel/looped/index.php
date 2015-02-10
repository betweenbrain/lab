<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include dirname(dirname(__FILE__)) . '/images/images.php'; ?>
<div class="wrapper">
	<div class="slideshow1">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="slideshow2">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="slideshow3">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="slideshow4">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="slideshow5">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="slideshow6">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="slideshow7">
		<div class="slider">
			<?php foreach ($images as $image) : ?>
				<div class="slide">
					<img src="<?php echo $image->src ?>" />
					<p><?php echo $image->text ?></p>
				</div>
			<?php endforeach ?>
		</div>
		<div class="ImageSliderControls">
			<a id="property-details-swiper_prev" href="" class="ImageSliderPrev ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_left"></i>
				<span>prev</span>
			</a>
			<a id="property-details-swiper_next" href="" class="ImageSliderNext ImageSliderPrevNext">
				<i class="icon-tk-lrg_arrow_right"></i>
				<span>next</span>
			</a>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/idangerous.swiper.js"></script>
<script>
	function initSlider(slider) {
		(function ($) {
			$(slider).each(function () {
				var mySwiper = $(this).swiper({
					calculateHeight: true,
					loop           : true,
					slideClass     : "slide",
					slidesPerView  : 4,
					slidesPerGroup : 4,
					wrapperClass   : "slider"
				});

				$(this).find('.ImageSliderPrev').click(function (e) {
					e.preventDefault();
					mySwiper.swipePrev();
				});

				$(this).find('.ImageSliderNext').click(function (e) {
					e.preventDefault();
					mySwiper.swipeNext();
				});

				reInitSlider(mySwiper);

				$(window).smartresize(function () {
					reInitSlider(mySwiper);
				});
			});
		})(jQuery);
	}

	function reInitSlider(mySwiper) {
		mySwiper.params.slidesPerView = 4;
		mySwiper.params.slidesPerGroup = 4;

		if ($(window).width() < 1200) {
			mySwiper.params.slidesPerView = 3;
			mySwiper.params.slidesPerGroup = 3;
		}

		if ($(window).width() < 992) {
			mySwiper.params.slidesPerView = 2;
			mySwiper.params.slidesPerGroup = 2;
		}

		if ($(window).width() < 768) {
			mySwiper.params.slidesPerView = 1;
			mySwiper.params.slidesPerGroup = 1;
		}
		mySwiper.reInit();
	}

	// Debounced Resize() jQuery Plugin
	// http://www.paulirish.com/2009/throttled-smartresize-jquery-event-handler/
	(function ($, sr) {

		// debouncing function from John Hann
		// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
		var debounce = function (func, threshold, execAsap) {
			var timeout;

			return function debounced() {
				var obj = this, args = arguments;

				function delayed() {
					if (!execAsap)
						func.apply(obj, args);
					timeout = null;
				};

				if (timeout)
					clearTimeout(timeout);
				else if (execAsap)
					func.apply(obj, args);

				timeout = setTimeout(delayed, threshold || 100);
			};
		}
		// smartresize
		jQuery.fn[sr] = function (fn) {
			return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
		};

	})(jQuery, 'smartresize');
</script>
<script>
	(function ($) {
		$(document).ready(function () {
			initSlider('.slideshow1');
			initSlider('.slideshow2');
			initSlider('.slideshow3');
			initSlider('.slideshow4');
			initSlider('.slideshow5');
			initSlider('.slideshow6');
			initSlider('.slideshow7');
		});
	})(jQuery);
</script>
</body>
</html>