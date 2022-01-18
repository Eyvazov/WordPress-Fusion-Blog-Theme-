<?php

class CategoriesWidget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct('widget_categories', __('Fusion Kateqoriyalar'),
            [
                'classname' => 'categories-widget',
                'description' => 'Buradan Kateqoriyalarınız Siyahılaya Bilərsiniz.'
            ]
        );
    }

    public function form($instance)
    {
        $categories_title = !empty($instance['categories_title']) ? $instance['categories_title'] : '';
        $categories_count = !empty($instance['categories_count']) ? $instance['categories_count'] : '';
        ?>

        <p>
            <label for="<?= $this->get_field_id('categories_title'); ?>"><?= __('Başlıq'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('categories_title'); ?>"
                   name="<?= $this->get_field_name('categories_title'); ?>" value="<?= $categories_title; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('categories_count'); ?>"><?= __('Kateqoriya Aid Yazıların Sayı Göstərilsin?'); ?></label>
            <input type="checkbox" class="checkbox" id="<?= $this->get_field_id('categories_count'); ?>"
                   name="<?= $this->get_field_name('categories_count'); ?>" <?= checked($categories_count, 'on'); ?>>
        </p>

        <?php

    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['categories_title']);
        $count = $instance['categories_count'];

        echo $args['before_widget'];
        ?>

        <div class="widget categories-widget">
            <?= $args['before_title'] . $title . $args['after_title']; ?>
            <?php if ($cats = get_categories()): ?>
                <?php foreach ($cats as $cat): ?>
                    <div class="category-item">
                        <a href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a>
                        <?php if ($count): ?>
                            <span class="count">(<?= $cat->count; ?>)</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; endif; ?>
        </div>

        <?php
        echo $args['after_widget'];

    }

    public function update($new_instance, $old_instance)
    {
        $old_instance['categories_title'] = $new_instance['categories_title'];
        $old_instance['categories_count'] = $new_instance['categories_count'];

        return $old_instance;

    }
}

function registerCategories()
{
    register_widget('CategoriesWidget');
}

add_action('widgets_init', 'registerCategories');
?>