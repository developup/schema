# Extended Schema for Laravel 5

Easy create custom column that is not supported from Laravel 5

How to install
--------------

##### Composer

You need [composer](https://getcomposer.org/)

##### Add package to `package.json`
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/developup/schema"
    }
],
"require": {
    "developup/schema": "~0.0.1"
},
```

##### Replace "alias" in the configuration file `config/app.php`:
```php
'aliases' => array(
    ...
    // 'Schema' => 'Illuminate\Support\Facades\Schema',
    'Schema'    => 'Schema\Schema',
),
```


How to use
--------------

How to create column of type string array (Postgres)

```php
Schema::create('products', function(Blueprint $table)
{   
    ...
    $table->raw('name', 'character varying(255)[]');
    ...
}
```

How to add column of type integer array (Postgres)

```php
Schema::table('products', function(Blueprint $table)
{	
	...
	$table->raw('categories', 'int[]');
	...
}
```

##### Currently only Postgres supported.