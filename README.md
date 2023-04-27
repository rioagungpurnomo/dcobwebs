# DCobwebs

DCobwebs (Database Cobwebs) PHP framework to make it easier to process data.

### Installation

```bash
composer require rioagungpurnomo/dcobwebs
```

### Get started

```php
require 'vendor/autoload.php';

use Rioagungpurnomo\Dcobwebs\Dcobwebs;

Dcobwebs::create_table('users', ['name', 'bio']);
```

### Create Data

```php
Dcobwebs::create_data(array, table);
```

### Update Data

```php
Dcobwebs::update_data(id, array, table);
```

### Delete Data

```php
Dcobwebs::delete_data(id, array, table);
```

### Count Data

```php
Dcobwebs::table_data(table);
```

### Single Data

```php
Dcobwebs::single_data(id, table);
```

### All Data

```php
Dcobwebs::all_data(table);
```

### ASC Data

```php
Dcobwebs::asc_data(field, table);
```

### DESC Data

```php
Dcobwebs::desc_data(field, table);
```

### Create Table

```php
Dcobwebs::create_table(name, array);
```

### List Table

```php
Dcobwebs::list_table();
```

### Delete Table

```php
Dcobwebs::delete_table(table);
```

### Rename Table

```php
Dcobwebs::rename_table(old_name, new_name);
```

### Create Field Table

```php
Dcobwebs::create_field_table(array, table);
```

### Delete Field Table

```php
Dcobwebs::delete_field_table(field, table);
```

### List Field Table

```php
Dcobwebs::list_field_table(table);
```

## Security

### Encrypt

```php
Dcobwebs::encrypt(plaintext, key, iv);
```

### Decrypt

```php
Dcobwebs::decrypt(ciphertext, key, iv);
```
