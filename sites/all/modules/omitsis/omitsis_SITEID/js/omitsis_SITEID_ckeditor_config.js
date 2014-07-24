/**
 * Custom config for Ckeditor
 */

CKEDITOR.editorConfig = function( config ) {
  // Activate automatic AFC mode (if not already set).
  config.allowedContent = true;
  config.extraPlugins = "iframe";
};
