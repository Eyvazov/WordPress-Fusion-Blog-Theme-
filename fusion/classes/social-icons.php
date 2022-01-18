<?php

class SocialIconsWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('widget_social_icons', __('Fusion Sosyal İkonlar', 'fusion'),
            [
                'classname' => 'follow-widget',
                'description' => __('Buradan Sosyal Şəbəkə Hesablarınızı Əlavə Edə Bilərsiniz.')
            ]
        );
    }

    public function form($instance)
    {
        $social_title = !empty($instance['social_title']) ? $instance['social_title'] : '';
        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : '';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : '';
        $youtube = !empty($instance['youtube']) ? $instance['youtube'] : '';
        $linkedin = !empty($instance['linkedin']) ? $instance['linkedin'] : '';
        $github = !empty($instance['github']) ? $instance['github'] : '';
        $telegram = !empty($instance['telegram']) ? $instance['telegram'] : '';
        $okru = !empty($instance['odnoklassniki']) ? $instance['odnoklassniki'] : '';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
        $whatsapp = !empty($instance['whatsapp']) ? $instance['whatsapp'] : '';
        ?>
        <p>
            <label for="<?= $this->get_field_id('social_title'); ?>"><?= __('Başlıq'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('social_title'); ?>"
                   name="<?= $this->get_field_name('social_title'); ?>" value="<?= $social_title; ?>">
        </p>
        <hr>
        <p>
            <label for="<?= $this->get_field_id('facebook'); ?>"><?= __('Facebook URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('facebook'); ?>"
                   name="<?= $this->get_field_name('facebook'); ?>" value="<?= $facebook; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('instagram'); ?>"><?= __('Instagram URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('instagram'); ?>"
                   name="<?= $this->get_field_name('instagram'); ?>" value="<?= $instagram; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('youtube'); ?>"><?= __('YouTube URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('youtube'); ?>"
                   name="<?= $this->get_field_name('youtube'); ?>" value="<?= $youtube; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('twitter'); ?>"><?= __('Twitter URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('twitter'); ?>"
                   name="<?= $this->get_field_name('twitter'); ?>" value="<?= $twitter; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('linkedin'); ?>"><?= __('LinkedIn URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('linkedin'); ?>"
                   name="<?= $this->get_field_name('linkedin'); ?>" value="<?= $linkedin; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('github'); ?>"><?= __('GitHub URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('github'); ?>"
                   name="<?= $this->get_field_name('github'); ?>" value="<?= $github; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('telegram'); ?>"><?= __('Telegram URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('telegram'); ?>"
                   name="<?= $this->get_field_name('telegram'); ?>" value="<?= $telegram; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('odnoklassniki'); ?>"><?= __('Ok.ru URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('odnoklassniki'); ?>"
                   name="<?= $this->get_field_name('odnoklassniki'); ?>" value="<?= $okru; ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('whatsapp'); ?>"><?= __('WhatsApp URL'); ?></label>
            <input type="text" class="widefat" id="<?= $this->get_field_id('whatsapp'); ?>"
                   name="<?= $this->get_field_name('whatsapp'); ?>" value="<?= $whatsapp; ?>">
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['social_title']);

        echo $args['before_widget'];
        ?>
        <?php $af = array_filter($instance); ?>
        <?php if (count($af) > 1): ?>
            <div class="widget follow-widget">
            <?= $args['before_title'] . $title . $args['after_title']; ?>
            <ul class="social-icons-menu list-unstyled">
                <?php
                unset($instance['social_title']);
                foreach ($instance as $key => $value): ?>
                    <?php if ($value): ?>
                        <li>
                            <a href="<?= $value; ?>" target="_blank">
                                <i class="fa fa-<?= $key; ?>"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>

        <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $old_instance['social_title'] = $new_instance['social_title'];
        $old_instance['facebook'] = $new_instance['facebook'];
        $old_instance['instagram'] = $new_instance['instagram'];
        $old_instance['youtube'] = $new_instance['youtube'];
        $old_instance['twitter'] = $new_instance['twitter'];
        $old_instance['linkedin'] = $new_instance['linkedin'];
        $old_instance['github'] = $new_instance['github'];
        $old_instance['telegram'] = $new_instance['telegram'];
        $old_instance['odnoklassniki'] = $new_instance['odnoklassniki'];
        $old_instance['whatsapp'] = $new_instance['whatsapp'];

        return $old_instance;
    }
}

function registerSocialIcons()
{
    register_widget('SocialIconsWidget');
}

add_action('widgets_init', 'registerSocialIcons');

?>