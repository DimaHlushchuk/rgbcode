<?
function do_insert()
{
	exit;
	if (
		'POST' == $_SERVER['REQUEST_METHOD']
		&& !empty($_POST['action'])
		&& $_POST['post_type'] == 'clothes'
	) {
		
		if (isset($_POST['title'])) {
			$title =  $_POST['title'];
		} else {
			echo 'Please enter a title';
		}
		if (isset($_POST['description'])) {
			$description = $_POST['description'];
		} else {
			echo 'Please enter the content';
		}

		$tags = trim($_POST['post_tags']);
		$cat = array($_POST['cat']);

		$post = array(
			'post_title'	=> $title,
			'post_content'	=> $description,
			'post_category'	=> $cat,
			'post_status'	=> 'publish',
			'post_type'		=> 'clothes'
		);
		wp_insert_post($post);
	}
}
// add_action('save_post_orders', 'do_insert', 10, 3);
// add_action('save_post', 'do_insert', 10, 3);

// do_action('wp_insert_post', 'do_insert');
