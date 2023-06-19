$(function() {
	"use strict";
  
  
	$(".mobile-search-icon").on("click", function() {
	  $(".search-bar").addClass("full-search-bar");
	});
  
	$(".search-close").on("click", function() {
	  $(".search-bar").removeClass("full-search-bar");
	});
  
	$(".mobile-toggle-menu").on("click", function() {
	  $(".wrapper").addClass("toggled");
	});
  
	$(".toggle-icon").click(function() {
	  $(".wrapper").toggleClass("toggled");
	  if ($(".wrapper").hasClass("toggled")) {
		$(".sidebar-wrapper").unbind("hover");
	  } else {
		$(".sidebar-wrapper").hover(function() {
		  $(".wrapper").addClass("sidebar-hovered");
		}, function() {
		  $(".wrapper").removeClass("sidebar-hovered");
		});
	  }
	});
  
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > 300) {
		$(".back-to-top").fadeIn();
	  } else {
		$(".back-to-top").fadeOut();
	  }
	  if ($(this).scrollTop() > 60) {
		$(".topbar").addClass("bg-dark");
	  } else {
		$(".topbar").removeClass("bg-dark");
	  }
	});
  
	$(".back-to-top").on("click", function() {
	  $("html, body").animate({
		scrollTop: 0
	  }, 600);
	  return false;
	});
  
	$(".metismenu li a").filter(function() {
	  return this.href == window.location;
	}).addClass("").parent().addClass("mm-active").parents("li").addClass("mm-show").parents("ul").addClass("mm-active");
  
	$("#menu").metisMenu();
  
	$(".chat-toggle-btn").on("click", function() {
	  $(".chat-wrapper").toggleClass("chat-toggled");
	});
  
	$(".chat-toggle-btn-mobile").on("click", function() {
	  $(".chat-wrapper").removeClass("chat-toggled");
	});
  
	$(".email-toggle-btn").on("click", function() {
	  $(".email-wrapper").toggleClass("email-toggled");
	});
  
	$(".email-toggle-btn-mobile").on("click", function() {
	  $(".email-wrapper").removeClass("email-toggled");
	});
  
	$(".compose-mail-btn").on("click", function() {
	  $(".compose-mail-popup").show();
	});
  
	$(".compose-mail-close").on("click", function() {
	  $(".compose-mail-popup").hide();
	});
  
	$(".switcher-btn").on("click", function() {
	  $(".switcher-wrapper").toggleClass("switcher-toggled");
	});
  
	$(".close-switcher").on("click", function() {
	  $(".switcher-wrapper").removeClass("switcher-toggled");
	});
  
	$('#theme1').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme1');
	});
  
	$('#theme2').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme2');
	});
  
	$('#theme3').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme3');
	});
  
	$('#theme4').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme4');
	});
  
	$('#theme5').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme5');
	});
  
	$('#theme6').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme6');
	});
  
	$('#theme7').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme7');
	});
  
	$('#theme8').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme8');
	});
  
	$('#theme9').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme9');
	});
  
	$('#theme10').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme10');
	});
  
	$('#theme11').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme11');
	});
  
	$('#theme12').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme12');
	});
  
	$('#theme13').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme13');
	});
  
	$('#theme14').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme14');
	});
  
	$('#theme15').click(function() {
	  $('body').attr('class', 'bg-theme bg-theme15');
	});
  });
 