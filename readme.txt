=== WooCommerce Product Compare ===
Contributors: wprashed  
Donate link: https://buymeacoffee.com/rashedhossain  
Tags: woocommerce, compare products, product comparison, ecommerce, compare  
Requires at least: 5.0  
Tested up to: 6.5  
Requires PHP: 7.2  
Stable tag: 1.0  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A simple and lightweight product comparison feature for WooCommerce. Allow users to add products to a comparison table and view them side-by-side.

== Description ==

**WooCommerce Product Compare** is a lightweight and user-friendly plugin that adds a “Compare” button to your product pages. Let your customers compare product features like name, image, price, and short description side-by-side.

It’s fast, clean, and easy to use — no bloated functionality. Just what you need for a product comparison feature on your WooCommerce site.

### Features:
- “Compare” button on product archive and single product pages
- Session-based compare list
- Comparison table with product name, image, price, and description
- Shortcode support: `[product_compare]` to display compare table
- AJAX-powered add to compare

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory or install directly from the WordPress plugin repository.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. Add the shortcode `[product_compare]` to any page or post where you want the compare table to appear.
4. Products can be added to the compare table by clicking the "Compare" button on the product listing or single product page.

== Screenshots ==

1. Compare button on the shop page
2. Compare button on the single product page
3. Compare table with product details

== Frequently Asked Questions ==

= Can I customize the fields shown in the comparison table? =  
This version includes basic details (name, image, price, description). Future versions will support custom fields.

= Where is the compare list stored? =  
The plugin uses PHP sessions to temporarily store compare lists for each user.

= Can users remove products from the compare list? =  
Currently not supported. This feature will be added in a future release.

== Changelog ==

= 1.0 =
* Initial release with basic compare functionality
* Shortcode `[product_compare]` added
* AJAX-powered add-to-compare

== License ==

This plugin is licensed under the GPLv2 or later.