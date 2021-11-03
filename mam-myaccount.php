<?php
/**
 * Plugin Name: Woocommerce My Account - Move Ahead Media
 * Plugin URI: https://github.com/moveaheadmedia/mam-myaccount/
 * Description: a WordPress plugin creates a shortcode [mam-my-account] to add Woocommerce Sing In / Register / My Account button. Uses Custom Fields and preferably to use with Font Awesome. Requires WooCommerce
 * Version: 1.0
 * Author: alisal
 * Author URI: https://github.com/moveaheadmedia/
 * Text Domain: mam-myaccount
 * WC requires at least: 4.9.0
 * WC tested up to: 5.5.2
 * Woocommerce My Account - Move Ahead Media is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Woocommerce My Account - Move Ahead Media is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Woocommerce My Account - Move Ahead Media. If not, see <http://www.gnu.org/licenses/>.
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// mam-my-account shortcode handler
function mam_my_account()
{
    // Check Woocommerce installed.
    if (!class_exists('Woocommerce')) {
        return '<p>Please install and activate Woocommerce';
    }
    ob_start();
    $myAccount = get_permalink(get_option('woocommerce_myaccount_page_id'));
    if (is_user_logged_in()) { ?>
        <a href="<?php echo $myAccount; ?>" title="<?php _e('Go To My Account'); ?>"><i class="fas fa-user"></i> <?php _e('Go To My Account'); ?></a>
    <?php } else { ?>
        <a href="<?php echo $myAccount; ?>" title="<?php _e('Sign in / Register'); ?>"><i class="fas fa-user"></i> <?php _e('Sign in / Register'); ?></a>
    <?php } ?>
    <?php
    return ob_get_clean();
}

add_shortcode('mam-my-account', 'mam_my_account');
