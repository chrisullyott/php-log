# php-log

A dead-simple logger, storing data in JSON.

### Instantiate

The only argument is the path for the file.

```
$log = new Log('logs/data.json');
```

### Adding items

**set** to store data by key.

```
$log->set('color', 'teal');
```

**merge** to store an array of items.

```
$log->merge(array(
    'color' => 'teal',
    'scent' => 'ocean breeze'
));
```

### Retrieving items

**get** an item by key:

```
$log->get('color');
```

**getAll** as an array:

```
$log->getAll();
```

### Deleting items

**delete** an item by key:

```
$log->delete('key');
```
