<?php
class HomeCest
{
    public function test_Home_with_KezdonagyobbMintVegDate(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnPage('http://localhost/');
        $I->fillField('kezdoDATE',"2022-08-29");
        $I->fillField('vegDATE','2022-08-03 ');
        $I->click('Lefoglalas');
        $I->see('A kezdő dátum kisebb kell legyen a végdátumnál probáld újra');
        $I->dontSee('Márka');
        $I->dontSee('Tipus');
        $I->dontSee('Fajta');
        $I->dontSee('Kategoria');
        $I->dontSee('Prémium díj');
        $I->dontSee('Hajtaslanc');
        $I->dontSee('Evjarat');
        $I->dontSee('Valtotipus');
        $I->dontSee('Napi Ár');
        $I->dontSee('Összár');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
}
