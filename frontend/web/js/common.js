$(function () {


  // Phone Mask
  $.each($('input.phone'), function (index, val) {
    $(this).focus(function () {
      $(this).inputmask('+7(999) 999 9999');
    });
  });

  // Burger Menu
  $('.icon-menu').click(function (event) {
		$(this).toggleClass('active');
		$('.menu__body').toggleClass('active');
		$('body').toggleClass('lock'); // чтобы при открытом бургере не прокручивался сайт. В media добавить body.lock overflow:hidden
	});

  $(".header .menu__body").append("<div class='phone-number-clone'>");
	$(".header .phone").clone().appendTo(".phone-number-clone");


  // $(window).resize(function() {
  //     if ($(window).width() < 1000) {
  //       $(".header .header__title").prependTo(".vacancies .vacancies__title");
  //     } 
  //   });

  // $(window).trigger('resize');



  
  // Singlepagenav
	$('.menu__nav').singlePageNav({
		'currentClass': "active",
		offset: 100
	});

  $('.menu__item').click(function() {
    $('.menu__body').removeClass('active');
    $('body').removeClass('lock');
    $('.menu__body, .icon-menu').removeClass('active');
  });


  // Form Focus
  $('.vacancy__form').find('input').on('focus blur keyup', function (e) {

    var $this = $(this),
      label = $this.prev('.label');

    if (e.type === 'focus') {
      label.addClass('active');
    } else {
      label.removeClass('active');
    }

    if (e.type === 'blur') {
      if ($this.val() === '') {
        label.removeClass('active');
      } else {
        label.addClass('active');
      }
    }
    if (e.type === 'keyup') {
      label.addClass('active');
    }

  });


  
  // ScrollTo
  $(".to-company").mPageScroll2id();
  $(".to-decisions").mPageScroll2id();
  $(".to-vacancies").mPageScroll2id();
  $(".to-contacts").mPageScroll2id();
  $(".to-response").mPageScroll2id();



  // Accordion
	var Accordion = function (el, multiple) {
		this.el = el || {};
		// more then one submenu open?
		this.multiple = multiple || false;

		var dropdownlink = this.el.find('.accordion-menu__dropdownlink');
		dropdownlink.on('click',
			{ el: this.el, multiple: this.multiple },
			this.dropdown);
	};
	Accordion.prototype.dropdown = function (e) {
		var $el = e.data.el,
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.accordion-menu__content').not($next).slideUp().parent().removeClass('open');
		}
	}

	var accordion = new Accordion($('.accordion-menu'), false);


	$(".vacancy__box .box__list").clone().appendTo(".accordion-menu__content");


});


 // Dropzone
 function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function (e) {
      $('.response .vacancy__dropzone-message').hide();

      // $('.vacancy__dropzone-upload-image').attr('src', e.target.result);
      $('.response .vacancy__dropzone-upload').show();

      $('.response .vacancy__dropzone-upload-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

$(window).resize(function () {
  if ($(this).width() < 500) {
    $('.response .vacancy__dropzone-link-label').text('Ссылка на резюме hh.ru');
  } else {
    $('.response .vacancy__dropzone-link-label').text('Или вставьте ссылку на резюме hh.ru');
  }
});

function removeUpload() {
  $('.response .file-upload-input').replaceWith($('.response .file-upload-input').clone());
  $('.response .vacancy__dropzone-upload').hide();
  $('.response .vacancy__dropzone-message').show();
}
$('.response .vacancy__dropzone-message').bind('dragover', function () {
  $('.response .vacancy__dropzone').addClass('image-dropping');
});
$('.response .vacancy__dropzone-message').bind('dragleave', function () {
  $('.response .vacancy__dropzone').removeClass('image-dropping');
});



