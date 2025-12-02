# adminer-table-regexp-filter
Adds posibility to show table row from table select page

# Install
[Detailed Information](https://www.adminer.org/en/plugins/)

Download show-table-row.php file to plugins folder in your server.

Example folder construction:
```
adminer-folder/
 - adminer.php
 - adminer-plugins.php
 - adminer-plugins/
     - table-regexp-filter.php
```

Example of adminer-plugins.php:
```php
return array( // adminer-plugins.php
    new AdminerTableRegexpFilter(),
    // You can specify all plugins here or just the ones needing configuration.
);
```


# Changelog

## 1.0

- First release
