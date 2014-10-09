$(document).ready(function() {

  $(".commentlist li").addClass("panel panel-default");
	$(".comment-reply-link").addClass("btn btn-default");

  	/*
	HOVERNAV
	Navbar dropdown on hover.
	Delete this segment if you don't want it, and delete the corresponding CSS in bst.css
	Uses jQuery Media Query - see http://www.sitepoint.com/javascript-media-queries/
	*/
	var mq = window.matchMedia('(min-width: 768px)');
	if (mq.matches) {
	  $('ul.navbar-nav > li').addClass('hovernav');
	} else {
	  $('ul.navbar-nav > li').removeClass('hovernav');
	};
  	// The addClass/removeClass also needs to be triggered on page resize <=> 768px
	if (matchMedia) {
	  var mq = window.matchMedia('(min-width: 768px)');
	  mq.addListener(WidthChange);
	  WidthChange(mq);
	}
	function WidthChange(mq) {
	  if (mq.matches) {
	    $('ul.navbar-nav > li').addClass('hovernav');
	  } else {
	    $('ul.navbar-nav > li').removeClass('hovernav');
	  }
	};

	/*
	MEGANAV
	Allows GRAND-CHILD links to be displayed in a mega-menu on screens larger than phones.
	Delete this segment if you don't want it, and delete the corresponding CSS in bst.css
	*/
	$('.navbar').addClass('meganav');
	$('.meganav .dropdown-menu .dropdown-menu').parent().addClass('has-children').parents('li').addClass('dropdown mega-menu');

	/*
	Forms
	*/
  $('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
  $('input[type=submit]').addClass('btn btn-primary');

  	/*
	Woocommerce re-styling
	*/
  $('div.woocommerce').wrapInner('<article></article>');

});
