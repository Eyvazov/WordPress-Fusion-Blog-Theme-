<?php

class AboutMe extends WP_Widget
{

    public function __construct()
    {
        // Add Widget scripts
        add_action('admin_enqueue_scripts', array($this, 'scripts'));

        parent::__construct('widget_about_us', __('Fusion About Me'),
            [
                'classname' => 'about-widget',
                'description' => __('Haqqımda Modulunu Buradan Əlavə Edə Bilərsiniz.')
            ]
        );
    }


    public function scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('our_admin', get_template_directory_uri() . '/js/our_admin.js', array('jquery'));
    }


    public function form($instance)
    {
        $about_title = !empty($instance['about_title']) ? $instance['about_title'] : '';
        $about_name = !empty($instance['about_name']) ? $instance['about_name'] : '';
        $about_desc = !empty($instance['about_desc']) ? $instance['about_desc'] : '';
        $image = !empty($instance['image']) ? $instance['image'] : '';

        ?>

        <p>
            <label for="<?= $this->get_field_id('about_title'); ?>"><?= __('Başlıq'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('about_title'); ?>"
                   name="<?= $this->get_field_name('about_title'); ?>" value="<?= $about_title; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('image'); ?>"><?= __('Şəkil'); ?> <br/>
                <img src="<?= esc_url($image); ?>" alt="About Image" width="200"></label>
            <input class="widefat" name="<?= $this->get_field_name('image'); ?>" type="hidden"
                   value="<?php echo esc_url($image); ?>"/>
            <br/>
            <button class="upload_image_button button button-primary" id="<?= $this->get_field_id('image'); ?>">Şəkil
                Seç
            </button>
        </p>

        <p>
            <label for="<?= $this->get_field_id('about_name'); ?>"><?= __('Ad Soyad'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('about_name'); ?>"
                   name="<?= $this->get_field_name('about_name'); ?>" value="<?= $about_name; ?>">
        </p>

        <p>
            <label for="<?= $this->get_field_id('about_desc'); ?>"><?= __('Açıqlama'); ?></label>
            <textarea name="<?= $this->get_field_name('about_desc'); ?>" class="widefat"
                      id="<?= $this->get_field_id('about_desc'); ?>" cols="30" rows="10"><?= $about_desc; ?></textarea>
        </p>

        <?php

    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['about_title']);
        $image = $instance['image'];
        $name = $instance['about_name'];
        $desc = $instance['about_desc'];

        echo $args['before_widget'];
        ?>
        <div class="widget about-widget">
            <?= $args['before_title'] . $title . $args['after_title']; ?>
            <div class="author-image">
                <img class="circle" src="<?= $image; ?>" alt="" height="107" width="107">
            </div>
            <div class="author-info">
                <h3 class="author-name"><?= $name; ?></h3>
                <p class="author-desc"><?= $desc; ?></p>
            </div>
        </div>
        <?php
        echo $args['after_widget'];

    }

    public function update($new_instance, $old_instance)
    {
        $old_instance['about_title'] = $new_instance['about_title'];
        $old_instance['about_name'] = $new_instance['about_name'];
        $old_instance['about_desc'] = $new_instance['about_desc'];
        $old_instance['image'] = $new_instance['image'];

        return $old_instance;
    }
}

function registerAboutMe()
{
    register_widget('AboutMe');
}

add_action('widgets_init', 'registerAboutMe');
?>