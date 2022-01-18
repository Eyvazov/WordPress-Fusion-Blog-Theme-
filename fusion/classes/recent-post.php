<?php
class RecentPostWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('widget_recent_post', __('Fusion Son Yazılar'),
            [
                'classname' => 'recent-posts-widget',
                'description' => 'Buradan Son Yazıları Görüntüləyə Bilərsiniz.'
            ]
        );
    }

    public function form($instance)
    {
        $recent_post_title = !empty($instance['recent_post_title']) ? $instance['recent_post_title'] : '';
        $recent_post_count = !empty($instance['recent_post_count']) ? $instance['recent_post_count'] : '';
        $recent_post_image = !empty($instance['recent_post_image']) ? $instance['recent_post_image'] : '';
        $recent_post_author = !empty($instance['recent_post_author']) ? $instance['recent_post_author'] : '';
        $recent_post_date = !empty($instance['recent_post_date']) ? $instance['recent_post_date'] : '';
        ?>

        <p>
            <label for="<?= $this->get_field_id('recent_post_title'); ?>"><?= __('Başlıq'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('recent_post_title'); ?>"
                   name="<?= $this->get_field_name('recent_post_title'); ?>" value="<?= $recent_post_title; ?>">
        </p>

        <p>
            <label for="<?= $this->get_field_id('recent_post_count'); ?>">Göstəriləcək Yazıların Sayı</label>
            <input type="number" class="tiny-text" id="<?= $this->get_field_id('recent_post_count'); ?>"
                   name="<?= $this->get_field_name('recent_post_count'); ?>" value="<?= $recent_post_count; ?>">
        </p>

        <p>
            <label for="<?= $this->get_field_id('recent_post_image'); ?>">Yazı Şəkli Göstərilsin?</label>
            <input type="checkbox" class="checkbox" id="<?= $this->get_field_id('recent_post_image'); ?>"
                   name="<?= $this->get_field_name('recent_post_image'); ?>" <?php checked($recent_post_image, 'on'); ?>>
        </p>

        <p>
            <label for="<?= $this->get_field_id('recent_post_author'); ?>">Müəllif Göstərilsin?</label>
            <input type="checkbox" class="checkbox" id="<?= $this->get_field_id('recent_post_author'); ?>"
                   name="<?= $this->get_field_name('recent_post_author'); ?>" <?php checked($recent_post_author, 'on'); ?>>
        </p>

        <p>
            <label for="<?= $this->get_field_id('recent_post_date'); ?>">Tarix Göstərilsin?</label>
            <input type="checkbox" class="checkbox" id="<?= $this->get_field_id('recent_post_date'); ?>"
                   name="<?= $this->get_field_name('recent_post_date'); ?>" <?php checked($recent_post_date, 'on'); ?>>
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['recent_post_title']);
        $post_count = $instance['recent_post_count'];
        echo $args['before_widget'];
        ?>
        <div class="widget recent-posts-widget">
            <?= $args['before_title'] . $title . $args['after_title']; ?>

            <?php
            $post_data = ['post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $post_count];
            $loop = new WP_Query($post_data);

            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="recent-post-item">
                    <div class="recent-post-widget-thumbnail">
                        <a href="<?= the_permalink() ?>">
                            <?php if ($instance['recent_post_image']): ?>
                                <?php if (has_post_thumbnail()): ?>
                                    <?= the_post_thumbnail('', array('class' => 'img-responsive')); ?>
                                <?php else: ?>
                                    <img class="img-responsive" src="https://via.placeholder.com/1170x780"
                                         alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="recent-post-widget-content">
                        <h4 class="recent-post-widget-title">
                            <a href="<?= the_permalink() ?>"><?= the_title() ?></a>
                        </h4>
                        <div class="recent-post-widget-info">
                            <?php if ($instance['recent_post_author']): ?>
                                <span class="author">
                                <?= the_author_link(); ?>
                            </span>
                            <?php endif; ?>
                            <?php if ($instance['recent_post_date']): ?>
                                <span class="date">
                                <a href="archive.html"><?= the_date(); ?></a>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $old_instance['recent_post_title'] = $new_instance['recent_post_title'];
        $old_instance['recent_post_count'] = $new_instance['recent_post_count'];
        $old_instance['recent_post_image'] = $new_instance['recent_post_image'];
        $old_instance['recent_post_author'] = $new_instance['recent_post_author'];
        $old_instance['recent_post_date'] = $new_instance['recent_post_date'];
        return $old_instance;
    }
}

function registerRecentPosts()
{
    register_widget('RecentPostWidget');
}

add_action('widgets_init', 'registerRecentPosts');

?>