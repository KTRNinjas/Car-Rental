<?php
class DateCest
{
    public function test_Home_with_KezdonagyobbMintVegDate(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnPage('http://localhost/');
        
        $I->fillField('kezdoDATE',"2022-08-29");
        $I->fillField('vegDATE','2022-08-03 ');
        $I->click('Lefoglalas');
        $I->see('<h1>A kezdő dátum kisebb kell legyen a végdátumnál probáld újra</h1>');
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

        $I->dontSee('A kezdő dátum kisebb kell legyen a végdátumnál probáld újra');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
    public function test_Home_with_KezdokissebbMintVegDate2022_08_01_2022_08_15(AcceptanceTester $I)
    {

        $I->amOnPage('http://localhost/');

        //date 2022-08-01-2022-08-15
        $I->fillField('kezdoDATE',"2022-08-01");
        $I->fillField('vegDATE','2022-08-15');
        $I->click('Lefoglalas');
        $I->amOnPage('http://localhost/');
        $I->see('Márka');
        $I->see('Tipus');
        $I->see('Fajta');
        $I->see('Kategoria');
        $I->see('Prémium díj');
        $I->see('Hajtaslanc');
        $I->see('Evjarat');
        $I->see('Valtotipus');
        $I->see('Napi Ár');
        $I->see('Összár');

        //adatok első sor
        $I->see('AudiTeszt');
        $I->see('S8Teszt');
        $I->see('Sedan');
        $I->see('Személy autó');
        $I->see('Premium');
        $I->see('Benzines');
        $I->see('2008');
        $I->see('Kézi');
        $I->see('5000');
        $I->see('70000');

        //második sor
        $I->see('VolkswagenTeszt');
        $I->see('PassatTeszt');
        $I->see('Combi');
        $I->see('Személy autó');
        $I->see('Nem premium');
        $I->see('Diesel');
        $I->see('2009');
        $I->see('Automata');
        $I->see('6000');
        $I->see('84000');

        //harmadik sor
        $I->see('JeepTeszt');
        $I->see('WranglerTeszt');
        $I->see('Terepjáró');
        $I->see('Személy autó');
        $I->see('Nem premium');
        $I->see('Elektromos');
        $I->see('2010');
        $I->see('Kézi');
        $I->see('7000');
        $I->see('98000');

        //negyedik sor
        $I->see('JeepTeszt');
        $I->see('WranglerTeszt');
        $I->see('Terepjáró');
        $I->see('Személy autó');
        $I->see('Nem premium');
        $I->see('Diesel');
        $I->see('2012');
        $I->see('Automata');
        $I->see('7000');
        $I->see('98000');        
        $I->dontSee('A kezdő dátum kisebb kell legyen a végdátumnál probáld újra');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
    public function test_Home_with_KezdokissebbMintVegDate2022_08_16_2022_09_10(AcceptanceTester $I)
    {

        $I->amOnPage('http://localhost/');

        //date 2022-08-16-2022-09-10
        $I->fillField('kezdoDATE',"2022-08-16");
        $I->fillField('vegDATE','2022-09-10');
        $I->click('Lefoglalas');
        $I->see('Márka');
        $I->see('Tipus');
        $I->see('Fajta');
        $I->see('Kategoria');
        $I->see('Prémium díj');
        $I->see('Hajtaslanc');
        $I->see('Evjarat');
        $I->see('Valtotipus');
        $I->see('Napi Ár');
        $I->see('Összár');

        //adatok első sor
        $I->see('JeepTeszt');
        $I->see('WranglerTeszt');
        $I->see('Terepjáró');
        $I->see('Személy autó');
        $I->see('Nem premium');
        $I->see('Elektromos');
        $I->see('2010');
        $I->see('Kézi');
        $I->see('7000');
        $I->see('175000');

        //második sor
        $I->see('JeepTeszt');
        $I->see('WranglerTeszt');
        $I->see('Terepjáró');
        $I->see('Személy autó');
        $I->see('Nem premium');
        $I->see('Diesel');
        $I->see('2012');
        $I->see('Automata');
        $I->see('7000');
        $I->see('175000');
}   
    public function test_Home_with_KezdokissebbMintVegDate2022_09_11_2022_09_30(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/');
        //date 2022-09-11-2022-09-30
        $I->fillField('kezdoDATE',"2022-09-11");
        $I->fillField('vegDATE','2022-09-30');
        $I->click('Lefoglalas');
        $I->see('Márka');
        $I->see('Tipus');
        $I->see('Fajta');
        $I->see('Kategoria');
        $I->see('Prémium díj');
        $I->see('Hajtaslanc');
        $I->see('Evjarat');
        $I->see('Valtotipus');
        $I->see('Napi Ár');
        $I->see('Összár');

        //adatok első sor
        $I->see('AudiTeszt');
        $I->see('S8Teszt');
        $I->see('Sedan');
        $I->see('Személy autó');
        $I->see('Premium');
        $I->see('Benzines');
        $I->see('2008');
        $I->see('Kézi');
        $I->see('5000');
        $I->see('95000');

        //második sor
        $I->see('VolkswagenTeszt');
        $I->see('PassatTeszt');
        $I->see('Combi');
        $I->see('Személy autó');
        $I->see('Nem premium');
        $I->see('Diesel');
        $I->see('2009');
        $I->see('Automata');
        $I->see('6000');
        $I->see('114000');


        $I->dontSee('A kezdő dátum kisebb kell legyen a végdátumnál probáld újra');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

    }
}
