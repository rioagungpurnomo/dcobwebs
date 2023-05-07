<p align="center"><img src="https://user-images.githubusercontent.com/91432414/234926130-fe9db818-1ed8-493c-814b-4bd937778992.png" width="150" alt="DCobwebs"></p>

<p align="center">
<a href="https://packagist.org/packages/rioagungpurnomo/dcobwebs"><img src="https://img.shields.io/packagist/dt/rioagungpurnomo/dcobwebs" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/rioagungpurnomo/dcobwebs"><img src="https://img.shields.io/packagist/v/rioagungpurnomo/dcobwebs" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/rioagungpurnomo/dcobwebs"><img src="https://img.shields.io/packagist/l/rioagungpurnomo/dcobwebs" alt="License"></a>
</p>

# DCobwebs
DCobwebs (Database Cobwebs) PHP framework to make it easier to process data and very simple NoSQL.

Demo : **[View](http://dcobwebs.epizy.com)**

### Installation
Start to do the installation.
```bash
composer require rioagungpurnomo/dcobwebs
```

### Example
A simple example of using DCobwebs and creating a **users** table containing **name** and **bio** fields.
```php
require 'vendor/autoload.php';

use Rioagungpurnomo\Dcobwebs\Dcobwebs;

Dcobwebs::add('users', ['name', 'bio']);
```

### Create Data
Adding new data in a table.
```php
Dcobwebs::table(table)->create(array);
```

### Update Data
Updating data in a table.
```php
Dcobwebs::table(table)->update(id, array);
```

### Delete Data
Delete data in a table.
```php
Dcobwebs::table(table)->delete(id);
```

### Count Data
Counts how much data is in a table.
```php
Dcobwebs::table(table)->count();
```

### Find Data
Displays one data with a certain **id** in a table.
```php
Dcobwebs::table(table)->find(id);
```

### Where Data
Retrieve only certain data in the table.
```php
Dcobwebs::table(table)->where(field, value);
```

### All Data
Displays all data in a table.
```php
Dcobwebs::table(table)->all();
```

### ASC Data
Displays all data in a table by ASC (Ascending).
```php
Dcobwebs::table(table)->asc(field);
```

### DESC Data
Displays all data in a table by DESC (Descending).
```php
Dcobwebs::table(table)->desc(field);
```

### Create Table
Adding a new table in the database.
```php
Dcobwebs::add(name, array);
```

### List Table
Displays all tables in the database.
```php
Dcobwebs::list();
```

### Delete Table
Delete tables in the database.
```php
Dcobwebs::remove(table);
```

### Rename Table
Change the table name to the new table name in the database.
```php
Dcobwebs::rename(old_name, new_name);
```

### Count Table
Count how many tables are in the database.
```php
Dcobwebs::calculate();
```

### Create Field Table
Adding existing fields to tables in the database.
```php
Dcobwebs::table(table)->create_field(array);
```

### Delete Field Table
Delete existing fields in the table in the database.
```php
Dcobwebs::table(table)->delete_field(field);
```

### List Field Table
Displays the fields in the table in the database.
```php
Dcobwebs::table(table)->list_field();
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
Saweria : **[Support me](https://saweria.co/rioagungpurnomo)**

Trakteer : **[Support me](https://trakteer.id/rioagungpurnomo)**

Paypal : **[Support me](https://www.paypal.me/RioDev)**

## Contact me
Contact me via email: **rioagungpurnomo.ak@gmail.com**, give me input or suggestions or request additional features for DCobwebs to become the number 1 tool for your help.
