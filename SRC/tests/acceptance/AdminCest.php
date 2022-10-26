<?php
class AdminCest
{
    public function test_Admin_with_nonexistent(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/Filldb.php');
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/FileMuveletek/install_routing.php');
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Kamu');
        $I->fillField('firstname', 'Berta');
        $I->fillField('email', 'kamuberta@gmail.com');
        $I->click('searchUserRole');
        $I->see("Nincs ilyen nevű ember az adatbázisban");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
    }
    public function test_Admin_with_existing(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('email', 'k.pal@gmail.com');
        $I->click('searchUserRole');
        $I->see("Vezetéknév");
        $I->see("Ka");
        $I->see("Keresztnév");
        $I->see("Pál");
        $I->see("e-mail");
        $I->see("k.pal@gmail.com");
        $I->see("Role Azonosító");
        $I->seeOptionIsSelected("#roleSelect", "Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect", "Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect", "Admin");
        $I->dontSeeOptionIsSelected("#roleSelect", "Sales");
        $I->dontSeeOptionIsSelected("#roleSelect", "Főnök");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->selectOption("#roleSelect", "Autófelvevő");
        $I->click('roleSubmit');
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('email', 'k.pal@gmail.com');
        $I->click('searchUserRole');
        $I->seeOptionIsSelected("#roleSelect", "Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect", "Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect", "Admin");
        $I->dontSeeOptionIsSelected("#roleSelect", "Sales");
        $I->dontSeeOptionIsSelected("#roleSelect", "Főnök");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->selectOption("#roleSelect", "Admin");
        $I->click('roleSubmit');
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('email', 'k.pal@gmail.com');
        $I->click('searchUserRole');
        $I->seeOptionIsSelected("#roleSelect", "Admin");
        $I->dontSeeOptionIsSelected("#roleSelect", "Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect", "Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect", "Sales");
        $I->dontSeeOptionIsSelected("#roleSelect", "Főnök");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->selectOption("#roleSelect", "Sales");
        $I->click('roleSubmit');
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('email', 'k.pal@gmail.com');
        $I->click('searchUserRole');
        $I->seeOptionIsSelected("#roleSelect", "Sales");
        $I->dontSeeOptionIsSelected("#roleSelect", "Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect", "Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect", "Admin");
        $I->dontSeeOptionIsSelected("#roleSelect", "Főnök");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->selectOption("#roleSelect", "Főnök");
        $I->click('roleSubmit');
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('email', 'k.pal@gmail.com');
        $I->click('searchUserRole');
        $I->seeOptionIsSelected("#roleSelect", "Főnök");
        $I->dontSeeOptionIsSelected("#roleSelect", "Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect", "Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect", "Sales");
        $I->dontSeeOptionIsSelected("#roleSelect", "Admin");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');

        $I->selectOption("#roleSelect", "Vásárló");
        $I->click('roleSubmit');
        $I->amOnPage('http://localhost/Admin');
        $I->fillField('lastname', 'Ka');
        $I->fillField('firstname', 'Pál');
        $I->fillField('email', 'k.pal@gmail.com');
        $I->click('searchUserRole');
        $I->seeOptionIsSelected("#roleSelect", "Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect", "Főnök");
        $I->dontSeeOptionIsSelected("#roleSelect", "Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect", "Sales");
        $I->dontSeeOptionIsSelected("#roleSelect", "Admin");
        $I->dontSee('warning');
        $I->dontSee('error');
        $I->dontSee('notice');
        $I->click("Routing uninstallálása");
    }
}
