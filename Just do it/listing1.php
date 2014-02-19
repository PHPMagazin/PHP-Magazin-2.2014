[...]

# Umschreiberegeln für das Zend Framework
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^$|^en$ index.zf2.php
RewriteRule ^application(.*)$ index.zf2.php 

RewriteRule ^(de|en)/blog|beitrag|kategorie|nutzer(.*)$ index.zf2.php

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule .* /index.zf1.php

[...]
