<?php 
$I = new DoctrineTester($scenario);
$I->wantTo('check that the entities persist across multiple steps');

$I->dontSeeInRepository('\App\Entity\User', ['name' => 'John Doe']);
$I->dontSeeInRepository('\App\Entity\User', ['name' => 'John Smith']);

$I->sendPOST('/doctrine', [
    'name' => 'John Doe',
]);
$I->seeResponseCodeIs(200);

$I->sendPOST('/doctrine', [
    'name' => 'John Smith',
]);
$I->seeResponseCodeIs(200);

$I->seeInRepository('\App\Entity\User', ['name' => 'John Doe']);
$I->seeInRepository('\App\Entity\User', ['name' => 'John Smith']);