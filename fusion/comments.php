<?php
$args = array(
    'post_id' => get_the_ID(),
    'status' => 'approve',
    'hierarchical' => true,
);

// The Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query($args);
?>

<div class="comments">
    <?php if (count($comments) >0): ?>
    <h3 class="comments-count">Bu Yazıya <?= count($comments); ?> Rəy Yazılıb</h3>
    <?php else: ?>
    <h3 class="comments-count">Bu Məqaləyə Rəy Yazılmayıb</h3>
    <?php endif; ?>

    <?php if (count($comments)) : ?>

        <ul class="list-unstyled comments-list">
            <?php if (isset($comments)): ?>
                <?php foreach ($comments as $comment) : ?>
                    <?php if ($comment->comment_parent == 0): ?>
                        <li id="comment-<?php echo $comment->comment_post_ID ?>"
                            class="comment <?= get_option('admin_email') === $comment->comment_author_email ? 'comment-author-admin' : null; ?>">
                            <div class="comment-body">
                                <div class="comment-author vcard">
                                    <?= get_avatar($comment->comment_author_email, '64'); ?>
                                    <cite class="fn"><?php echo $comment->comment_author ?></cite>
                                    <span class="says">says:</span>
                                </div>
                                <div class="comment-meta commentmetadata">
                                    <a href="#"><?php echo $comment->comment_date ?></a>
                                    <?= edit_comment_link('(Redaktə Et)'); ?>
                                </div>
                                <p><?php echo $comment->comment_content ?></p>
                            </div>
                            <?php
                            $childcomments = get_comments([
                                'post_id' => get_the_ID(),
                                'status' => 'approve',
                                'parent' => $comment->comment_ID
                            ]);
                            ?>
                            <?php if (isset($childcomments)): ?>
                                <ul class="children">
                                    <?php foreach ($childcomments as $childcomment): ?>
                                        <li class="comment <?= get_option('admin_email') == $childcomment->comment_author_email ? 'comment-author-admin' : null; ?>">
                                            <div class="comment-body">
                                                <div class="comment-author vcard">
                                                    <?= get_avatar($childcomment->comment_author_email, '64'); ?> <cite
                                                            class="fn">
                                                        <?= $childcomment->comment_author; ?>
                                                    </cite>
                                                    <span class="says">says:</span>
                                                </div>
                                                <div class="comment-meta commentmetadata">
                                                    <a href="#"><?= $childcomment->comment_date; ?></a>
                                                    <?= edit_comment_link('(Redaktə Et)'); ?>
                                                </div>
                                                <p><?= $childcomment->comment_content; ?></p>
                                            </div>
                                        </li>
                                        <?php
                                        $altchildcomments = get_comments([
                                            'post_id' => get_the_ID(),
                                            'status' => 'approve',
                                            'parent' => $childcomment->comment_ID,
                                            'hierarchical' => true
                                        ]);
                                        ?>
                                    <?php if (isset($altchildcomments)):?>
                                        <?php foreach ($altchildcomments as $altcomment): ?>
                                                <ul class="children">
                                                    <li class="comment <?= get_option('admin_email') == $altcomment->comment_author_email ? 'comment-author-admin' : null; ?>">
                                                        <div class="comment-body">
                                                            <div class="comment-author vcard">
                                                               <?= get_avatar($altcomment->comment_author_email, '64'); ?>
                                                                <cite class="fn">
                                                                    <a href="author.html" class="url"><?= $altcomment->comment_author; ?></a>
                                                                </cite>
                                                                <span class="says">says:</span>
                                                            </div>
                                                            <div class="comment-meta commentmetadata">
                                                                <a href="#"><?= $altcomment->comment_date; ?></a>
                                                                <?= edit_comment_link('(Redaktə Et)'); ?>
                                                            </div>
                                                            <p><?= $altcomment->comment_content; ?></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach ?>
            <?php endif; ?>
        </ul>

    <?php else : ?>

        <p>
            İlk Rəyi Yazmaq İstəyirsiniz?
        </p>

    <?php endif ?>

    <?php if (comments_open()) : ?>
        <div id="respond" class="comment-respond">
            <h3 class="comment-reply-title">Rəy Yazın</h3>

            <form action="<?php echo site_url('/wp-comments-post.php') ?>" method="post" class="comment-form">
                <ul class="form-collection">
                    <?php if (is_user_logged_in()) : ?>
                        <p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"> <?php echo $user_identity; ?></a> olaraq giriş etmisiniz.
                            <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout"
                               title="Log out of this account">Çıxış Etmək İstəyirsiniz?</a></p>
                    <?php else : ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <label class="label">Name</label>
                                <input type="text" id="comment-author" name="author" placeholder="<?= __('Ad və Soyad*'); ?>">
                            </div>
                            <div class="col-sm-6">
                                <label class="label">Email(Your email address will not be published)</label>
                                <input type="email" id="comment-email" name="email" placeholder="<?= __('E-poçt Ünvanı*'); ?>">
                            </div>
                            <div class="col-sm-12">
                                <label class="label">Url</label>
                                <input type="text" id="url" name="url" placeholder="<?= __('Veb Saytınız varsa linkini daxil edin*'); ?>">
                            </div>
                        </div>
                    <?php endif ?>
                    <label class="label">Comment</label>
                    <textarea id="comment-body" name="comment" placeholder="<?= __('Rəyiniz*'); ?>" required="required"></textarea>
                    <p class="form-submit">
                        <button type="submit" class="submit"><?= __('Göndər'); ?></button>
                    </p>
                    <?php comment_form_hidden_fields() ?>
                </ul>
            </form>
        </div>

    <?php else : ?>

        <hr/>

        <p class="nocomments">
            Comments are closed for this article.
        </p>

    <?php endif ?>

</div>