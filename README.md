# php-log

A dead-simple logger, storing data in JSON.

### Install

With Composer:

```php
$ composer require chrisullyott/php-log
```

### Instantiate

Set a path for the file.

```php
$log = new Log('data.json');
```

### Adding items

**set** to store data by key:

```php
$log->set('color', 'teal');
```

### Retrieving items

**get** an item by key:

```php
$log->get('color');
```

### Deleting items

**delete** an item by key:

```php
$log->delete('key');
```

**reset** to delete the entire database:

```php
$log->reset();
```
