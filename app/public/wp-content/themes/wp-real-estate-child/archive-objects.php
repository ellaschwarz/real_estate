<?php
    while ( have_posts() ) : the_post();
?>

// Loop

<?php endwhile; ?>

<div id="pagination" class="clearfix">
    <?php posts_nav_link(); ?>
</div>