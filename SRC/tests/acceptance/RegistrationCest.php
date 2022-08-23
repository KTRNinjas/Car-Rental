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
       // $I->see('Üdvözöllek Ka Pál');
      /*   $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->see('Profil adatainak módosítása');
        $I->seeElement('[value=Ka]');
        $I->seeElement('[value=Pál]');
        $I->seeElement('[value=Palika1]');
        $I->seeElement('[value="k.pal@gmail.com"]');
        $I->fillField('firstname', 'Endre');
        $I->fillField('license', '25CA367');
        $I->click('profile_modify');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->seeElement('[value=Endre]');
        $I->seeElement('[value="25CA367"]');
        $I->amOnPage('http://localhost/');
        $I->see('Üdvözöllek Ka Endre');
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->see('Profil adatainak módosítása');
        $I->click('delete_profil');
        $I->dontSeeElement('[value=Ka]');
        $I->dontSeeElement('[value=Endre]');
        $I->dontSeeElement('[value=Palika1]');
        $I->dontSeeElement('[value="k.pal@gmail.com"]');
        $I->dontSeeElement('[value="25CA367"]');
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 'k.pal@gmail.com');
        $I->fillField('pass', 'Palika1');
        $I->click('login');
        $I->see('Hibás e-mail cím/ jelszó!');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        //Tök Ödön ellenőrzése
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 't_odon@gmail.com');
        $I->fillField('pass', 'tokodon2');
        $I->click('login');
        $I->amOnPage('http://localhost/');
        $I->dontSee('Hibás e-mail cím/ jelszó!');
        $I->see('Üdvözöllek Tök Ödön');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->see('Profil adatainak módosítása');
        $I->seeElement('[value=Tök]');
        $I->seeElement('[value=Ödön]');
        $I->seeElement('[value=tokodon2]');
        $I->seeElement('[value="t_odon@gmail.com"]');
        $I->fillField('firstname', 'Ödönke');
        $I->fillField('phone', '3620789546');
        $I->click('profile_modify');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->seeElement('[value=Ödönke]');
        $I->seeElement('[value=3620789546]');
        $I->amOnPage('http://localhost/');
        $I->see('Üdvözöllek Tök Ödönke');
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->see('Profil adatainak módosítása');
        $I->click('delete_profil');
        $I->dontSeeElement('[value=Tök]');
        $I->dontSeeElement('[value=Ödönke]');
        $I->dontSeeElement('[value=tokodon2]');
        $I->dontSeeElement('[value="t_odon@gmail.com"]');
        $I->dontSeeElement('[value=3620789546]');
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 't_odon@gmail.com');
        $I->fillField('pass', 'tokodon2');
        $I->click('login');
        $I->see('Hibás e-mail cím/ jelszó!');
        //Fütty Imre ellenőrzése
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 'f_imre@gmail.com');
        $I->fillField('pass', 'futyimre25');
        $I->click('login');
        $I->amOnPage('http://localhost/');
        $I->dontSee('Hibás e-mail cím/ jelszó!');
        $I->see('Üdvözöllek Füty Imre');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->see('Profil adatainak módosítása');
        $I->seeElement('[value=Füty]');
        $I->seeElement('[value=Imre]');
        $I->seeElement('[value=futyimre25]');
        $I->seeElement('[value="f_imre@gmail.com"]');
        $I->fillField('surname', 'Kovács');
        $I->fillField('pass', 'futyimre6');
        $I->click('profile_modify');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->seeElement('[value=Kovács]');
        $I->seeElement('[value=futyimre6]');
        $I->amOnPage('http://localhost/');
        $I->see('Üdvözöllek Kovács Imre');
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        $I->see('Profil adatainak módosítása');
        $I->click('delete_profil');
        $I->dontSeeElement('[value=Kovács]');
        $I->dontSeeElement('[value=Imre]');
        $I->dontSeeElement('[value=futyimre6]');
        $I->dontSeeElement('[value="f_imre@gmail.com"]');
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 'f_imre@gmail.com');
        $I->fillField('pass', 'futyimre6');
        $I->click('login');
        $I->see('Hibás e-mail cím/ jelszó!');
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/uninstall_routing.php');
        $I->amonPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php'); */
    }
}