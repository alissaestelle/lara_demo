<?php 

it('Validates Password Requirements', function () {
    expect(\App\Validator::verifyCreds('Password'))->toBeFalse();
    expect(\App\Validator::verifyCreds('Foo'))->toEqual('7 Character Minimum');
    expect(\App\Validator::verifyCreds('123456789876543212345'))->toEqual('20 Character Maximum');
});

it('Validates an Email', function () {
    expect(\App\Validator::verifyAcct('foo@bar.com'))->toBeFalse();
    expect(\App\Validator::verifyAcct('foobar.com'))->toEqual('Invalid Email Address');
});

?>