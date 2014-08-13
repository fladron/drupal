drupal
======

All necessary files for a new Drupal site

Recommended Modules
-------------------
Use drush for the following module load like
  > drush dl MODULE_NAME // or MODULE NAME list for more than once
  > drush en MODULE_NAME

Core-ish MODULE_NAME list:
ctools views token variable entity entity_translation title date pathauto transliteration wysiwyg entityreference i18n entity_view_mode nodequeue link libraries admin_menu adminimal_admin_menu adminimal_theme

Optional modules:
- devel
- email
- entityconnect
- site_map
- xmlsitemap
- metatag
- field_group
- webform
- boost
- mandrill (and mandrill.php) + libraries + mailsystem
- flag
- restws: RESTful API
- dummy_content