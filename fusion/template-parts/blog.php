
            <?php
            $args = ['post_type' => 'post', 'post_status' => 'publish'];
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="post-item">
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <img class="img-responsive"
                                     src="<?php the_post_thumbnail_url('small'); ?>"
                                     alt="<?php the_title(); ?>">
                            <?php else: ?>
                                <img class="img-responsive" src="https://via.placeholder.com/1170x780"
                                     alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="post-category">
                        <?php if ($cats = the_category()): ?>
                            <?php foreach ($cats as $cat): ?>
                                <?php $cat; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="post-header">
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                        </h3>
                        <span class="post-date">
                                            <i class="fa fa-calendar"></i>
											<a href="archive.html"><?= the_date()?></a>
                                        </span>
                        <span class="post-comments">
                                            <i class="fa fa-comments-o"></i>
											<a href="single.html#respond" class="comment-url"><?= get_comments_number();?></a>
                                        </span>
                    </div>
                    <div class="post-content">
                        <?php the_excerpt();?>
                    </div>
                    <div class="post-footer">
                        <div class="author-info pull-left">
                                            <span class="author-avatar">
                                                <?= get_avatar(get_the_author_meta('ID'))?>
                                            </span>
                            <span class="author-name">
                                                <?= get_the_author_link();?>
                                            </span>
                        </div>
                        <div class="read-more pull-right">
                            <a href="<?php the_permalink()?>"><?= __('Davamı'); ?><i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>



                <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
            <?php else : ?>
                <div class="alert alert-warning text-center ">
                    <h3>
                        <?php esc_html_e('Saytda Heç Bir Yazı Yoxdur!'); ?>
                    </h3>
                </div>
            <?php endif; ?>