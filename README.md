Laravel cart package
============

Informations
---

Provider:

```php
'Haska\Cart\CartServiceProvider',
```

Alias:

```php
'Cart' => 'Haska\Cart\Facade',
```

Config:

```php
php artisan config:publish haska:laravel-cart
```

Examples:

### Insert
```php
// Format array of required info for item to be added to cart...
$items = array(
	'id' => 1,
	'name' => 'Product name',
	'price' => 120.00,
	'quantity' => 1
);

// Make the insert...
Cart::insert($items);
```

### Insert with tax rate (in this example 20%)
```php
Cart::insert(array(
    'id'       => 'foo',
    'name'     => 'bar',
    'price'    => 100,
    'quantity' => 1,
    'tax'      => 20
));
```

### Updating items in the cart
```php
foreach (Cart::contents() as $item) {
    $item->name = 'Foo';
    $item->quantity = 1;
}
```

### Removing items in the cart
```php
foreach (Cart::contents() as $item) {
    $item->remove();
}
```

### Destroying/emptying the cart
```php
Cart::destroy()
```

### Retrieve the cart contents
```php
Cart::contents();
```

Content passed like an array
```php
Cart::contents(true);
```

### Retrieving the total items in the cart
```php
Cart::totalItems();
```

Get only unique items
```php
Cart::totalItems(true);
```

### Retrieving the cart total
```php
Cart::total();
```

Passed without tax rates
```php
Cart::total(false);
```

### Check if the cart has an item
```php
Cart::has($id);
```

### Retreive an item object by identifier
```php
$item = Cart::item($id);
```

## Cart items (item objects)

### Retrieving the total value of an item
```php
$item->total();
```

Without tax rates
```php
$item->total(false);
```

### Check if an item has options
```php
if ($item->hasOptions()) {
    // We have options
}
```

### Remove an item from the cart
```php
$item->remove();
```

### Output the item data as an array
```php
$item->toArray();
```
