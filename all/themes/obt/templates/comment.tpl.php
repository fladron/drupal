<?php

/**
 * @file
 * Default theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $created: Formatted date and time for when the comment was created.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->created variable.
 * - $changed: Formatted date and time for when the comment was last changed.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->changed variable.
 * - $new: New comment marker.
 * - $permalink: Comment permalink.
 * - $submitted: Submission information created from $author and $created during
 *   template_preprocess_comment().
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $title: Linked title.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - comment: The current template type, i.e., "theming hook".
 *   - comment-by-anonymous: Comment by an unregistered user.
 *   - comment-by-node-author: Comment by the author of the parent node.
 *   - comment-preview: When previewing a new or edited comment.
 *   The following applies only to viewers who are registered users:
 *   - comment-unpublished: An unpublished comment visible only to administrators.
 *   - comment-by-viewer: Comment by the user currently viewing the page.
 *   - comment-new: New comment since last the visit.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * These two variables are provided for context:
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_comment()
 * @see template_process()
 * @see theme_comment()
 *
 * @ingroup themeable
 */
?>
<div class="comment standard depth-<?php print $comment->depth; ?>">

  <div class="author-info">
    <div class="image">
      <img src="<?php print image_style_url('thumbnail', $comment->variables['user']['user_image']); ?>" alt="" title=""/>
    </div>
    <span class="author">
      <?php print l($comment->variables['user']['user_name'], 'user/' . $comment->variables['user']['uid']); ?>
    </span>
  </div>

  <div class="comment-text">
    <?php hide($content['links']); ?>
    <?php hide($content['rate_thumb_up_down']); ?>
    <?php print render($content); ?>
  </div>

  <time itemprop="datePublished" datetime="<?php print $comment->variables['comment_date_machine']; ?>"><?php print $comment->variables['comment_date_human_date'] . ' - ' . $comment->variables['comment_date_human_hour']; ?></time>

  <div class="comment-links">
    <div class="comment-respond">
      <?php if ($GLOBALS['user']->uid != 0) { ?>
        <?php if($comment->depth < 2): ?>
          <?php print render($content['links']); ?>
        <?php endif; ?>
      <?php } else { ?>
      <a href="#comments" data-action="require-login"><?php print t('Log in to post comments'); ?></a>
      <?php } ?>
    </div>
  </div>
  <?php if (isset($comment->variables['voting_widget'])) { ?>
  <div class="voting-widget">
    <?php print $comment->variables['voting_widget']; ?>
  </div>
  <?php } ?>
</div>
