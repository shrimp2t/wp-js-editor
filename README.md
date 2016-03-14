JavaScript WordPress editor
============

This can be used to add WordPress editor(php: wp_editor() - http://codex.wordpress.org/Function_Reference/wp_editor) with jQuery. Maybe after click, ajax success, etc.

**Version:** 1.1  
**Requires:** WordPress 4.x+  

####If you need support for previous versions, you can use the version 1.0

###Instalation:
  1. Copy into theme dir:
    - inc folder
    - js folder
  2. Add code from functions.php to your theme functions.php

###Usage:
  1. If you don't have any other WordPress editor on page, you must call js_wp_editor() function.
  2. Add textarea element. Textarea must have id attribute.
  3. Call jQuery plugin:
    ```
    $( 'textarea',  control.editing_editor ).wp_js_editor();
    ```

###Changelog:
  
  * ####1.0:
    - Initial version  
