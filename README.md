#BST - A Bootstrap 3 Starter Theme, for WordPress

**BST is a (very) simple WordPress starter theme loaded with Bootstrap 3.**

*Version 1.6*


##Features

* *Simple, intuitive, clean code.*
* CSS, JS, functions and template parts in different folders.
* **Bootstrap 3.2.0** - CSS and JS enqueued. You can simply swap the default Bootstrap 3 files (included) for a custom made Bootstrap 3, and this theme will still work.
* **jQuery 1.11.1** called from Google CDN, with a local fallback when offline.
* **NEW: WooCommerce** plugin support.
* **NEW:** Choice of two navbar positions (top of screen and/or below site title). Simply delete what you don't need.
* A starter CSS theme - `bst.css`, enqueued.
* Visual editor stylesheet - into which the same Bootsrap 3 and starter CSS theme are preloaded by `@import`, so that **WYSI(M!)WYG** - what you see in the visual editor is (mostly!) what you get at the front end.
* `Modernizr.js`, `respond.js` and `html5shiv.css` included - enqueued.
* Clean-up scripts - e.g. removing WordPress-specific stiff grom the <head>. (Do not rely on these for security.)
* **Optional:** in func/cleanup.php some filters are included (but commented-out, so are inactive) for removing WordPress IDs and classes from the navbar(s). If you would like to use these filters, then simply un-comment them.
* A few simple jQuery scripts - in `bst.js`, enqueued. Example: **Hovernav** (see below).
* Custom comment list callback.
* **Optional** full-width page template - select it in the WordPress Page Editor **Page Attributes** panel.
* Easily make this theme your own - if you rename `bst.css` to `yourtheme.css`, and `bst.js` to `yourtheme.js`, and then do a global search-and-replace to rename "bst" to "yourtheme" everywhere in the theme's code, this theme will still work. (You must also modify the comments in `style.css`, and rename the root folder from **bst/** to **yourtheme/**.)
* [MIT licence](http://opensource.org/licenses/MIT) (open source).

This theme has been built for use as a starter theme and as a learning aid for people who wish to get into WordPress theme design.

###Hovernav

The navbar has some modifications that make the dropdown menu appear on hover (in `bst.js` plus `bst.css`). *The Bootstrap js and css have not been changed*. You can easily delete the "hovernav" segments of bst.js and bst.css if you don't want them. 

##Notes on WooCommerce support

* You will need to install the WooCommerce plugin - http://wordpress.org/plugins/woocommerce/
* I have included the *minimum* additions to BST to make WooCommerce work (this is a starter theme). It will work fine with these minimum additions, but you can add more style and improve the layout.
* WooCommerce uses WooCommerce-styled buttons, icons, etc. in its shop, cart, checkout etc. - these are not the same as the Bootstrap buttons, icons etc. I have not replaced the WooCommerce buttons with Bootstrap buttons, because that would mean that you have no control over the appearance of these buttons from within the WooCommerce plugin settings.
* However I have applied Bootstrap styling to the cart and checkout forms, using jQuery insertion of Bootstrap CSS classes.
* You will need to add a "Shop" link, e.g. to your primary menu
* You will need to add some WooCommerce Widgets to the sidebar (at minimum, WooCommerce Cart and WooCommerce Categories)
* And, of course, you will need to add salable items to your shop, and set up your payment gateway.

Find out more about WooCommerce here: http://www.woothemes.com/woocommerce/

###What if you don't want WooCommerce support in BST?

Simply delete or remove these things that you won't be needing:

* **Remove:** woocommerce.php .
* **Remove:** /func/woocommerce-setup.php .
* **Delete:** in /func/setup.php, scroll to the bottom and delete the line
`add_theme_support('woocommerce');`
* **Delete:** in /css/bst.css, scroll to the bottom and delete all the `.woocommerce` styles.
* **Delete:** in /js/bst.js, scroll to the bottom and delete all that has to do with WooCommerce.
