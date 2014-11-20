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
	function WidthChange(mq) {
	  if (mq.matches) {
	    $('ul.navbar-nav > li').addClass('hovernav');
	  } else {
	    $('ul.navbar-nav > li').removeClass('hovernav');
	  }
	};
	if (matchMedia) {
		var mq = window.matchMedia('(min-width: 768px)');
		mq.addListener(WidthChange);
		WidthChange(mq);
	}

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
	WOOCOMMERCE - restyling
	Delete this segment if you don't want it, and delete the corresponding CSS in bst.css
	*/
	$('div.woocommerce').wrapInner('<article></article>');
	$('.woocommerce-pagination ul').css({"border": 0}).removeClass().addClass('pagination pagination-lg');
	$('.woocommerce-pagination li').css({border: 0});
	$('.woocommerce-pagination .next').text('»');
	$('.woocommerce-pagination .prev').text('«');
	$('.woocommerce-pagination .current').removeClass().addClass('active').css({background: "#e7e7e7"});
	$('.woocommerce-message a.button.wc-forward').removeClass().addClass('btn btn-success').append('&nbsp; <i class="glyphicon glyphicon-arrow-right"></i>').css({display: "block", float: "right", marginTop: -7});
	$('.woocommerce a.button.wc-backward').removeClass().addClass('btn btn-info').prepend('<i class="glyphicon glyphicon-arrow-left"></i> &nbsp;').css({display: "inline-block"});
	$('.woocommerce-message').removeClass().addClass('alert alert-success');
	$('.woocommerce-info').removeClass().addClass('alert alert-warning');
	$('.woocommerce .cart button').removeClass().addClass('btn btn-primary').css({height: 28, paddingTop: 3});
	$('.woocommerce .shipping-calculator-button').addClass('btn btn-primary btn-block').css({height: 34});
	$('.shipping-calculator-form .button').removeClass().addClass('btn btn-success btn-block');
	$('.woocommerce input[type=submit]').removeClass().addClass('btn btn-primary').css({height: 34});
	$('.woocommerce input[name=proceed]').removeClass().addClass('btn btn-success');
});
