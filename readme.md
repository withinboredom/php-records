# PHP Records

This aims to be a bare-bones library for creating immutable records in PHP.

Example:

```php
use Withinboredom\Record\Record;

class Person extends Record {
    public function __construct(public readonly string $firstName, public readonly string $lastName) {
        // validate here
    }
    
    public function __toString() : string{
        return $this->firstName . ' ' . $this->lastName;
    }
}

$person = new Person('John', 'Doe');
$friend = $person->with(firstName: 'Jane');
echo "$person is friends with $friend";
// output: John Doe is friends with Jane Doe
```

## Installation

```
composer require withinboredom/record
```

## Running tests

Tests deps have been intentially left out of the composer.json file.

Add in the following to run the tests:

```json
{
    "require-dev": {
      "pestphp/pest": "^1.22"
    }
}
```

Then run the tests with:

```
./vendor/bin/pest
```