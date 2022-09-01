<?php

use Withinboredom\Record;

it('can create a basic replica with no changes', function () {
   $a = new class(12) extends Record {
       public function __construct(public readonly int $num) {}
   };
   $b = $a->with();
   expect($a)->not()->toBe($b);
   expect($a->num)->toBe($b->num);
});

it('can create a new replica with a different value', function () {
    $a = new class(12) extends Record {
        public function __construct(public readonly int $num) {}
    };
    $b = $a->with(num: 13);
    expect($a)->not()->toBe($b);
    expect($a->num)->toBe(12);
    expect($b->num)->toBe(13);
});

it('fails with positional arguments', function () {
    $a = new class(12) extends Record {
        public function __construct(public readonly int $num) {}
    };
    expect(fn() => $a->with(13))->toThrow(InvalidArgumentException::class);
    expect($a->num)->toBe(12);
});