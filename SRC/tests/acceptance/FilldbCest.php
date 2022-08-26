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
        $I->see("contract1 létrehozasa sikeres volt!");
        $I->see("contract2 létrehozasa sikeres volt!");
        $I->see("contract3 létrehozasa sikeres volt!");

        //Árbetöltés
        $I->see("Audi S8 árbetöltése sikeres volt!");
        $I->see("Volksvagen Passat árbetöltése sikeres volt!");
        $I->see("Jeep Wrangler árbetöltése sikeres volt!");
        $I->see("BMW M3 árbetöltése sikeres volt!");
        $I->see("Nissan Mikra árbetöltése sikeres volt!");
        $I->see("Dacia Logan árbetöltése sikeres volt!");

        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    
    }
}
