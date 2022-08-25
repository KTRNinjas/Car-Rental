<?php
class FillDBCest
{
    protected function car_data_tester(AcceptanceTester $I)
    {
    }
    public function test_if_sikeres_volt_message_displayed(AcceptanceTester $I)
    {
        //Role tests

        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->see("A Role tábla létrehozása sikeres volt!");
        $I->see("A Vásárló Role létrehozása sikeres volt!");
        $I->see("Az autófelvevő Role létrehozása sikeres volt!");
        $I->see("Az Admin Role létrehozása sikeres volt!");
        $I->see("A Sales Role létrehozása sikeres volt!");
        $I->see("A Főnök Role létrehozása sikeres volt!");
        $I->see("A Role tábla megváltoztatása sikeres volt!");

        //Car data tests

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

        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
}
