<?php get_header(); ?>

<?php include('template/partials/single-project/stage.php');

if (have_rows('content')): while (have_rows('content')): the_row();
    if (get_row_layout() === 'text-media-project'):
        include('template/content/text-media/text-media-project.php');
    endif;
endwhile;
endif;
?>

<?php get_footer(); ?>