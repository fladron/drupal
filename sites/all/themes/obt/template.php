<?php
define('JS_FIRST', -200);

// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('clear_registry')) {
	// Rebuild .info data.
	system_rebuild_theme_data();
	// Rebuild theme registry.
	drupal_theme_rebuild();
}

/**
 * Implements hook_html_head_alter().
 */
function obt_html_head_alter(&$head_elements) {
	// This meta uses 'about' attribute, which is non-standard
	unset($head_elements['rdf_node_title']);
}

/**
 * Implements hook_admin_paths_alter().
 */
function obt_admin_paths_alter(&$paths) {
  $paths['node/*'] = FALSE;
}

function obt_views_pre_render(&$view) {
	//oh_log($view);
	/*
  if ($view->name == 'og_members_admin') {
    $result = count($view->result);
    oh_log('numero');
    oh_log($result);
  }
  */
}

function obt_js_alter(&$javascript) {
  if (!oh_is_node_form_page()) unset($javascript['misc/jquery.js']);
}

/**
 * Preprocesses the wrapping HTML.
 *
 * @param array &$vars
 *   Template variables.
 */
function obt_preprocess_html(&$vars) {
	if ($vars['is_front']) {
   	$vars['head_title'] = $vars['head_title_array']['name'];
  }

	// Setup IE meta tag to force IE rendering mode
	$meta_ie_render_engine = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
			'content' =>  'IE=edge,chrome=1',
			'http-equiv' => 'X-UA-Compatible',
		)
	);
	//  Mobile viewport optimized: h5bp.com/viewport
	$meta_viewport = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
			'content' =>  'initial-scale=1.0, width=device-width',
			'name' => 'viewport',
		),
	);

	// Add header meta tag for IE to head
	drupal_add_html_head($meta_ie_render_engine, 'meta_ie_render_engine');
	drupal_add_html_head($meta_viewport, 'meta_viewport'); // add this for the responsive web

  // external scripts
  if (!oh_is_node_form_page()) drupal_add_js(libraries_get_path('jquery'). '/jquery-1.7.2.min.js', array('group' => JS_FIRST));
  drupal_add_js(libraries_get_path('modernizr'). '/modernizr.custom.87176.js');

  // PAGE FORMATS
  // if is body, print just the contents of the body, without anything else (to use in async calls that also need the wrapping)
	$vars['is_format_body'] = obt_is_format('body');
	// if is oasync, print just the content, without anything else (pure data to use in async calls)
	$vars['is_format_ajax'] = obt_is_format('oasync');
	// if is oasis, print just the content and also styles (<head>) and scripts (useful for an overlay showing just the content but with styles)
	$vars['is_format_oasis'] = obt_is_format('oasis');

}

function obt_is_format($format){
	return (arg(0) == $format || (isset($_GET[$format]) && $_GET[$format] == '1'));
}

function obt_preprocess_page(&$vars, $hook) {
	$header = drupal_get_http_header("status");
	if($header == "404 Not Found" || $header == "403 Forbidden" || $header == "500 Internal server error") {
	   $vars['error']['info'] = t($header);
	   $vars['theme_hook_suggestions'][] = 'page__error';
	}

	if (isset($vars['node_title'])) {
		$vars['title'] = $vars['node_title'];
	}

	$vars['is_format_ajax'] = obt_is_format('oasync');
	$vars['is_format_oasis'] = obt_is_format('oasis');

	// Adding a class to #page in wireframe mode
	if (theme_get_setting('wireframe_mode')) {
		$vars['classes_array'][] = 'wireframe-mode';
	}

	// Adding classes wether #navigation is here or not
	if (!empty($vars['main_menu']) or !empty($vars['sub_menu'])) {
		$vars['classes_array'][] = 'with-navigation';
	}

	// must show title
	$vars['must_show_title'] = FALSE;

}

function obt_preprocess_region(&$vars) {
  $vars['is_format_ajax'] = obt_is_format('oasync');
	$vars['is_format_oasis'] = obt_is_format('oasis');
}

function obt_preprocess_search_result(&$vars){
	$node_obj = $vars['result']['node'];

}

function obt_preprocess_node(&$vars) {
	$node_obj = $vars['elements']['#node'];

	// Add a striping class.
	$vars['classes_array'][] = 'node-' . $vars['zebra'];

	// Add view mode class (if not teaser, because it already has it)
	if ($vars['view_mode'] != 'teaser') $vars['classes_array'][] = 'node-' . $vars['view_mode'];
	// entity title
  if ($vars['view_mode'] == 'full'){
	  $entity_title = field_get_items('node', $node_obj, 'title_field');
	  if (isset($entity_title[0]['safe_value'])){
	    $vars['title'] = $entity_title[0]['safe_value'];
	  }
	}

	// body and summary
	$body = field_get_items('node', $node_obj, 'body');
	if (isset($body[0]['safe_value'])){
		$vars['node_body_html'] = $body[0]['safe_value'];
	}
	if (isset($body[0]['safe_summary']) && $body[0]['safe_summary'] != ''){
		$vars['node_body_summary_html'] = $body[0]['safe_summary'];
	}else{
		$vars['node_body_summary_html'] = oh_truncate($body[0]['safe_value'], 160);
	}

	// other type specific fields
	//oh_log($vars['type']);
	switch ($vars['type']) {
		case 'page':

			break;
		case 'article': /* ***************************************************************************************************************** ARTICLE (P1) */
			// main image
			/*$main_image = field_get_items('node', $node_obj, 'field_image_file');
			if (isset($main_image[0]['uri'])){
				$vars['main_image'] = $main_image;
			}*/
			break;
	}
}

