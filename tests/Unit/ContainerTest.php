<?php

use App\Container;

test('Successfully Resolves Container', function () {
    // Testing Condition
    $container = new Container();
    $container->bind('Foo', fn() => 'Bar');

    // Actual Result
    $result = $container->resolve('Foo');

    // Expected Result
    expect($result)->toEqual('Bar');
});

?>
