<?php
class FillDBCest
{
    public function test_if_Role_Tábla_És_Roleok_létrehozása_sikeres_volt_message_displayed(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->see("A Role tábla létrehozása sikeres volt!");
        $I->see("A Vásárló Role létrehozása sikeres volt!");
        $I->see("Az autófelvevő Role létrehozása sikeres volt!");
        $I->see("Az Admin Role létrehozása sikeres volt!");
        $I->see("A Sales Role létrehozása sikeres volt!");
        $I->see("A Főnök Role létrehozása sikeres volt!");
        $I->see("A Role tábla megváltoztatása sikeres volt!");
        $I->see("Contract_car tablaba a beszuras sikeres volt!");
        $I->see("Contract car join tabla létrehozasa sikeres volt!");
        $I->see("contract létrehozasa sikeres volt!");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    
    }
}
