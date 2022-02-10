<?php 

apply_filters( 'template_include', 'add_hive_state_template' );

function add_hive_state_template( $templates ) {
    $templates[] = plugin_dir_path( __FILE__ ) . 'page-hive-state.php';
    return $templates; 
}