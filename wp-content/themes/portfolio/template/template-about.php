<?php /* Template Name: Page "À propos" */ ?>

<?php get_header();

include('partials/about/stage.php');

if (have_rows('content')): while (have_rows('content')): the_row();
    if (get_row_layout() === 'text-media-about'):
        include('content/text-media/text-media-about.php');
    elseif (get_row_layout() === 'school-step'):
        include('content/school-step/school-step.php');
    elseif (get_row_layout() === 'engagement'):
        include('content/engagement/engagement.php');
    elseif (get_row_layout() === 'language'):
        include('content/language/language.php');
    endif;
endwhile;
endif;
?>

<?php get_footer(); ?>
