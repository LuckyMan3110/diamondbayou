<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES 
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller']	= "diamonds";
$route['test.html']	= "diamonds/test";
$route['test.html']	= "diamonds/copy";
$route['scaffolding_trigger']	= "";
$route['pagination/(:any']		= "pagination";
$route['404_override']			= 'page_404';
$route['women']					= "collections/women";
$route['men']					= "collections/men";
$route['weddings']				= "collections/weddings";
$route['collections/wedding-bands']		= "collections/wedding_bands";
$route['collections/featured-jewels']	= "collections/featured_jewels";
$route['collections/diamond-earring']	= "collections/diamond_earring";
$route['collections/bracelets']			= "collections/bracelets";
$route['collections/necklaces']			= "collections/necklaces";
$route['collections/pendants']			= "collections/pendants";
$route['collections/pearls']			= "collections/pearls";
$route['collections/gemstones']			= "collections/gemstones";
$route['collections/mens-rings']		= "collections/mens_rings";
$route['collections/mens-bracelets']	= "collections/mens_bracelets";
$route['collections/mens-studs']		= "collections/mens_studs";
$route['collections/mens-chains']		= "collections/mens_chains";
$route['collections/cufflinks']			= "collections/cufflinks";
$route['collections/engagement-rings']	= "collections/engagement_rings";
$route['collections/bands-for-him']		= "collections/bands_for_him";
$route['pages/newsletter']				= "site/page/education-guidance";
$route['pages/the-moijey-philosophy']	= "site/page/education-guidance";
$route['pages/on-the-red-carpet']		= "site/page/education-guidance";
$route['pages/in-the-news']				= "site/page/education-guidance";
$route['pages/how-do-you-say-moijey']	= "site/page/education-guidance";
$route['pages/news']					= "site/page/education-guidance";
$route['pages/pick-bling']				= "site/pick_bling";
$route['pages/pick-cause']				= "site/pick_cause";
$route['pages/purchase-help']			= "site/purchase_help";
$route['carrolls-collections']			= "category_list/carrolls_collections";
$route['create-diamonds-rings']			= "category_list/create_diamonds_rings";
$route['diamonds-rings']				= "category_list/diamonds_rings";
$route['estate-rings']					= "category_list/estate_rings";
$route['fine-jewelry']					= "category_list/fine_jewelry";
$route['baby-items']					= "category_list/baby_items";
$route['bridal-rings']					= "category_list/bridal_rings";
$route['gift-items']					= "category_list/gift_items";
$route['about-items']					= "category_list/about_items";
$route['item-details']					= "category_list/item_details";
$route['site-map']						= "content_pages/site_map";
$route['about-carolls']					= "content_pages/about_carolls";
$route['jewelry']						= "content_pages/jewelry";
$route['find-your-right-size']			= "content_pages/find_your_right_size";
$route['watches']						= "content_pages/watches";
$route['payment-billing']				= "content_pages/media_partners";
$route['giving-back']					= "content_pages/giving_back";
$route['history']						= "content_pages/history";
$route['privacy-cookies']				= "content_pages/privacy_cookies";
$route['terms-and-conditions']			= "content_pages/terms_and_conditions";
$route['faqs']							= "content_pages/faqs";
$route['shipping-services']				= "content_pages/shipping_services";
$route['return-and-exchanges']			= "content_pages/return_and_exchanges";
$route['promotions']					= "content_pages/association";
$route['affiliations']					= "content_pages/affiliations";
$route['blog']							= "content_pages/blog";
$route['events']						= "content_pages/events";
$route['services']						= "content_pages/services";
$route['holiday_gifts']					= "content_pages/landingpage";
$route['addtocart']						= "shoppingbasket/mybasket";
$route['checkout']						= "shoppingbasket/orderinformation";
$route['wishlist']						= "account/account_wishlist";
$route['registration']					= "account/register";
$route['diamondsandcheese']				= "content_pages/diamondsandcheese";
$route['blackfriday']					= "content_pages/blackfriday";
$route['thanksgivingspromotion']		= "content_pages/thanksgivingspromotion";
$route['subscribe']						= "site/page/newsletter";
$route['search']						= "diamonds/refine_search";
$route['ref/:any']						= 'Affiliate/affiliatepage';
$route['loose-diamonds.html']			= "Coverpage/loose_diamonds";
$route['engagement-ring.html']			= "Coverpage/engagement_ring";
$route['wedding-rings.html']			= "Coverpage/wedding_rings";
$route['fine-jewelry.html']				= "Coverpage/fine_jewelry";
$route['learn.html']					= "Coverpage/learn";
$route['faq.html']						= "Coverpage/faq";
$route['coverpage.html']				= "Coverpage/home_cover";
$route['home_cover']				= "Coverpage/home_cover";

$route['collections/women-wedding-ring-gallery']	= "collections/women_wedding_ring_gallery";
$route['collections/engagement-ring-under-2-000']	= "collections/engagement_ring_under_2_000";
$route['custom-jewelry-design-for-customers']		= "content_pages/custom_jewelry_design_for_customers";
$route['custom-jewelry-design-for-business']		= "content_pages/custom_jewelry_design_for_business";
$route['four-cs-of-gemstones-and-diamonds']			= "content_pages/four_cs_of_gemstones_and_diamonds";
$route['china-giftware-and-crystal-design-and-customization']	= "content_pages/china_giftware_and_crystal_design_and_customization";
$route['translate_uri_dashes'] = TRUE;