<?php
    function fun_fact_scripts() {
        //Add css
        wp_enqueue_style('ytrs-main-style', plugins_url() . '/fun_fact/css/style.css');

        //Add JS
        wp_enqueue_script('yts-main-script', plugins_url() . '/fun_fact/js/main.js');
    }

    add_action('wp_enqueue_scripts', 'fun_fact_scripts');
?>
