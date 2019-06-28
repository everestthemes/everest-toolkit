<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ET_Theme_Demo_Gucherry_Blog_Pro extends ET_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://demo.everestthemes.com/demo-data/gucherry-blog/pro/';

		$demo_urls  = array(
			array(
				'import_file_name'           => __( 'Demo One', 'everest-toolkit' ),
				'import_file_url'            => $server_url . 'demo-one/content.xml',
				'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-one/screenshot.png',
				'demo_url'                   => 'https://demo.everestthemes.com/gucherry/gucherry-pro/',
			),
			array(
				'import_file_name'           => __( 'Demo Two', 'everest-toolkit' ),
				'import_file_url'            => $server_url . 'demo-two/content.xml',
				'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-two/screenshot.png',
				'demo_url'                   => 'https://demo.everestthemes.com/gucherry/travel-pro/',
			),
			array(
				'import_file_name'           => __( 'Demo Three', 'everest-toolkit' ),
				'import_file_url'            => $server_url . 'demo-three/content.xml',
				'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-three/screenshot.png',
				'demo_url'                   => 'https://demo.everestthemes.com/gucherry/fashion-pro/',
			),
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

		// SET Menus

		$locations = get_theme_mod( 'nav_menu_locations' );

		if(!empty($locations)) { 

			foreach($locations as $locationId => $menuValue) { 

				switch( $locationId ) { 
					
					case 'menu-1': 
						$menu = get_term_by('name', 'Main Menu', 'nav_menu'); 
						break; 
					case 'menu-2': 
						$menu = get_term_by('name', 'Top Menu', 'nav_menu'); 
						break;
				} 
				
				if(isset($menu)) { 
					$locations[$locationId] = $menu->term_id; 
				} 
			} 
			set_theme_mod('nav_menu_locations', $locations); 
		}
	}
}