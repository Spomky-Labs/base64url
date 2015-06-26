How to use
==========

This library provides a simple class `Base64Url` with static methods `encode` and `decode`:

```php
<?php

use Base64Url\Base64Url;

$message = "Hello World!";

$encoded = Base64Url::encode($message); //Result must be "SGVsbG8gV29ybGQh"
$decoded = Base64Url::decode($encoded); //Result must be "Hello World!"
```
