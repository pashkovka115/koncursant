$(function() {


	new NativejsSelect({
	  selector: 'select',
	});

	$(".popup-form").animated("bounceInDown", "fadeInDown");

	$('.tel-input').inputmask('+7(999)999-99-99');

	$('.table').DataTable({
        language: {
			  "processing": "Подождите...",
			  "search": "Поиск:",
			  "lengthMenu": "Показать _MENU_ записей",
			  "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
			  "infoEmpty": "Записи с 0 до 0 из 0 записей",
			  "infoFiltered": "(отфильтровано из _MAX_ записей)",
			  "loadingRecords": "Загрузка записей...",
			  "zeroRecords": "Записи отсутствуют.",
			  "emptyTable": "В таблице отсутствуют данные",
			  "paginate": {
			    "first": "Первая",
			    "previous": "Предыдущая",
			    "next": "Следующая",
			    "last": "Последняя"
			  },
			  "aria": {
			    "sortAscending": ": активировать для сортировки столбца по возрастанию",
			    "sortDescending": ": активировать для сортировки столбца по убыванию"
			  },
			  "select": {
			    "rows": {
			      "_": "Выбрано записей: %d",
			      "0": "Кликните по записи для выбора",
			      "1": "Выбрана одна запись"
			    }
			  }
			}
    } );

	$(".accordeon dd").hide().prev().click(function() {
		$(this).parents(".accordeon").find("dd").not(this).slideUp().prev().removeClass("active");
		$(this).next().not(":visible").slideDown().prev().addClass("active");
	});

	$(".tab_item").not(":first").hide();
	$(".wrapper .tab").click(function() {
		$(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
		$(".tab_item").hide().eq($(this).index()).fadeIn()
	}).eq(0).addClass("active");






	$('.carousel').slick({
	  dots: true,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  prevArrow: $('#btn-slider-prev'),
	  nextArrow: $('#btn-slider-next'),
	  variableWidth: true,
	  //asNavFor: '.slider-nav'
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
	//$('.slider-nav').slick({
	//  slidesToShow: 4,
	//  slidesToScroll: 1,
	//  asNavFor: '.slider-for',
	//  focusOnSelect: true
	//});


	$('.jury-member-carousel').slick({
	  dots: true,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  prevArrow: "",
	  nextArrow: "",
	  //asNavFor: '.slider-nav'
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        variableWidth: true
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
	//$('.slider-nav').slick({
	//  slidesToShow: 4,
	//  slidesToScroll: 1,
	//  asNavFor: '.slider-for',
	//  focusOnSelect: true
	//});




	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Загрузка изображения #%curr%...',
		mainClass: 'mfp-fade mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">Изображение #%curr%</a> не загружено.',
			titleSrc: function(item) {
				return '';
			}
		}
	});

	$(".btn-menu").click(function() {
		$(this).toggleClass("active");
		$("header").toggleClass("active");
		$(".mobile-menu").toggleClass("active");
	});


	$(".next-step-2").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-2").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '238');
		$(".circle-big .text ").html("2");
		$(".head-quiz .inform").hide();
	});

	$(".next-step-3").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-3").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '192');
		$(".circle-big .text ").html("3");
	});

	$(".next-step-4").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-4").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '146');
		$(".circle-big .text ").html("4");
	});

	$(".next-step-5").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-5").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '100');
		$(".circle-big .text ").html("5");
	});

	$(".prev-step-1").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-1").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '284');
		$(".circle-big .text ").html("1");
		$(".head-quiz .inform").show();
	});

	$(".prev-step-2").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-2").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '238');
		$(".circle-big .text ").html("2");
	});

	$(".prev-step-3").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-3").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '192');
		$(".circle-big .text ").html("3");
	});

	$(".prev-step-4").click(function() {
		$(this).parents(".quiz").find(".quiz-step").removeClass("active");
		$("#step-4").addClass("active");
		$(".circle-big .progress").css('stroke-dashoffset', '146');
		$(".circle-big .text ").html("4");
	});


	$(".add-data-edu").click(function() {
		$(this).hide();
		$(".fields-edu-add").show();
	});


	/*$(".add-teacher").click(function() {
		$(this).hide();
		$(".add-teacher-fields").show();
	});*/

	$("#open-hidden-advant-block").click(function() {
		$(this).parents(".advantage").addClass("advant-not-visible");
		$(".advantage-hidden").addClass("active");
	});

	$("#close-hidden-advant-block").click(function() {
		$(".advantage").removeClass("advant-not-visible");
		$(".advantage-hidden").removeClass("active");
	});






	$('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		mainClass: 'mfp-fade',
		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});

	$('.popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-fade mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

	//Кнопка "Наверх"
	//Документация:
	//http://api.jquery.com/scrolltop/
	//http://api.jquery.com/animate/
	$("#top").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});


	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	$(".form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "assets/templates/mail.php", //Change
			data: th.serialize()
		}).done(function() {
			$(".done-w").fadeIn();
			setTimeout(function() {
				// Done Functions
				$(".done-w").fadeOut();
				$(".fancybox-container").fadeOut();
				$.magnificPopup.close();
				th.trigger("reset");
			}, 3000);
		});
		return false;
	});

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });




});

