<?php

/*
Plugin Name:king_ftp
Plugin URI: http://king_ftp.ir
Description:connect to ftp and get file  from file  manger
Author: saiid mohsen sadat rasoll
Version: 1.0
Author URI: http://kingblack.ir/
Text Domain: king_ftp
Domain Path: /lang/
*/

	function wcssandjs() {
    wp_register_style('king_ftp_cj1', plugins_url('codemirror/lib/codemirror.css',__FILE__ ));
    wp_enqueue_style('king_ftp_cj1');
    
    wp_register_script( 'king_ftp_cj2', plugins_url('codemirror/lib/codemirror.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj2');
    
    wp_register_script( 'king_ftp_cj3', plugins_url('codemirror/mode/javascript/javascript.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj3');
        
    wp_register_script( 'king_ftp_cj4', plugins_url('codemirror/mode/xml/xml.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj4');
        
    wp_register_script( 'king_ftp_cj5', plugins_url('codemirror/mode/clike/clike.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj5');
        
    wp_register_script( 'king_ftp_cj6', plugins_url('codemirror/mode/php/php.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj6');
        
    wp_register_script( 'king_ftp_cj7', plugins_url('codemirror/mode/css/css.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj7');
        
    wp_register_script( 'king_ftp_cj8', plugins_url('codemirror/mode/sql/sql.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj8');
         
    wp_register_script( 'king_ftp_cj9', plugins_url('codemirror/mode/htmlembedded/htmlembedded.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj9');
          
    wp_register_script( 'king_ftp_cj10', plugins_url('codemirror/mode/textile/textile.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj10');
    
    wp_register_script( 'king_ftp_cj11', plugins_url('codemirror/mode/htmlmixed/htmlmixed.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj11');
    
    wp_register_script( 'king_ftp_cj12', plugins_url('codemirror/keymap/sublime.js',__FILE__ ));
    wp_enqueue_script('king_ftp_cj12');
    

    
}

add_action( 'admin_init','wcssandjs');


add_filter('media_upload_tabs', 'kig_ftp');
function kig_ftp($tabs) {
    $tabs['kig_ftp_my_file_tab'] = "kig_ftp";
    return $tabs;
}

// call the new tab with wp_iframe
add_action('media_upload_kig_ftp_my_file_tab', 'kig_ftp_my_file');
function kig_ftp_my_file() {

wp_iframe( 'kig_ftp_my_file_tab' );
    
    
}



function kig_ftp_my_file_tab() {
    echo media_upload_header();


                    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
                    
include( plugin_dir_path( __FILE__ ) . 'index.php');


    ?>


<?php 
    
}


  



?>
