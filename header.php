<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php 
    // bloginfo toma los atributos que toma nuestro WordPress por defecto, en este especificamos que queremos al atributo charset
    bloginfo("charset") ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <?php 
    // Agrega un Hook, todo lo que necesitamos poner en el Body aparecerá ahí
    wp_body_open(); ?>
     <?php get_template_part('template-parts/content','header'); ?>

    <main class="productos">
        <div class="container-fluid gx-5">