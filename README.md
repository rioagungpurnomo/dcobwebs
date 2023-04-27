<p align="center"><img src="https://user-images.githubusercontent.com/91432414/234926130-fe9db818-1ed8-493c-814b-4bd937778992.png" width="400" alt="DCobwebs Logo"></p>

<p align="center">
<a href="https://packagist.org/packages/rioagungpurnomo/dcobwebs"><img src="https://img.shields.io/packagist/dt/rioagungpurnomo/dcobwebs" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/rioagungpurnomo/dcobwebs"><img src="https://img.shields.io/packagist/v/rioagungpurnomo/dcobwebs" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/rioagungpurnomo/dcobwebs"><img src="https://img.shields.io/packagist/l/rioagungpurnomo/dcobwebs" alt="License"></a>
</p>

# DCobwebs
DCobwebs (Database Cobwebs) PHP framework to make it easier to process data and very simple noSQL.

Demo : **[View](http://dcobwebs.epizy.com)**

### Installation
Start to do the installation.
```bash
composer require rioagungpurnomo/dcobwebs
```

### Example
A simple example of using DCobwebs and creating a **users** table containing **name** and *bio** fields.
```php
require 'vendor/autoload.php';

use Rioagungpurnomo\Dcobwebs\Dcobwebs;

Dcobwebs::create_table('users', ['name', 'bio']);
```

### Create Data
Adding new data in a table.
```php
Dcobwebs::create_data(array, table);
```

### Update Data
Updating data in a table.
```php
Dcobwebs::update_data(id, array, table);
```

### Delete Data
Delete data in a table.
```php
Dcobwebs::delete_data(id, array, table);
```

### Count Data
Counts how much data is in a table.
```php
Dcobwebs::table_data(table);
```

### Single Data
Displays one data with a certain **id** in a table.
```php
Dcobwebs::single_data(id, table);
```

### All Data
Displays all data in a table.
```php
Dcobwebs::all_data(table);
```

### ASC Data
Displays all data in a table by ASC (ASC).
```php
Dcobwebs::asc_data(field, table);
```

### DESC Data
Displays all data in a table by DESC (DESC).
```php
Dcobwebs::desc_data(field, table);
```

### Create Table
Adding a new table in the database.
```php
Dcobwebs::create_table(name, array);
```

### List Table
Displays all tables in the database.
```php
Dcobwebs::list_table();
```

### Delete Table
Delete tables in the database.
```php
Dcobwebs::delete_table(table);
```

### Rename Table
Change the table name to the new table name in the database.
```php
Dcobwebs::rename_table(old_name, new_name);
```

### Count Table
Count how many tables are in the database.
```php
Dcobwebs::count_table();
```

### Create Field Table
Adding existing fields to tables in the database.
```php
Dcobwebs::create_field_table(array, table);
```

### Delete Field Table
Delete existing fields in the table in the database.
```php
Dcobwebs::delete_field_table(field, table);
```

### List Field Table
Displays the fields in the table in the database.
```php
Dcobwebs::list_field_table(table);
```

## Security
### Encrypt
Encrypt strings.
```php
Dcobwebs::encrypt(plaintext, key, iv);
```

### Decrypt
Decrypt strings.
```php
Dcobwebs::decrypt(ciphertext, key, iv);
```

## Donate
Help me to buy a laptop because my laptop is broken and I don't have a laptop, I only use an Android phone to make works like this even though it's difficult, your help and donations are a great encouragement for me to continue working.

Link : **[Donate](https://trakteer.id/rioagungpurnomo)**

## Contact me
Contact me via email: **rioagungpurnomo.ak@gmail.com**, give me input or suggestions or request additional features for DCobwebs to become the number 1 tool for your help.