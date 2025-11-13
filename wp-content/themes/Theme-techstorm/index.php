<?php
/**
 * Template par défaut
 */
get_header();
?>

<main>
    <div class="container" style="padding: 80px 20px; min-height: 60vh;">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
            <article>
                <h1><?php the_title(); ?></h1>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php
            endwhile;
        else :
        ?>
            <p>Aucun contenu trouvé.</p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
