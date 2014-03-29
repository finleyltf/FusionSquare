// jQuery easing 1.3
jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a+c:-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a+c:
b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a+c:-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a*a+c:b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,a,c,b,d){return-b*Math.cos(a/
d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return 0==a?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){return 0==a?c:a==d?c+b:1>(a/=d/2)?b/2*Math.pow(2,10*(a-1))+c:b/2*(-Math.pow(2,-10*--a)+2)+c},easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*
a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){return 1>(a/=d/2)?-b/2*(Math.sqrt(1-a*a)-1)+c:b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==
(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(2==(a/=d/2))return c+b;f||(f=d*0.3*1.5);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return 1>a?-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c:0.5*g*Math.pow(2,-10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInBack:function(e,a,c,b,d,f){void 0==
f&&(f=1.70158);return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return 1>(a/=d/2)?b/2*a*a*(((f*=1.525)+1)*a-f)+c:b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?
b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){return a<d/2?0.5*jQuery.easing.easeInBounce(e,2*a,0,b,d)+c:0.5*jQuery.easing.easeOutBounce(e,2*a-d,0,b,d)+0.5*b+c}});

(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

var scrollbarColor = '#111';
var scrollbarColorMenu = '#fff';
var scrollbarWidth = 4;
var locationLatitude = 60.17726;
var locationLongitude = 24.80475;
var enableMenuColorbox = true;

$ = jQuery.noConflict();

$(window).load(function() {
	refreshMenu($(".dynamic-content"));
	initDatePicker();
	animateBlog('in');
	animateMenu();
	slider('on');
	initCarousel();
	initGallery();
	loadScript();
	updatePadding();
	naviFloat();

	if ($.browser.mobile === false) {
		initScrollbar(scrollbarColor);
	}
});

$(window).resize($.debounce(250, function() {
	updatePadding();
}));

function updatePadding() {
	if ($('.navbar').height() === 0) {
		$('.padding-wrapper').css('padding-top', $('.sm-navbar').height());
	} else {
		$('.padding-wrapper').css('padding-top', $('.navbar').height() + 20);
	}
}

function initDatePicker() {
	$('.info-reservation').on('click', '.select-time.part', function() {
		if($(this).html() == 'pm') {
			$(this).html('am');
			$('#ampm').val('am');
		} else {
			$(this).html('pm');
			$('#ampm').val('pm');
		}
	});

	$('.info-reservation').on('change', '#select-hour', function() {
		$('.select-time.hour span').html($(this).val());
		$('#hour').val($(this).val());
		$('.select-time.hour').css('border', '1px solid #ddd');
	});

	$('.info-reservation').on('change', '#select-minutes', function() {
		$('.select-time.minutes span').html($(this).val());
		$('#minute').val($(this).val());
		$('.select-time.minutes').css('border', '1px solid #ddd');
	});

	$('.info-reservation').on('change', '#select-year', function() {
		$('.select-time.year span').html($(this).val());
		$('#year').val($(this).val());
	});

	$('.info-reservation').on('change', '#select-day', function() {
		$('.select-time.day span').html($(this).val());
		$('#day').val($(this).val());
	});

	$('.info-reservation').on('change', '#select-month', function() {
		$('.select-time.month span').html($(this).val());
		$('#month').val($(this).val());
	});

    $('.info-reservation').on('change', '#select-peopleAmount', function() {
        $('.select-time.peopleAmount span').html($(this).val() + ' people');
        $('#peopleAmount').val($(this).val());
    });
}

function shuffleArray(array) {
	var len = array.length;
	for (var i = len - 1; i > 0; i--) {
		var j = Math.floor(Math.random() * (i + 1));
		var temp = array[i];
		array[i] = array[j];
		array[j] = temp;
	}

	return array;
}

function animateBlog(direction) {

	direction = direction == "in" ? direction : "out";

	var sizes = new Array();
	var columns = new Array();
	var items = $('.square').length;

	$('.square').each(function(i, e) {
		columns[i] = $(this);
		sizes[i] = columns[i].length;
	});

	columns = shuffleArray(columns);
	var max = Math.max.apply(null, sizes);

	for (var item = 0; item < max; item++) {

		$(columns).each(function(column) {

			if (columns[column][item] !== undefined) {

				if (direction == "in") {

					var $item = $(columns[column][item]),
					timeout = item * columns.length + column;

					setTimeout(function() {
						$item.addClass('is-loaded');
					}, 200 * timeout);
				} else {

					var $item = $(columns[column][item]),
					timeout = items - (item * columns.length + column);

					setTimeout(function() {
						$item.removeClass('is-loaded');
					}, 200 * timeout);
				}
			}
		});
	}
}

function updateScrollbar() {

}

function scrollContent() {

}

function animateMenu() {
	if ($('.menu').length > 0) {
		setTimeout(function() {
			$('.animate-in').removeClass('animate-in-fade');
		}, 600);
	}
}

function animateDarkBg() {
	if ($('.menu').length > 0) {
			$('body').addClass('dark-bg');
			$('#menu-bg').transition({opacity: 0},0, function() {
			$('#menu-bg').show().transition({opacity: 1});
		});
	}
}

function hideDarkBg() {
	$('body').removeClass('dark-bg');
	$('#menu-bg').transition({opacity: 0}, function() {
		$('#menu-bg').hide();
	});
}

function naviFloat() {

	if ($('#maximage').length > 0) {
		if (!$('body').hasClass('splash')) {
			$('.navbar').transition({y: '-100%'}, function() {
				$(this).css({'bottom': 0, 'top': 'auto'}).transition({y: '100%'}, 0, function() {
				}).transition({y: 0}, function() {
					$('body').addClass('splash');
					$('.navbar').animate({ opacity: 1}, 500);
				});
			});
		}
	} else {
		$('.navbar').animate({ opacity: 1}, 500);
		if ($('body').hasClass('splash')){
			$('.navbar').transition({y: '100%'}, function() {
				$(this).css({'bottom': 'auto', 'top': 0}).transition({y: '-100%'}, 0, function() {
				}).transition({y: 0}, function() {
					$('body').removeClass('splash');
				});
			});
		}
	}
}

$('document').ready(function($) {
	var transition = function($newEl) {
		var $oldEl = this;
		$newEl.hide();

		$oldEl.transition({opacity: 0}, 500, function() {
			$oldEl.replaceWith($newEl);
			$newEl.show().css({opacity: 0}, 500);
			$oldEl.transition({opacity: 1}, 500, function() {
			});
			$newEl.transition({opacity: 1}, 500, function() {
			});
			$('html').removeClass('loading');
			$(window).scrollTop(0);
			animateBlog('in');
			animateMenu();
			slider('on');
			initMap();
			initCarousel();
			refreshMenu($newEl);
			updatePadding();
			naviFloat();
			initGallery();
			changeScrollbarColor($newEl);
		});
	};

	$(window).bind('djaxClick', function(e, data) {
		$('html').addClass('loading');
		slider('off');
		hideDarkBg();
	});

	$('body').djax('.dynamic-content', ['#', '.jpg'], transition);
	$(window).bind('djaxLoad', function(e, params) {
		slider('off');
		hideDarkBg();
	});

	$('.content-link, .subnav a').click(function() {
		if ($('body').hasClass('splash')) {
			$(".hover-active").removeClass("hover-active");
		}
	});

	$('.small-logo').click(function(){
		$('.reorder').removeClass('flyout-open');
		$('#flyout-container').animate({ height : 0}, function() {
			$('#flyout-container .open').css('height', 0).removeClass('open');
			$('#flyout-container .subnav-open').removeClass('subnav-open');
			$('body').removeClass('mobile-nav-show');
		});
	});

	$('.reorder a').click(function(e) {
		e.preventDefault();
		if ($('body').hasClass('mobile-nav-show')) {
			$(this).parent().removeClass('flyout-open');
			$('#flyout-container').animate({ height : 0}, function(){
				$('#flyout-container .open').css('height', 0).removeClass('open');
				$('#flyout-container .subnav-open').removeClass('subnav-open');
			});

			$('body').removeClass('mobile-nav-show');
		} else {
			$(this).parent().addClass('flyout-open');
			$('#flyout-container').animate({ height : $('#flyout-container #menu-mobile > li').height() * $('#flyout-container #menu-mobile > li').length}, function(){
				$('#flyout-container').css('height', 'auto');
			});
			$('body').addClass('mobile-nav-show');
		}
	});

	$('.menu-item a').on('click',function(e) {
		if (!$(this).data('djax-exclude')) {
			e.preventDefault();
			//close mobile menu after link
			$('.reorder').removeClass('flyout-open');
			$('#flyout-container').animate({ height : 0}, function() {
				$('#flyout-container .open').css('height', 0).removeClass('open');
				$('#flyout-container .subnav-open').removeClass('subnav-open');
				$('body').removeClass('mobile-nav-show');
			});
		}
	});

	$('.flyout-menu .open-children').click(function(e) {
		e.preventDefault();
		var that = this;
		if($(this).next('.subnav').length > 0) {
			//has submenu
			if($(this).next('.subnav').hasClass('open')) {

				$(this).parent().removeClass('subnav-open');

				$(this).next('.subnav').animate({height : 0 }, function() {
					$(that).next('.open').removeClass('open');
					$(that).next('.subnav').find('.open').css('height', 0).removeClass('open');
					$(that).next('.subnav').find('.subnav-open').removeClass('subnav-open');
				});
			} else {
				$(this).parent().addClass('subnav-open');
				$(this).next('.subnav').animate({ height : $(this).next('.subnav').children('li').height() * $(this).next('.subnav').children('li').length}, function(){
					$(that).next('.subnav').css('height', 'auto').addClass('open');
				});
			}
		}
	});

	$('.main-nav li a').click(function() {
		$('.main-nav .active').removeClass('active');
		$(this).addClass('active');
	});

	$('.main-nav li').hover(function() {
		clearTimeout($(this).data('timeout'));
		$(this).css('overflow', 'visible');
		var that = this;
		var t = setTimeout(function() {
			$(that).addClass('hover-active');
		}, 100);

		$(that).data('timeout-in', t);

	}, function() {
		clearTimeout($(this).data('timeout-in'));
		var that = this;
		$(that).removeClass("hover-active");
		var t = setTimeout(function() {
			$(that).css('overflow', 'hidden');
		}, 400);
		$(that).data('timeout', t);
	});

	/********dynamic li width in navbar/navbar center************/
	if ($('.menu-image').length > 0 ) {
		var li_numb = $('.navbar .main-nav >li').length -1;
		var li_width = 70/li_numb;
		$('.navbar .main-nav >li').css('width', ''+li_width+'%');
	} else {
		var li_width2 = 100/$('.navbar .main-nav >li').length;
		$('.navbar .main-nav >li').css('width', ''+li_width2+'%' );
	}

	/**************navbar hover******************/
	$('.navbar .main-nav >li').hover(function() {
		$(this).find('div >a').addClass('current');
	}, function() {
		$(this).find('div >a').removeClass('current');
	});

	var checkEmail = function(email) {
		var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return emailRegex.test(email);
	};

	$(document).on('click', '.refresh-captcha', function(e) {
		e.preventDefault();
		$('#captcha').attr('src', 'inc/securimage/securimage_show.php?' + Math.random());
	});

	$(document).on("focus", "#reservation-form input, #reservation-form textarea", function(e) {
		$(this).parent().removeClass('error');
	});

	$(document).on("focus", "#contact-form input, #contact-form textarea", function(e) {
		$(this).parent().removeClass('error');
	});

	$(document).on("submit", "#ReservationDetailsForm", function(e) {
		e.preventDefault();

		var firstName = $('#form-firstName'),
            lastName = $('#form-lastName'),
			email = $('#form-email'),
            phoneNumber = $('#form-phoneNumber'),
            peopleAmount = $('#form-peopleAmount'),
			message = $('#form-message'),
			time = $('#form-time'),
//			day = $('#day'),
//			month = $('#month'),
//			year = $('#year'),
//			hour = $('#hour'),
//			minute = $('#minute'),
			captcha = $("#form-captcha");
//			ampm = $('#ampm').val($('.select-time.part').text());

		$.ajax({
			url: 'reservationConfirm',
			type: 'POST',
			dataType: 'json',
			data: {
				captcha: captcha.val(),
                firstName: firstName.val(),
                lastName: lastName.val(),
				email: email.val(),
                phoneNumber: phoneNumber.val(),
                peopleAmount: peopleAmount.val(),
				message: message.val(),
                time: time.val()
//				day: day.val(),
//				month: month.val(),
//				year: year.val(),
//				hour: hour.val(),
//				minute: minute.val(),
//				ampm: ampm.val()
			},
			beforeSend: function() {
				var errors = false,
				validate = function() {
					errors = false;

					if (captcha.val().length === 0) {
						captcha.parent().addClass('error');
						errors = true;
					} else {
						captcha.parent().removeClass('error');
					}

					if (firstName.val().length === 0) {
                        firstName.parent().addClass('error');
						errors = true;
					} else {
                        firstName.parent().removeClass('error');
					}

                    if (lastName.val().length === 0) {
                        lastName.parent().addClass('error');
                        errors = true;
                    } else {
                        lastName.parent().removeClass('error');
                    }

					if (email.val().length === 0) {
						email.parent().addClass('error');
						errors = true;
					} else if(!checkEmail(email.val())) {
						email.parent().addClass('error');
						errors = true;
					} else {
						email.parent().removeClass('error');
					}

					if (phoneNumber.val().length === 0) {
                        phoneNumber.parent().addClass('error');
						errors = true;
					} else {
                        phoneNumber.parent().removeClass('error');
					}

//					if (peopleAmount.val().length === 0) {
//                        peopleAmount.parent().addClass('error');
//						errors = true;
//					} else {
//                        peopleAmount.parent().removeClass('error');
//					}

					if (message.val().length === 0) {
						message.parent().addClass('error');
						errors = true;
					} else {
						message.parent().removeClass('error');
					}

//					console.log(hour.val());
//					console.log(minute.val());

//					if (hour.val() == '--') {
//						$('.select-time.hour').css('border', '1px solid rgb(255, 144, 144)');
//						errors = true;
//					} else {
//						$('.select-time.hour').css('border', '1px solid #ddd');
//					}
//
//					if (minute.val() == '--') {
//						$('.select-time.minutes').css('border', '1px solid rgb(255, 144, 144)');
//						errors = true;
//					} else {
//						$('.select-time.minutes').css('border', '1px solid #ddd');
//					}
				};

				validate();

				if(errors) {
					return false;
				}
			}
		}).done(function(data) {
			if(data.success === true) {
				$('.alert-success').removeClass('hidden');
				setTimeout(function () {
					$('.alert-success').addClass('hidden');
				}, 3000);
				firstName.val('');
				lastName.val('');
				email.val('');
				phoneNumber.val('');
//                peopleAmount.val('');
				message.val('');
				captcha.val('');
			} else {
				var input = $('#'+responseData.data[0].id);
					input.parent().addClass('error');
			}
		}).fail(function() {
			// handle server fail here
		});
	});

	$(document).on("submit", "#contact-form", function(e) {
			e.preventDefault();

			var name = $('#form-name'),
				email = $('#form-email'),
				subject = $('#form-subject'),
				captcha = $("#form-captcha"),
				message = $('#form-message');

			$.ajax({
				url: 'contact-send.php',
				type: 'POST',
				dataType: 'json',
				data: {
					captcha: captcha.val(),
					name: name.val(),
					email: email.val(),
					subject: subject.val(),
					message: message.val()
				},
				beforeSend: function() {
					var errors = false,
					validate = function() {
						errors = false;

						if (captcha.val().length === 0) {
							captcha.parent().addClass('error');
							errors = true;
						} else {
							captcha.parent().removeClass('error');
						}

						if (name.val().length === 0) {
							name.parent().addClass('error');
							errors = true;
						} else {
							name.parent().removeClass('error');
						}

						if (email.val().length === 0) {
							email.parent().addClass('error');
							errors = true;
						} else if(!checkEmail(email.val())) {
							email.parent().addClass('error');
							errors = true;
						} else {
							email.parent().removeClass('error');
						}

						if (subject.val().length === 0) {
							subject.parent().addClass('error');
							errors = true;
						} else {
							subject.parent().removeClass('error');
						}

						if (message.val().length === 0) {
							message.parent().addClass('error');
							errors = true;
						} else {
							message.parent().removeClass('error');
						}
					};

					validate();

					if(errors) {
						return false;
					}
				}
			}).done(function(responseData) {
				if(responseData.success === true) {
					$('.alert-success').removeClass('hidden');
					setTimeout(function () {
						$('.alert-success').addClass('hidden');
					}, 3000);
					name.val('');
					email.val('');
					subject.val('');
					message.val('');
					captcha.val('');
				} else {
					var input = $('#'+responseData.data[0].id);
					input.parent().addClass('error');
				}
			}).fail(function() {
				// handle server fail here
			});
		});
});

//googleMap
function initMap() {
	if ($('#map').length > 0) {
		initialize();
	}
}

function changeScrollbarColor(el) {
	var color = scrollbarColor;
	if (el && el.hasClass('menu-wrapper')) {
		color = scrollbarColorMenu;
	}

	$('#ascrail2000 div').css('background-color', color).css('border-color', color);
}

function initScrollbar(color) {

	var options = {
		cursorwidth : scrollbarWidth,
		cursorcolor:  color,
		cursorborder: '1px solid ' + color
	};

	try {
		$("html").niceScroll(options);
	} catch(e) {

	}
}

function initialize() {
	var markerPosition = new google.maps.LatLng(locationLatitude, locationLongitude);

	var mapOptions = {
		zoom: 15,
		center: markerPosition,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		styles: [{stylers: [{saturation: -100}]}]
	};

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var marker = new google.maps.Marker({
		position: markerPosition,
		title: 'Location',
		map: map,
		icon: { url: '../img/icon1.png', origin: new google.maps.Point(0, 0) },
	});
}

function loadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=1&sensor=false&callback=initMap';
	document.body.appendChild(script);
}

function slider(mode) {
	if (mode === 'on' && ($('#maximage').length > 0)) {
		$('#maximage').maximage({
			cycleOptions: {
				slideActiveClass: 'activeSlide',
				skipInitializationCallbacks: true,
				after: function(currSlideElement, nextSlideElement) {
					$(currSlideElement).removeClass('current-slide');
				},
				before: function(currSlideElement, nextSlideElement, options, forwardFlag) {
					$(nextSlideElement).addClass('current-slide');
					$($(currSlideElement).data('href')).removeClass('current-slide-content');
					$($(nextSlideElement).data('href')).addClass('current-slide-content');
				},
			},
			onFirstImageLoaded: function() {
				$('#cycle-loader').hide();
				$('#maximage').transition({opacity: 1}, function() {
				});
			}

		});
	} else if (mode === 'off' && ($('#maximage').length > 0)) {
		$('#maximage').cycle('destroy');
	}
}

function refreshMenu(element) {
	var wrapperClass = element.attr('class').split(" ");
	$(".main-nav a").removeClass("active");
	$(".main-nav ."+wrapperClass[1]).addClass("active");
}

function initGallery() {
	$('a.gallery').colorbox({
		transition: 'fade',
		maxWidth: '80%',
		maxHeight: '80%',
		closeButton:true,
		close: '',
		next: '<i class="fa fa-angle-right"></i>',
		previous: '<i class="fa fa-angle-left"></i>'}
	);

	if (enableMenuColorbox) {
		$('a.menu-gallery').colorbox({
			transition: 'fade',
			maxWidth: '80%',
			maxHeight: '80%',
			closeButton:true,
			close: '',
			next: '<i class="fa fa-angle-right"></i>',
			previous: '<i class="fa fa-angle-left"></i>'}
		);
	}
}

function initCarousel() {
	var figureCount = $('#slider-res .item').length;

	$("#slider-res").owlCarousel({
			pagination: false,
			slideSpeed : 2000,
			paginationSpeed : 2000,
			stopOnHover: true,
			singleItem:true,
			transitionStyle: 'fade',
			autoPlay: 4000
		});

	var carousel = $('#slider-res').data('owlCarousel');

	if( figureCount === 1 ) {
		carousel.stop();
	}

	$(".carousel-menu").owlCarousel({
		singleItem:true,
		stopOnHover:true,
		autoPlay: 4000,
		afterInit : function() {
			var that = this;
			that.owlControls.prependTo($(".controls"));
		}
	});
}
