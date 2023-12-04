<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

define('SITE_EMAIL', 'orders@godstonediamonds.com');
define('SITE_URL', 'https://diamondbayou.com/');
define('CONTACT_NO', '1.417.889.4803');
define('SITE_ADDRESS', 'demo.jbetadev.com');
define('SITES_NAME', 'Godstone Diamond');
define('SITE_LABEL', 'Diamond');
define('SITE_LOCATION_ADDRESS', '3308 S Meadowlark Ave Springfield, Missouri 65807');
define('SHAPES_PATH', SITE_URL.'img/shapes_images/');
define('UNIQUE_SITE', 'http://www.uniquesettings.com/');
define('ADMIN_LIB', SITE_URL.'admin_libs/');
define('SALES_TAX_CITY', 'California');
define('SITE_WHURL', SITE_URL.'img/wh_site/');
define('WHSITE_IMGURL', SITE_URL.'images/whsaler_img/');
define('HOME_IMG', SITE_URL.'img/david_home/');
define('STERN_IMGS', SITE_URL.'overmts/images/');
define('DEMO_RETAIL_URL', SITE_URL . 'demo_retail/');
define('DEMO_RETAIL_CSS', DEMO_RETAIL_URL . 'retaildemo_css/');
define('DEMO_RETAIL_JS', DEMO_RETAIL_URL . 'retaildemo_js/');
define('DEMO_RETAIL_IMG', DEMO_RETAIL_URL . 'retaildemo_img/');
define('DEMO_RETAIL_OTHER', DEMO_RETAIL_URL . 'otherdemo_files/');
define('UNIQUE_LINK', SITE_URL . 'testengagementrings/engagementrings/');
define('IMGSRC_LINK', SITE_URL . 'img/david_home/diamond_search/');
define('HOME_IMGVIEW', SITE_URL.'img/tvjohny_img/');
$delivery_date = date("l, F d",strtotime("+10 days"));
define('ORDER_DELIVERY_LABEL', 'Order BY 11:59 PM PST Today Receive By '.$delivery_date.' VIA Fedex');
define('DELIVERY_TIME', '11:59 PM PST Today');
define('RINGS_IMAGE', 'https://diamondbayou.com/');
define('TB', "\t");
define('NL', "\n");
define('QUALITY_IMGS', 'https://books.jewelercart.com/qgold/images/');
define('PROCESSING_FEE', 0);
define('PRICE_PERCENT', 3.5);
define('UNIQUE_OPTION', 'unique');
define('STULLER_OPTION', 'stuller');
define('QUALITY_OPTION', 'quality');
define('OVERNIGHT_OPTION', 'overnight');
define('STULLER_FINE', 'stullers_fine');
define('PRICE_MARKUP', 1300);
define('OTHER_MANUFACT', SITE_URL.'other_manufact/');
define('UNITED_IMGDR', SITE_URL.'img/united_img/');
define('UNITED_IMGSV', SITE_URL.'img/unitedimg_sv/');
define('COLLECTION_FOLDER', 'webimages/completed_images/');
define('HEART_MARKET', 'https://market.heartsanddiamonds.com/');
define('IMAGE_PATH', HEART_MARKET.'img/home_page/');
define('EZPAY_LABEL', 'ezPay');

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
