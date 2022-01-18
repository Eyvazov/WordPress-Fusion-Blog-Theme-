<?php

class TagsWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('widget_tags', __('Fusion Etiketlər'),
            [
                'classname' => 'tags-widget',
                'description' => __('Buradan Etiketləriniz Seçə Bilərsiniz.')
            ]
        );
    }

    public function form($instance)
    {
        $tag_title = !empty($instance['tag_title']) ? $instance['tag_title'] : '';
        ?>
        <p>
            <label for="<?= $this->get_field_id('tag_title'); ?>"><?= __('Başlıq'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('tag_title'); ?>"
                   name="<?= $this->get_field_name('tag_title'); ?>" value="<?= $tag_title; ?>">
        </p>

        <?php
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widte_title', $instance['tag_title']);
        $tags = get_tags();
        echo $args['before_widget'];
        ?>
        <div class="widget tags-widget">
            <?= $args['before_title'] . $title . $args['after_title']; ?>
            <ul class="tags-list list-unstyled">
                <?php if ($tags): ?>

                    <?php foreach ($tags as $tag): ?>
                        <li><a href="<?= get_tag_link($tag->term_id); ?>"><?= $tag->name; ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $old_instance['tag_title'] = $new_instance['tag_title'];

        return $old_instance;

    }
}

function registerTagsWidget()
{
    register_widget('TagsWidget');
}

add_action('widgets_init', 'registerTagsWidget');

?>