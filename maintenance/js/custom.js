/**
	Hopz - eCommerce coming soon template
 	Copyright (c) 2018, Pophonic
	
	Author: Pophonic
	Profile: themeforest.net/user/pophonic
	
**/


jQuery(document).ready(function() {
	
	"use strict";
	
	/* =============================================
	Page loading
	================================================ */
	$('.pageload').fadeOut(300);

	/* =============================================
	Custom Data Attribute
	================================================ */
	var bgImage = ".bgImage";
	
	$("*").css('height', function () {
		var heightAttr = $(this).attr('data-height')+'px';
		return heightAttr;
	});
	
	$("*").css('min-height', function () {
		var minheightAttr = $(this).attr('data-min-height')+'px';
		return minheightAttr;
	});
	
	$("*").css('color', function () {
		var colorAttr = $(this).data('color');
		return colorAttr;
	});
	
	$("*").css('background-color', function () {
		var bgcolorAttr = $(this).data('bg-color');
		return bgcolorAttr;
	});
	
	$("*").css('padding', function () {
		var paddingAttr = $(this).data('padding');
		return paddingAttr;
	});
	
	$("*").css('margin', function () {
		var marginAttr = $(this).data('margin');
		return marginAttr;
	});
	
	$("*").css('opacity', function () {
		var opacityAttr = $(this).data('opacity');
		return opacityAttr;
	});
	
	$(bgImage).css('background-image', function () {
		var bg = ('url(' + $(this).data("image-src") + ')');
		return bg;
	});

	/* =============================================
	NiceScroll settings
	================================================ */
	$(window).on("resize", function() {
		var contentWrapper = $('.content-wrapper');

		if ($(window).width() < 992) {
			contentWrapper.getNiceScroll().hide();
		} else {
			contentWrapper.niceScroll(".content-inner",{
				cursorcolor: "#000",
				cursoropacitymax: 0.4,
				cursorborder: "",
				railpadding: { top: 0, right: 3, left: 0, bottom: 0 }
			});
		}
	}).resize();

	/* =============================================
	Slide navigation customize
	================================================ */
	var tooltip1 = 'Front Page',
		tooltip2 = 'About Us',
		tooltip3 = 'Hot Picks',
		tooltip4 = 'Notify Me';

	$('.cd-slider-navigation li a').empty().addClass("nav-tooltip");

	$('.cd-slider-navigation li:eq(0) a').attr('title', tooltip1);
	$('.cd-slider-navigation li:eq(1) a').attr('title', tooltip2);
	$('.cd-slider-navigation li:eq(2) a').attr('title', tooltip3);
	$('.cd-slider-navigation li:eq(3) a').attr('title', tooltip4);

	$('.nav-tooltip').tooltipster({
		animation: 'grow',
		delay: 0,
		delayTouch: [150, 250],
		distance: 11
	});

	/* =============================================
	jQuery Countdown
	================================================ */
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 0, 12 - 1, 31);
	$('#defaultCountdown').countdown({
		until: austDay,
		padZeroes: true,
		labels: ['years', 'months', 'weeks', 'days', 'hrs', 'min', 'sec']
	});

	/* =============================================
	Owl Carousel settings
	================================================ */
	/* ===== Background slider ===== */
	var bgSlider = $(".bg-slider .owl-carousel");

	bgSlider.owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 6000,
		dots: false,
		animateOut: 'fadeOut'
	});

	$(window).on("resize", function() {
		var frontSlideWrapHeight = $('.front-page').height(),
			frontContentHeight = $('.front-page .content-inner').height(),
			bgSlideItem = $('.bg-slide-item, .bg-slider + .cover-overlay');

		if ($(window).width() < 992) {
			bgSlideItem.height(frontContentHeight);
		} else {
			bgSlideItem.height(frontSlideWrapHeight);
		}
	}).resize();

	/* ===== Product section ===== */
	var productSection = $(".product-section > .owl-carousel");

	productSection.owlCarousel({
		items: 1,
		loop: true,
		animateOut: 'fadeOut',
		touchDrag: false
	}).trigger('refresh.owl.carousel');

	/* ===== Product modal ===== */
	var productModal = $(".modal-slider > .owl-carousel");

	productModal.owlCarousel({
		items: 1,
		loop: true,
		dots: false
	});

	$('.modal-content').each(function(){
		var modalNavNext = $(this).find(".modal-nav-next"),
			modalNavPrev = $(this).find(".modal-nav-prev"),
			modalEachSlide = $(this).find(".owl-carousel");
		
		modalNavNext.on("click", function(){
			modalEachSlide.trigger('next.owl.carousel', [500]);
		});
		modalNavPrev.on("click", function(){
			modalEachSlide.trigger('prev.owl.carousel', [500]);
		});
	});

	/* =============================================
	Improved product hover transition
	================================================ */
	$(window).on("resize", function() {
		$('.product-item').each(function(){
			var productItemHeight = $(this).height(),
				productItemHeightHalf = productItemHeight / 2,
				productDetailsHeight = $(this).find('.product-details').height(),
				productThumbnail = $(this).find('.product-thumbnail');

			if (productDetailsHeight <= productItemHeightHalf) {
				productThumbnail.addClass("height-half");
			} else {
				productThumbnail.removeClass("height-half");
			}
		});
	}).resize();

	/* =============================================
	Product modal fixed
	================================================ */
	$('.product-details-wrapper .button a').on("click", function() {
		$('.product-details').css({ "transform": "translate3d(0px, 100%, 0px)" });
	});
	
	$('.owl-item:not(.cloned) .modal').appendTo("body");
	$('.owl-item .modal').remove();

	$('[data-toggle=modal]').on('click', function (e) {
		var $target = $($(this).data('target'));
		$target.data('triggered',true);
		if ($target.data('triggered')) {
			$target.modal('show')
				.data('triggered',false);
		};
		return false;
	});

	/* =============================================
	Pre-order form settings
	================================================ */
	$('.modal-details').each(function(){
		var productTitle = $(this).find('.product-title').text(),
			productName = $(this).find('.order-product'),
			formOpen = $(this).find('.form-open'),
			orderFormFill = $(this).find('.order-form-fill'),
			modalContainer = $(this).parents('.modal');

		productName.attr("value", productTitle);

		formOpen.on("click", function() {
			$(this).hide();
			orderFormFill.slideToggle().addClass("animated fadeIn");
		});

		modalContainer.on('hide.bs.modal', function (e) {
			formOpen.show();
			orderFormFill.hide();
			$('.pre-order-form .list3').fadeOut();
		});
	});

	/* =============================================
	Particle and Kenburns slide background settings
	================================================ */
	$(window).on("resize", function() {
		var frontSlideWrapHeight = $('.front-page').height(),
			frontContentHeight = $('.front-page .content-inner').height(),
			fullscreenBg = $('.fullscreen-bg, .fullscreen-bg + .cover-overlay');

		if ($(window).width() < 992) {
			fullscreenBg.height(frontContentHeight);
		} else {
			fullscreenBg.height(frontSlideWrapHeight);
		}
	}).resize();

	/* ========== Particle background ========== */
	$('.particle-bg').particleground({
		dotColor: 'rgba(255,255,255,0.7)',
		lineColor: 'rgba(255,255,255,0.7)'
	});

	/* ========== Kenburns slide background ========== */
	$('.kenburns-slider').vegas({
		animation: 'kenburns',
		delay: 7000,
		slides: [
			{ src: "images/upload/front-page-bg-1.jpg" },
			{ src: "images/upload/front-page-bg-2.jpg" },
			{ src: "images/upload/front-page-bg-3.jpg" }
		]
	});

	/* =============================================
	Subscribe submit settings
	================================================ */
	var subscribeEmail = $(".subscribe-email"),
		subscribeButton = $(".subscribe-button"),
		subscribeReply = $(".reply-message"),
		subscribeLoading = $(".form-loading");

	subscribeButton.on("click", function() {
		subscribeReply.removeClass();
		subscribeReply.html('');
		var regEx = "";
		
		// validate Email
		var emailVal = subscribeEmail.val();
		regEx=/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
		if (emailVal == "" || emailVal == "Email" || !regEx.test(emailVal)) {
			subscribeEmail.val('');
			subscribeEmail.focus();
			return false;
		}
		
		var dataString = 'email=' + subscribeEmail.val();

		subscribeLoading.fadeIn(500);
		
		// Send form data to subscribe.php
		$.ajax({
			type: "POST",
			url: "subscribe.php",
			data: dataString,
			success: function() {
				subscribeLoading.hide();
				subscribeReply.addClass('list3');
				subscribeReply.html("<span>You have successfully subscribed</span>")
				.hide()
				.fadeIn(1500);
				$("form.subscribe").trigger("reset");
			}
		});
		return false;
	});

	/* =============================================
	Pre-order submit settings
	================================================ */
	$('form.pre-order-form').each(function(){
		var orderProduct = $(this).find(".order-product"),
			orderEmail = $(this).find(".order-email"),
			orderMessage = $(this).find(".order-msg"),
			orderSubmit = $(this).find(".order-submit"),
			orderReplyMsg = $(this).find(".order-reply-message"),
			orderFormLoading = $(this).find(".order-form-loading");

		orderSubmit.on("click", function() {
			orderReplyMsg.removeClass();
			orderReplyMsg.html('');
			var regEx = "";

			// Validate Email
			var orderEmailVal = orderEmail.val();
			regEx=/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
			if (orderEmailVal == "" || orderEmailVal == "Email" || !regEx.test(orderEmailVal)) {
				orderEmail.val('');
				orderEmail.focus();
				return false;
			}

			// Validate Message
			var orderMessageVal = orderMessage.val();
			if (orderMessageVal == "" || orderMessageVal == "Mymessage" || orderMessageVal.length < 2) {
				orderMessage.val('');
				orderMessage.focus();
				return false;
			}

			var dataString = 'product='+ orderProduct.val() + '&email=' + orderEmail.val() + '&mymessage=' + orderMessage.val();

			orderFormLoading.fadeIn(500);

			// Send form data to order.php
			$.ajax({
				type: "POST",
				url: "order.php",
				data: dataString,
				success: function() {
					orderFormLoading.hide();
					orderReplyMsg.addClass('list3');
					orderReplyMsg.html("<span>Pre-order sent successfully</span>")
					.hide()
					.fadeIn(1500);
					$("form.pre-order-form").trigger("reset");
				}
			});
			return false;
		});
	});

});