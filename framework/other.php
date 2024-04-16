<?php

//allow svg from wp-kama

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

    // WP 5.1 +
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    }
    else {
        $dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
    }

    // mime тип был обнулен, поправим его
    // а также проверим право пользователя
    if( $dosvg ){

        // разрешим
        if( current_user_can('manage_options') ){

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        // запретим
        else {
            $data['ext']  = false;
            $data['type'] = false;
        }

    }

    return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );


# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {

    if ( $response['mime'] === 'image/svg+xml' ) {

        // С выводом названия файла
        $response['image'] = [
            'src' => $response['url'],
        ];
    }

    return $response;
}

//end of allow svg from wp-kama

//enable admin bar when viewing website
//if (current_user_can('administrator')) {
//    add_filter('show_admin_bar', '__return_true');
//}

//yoast breadcrumbs
//function yoast_breadcrumbs(){
//    if ( function_exists('yoast_breadcrumb') ) {
//        yoast_breadcrumb( '<div class="hb-container"><p id="yoast-breadcrumbs" class="yoast-breadcrumbs">','</p></div>' );
//    }
//}

function add_google_analytics() { ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z2XL0S6254"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Z2XL0S6254');
    </script>
<?php }
add_action('wp_head', 'add_google_analytics', 10);