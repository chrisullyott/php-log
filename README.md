# php-log

A dead-simple logger, storing data in JSON.

### Install

With Composer:

```
$ composer require chrisullyott/php-log
```

### Instantiate

Set a path for the file.

```
$log = new Log('data.json');
```

### Adding items

**set** to store data by key:

```
$log->set('color', 'teal');
```

### Retrieving items

**get** an item by key:

```
$log->get('color');
```

### Deleting items

**delete** an item by key:

```
$log->delete('key');
```

**reset** to delete the entire database:

```
$log->reset();
```
