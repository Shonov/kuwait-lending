import $ from 'jquery';

import '../scss/style.scss';

import {apiUrl, apiUrlForTranslate} from './config';

$('a.section-transform__link').on('click', (function (e) {
  e.preventDefault();
  let first_input = $("#for_make_active");
  $('html, body').animate({scrollTop: $(first_input).offset().top - 200}, 500);
  first_input.focus();
}));

let type = 'eng';

$('form').submit(function (e) {
  e.preventDefault();

  $('.form__submit').val('Sending...').attr('disabled', 'disabled');

  let utm = {
    utm_source: getParameterByName('utm_source'),
    utm_medium: getParameterByName('utm_medium'),
    utm_channel: getParameterByName('utm_channel'),
    utm_keyword: getParameterByName('utm_keyword'),
    utm_content: getParameterByName('utm_content'),
    utm_campaign: getParameterByName('utm_campaign')
  };

  Object.keys(utm).forEach((key) => (utm[key] == null) && delete utm[key]);

  if (getParameterByName('lang') !== '') {
    type = getParameterByName('lang');
  }

  let languages = {
    'eng': 'English',
    'ar': 'Arabic',
  };

  let type = $(this).find('.form__input[name="language-type"]').val();

  let formData = {
    Name: $(this).find('.form__input[name="name"]').val(),
    Email: $(this).find('.form__input[name="email"]').val(),
    Phone: $(this).find('.form__input[name="phone"]').val(),
    Language: languages[type],
    Url: window.location.href,
  };
  if (Object.keys(utm).length !== 0) {
    formData.Utm = utm;
  }

  $.ajax({
    type: "POST",
    url: apiUrl,
    data: formData,
    complete: function () {
    },
    success: function (msg) {
      fbq('trackCustom', 'Submit-success-script');
      dataLayer.push({'event': 'submit-success-script'});
      window.location = '/thank-you';
      $('form')[0].reset();
    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr, ajaxOptions, thrownError, arguments);
    },
  });
});

window.addEventListener("DOMContentLoaded", function () {
  [].forEach.call(document.querySelectorAll('input[name="phone"]'), function (input) {
    var keyCode;

    function mask(event) {
      event.keyCode && (keyCode = event.keyCode);
      var pos = this.selectionStart;
      if (pos < 5) {
        this.selectionStart = 150;
      }
      var matrix = "+965-_____________________________",
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = this.value.replace(/\D/g, ""),
        new_value = matrix.replace(/[_\d]/g, function (a) {
          return i < val.length ? val.charAt(i++) || def.charAt(i) : a
        });
      i = new_value.indexOf("_");
      if (i !== -1) {
        i < 5 && (i = 3);
        new_value = new_value.slice(0, i)
      }
      var reg = matrix.substr(0, this.value.length).replace(/_+/g,
        function (a) {
          return "\\d{1," + a.length + "}"
        }).replace(/[+()]/g, "\\$&");
      reg = new RegExp("^" + reg + "$");
      if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
      if (event.type === "blur" && this.value.length <= 5) {
        this.value = "";
        if (type === 'eng') {
          this.placeholder = "Contact Number";
        } else {
          this.placeholder = "رقم التواصل ";
        }
      }
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
    input.addEventListener("keydown", mask, false)
  });
});

$('a.section-request__link').on('click', (function (e) {
  e.preventDefault();
  let first_input = $("#for_make_active");
  $('html, body').animate({scrollTop: $(first_input).offset().top - 200}, "slow");
  first_input.focus();
}));

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, '\\$&');

  let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
  let results = regex.exec(url);

  if (!results) return null;
  if (!results[2]) return '';

  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function changeLanguage(lang = null) {

  document.title = 'EMS Personal Fitness Training - Trial Session | Nexfit Kuwait';

  if ($('.language-selector__item--selected').hasClass('language-selector__item-ae')) {
    type = 'ar';
    window.history.replaceState(null, null, window.location.pathname + '?lang=ar');

    $('body').addClass('body-ar').css('direction', 'rtl');

    document.title = 'تدريبات التحفيز الكهربائي للعضلات للياقة البدنية - الجلسة التجريبية | نكسفيت الكويت';
  } else {
    $('body').removeClass('body-ar').css('direction', 'ltr');
    window.history.replaceState(null, null, window.location.pathname + '?lang=eng');
    type = 'eng';
  }

  if (type === 'eng') {
    $('.offer__limited-offer.mobile-hidden').attr('src', '//kuwait.nexfit.com/img/limited-offer.png');
    $('.offer__limited-offer.pc-hidden').attr('src', '//kuwait.nexfit.com/img/mobile-limited-offer.png');
    $('.language-selector__item').removeClass('language-selector__item--selected');
    $('.language-selector').removeClass('language-selector--open');
    $('.language-selector__item-en').addClass('language-selector__item--selected');
    $('.language-selector__item-en').prependTo('.language-selector');
  } else {
    $('.offer__limited-offer.mobile-hidden').attr('src', '//kuwait.nexfit.com/img/limited-offer-ar.png');
    $('.offer__limited-offer.pc-hidden').attr('src', '//kuwait.nexfit.com/img/mobile-limited-offer-ar.png');
  }

  $.ajax({
    type: "GET",
    url: apiUrlForTranslate,
    data: {lang: type, action: 'change'},
    beforeSend: function () {
      $('body').css('overflow-y', 'hidden');
      $('.loader').css('display', 'flex');
      $('.loader').fadeIn();
    },
    complete: function () {
      setTimeout(function () {
        $('.loader').fadeOut();
        $('body').css('overflow-y', 'unset');
      }, 500);
    },
    success: function (msg) {
      let result = JSON.parse(msg);
      let selector = '';
      Object.keys(result.inputs).forEach(function (e) {
        selector = ("." + e);
        $(selector).val(result.inputs[e]);
      });

      Object.keys(result.placeholders).forEach(function (e) {
        selector = ("." + e);
        $(selector).attr("placeholder", result.placeholders[e]);
      });

      delete result.placeholders;
      delete result.inputs;

      Object.keys(result).forEach(function (e) {
        selector = ("." + e);
        // console.log($(selector));
        $(selector).html(result[e]);
      });
    }
  });

  if (type === 'ar') {
    $('input[name="language-type"]').attr('value', 'ar');
  } else {
    $('input[name="language-type"]').attr('value', 'eng');
  }

  if (type === 'ar') {
    $('body').addClass('rtl');
  } else {
    $('body').removeClass('rtl');
  }
}

$('.language-selector__item').click(function () {
  if ($(this).hasClass('language-selector__item--selected')) {
    let parent = $(this).parent();

    if (parent.hasClass('language-selector--open')) {
      parent.removeClass('language-selector--open');
    } else {
      parent.addClass('language-selector--open');
    }
    return;
  }

  $(this).prependTo('.language-selector');
  $('.language-selector__item').removeClass('language-selector__item--selected');
  $('.language-selector').removeClass('language-selector--open');
  $(this).addClass('language-selector__item--selected');

  changeLanguage();
});
