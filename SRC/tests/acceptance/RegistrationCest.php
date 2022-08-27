<?php
class registrationCest
{
    public function test_registration(AcceptanceTester $I)
    {
      //Ka Pál ellenőrzése
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/uninstall_routing.php');
        $I->amonPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnPage('http://localhost/registration');
        $I->fillField('surname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('mail', 'k.pal@gmail.com');
        $I->fillField('pass', 'Palika1');
        $I->click('registration');
        
        $I->see('Sikertelen regisztráció!');

        $I->fillField('surname', 'Köböl');
        $I->fillField('firstname', 'Nikolett');
        $I->fillField('mail', 'kobol.nikolett@gmail.com');
        $I->fillField('pass', 'kniki2');
        $I->click('registration');
        
        $I->see('Sikeres regisztráció');
    }
}
