# JavaScript WordPress editor

**Donate link:**       [http://famethemes.com](http://famethemes.com)
**Tags:**              metaboxes, forms, fields, options, settings
**Requires at least:** 4.0.0
**Tested up to:**      4.4.2
**Stable tag:**        1.0.0
**License:**           GPLv2 or later
**License URI:**       [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)

This can be used to add WordPress editor(php: wp_editor() - http://codex.wordpress.org/Function_Reference/wp_editor) with jQuery. Maybe after click, ajax success, etc.

**Version:** 1.0.0
**Requires:** WordPress 4.x+  

####If you need support for previous versions, you can use the version 1.0

###Installation:

  1. Copy files in folder `wp-js-editor/wp-js-editor/` into your theme or plugin.:
  2. Load scripts for front-end  ```wp_js_editor_frontend_scripts();``` or Load Scripts for admin  ``` wp_js_editor_admin_scripts(); ```
  3. Add textarea element.
  4. Call jQuery plugin:
  ```
  $( 'textarea' ).wp_js_editor();
  ```

###Changelog:
  
  * ####1.0:
    - Initial version
