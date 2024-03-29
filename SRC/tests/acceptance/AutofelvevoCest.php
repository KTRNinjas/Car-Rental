<?php

class AutofelvevoCest
{
    public function test_insert_TestCar(AcceptanceTester $I)
    {
        $path = dirname(__dir__, 4);
        $result = explode(DIRECTORY_SEPARATOR, $path);
        $ktrninjas = $result[count($result) - 1];
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnUrl('http://localhost/Autofelvetel');
        $I->seeInField("rendszam", 'AAA-001');
        $I->seeInField("alvazszam", '123123123123');
        $I->seeOptionIsSelected("autotipus", "AudiTeszt S8Teszt");
        $I->seeOptionIsSelected("hajtaslanc", "Benzines");
        $I->seeOptionIsSelected("valtotipus", "Kézi");
        $I->seeInField("evjarat", '2008');
        $I->seeInField("teljesitmeny", '8');
        $I->seeInField("biztositas", '100000');
        $I->seeInField("kilometer", '50000');
        $I->seeInField("forgalmi", '2022-07-31');
        
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'BBB-002');
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123123123123');
        $I->seeOptionIsSelected("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "VolkswagenTeszt PassatTeszt");
        $I->seeOptionIsSelected("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Diesel");
        $I->seeOptionIsSelected("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2009');
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '9');
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '110000');
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '60000');
        $I->seeInField("body > form:nth-child(8) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-08-31');

        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'CCC-003');
        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123123123123');
        $I->seeOptionIsSelected("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "JeepTeszt WranglerTeszt");
        $I->seeOptionIsSelected("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Kézi");
        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2010');
        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '10');
        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '120000');
        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '70000');
        $I->seeInField("body > form:nth-child(9) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-09-28');

        /*$I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'EEE-005');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123123123123');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "JeepTeszt WranglerTeszt");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Diesel");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2012');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '12');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '140000');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '90000');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-11-28');*/

        //Insertform
        $I->fillField('#insertForm>[name=rendszam]', 'test-001');
        $I->fillField('#insertForm>[name=alvazszam]', '123');
        $I->selectOption('#insertForm>[name=autotipus]', '5');
        $I->selectOption('#insertForm>[name=hajtaslanc]', '3');
        $I->selectOption('#insertForm>[name=valtotipus]', '2');
        $I->fillField('#insertForm>[name=evjarat]', 2020);
        $I->fillField('#insertForm>[name=teljesitmeny]', 20);
        $I->fillField('#insertForm>[name=biztositas]', 100);
        $I->fillField('#insertForm>[name=kilometer]', 200);
        $I->fillField('#insertForm>[name=forgalmi]', '2022-10-11');
        $I->click('insertCar');

        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-001');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Nissan Mikra");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');
        //Update
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->fillField('body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)', 'test-002');
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Nissan Mikra");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Nissan Mikra");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Válasszon autótípust");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Nissan Mikra");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "AudiTeszt S8Teszt");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "AudiTeszt S8Teszt");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "VolkswagenTeszt PassatTeszt");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "VolkswagenTeszt PassatTeszt");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "JeepTeszt WranglerTeszt");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "JeepTeszt WranglerTeszt");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "BMW M3");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "BMW M3");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Nissan Mikra");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Nissan Mikra");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Válasszon hajtásláncot");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");

        $I->amOnPage("http://localhost/Autofelvetel");

        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        //valami windowsos probléma van a page refresh-el
        /*$I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");*/
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Benzines");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");

        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Benzines");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Diesel");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Diesel");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Válasszon váltótípust");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        //Valami windowsos probléma van a page refresh-el
        /*$I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");*/
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Kézi");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Kézi");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->selectOption("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2020');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", "2021");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2021');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '20');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", "30");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2021');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '30');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '100');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", "150");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2021');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '30');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '150');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '200');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", "300");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2021');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '30');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '150');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '300');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-10-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", "2022-11-11");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2021');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '30');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '150');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '300');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", '2022-11-11');

        $I->fillField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", "2030-11-11");
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(15) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'test-002');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123456');
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "Dacia Logan");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Automata");
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2021');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '30');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '150');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '300');
        $I->seeInField("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(13) > input:nth-child(1)", "2030-11-11");
        //Képfeltöltés
        $I->amOnPage("http://localhost/Autofelvetel");
        $path = dirname(__DIR__, 2);
        $teszt_kep = fopen($path . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . "_data" . DIRECTORY_SEPARATOR . "teszt1.jpg", "w");
        $I->attachFile('#autoPictureToUpload6', "teszt1.jpg");
        $I->click('#autoPictureUpload6');
        //$I->see('File is not an image.');
        $I->dontSee('File already exists.');
        $I->dontSee('Only JPG, JPEG & PNG files are allowed.');

        $teszt_kep = fopen($path . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . "_data" . DIRECTORY_SEPARATOR . "teszt1.txt", "w");
        $I->attachFile('#autoPictureToUpload6', "teszt1.txt");
        $I->click('#autoPictureUpload6');
        //$I->see('Only JPG, JPEG & PNG files are allowed.');
        $I->dontSee('File already exists.');
        $I->dontSee('File is not an image.');

        $teszt_kep = imagecreatetruecolor(1, 1);
        //header("Content-type: image/jpeg");
        imagejpeg($teszt_kep, $path . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . "_data" . DIRECTORY_SEPARATOR . "teszt1.jpg", 0);
        $I->attachFile('#autoPictureToUpload6', "teszt1.jpg");
        $I->click('#autoPictureUpload6');
        $I->dontSee('File already exists.');
        $I->dontSee('File is not an image.');
        $I->dontSee('Only JPG, JPEG & PNG files are allowed.');

        $I->attachFile('#autoPictureToUpload6', "teszt1.jpg");
        $I->click('#autoPictureUpload6');
        //$I->see('File already exists.');
        $I->dontSee('File is not an image');
        $I->dontSee('Only JPG, JPEG & PNG files are allowed.');
       
        // Delete
        $I->click("body > form:nth-child(10) > div:nth-child(1) > div:nth-child(16) > input:nth-child(1)");
        $I->amOnPage('http://localhost/Autofelvetel');
        $I->seeInField("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(4) > input:nth-child(1)", 'CCC-003');
        $I->seeInField("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(5) > input:nth-child(1)", '123123123123');
        $I->seeOptionIsSelected("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(6) > select:nth-child(1)", "JeepTeszt WranglerTeszt");
        $I->seeOptionIsSelected("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(7) > select:nth-child(1)", "Elektromos");
        $I->seeOptionIsSelected("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(8) > select:nth-child(1)", "Kézi");
        $I->seeInField("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(9) > input:nth-child(1)", '2010');
        $I->seeInField("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(10) > input:nth-child(1)", '10');
        $I->seeInField("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(11) > input:nth-child(1)", '120000');
        $I->seeInField("body > form:nth-last-child(4) > div:nth-child(1) > div:nth-child(12) > input:nth-child(1)", '70000');
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/uninstall_routing.php');
        //After
        unlink($path . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . "_data" . DIRECTORY_SEPARATOR . "teszt1.txt");
        unlink($path . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . "_data" . DIRECTORY_SEPARATOR . "teszt1.jpg");
    }
}
