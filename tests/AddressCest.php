<?php

class AddressCest
{
    public function listsExistingRecords(AcceptanceTester $I)
    {
        $I->amOnPage('/plugin');
        $I->see('Codappix GmbH');
    }

    public function canEditRecord(AcceptanceTester $I)
    {
        $I->amOnPage('/plugin');
        $I->see('Edit');
        $I->click('Edit');

        $I->see('Editing: Codappix GmbH');
        $I->fillField(['id' => 'companyName'], 'TYPO3 Camp Rhein Ruhr');
        $I->click('Update');

        $I->amOnPage('/plugin');
        $I->see('TYPO3 Camp Rhein Ruhr');
    }

    public function zipValidatesAgainst5Digits(AcceptanceTester $I)
    {
        $I->amOnPage('/plugin');
        $I->see('Edit');
        $I->click('Edit');

        $I->see('Editing: Codappix GmbH');
        $I->fillField(['id' => 'zip'], '123');
        $I->click('Update');

        $I->see('Please provide a valid ZIP consisting of 5 digits.');
    }
}
