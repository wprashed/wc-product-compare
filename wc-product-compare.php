<?php
/**
 * Plugin Name: WooCommerce Product Compare
 * Description: A simple product comparison feature for WooCommerce.
 * Version: 1.0
 * Author: Rashed Hossain
 */

if (!defined('ABSPATH')) exit;

class WC_Product_Compare {

    public function __construct() {
        add_action('init', [$this, 'start_session']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('woocommerce_after_shop_loop_item', [$this, 'add_compare_button'], 20);
        add_action('woocommerce_single_product_summary', [$this, 'add_compare_button'], 35);
        add_action('wp_ajax_add_to_compare', [$this, 'add_to_compare']);
        add_action('wp_ajax_nopriv_add_to_compare', [$this, 'add_to_compare']);
        add_shortcode('product_compare', [$this, 'compare_shortcode']);
    }

    public function start_session() {
        if (!session_id()) {
            session_start();
        }
    }

    public function enqueue_scripts() {
        wp_enqueue_script('compare-script', plugin_dir_url(__FILE__) . 'compare.js', ['jquery'], null, true);
        wp_localize_script('compare-script', 'compareData', [
            'ajaxurl' => admin_url('admin-ajax.php'),
        ]);
    }

    public function add_compare_button() {
        global $product;
        echo '<button class="button compare-btn" data-product-id="' . esc_attr($product->get_id()) . '">Compare</button>';
    }

    public function add_to_compare() {
        $product_id = intval($_POST['product_id']);
        if (!isset($_SESSION['compare_list'])) {
            $_SESSION['compare_list'] = [];
        }
        if (!in_array($product_id, $_SESSION['compare_list'])) {
            $_SESSION['compare_list'][] = $product_id;
        }
        wp_send_json_success(['added' => $product_id]);
    }

    public function compare_shortcode() {
        if (empty($_SESSION['compare_list'])) {
            return '<p>No products to compare.</p>';
        }

        $output = '<table class="compare-table" style="width:100%; text-align:left; border-collapse: collapse;">';
        $output .= '<tr>';
        foreach ($_SESSION['compare_list'] as $product_id) {
            $product = wc_get_product($product_id);
            $output .= '<th style="border:1px solid #ddd; padding:8px;">' . $product->get_name() . '</th>';
        }
        $output .= '</tr><tr>';
        foreach ($_SESSION['compare_list'] as $product_id) {
            $product = wc_get_product($product_id);
            $output .= '<td style="border:1px solid #ddd; padding:8px;"><img src="' . get_the_post_thumbnail_url($product_id, 'thumbnail') . '" style="max-width:100px;"></td>';
        }
        $output .= '</tr><tr>';
        foreach ($_SESSION['compare_list'] as $product_id) {
            $product = wc_get_product($product_id);
            $output .= '<td style="border:1px solid #ddd; padding:8px;">' . wc_price($product->get_price()) . '</td>';
        }
        $output .= '</tr><tr>';
        foreach ($_SESSION['compare_list'] as $product_id) {
            $product = wc_get_product($product_id);
            $output .= '<td style="border:1px solid #ddd; padding:8px;">' . $product->get_short_description() . '</td>';
        }
        $output .= '</tr></table>';
        return $output;
    }
}

new WC_Product_Compare();