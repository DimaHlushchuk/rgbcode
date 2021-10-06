<?
function create_clothes_post_type()
{
	register_post_type('clothes', array(
		'labels'             	 => array(
			'name'               => 'Clothes', // Основное название типа записи
			'singular_name'      => 'Item', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new item',
			'edit_item'          => 'Edit item',
			'new_item'           => 'New item',
			'view_item'          => 'View item',
			'search_items'       => 'Search item',
			'not_found'          => 'Clothes not found',
			'not_found_in_trash' => 'Clothes not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Kids clothes'

		),
		'public' => true,
		'menu_position' => 15,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('clothes-type'),
		'menu_icon' => plugins_url('kids_clothes/images/image.png'),
		'has_archive' => true
	));
	register_taxonomy('clothes-type', ['clothes'], [
		'label'                 => 'Clothes type',
		'labels'                => array(
			'name'              	=> 'Clothes types',
			'singular_name'     	=> 'Clothes type',
			'search_items'      	=> 'Search for clothes type',
			'all_items'         	=> 'All clothes types',
			'parent_item'       	=> 'Parent clothes type',
			'parent_item_colon' 	=> 'Parent clothes type:',
			'edit_item'         	=> 'Edit clothes type',
			'update_item'       	=> 'Update clothes type',
			'add_new_item'      	=> 'Add new clothes type',
			'new_item_name'     	=> 'New clothes type',
			'menu_name'         	=> 'Clothes types',
		),
		'description'           => 'Clothes types',
		'hierarchical' 					=> true,
		'show_ui' 							=> true,
		'show_in_rest' 					=> true,
		'show_admin_column' 		=> true,
		'query_var' 						=> true,
		'rewrite'               => array('slug' => 'clothes-type'),
	]);
}
function include_template_function($template_path)
{
	if (is_front_page()) {
		if ($theme_file = locate_template(array('page-front.php'))) {
			$template_path = $theme_file;
		} else {
			$template_path = WP_PLUGIN_DIR . '/kids_clothes/templates/page-front.php';
		}
	}
	if (get_post_type() == 'clothes') {
		if (is_single()) {
			if ($theme_file = locate_template(array('single-clothes.php'))) {
				$template_path = $theme_file;
			} else {
				$template_path = WP_PLUGIN_DIR . '/kids_clothes/single-clothes.php';
			}
		} else if (is_tax('clothes-type')) {
			if ($theme_file = locate_template(array('taxonomy-clothes-type.php'))) {
				$template_path = $theme_file;
			} else {
				$template_path = WP_PLUGIN_DIR . '/kids_clothes/taxonomy-clothes-type.php';
			}
		}
	}
	return $template_path;
}
add_filter('theme_page_templates', 'add_page_template_to_dropdown');

function add_page_template_to_dropdown($templates)
{
	$templates[plugin_dir_path(__FILE__) . 'templates/page-front.php'] = __('Plugin Page Template', 'plugin-slug');
	return $templates;
}
add_action('init', 'create_clothes_post_type');
add_filter('template_include', 'include_template_function', 1);
