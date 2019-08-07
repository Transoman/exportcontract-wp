'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  Swiper = require('swiper'),
  tabslet = require('tabslet');

jQuery(document).ready(function($) {
  // Toggle nav menu
  $('.nav-toggle').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('.header__nav').toggleClass('open');
    $('.nav-overlay').toggleClass('is-active');
    $('body').toggleClass('open-nav');
  });

  $('.nav-overlay').click(function() {
    $('.nav-toggle').removeClass('active');
    $('.header__nav').removeClass('open');
    $('.nav-overlay').removeClass('is-active');
    $('body').removeClass('open-nav');
  });

  // Modal
  $('.modal').popup({
    transition: 'all 0.3s',
    onclose: function() {
      $(this).find('label.error').remove();
    }
  });

  new Swiper('.hero-slider', {
    speed: 1000,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  $('.services-tabs').tabslet({
    // container: '.services-tabs__container',
    controls: {
      prev: '.prev',
      next: '.next'
    }
  });

  $('.services-tabs-list a').click(function() {
    let hash = $(this).attr('href');
    hash = hash.slice(1);

    if (window.innerWidth < 992) {
      setTimeout(function() {
        $('html, body').animate({
          scrollTop: $('#' + hash).offset().top
        }, 1000);
      }, 10);
    }
  });

  // Accordion
  let accordion = function(item, toggle, ct) {
    let el = $(item);
    let elTitle = $(toggle);
    let content = $(ct);

    content.hide();
    $(item + '.active').find(content).slideDown(500);

    el.on('click', elTitle, function() {
      if ($(this).find(elTitle).parent().hasClass('active')) {
        $(this).find(elTitle).parent().removeClass('active');
        $(this).find(elTitle).next().slideUp(500);
      }
      else {
        $(this).find(elTitle).parent().addClass('active');
        content.not($(this).find(elTitle).next()).slideUp(500);
        elTitle.not($(this).find(elTitle)).parent().removeClass('active');
        $(this).find(elTitle).next().slideDown(500);
      }
    });
  };

  $('body').on('click', '.load-more', function(e) {
    e.preventDefault();
    $(this).text('Загружаю...');

    var data = {
      'action': 'load_more_faq',
      'query': true_posts,
      'page' : current_page
    };
    $.ajax({
      url: window.wp_data.ajax_url, // обработчик
      data: data, // данные
      type: 'POST', // тип запроса
      success: function(data){
        if ( data ) {
          $('.load-more').text('Показать еще'); // вставляем новые посты
          $('#response').append(data);
          accordion('.faq-card', '.faq-card__title', '.faq-card__content');
          current_page++; // увеличиваем номер страницы на единицу
          if (current_page == max_pages) $('.load-more').parent().remove(); // если последняя страница, удаляем кнопку
        } else {
          $('.load-more').parent().remove(); // если мы дошли до последней страницы постов, скроем кнопку
        }
      }
    });
  });

  $('.location__head').click(function() {
    $(this).next().slideToggle();
  });

  accordion('.faq-card', '.faq-card__title', '.faq-card__content');
  accordion('.docs-list__item', '.docs-list__title', '.docs-list__content');

  // SVG
  svg4everybody({});
});