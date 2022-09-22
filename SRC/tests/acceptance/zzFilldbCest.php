<?php
class zzFillDBCest
{
    protected function car_data_tester(AcceptanceTester $I)
    {
    }
    public function test_if_sikeres_volt_message_displayed(AcceptanceTester $I)
    {
        //Role tests

        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->see("adatbazis törlése sikeres volt!");
        $I->see("az adatbázis létrehozása sikeres volt!");

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

        //Tablacascadolas
        $I->see("Az artabla cascadolás sikeres volt!");
        $I->see("az autotipus tabla sikeresen megvaltoztatva sikeres volt!");
        $I->see("az autotipus tabla sikeresen megvaltoztatva sikeres volt!");
        $I->see("A cars tábla kaszkádolása sikeres volt!");
        $I->see("A cars hajtaslanc tábla kaszkádolása sikeres volt!");
        $I->see("A cars valtotipus tábla kaszkádolása sikeres volt!");
        $I->see("A Role tábla megváltoztatása sikeres volt!");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        //AutotipusSQLtest

        //Car data tests
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
        //car data test

        $I->see("Az egyedi autó tábla létrehozása sikeres volt!");
        $I->see("A váltótípus tábla létrehozása sikeres volt!");
        $I->see("A hajtáslánc tábla létrehozása sikeres volt!");
        $I->see("Kézi váltó feltöltése sikeres volt!");
        $I->see("Automata váltó feltöltése sikeres volt!");
        $I->see("Benzines hajtáslánc feltöltése sikeres volt!");
        $I->see("Diesel hajtáslánc feltöltése sikeres volt!");
        $I->see("Elektromos hajtáslánc feltöltése sikeres volt!");
        $I->see("tesztauto1 betöltése sikeres volt!");
        $I->see("tesztauto2 betöltése sikeres volt!");
        $I->see("tesztauto3 betöltése sikeres volt!");
        $I->see("tesztauto4 betöltése sikeres volt!");
        $I->see("tesztauto5 betöltése sikeres volt!");
        $I->see("tesztAudiS8 betoltese sikeres volt!");
        $I->see("tesztVolkswagenPassat betoltese sikeres volt!");
        $I->see("tesztJeepWranlger betoltese sikeres volt!");
        $I->see("A cars tábla kaszkádolása sikeres volt!");
        //Car Image data
        $I->see("A car-images tábla létrehozása sikeres volt!");
        $I->see("A car-images tábla kaszkádolása sikeres volt!");

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
