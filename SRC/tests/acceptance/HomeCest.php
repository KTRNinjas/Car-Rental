<?php
class HomeCest
{
    public function test_Home_with_nonexistent_User(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 'Kamu@gmail.com');
        $I->fillField('pass', 'kamu');
        $I->click('login');
        $I->see('Hibás e-mail cím/ jelszó!');
        $I->dontSee('Üdvözöllek Ka Pál');
        $I->dontSeeElement('[value=Kijelentkezés]');
        $I->dontSeeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
    public function test_Home_with_all_existing_User(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/');
        $I->fillField('mail', 'k.pal@gmail.com');
        $I->fillField('pass', 'Palika1');
        $I->click('login');
        $I->amOnPage('http://localhost/');
        $I->see('Üdvözöllek Ka Pál');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click("Profil módosítása");

        //Profil honlap
        $I->see("Profil adatainak módosítása");
        $I->seeElement("[value=Ka]");
        $I->seeElement("[value=Pál]");
        $I->seeElement('[value="k.pal@gmail.com"]');
        $I->seeElement('[value="Palika1"]');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        //Home
        $I->amOnPage("http://localhost/");
        $I->see('Üdvözöllek Ka Pál');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click('logout');
        $I->amOnPage("http://localhost/");
        $I->dontSee('Üdvözöllek Ka Pál');
        $I->dontSeeElement('[value=Kijelentkezés]');
        $I->dontSeeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->fillField('mail', 't_odon@gmail.com');
        $I->fillField('pass', 'tokodon2');
        $I->click('login');
        $I->amOnPage('http://localhost/');
        $I->see('Üdvözöllek Tök Ödön');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click("Profil módosítása");
        //Profil honlap
        $I->see("Profil adatainak módosítása");
        $I->seeElement("[value=Tök]");
        $I->seeElement("[value=Ödön]");
        $I->seeElement('[value="t_odon@gmail.com"]');
        $I->seeElement('[value="tokodon2"]');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        //Home
        $I->amOnPage("http://localhost/");
        $I->see('Üdvözöllek Tök Ödön');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click('logout');
        $I->amOnPage("http://localhost/");
        $I->dontSee('Üdvözöllek Tök Ödön');
        $I->dontSeeElement('[value=Kijelentkezés]');
        $I->dontSeeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->fillField('mail', 'f_imre@gmail.com');
        $I->fillField('pass', 'futyimre25');
        $I->click('login');
        $I->amOnPage('http://localhost/');
        $I->see('Üdvözöllek Füty Imre');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click("Profil módosítása");
        //Profil honlap
        $I->see("Profil adatainak módosítása");
        $I->seeElement("[value=Füty]");
        $I->seeElement("[value=Imre]");
        $I->seeElement('[value="f_imre@gmail.com"]');
        $I->seeElement('[value="futyimre25"]');
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        //Home
        $I->amOnPage("http://localhost/");
        $I->see('Üdvözöllek Füty Imre');
        $I->seeElement('[value=Kijelentkezés]');
        $I->seeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click('logout');
        $I->amOnPage("http://localhost/");
        $I->dontSee('Üdvözöllek Füty Imre');
        $I->dontSeeElement('[value=Kijelentkezés]');
        $I->dontSeeLink("Profil módosítása");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click("Routing uninstallálása");
    }
}
