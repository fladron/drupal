<?php
/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 *
 * @ingroup themeable
 */
?>

<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <a href="#comments" data-action="add-comment"><?php print t('Add a comment'); ?></a>

  <div id="comment-wrapper-nid-<?php print arg(1); ?>">
    <?php print render($content['comments']); ?>
  </div>

  <?php if ($GLOBALS['user']->uid != 0) { ?>
    <div class="new-comment">
      <div class="author-info">
        <div class="image">
          <img src="<?php print image_style_url('thumbnail', $user_info['user_image']); ?>" alt="" title=""/>
        </div>
		    <span class="author">
		    	<?php print l($user_info['user_name'], 'user/' . $user_info['uid']); ?>
		    </span>
      </div>
      <?php print render($content['comment_form']); ?>
    </div>
  <?php } else { ?>
    <div class="login">
      <div class="author-info">
        <div class="image">
          <img src="<?php print image_style_url('thumbnail', $user_info['user_image']); ?>" alt="" title=""/>
        </div>
      </div>
      <?php print drupal_render(drupal_get_form('user_login')); ?>
      <div class="link-register">
        <span>
          <?php
          if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
            $query_string = array('destination' => drupal_get_path_alias('node/' . arg(1)));
            print t('Not a user?', array(), array('context' => 'login block')) . ' ' . l(t('Register', array(), array('context' => 'login block')), 'user/register', array('attributes' => array('title' => t('Create a new user account.')), 'query' => $query_string));
          }
          ?>
        </span>
      </div>
    </div>
  <?php } ?>
</div>