function obt_preprocess_field(&$vars) {
/*
	if($vars['element']['#field_name'] == 'field_team_category') {
		dsm($vars['element']['#field_name']);
		//if($variables['items']['0']['#markup'] == 'thedefaultvalue') {
		//	$variables['items']['0']['#markup'] = '';
		//}
	}
*/
}

function obt_preprocess_user_profile(&$vars) {
	//dsm($vars);
	if (isset($vars['elements']['#view_mode'])) {
		$vars['view_mode'] = $vars['elements']['#view_mode'];
	}
	$viewed_node = arg(1);
	$user_obj = user_load($vars['elements']['#account']->uid);


}

function obt_preprocess_menu_link(&$vars) {
	
}

function obt_preprocess_block(&$vars, $hook) {
	// Add a striping class.
	//$vars['classes_array'][] = 'block-' . $vars['zebra'];

	// is this a navigation block
	$vars['is_navigation'] = ($vars['block']->module == 'menu' || in_array($vars['block']->delta, array('main-menu')));
}

/*
 * Implements hook_block_view_alter
 */
function obt_block_view_alter(&$data, $block) {

}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function obt_breadcrumb($vars) {
	$breadcrumb = $vars['breadcrumb'];  // Determine if we are to display the breadcrumb.
	$show_breadcrumb = theme_get_setting('obt_breadcrumb');
	if ($show_breadcrumb == 'yes' || ($show_breadcrumb == 'admin' && arg(0) == 'admin')) {

		// Optionally get rid of the homepage link.
		$show_breadcrumb_home = theme_get_setting('obt_breadcrumb_home');
		if (!$show_breadcrumb_home) {
			array_shift($breadcrumb);
		}
		// Return the breadcrumb with separators.
		if (!empty($breadcrumb)) {
			$breadcrumb_separator = theme_get_setting('obt_breadcrumb_separator');
			$trailing_separator = $title = '';
			if (theme_get_setting('obt_breadcrumb_title')) {
				$item = menu_get_item();
				if (!empty($item['tab_parent'])) {
					// If we are on a non-default tab, use the tab's title.
					$title = check_plain($item['title']);
				}
				else {
					$title = drupal_get_title();
				}
				if ($title) {
					$trailing_separator = $breadcrumb_separator;
				}
			}
			elseif (theme_get_setting('obt_breadcrumb_trailing')) {
				$trailing_separator = $breadcrumb_separator;
			}
			// Provide a navigational heading to give context for breadcrumb links to
			// screen-reader users. Make the heading invisible with .element-invisible.
			$heading = '<h2 class="element-invisible sure">' . t('You are here') . '</h2>';


			return $heading . '<div class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . $trailing_separator . $title . '</div>';
		}
	}
	// Otherwise, return an empty string.
	return '';
}

/*
 *   Converts a string to a suitable html ID attribute.
 *
 *    http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 *    valid ID attribute in HTML. This function:
 *
 *   - Ensure an ID starts with an alpha character by optionally adding an 'n'.
 *   - Replaces any character except A-Z, numbers, and underscores with dashes.
 *   - Converts entire string to lowercase.
 *
 *   @param $string
 *     The string
 *   @return
 *     The converted string
 */
function obt_id_safe($string) {
	// Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
	$string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
	// If the first character is not a-z, add 'n' in front.
	if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
		$string = 'id' . $string;
	}
	return $string;
}



/**
 * Generate the HTML output for a menu link and submenu.
 *
 * @param $vars
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @return
 *   A themed HTML string.
 *
 * @ingroup themeable
 */
function obt_menu_link(array $vars) {
	$element = $vars['element'];

	$sub_menu = '';

	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
	}
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	// Adding a class depending on the TITLE of the link (not constant)
	$element['#attributes']['class'][] = obt_id_safe($element['#title']);
	// Adding a class depending on the ID of the link (constant)
	if (isset($element['#original_link']['mlid']) && !empty($element['#original_link']['mlid'])) {
		$element['#attributes']['class'][] = 'mid-' . $element['#original_link']['mlid'];
	}

	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Override or insert variables into theme_menu_local_task().
 */
function obt_preprocess_menu_local_task(&$vars) {
	$link =& $vars['element']['#link'];

	// If the link does not contain HTML already, check_plain() it now.
	// After we set 'html'=TRUE the link will not be sanitized by l().
	if (empty($link['localized_options']['html'])) {
		$link['title'] = check_plain($link['title']);
	}
	$link['localized_options']['html'] = TRUE;
	$link['title'] = '<span class="tab">' . $link['title'] . '</span>';
}

/*
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function obt_menu_local_tasks(&$vars) {
	$output = '';

	if (!empty($vars['primary'])) {
		$vars['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
		$vars['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
		$vars['primary']['#suffix'] = '</ul>';
		$output .= drupal_render($vars['primary']);
	}
	if (!empty($vars['secondary'])) {
		$vars['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
		$vars['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
		$vars['secondary']['#suffix'] = '</ul>';
		$output .= drupal_render($vars['secondary']);
	}

	return $output;
}

// disable annoying grippie in textareas
function obt_textarea($vars) {
	$element = $vars['element'];
	$element['#attributes']['name'] = $element['#name'];
	$element['#attributes']['id'] = $element['#id'];
	$element['#attributes']['cols'] = $element['#cols'];
	$element['#attributes']['rows'] = $element['#rows'];
	_form_set_class($element, array('form-textarea'));

	$wrapper_attributes = array(
		'class' => array('form-textarea-wrapper'),
	);

	// Add resizable behavior.
	if (!empty($element['#resizable'])) {
		$wrapper_attributes['class'][] = 'resizable';
	}

	$output = '<div' . drupal_attributes($wrapper_attributes) . '>';
	$output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
	$output .= '</div>';
	return $output;
}
