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

    elTitle.click(function() {
      if ($(this).parent().hasClass('active')) {
        $(this).parent().removeClass('active');
        $(this).next().slideUp(500);
      }
      else {
        $(this).parent().addClass('active');
        content.not($(this).next()).slideUp(500);
        elTitle.not($(this)).parent().removeClass('active');
        $(this).next().slideDown(500);
      }
    });
  };

  accordion('.faq-card', '.faq-card__title', '.faq-card__content');

  // SVG
  svg4everybody({});
});