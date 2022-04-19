<?php get_header() ?>

<?php
// Si la página tiene contenido para mostrar se hace con have_posts - funcionalidad de WordPress
if(have_posts()){ 
        while(have_posts()){ the_post();
             the_content(); 
        } 
 } ?>

<?php  get_template_part("template-parts/content","lista"); ?>


<?php get_footer() ?>