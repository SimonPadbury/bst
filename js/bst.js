$(document).ready(function() {

  $(".commentlist li").addClass("panel panel-default");
	$(".comment-reply-link").addClass("btn btn-default");
  
	/*
	Offcanvas toggle
	*/
  $('[data-toggle=offcanvas]').click(function(){
    $('.row-offcanvas').toggleClass('active');
	});

  /*
	Navbar hover dropdown
	Uses jQuery Media Query - see http://www.sitepoint.com/javascript-media-queries/
	*/
	var mq = window.matchMedia('(min-width: 768px)');
  if (mq.matches) {
    $('ul.navbar-nav li').addClass('hovernav');
  } else {
  	$('ul.navbar-nav li').removeClass('hovernav');
  };
	/*
	The addClass/removeClass also needs to be triggered
  on page resize <=> 768px
	*/
  if (matchMedia) {
    var mq = window.matchMedia('(min-width: 768px)');
    mq.addListener(WidthChange);
    WidthChange(mq);
  }
	function WidthChange(mq) {
    if (mq.matches) {
      $('ul.navbar-nav li').addClass('hovernav');
    } else {
      $('ul.navbar-nav li').removeClass('hovernav');
    }
  };
  
});