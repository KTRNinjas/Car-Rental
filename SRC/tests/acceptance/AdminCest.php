<?php
class AdminCest
{
    public function test_Admin_with_nonexistent(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/View/Admin.php');
        $I->fillField('lastname', 'Kamu');
        $I->fillField('firstname', 'Berta');
        $I->fillField('email', 'kamuberta@gmail.com');
        $I->click('searchUserRole');
        $I->see("Nincs ilyen nevű ember az adatbázisban");
        $I->dontSee('warning');
        $I->dontSee('error');
    }
    public function test_Admin_with_existing(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/KTRNINJAS/Car-Rental/SRC/View/Admin.php');

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
        $I->seeOptionIsSelected("#roleSelect","Vásárló");
        $I->dontSeeOptionIsSelected("#roleSelect","Autófelvevő");
        $I->dontSeeOptionIsSelected("#roleSelect","Admin");
        $I->dontSeeOptionIsSelected("#roleSelect","Sales");
        $I->dontSeeOptionIsSelected("#roleSelect","Főnök");
    }
}
