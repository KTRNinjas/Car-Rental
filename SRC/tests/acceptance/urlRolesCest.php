<?php
class profilModositCest
{
    public function test_rolesURL(AcceptanceTester $I)
    {
      //főnök ellenőrzése
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/uninstall_routing.php');
        $I->amonPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 'fonok@gmail.com');
        $I->fillField('pass', 'fonok');
        $I->click('login');
        $I->amOnPage('http://localhost/');
        $I->dontSee('Hibás e-mail cím/ jelszó!');
        $I->see('Üdvözöllek Fütty Imre');
        $I->seeElement('[value=Kijelentkezés]');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->seeLink("Autótípus felvétel");
        $I->amOnPage('http://localhost/autotipusfelvevo');
        $I->fillField('marka', 'Toyota');      
        $I->fillField('tipus', 'Auris');
        $I->fillField('fajta', 'Sedan');
        $I->fillField('kategoria', 'Személy autó');
        $I->fillField('premium', '');
        $I->fillField('kornyezetvedelmi', 'E5');
        $I->click('Autotipusbekuldes');
        $I->see("Az autotipus felvétel sikeres volt!");
        $I->amOnPage('http://localhost/');
        $I->seeLink("Árfelvétel");
        $I->amonPage("http://localhost/Foni_oldala");
        $I->amOnPage('http://localhost/');
        $I->seeLink("Autofelvétel");
        $I->amonPage("http://localhost/Autofelvetel");
        $I->amOnPage('http://localhost/');
        $I->seeLink("Profil módosítása");
        $I->click('Profil módosítása');
        $I->amOnPage('http://localhost/Profil_modositas');
        /* $I->see('Profil adatainak módosítása');
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
        $I->dontSee('notice'); */

    }
}