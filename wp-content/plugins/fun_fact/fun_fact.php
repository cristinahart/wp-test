<?php
    /**
    * Plugin Name: Fun Fact
    * Author: Cristina Hart
    */

class fun_fact extends WP_Widget {
    /**
     * Set up widget
     */
    function __construct() {
        //parent::__construct(false, $name = __('Fun Fact'));

        $fun_fact_ops = array(
                            'classname'   => ' widget-fun-fact',
                            'description' => esc_html__('Fun Fact', 'fun_fact_domain')
                        );

        parent::__construct('fun_fact',
                             esc_html__('Fan Fact', 'fun_fact_domain'),
                             $fun_fact_ops);
    }

    /**
     * Back-enf function
     */
    function form($instance) {
        $content = $instance['content'] ?? __('Write here!!', 'fun_fact_domain'); ?>

        <p>
            <label for="<?=$this->get_field_id('title')?>">
                <?php _e('content:'); ?>
            </label>
            <textarea class="widefat" rows="8" id="<?=$this->get_field_id('content')?>" name="<?= $this->get_field_name('content')?>" type="text"><?=esc_attr($content)?></textarea>
        </p> <?php
    }

    /**
     * Front-end function
     */
    function widget($args, $instance) { ?>
        <?=$args['before_widget']; ?>
        <h2 class="widget_title">Fun Fact</h2>
        <p class="widget_fun_fact_description">
            <?=$instance['content']?>
        </p>
        <?=$args['after_widget' ];?> <?php
    }

    function update($new_instance, $old_instance) {
        $instance            = array();
        $instance['content'] = !empty($new_instance['content']) ? strip_tags($new_instance['content']) : '';
        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('fun_fact');
});

?>
