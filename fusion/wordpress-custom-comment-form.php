<?php
$comments = get_comments( array(
    'post_id'	=> get_the_ID(),
    'status'	=> 'approve'
) );
?>

<div id="comments">

    <h3><?php echo count($comments) ?> Comments</h3>

    <?php WPTheme::comment_form_unapproved() ?>

    <?php if ( count($comments) ) : ?>

        <ol class="base comment-list">
            <?php foreach ( $comments as $comment ) : ?>
                <li id="comment-<?php echo $comment->comment_post_ID ?>">
                    <div class="comment">
                        <h6 class="comment-title"><?php echo $comment->comment_author ?> said:</h6>
                        <p class="comment-date">
                            Posted on <time datetime="<?php echo $comment->comment_date ?>" itemprop="datePublished"><?php echo date('d.m.Y', strtotime($comment->comment_date) ) ?></time>
                            at <?php echo date('H:i', strtotime($comment->comment_date) ) ?>
                        </p>
                        <div class="comment-body">
                            <?php echo $comment->comment_content ?>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ol>

    <?php else : ?>

        <p>
            There are no responses to this article, why not be the first?
        </p>

    <?php endif ?>

    <?php if ( comments_open() ) : ?>

        <form action="<?php echo site_url('/wp-comments-post.php') ?>" method="post">
            <ul class="form-collection">
                <?php if ( is_user_logged_in() ) : ?>
                    <li>
                        <span class="field-hint">Logged in as <?php echo get_user_option('user_nicename') ?></span>
                    </li>
                <?php else : ?>
                    <li>
                        <label for="comment-author" class="field-label">Name</label>
                        <input type="text" name="author" id="comment-author" required />
                    </li>
                    <li>
                        <label for="comment-email" class="field-label">Email</label>
                        <input type="email" name="email" id="comment-email" required />
                    </li>
                <?php endif ?>
                <li>
                    <label for="comment-body" class="field-label">Comment</label>
                    <textarea name="comment" id="comment-body" required></textarea>
                </li>
                <?php if ( ! is_user_logged_in() ) : ?>
                    <li>
                        <label for="comment-query" class="field-label">20 - 15 + 7 =</label>
                        <input type="text" name="result" id-"comment-query" required />
                    </li>
                <?php endif ?>
                <li class="button-field">
                    <button type="submit">Post comment</button>
                    <?php comment_form_hidden_fields() ?>
                </li>
            </ul>
        </form>

    <?php else : ?>

        <hr />

        <p class="nocomments">
            Comments are closed for this article.
        </p>

    <?php endif ?>

</div>