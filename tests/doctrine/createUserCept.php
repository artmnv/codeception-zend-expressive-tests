<?php 
$I = new DoctrineTester($scenario);
$I->wantTo('check that the user was persisted');

$I->dontSeeInRepository('\App\Entity\User', ['name' => 'John Doe']);

$I->sendPOST('/doctrine', [
    'name' => 'John Doe',
]);
$I->seeResponseCodeIs(200);

$I->seeInRepository('\App\Entity\User', ['name' => 'John Doe']);