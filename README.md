drupal
======

All necessary files for a new Drupal site

Recommended Modules
-------------------
Use drush for the following module load like

  > drush dl MODULE_NAME // or MODULE NAME list for more than once

  > drush en MODULE_NAME

Core-ish MODULE_NAME list:

  > ctools views token variable entity entity_translation title date pathauto ckeditor transliteration entityreference i18n nodequeue link libraries admin_menu adminimal_admin_menu adminimal_theme jquery_update manualcrop-7.x-1.x-dev l10n_update module_filter smart_trim

Optional modules:
- devel
- email
- entityconnect
- site_map
- xmlsitemap
- metatag
- field_group
- entity_view_mode
- honeypot
- file_entity
- media-7.x-2.x-dev
- webform
- boost
- mandrill (and mandrill.php) + libraries + mailsystem
- flag
- restws: RESTful API

Security recommendations
------------------------
- Go to /admin/config/media/file-system and in the field "Temporary directory" put

  > sites/default/files/tmp
  