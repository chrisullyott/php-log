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

**add** if you don't even need key-value pairs.

```
$log->add('blue');
$log->add('white');
$log->add('tan');
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

**deleteValue** to delete all entries with a given value:

```
$log->deleteValue('value');
```