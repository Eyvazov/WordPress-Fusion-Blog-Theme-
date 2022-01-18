
<div class="category-owl">
    <?php if ($cats = get_categories()): ?>
    <?php foreach ($cats as $cat): ?>
            <div class="category-item">
                <div class="category-bg" style="background-image: url('');"></div>
                <div class="category-info">
                    <a href="<?= get_category_link( $cat->term_id ); ?>"><?= $cat->name; ?></a>
                    <span class="count"><?= $cat->count . ' ' . __('Məqalə'); ?> </span>
                </div>
                <div class="overlay">
                    <a href="<?= get_category_link($cat->term_id); ?>"><i class="fa fa-plus"></i></a>
                </div>
            </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>