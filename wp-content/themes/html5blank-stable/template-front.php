<?php /* Template Name: Front Page */ get_header(); ?>
<main role="main">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
    <?php else: ?>
        <article>
        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
        </article>
    <?php endif; ?>
</main>
<?php get_footer(); ?>