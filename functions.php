<?php 

// Se recomienda agregar un prefijo como plz ya que puede haber caso de conflictos con otras funciones que hallásemos descargado en WordPress
function plz_assets(){

    wp_register_style("google-font","https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700",array(),false,'all');
    wp_register_style("google-font-2","https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap",array(),false,'all');
    wp_register_style("bootstrap","https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css",array(),"5-1",'all');

    wp_enqueue_style("estilos", get_template_directory_uri()."/assets/css/style.css", array("google-font","bootstrap"));

    wp_enqueue_script("yardsale-js",get_template_directory_uri()."/assets/js/script.js");
}

add_action("wp_enqueue_scripts","plz_assets");

function plz_analytics(){
    ?>
    
    <?php
}

add_action("wp_body_open","plz_analytics");


function plz_theme_supports(){
    // Reemplaza el title del sitio
    add_theme_support('title-tag');
    // Agrega la funcionalidad de imagen destacada al Administrador en la página establecida
    add_theme_support('post-thumbnails');
    // Agrega la personalización del Logo al momento de Personalizar nuestro tema
    add_theme_support('custom-logo',
    array(
        "width" => 170,
        "height" => 35,
        "flex-width" => true,
        "flex-height" => true,
    )
    );
}

add_action("after_setup_theme","plz_theme_supports");

// Función para agregar el menú
function plz_add_menus(){
    register_nav_menus(
        array(
            // 'ID del menú' => 'valor o referencia del ID'
            // Recordemos que este sitio tiene un menú principal y uno responsive, por lo que se hará así 
        'menu-principal' => "Menu principal",
        'menu-responsive' => "Menu responsive"
        )
    );
}

add_action("after_setup_theme", "plz_add_menus");


function plz_add_sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'pie-pagina',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}

add_action("widgets_init","plz_add_sidebar");


function plz_add_custom_post_type(){
    // https://developer.wordpress.org/reference/functions/get_post_type_labels/#source
    $labels = array(
        'name' => 'Producto',
        'singular_name' => 'Producto',
        'all_items' => 'Todos los productos',
        'add_new' => 'Añadir producto'
    );
        
    $args = array(
        // Los textos que se van a mostrar dentro del Post Type
        'labels'             => $labels,
        'description'        => 'Productos para listar en un catálogos.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'producto' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array('category'),
        'show_in_rest'       => true,
        // Todos los íconos que utiliza WordPress
        // https://developer.wordpress.org/resource/dashicons/#cart
        'menu_icon'          => 'dashicons-cart'
    );


    register_post_type('producto',$args);
}

add_action("init","plz_add_custom_post_type");


function plz_add_to_signin_menu(){
    $current_user = wp_get_current_user();

    $msg = is_user_logged_in()? $current_user->user_email : "Sign in";

    echo $msg;
}

add_action("plz_signin","plz_add_to_signin_menu");