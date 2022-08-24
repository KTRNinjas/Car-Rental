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
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
    public function test_if_AutotipusSQlmainAndsideTable_message_displayed(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->see("Sikerült a kapcsolat");
        $I->see("adatbazis torlése sikeres volt!");
        $I->see("az adatbázis létrehozása sikeres volt!");
        $I->see("Az autotipus tabla letrehozasa sikeres volt!");
        $I->see("Az fajta tabla letrehozasa sikeres volt!");
        $I->see("Az kategoria tabla letrehozasa sikeres volt!");
        $I->see("Az környezetvédelmibesorolás tabla letrehozasa sikeres volt!");
        $I->see("a fajta sikeresen felvetük a Combi elemet sikeres volt!");
        $I->see("a fajta sikeresen felvetük a Terepjáró elemet sikeres volt!");
        $I->see("a fajta sikeresen felvetük a Sedan elemet sikeres volt!");
        $I->see("a fajta sikeresen felvetük a PickUp elemet sikeres volt!");
        $I->see("a fajta sikeresen felvetük a SUV elemet sikeres volt!");
        $I->see("a fajta sikeresen felvetük a 4X4 elemet sikeres volt!");

        $I->see("a kategoria sikeresen felvetük a Kis személy elemet sikeres volt!");
        $I->see("a kategoria sikeresen felvetük a Személy autó elemet sikeres volt!");
        $I->see("a kategoria sikeresen felvetük a Kis teher elemet sikeres volt!");
        $I->see("a kategoria sikeresen felvetük a Teher elemet sikeres volt!");


        $I->see("a környezetvédelmibesorolás sikeresen felvetük a E1 elemet sikeres volt!");
        $I->see("a környezetvédelmibesorolás sikeresen felvetük a E2 elemet sikeres volt!");
        $I->see("a környezetvédelmibesorolás sikeresen felvetük a E3 elemet sikeres volt!");
        $I->see("a környezetvédelmibesorolás sikeresen felvetük a E4 elemet sikeres volt!");
        $I->see("a környezetvédelmibesorolás sikeresen felvetük a E5 elemet sikeres volt!");
        $I->see("a környezetvédelmibesorolás sikeresen felvetük a E6 elemet sikeres volt!");
        
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        
    }
}
