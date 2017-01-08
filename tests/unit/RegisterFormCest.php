<?php

use app\forms\RegisterForm;

class RegisterFormCest
{
    protected $form;

    // tests
    public function validateTestBadResult(UnitTester $I)
    {
        $I->wantTo('Bad Result Validation');
        $this->form                  = new RegisterForm();
        $this->form->login           = '';
        $this->form->email           = 'ololo';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'uuuuuuuuuuhggiuytfughubwwjadfkhjasbdfjsabfasjbfasjbfkhjasbdfkhjasbfkjhasbfkashjbfahkjsf';
        $this->form->lastName        = 'uuuuuuuuuuhggiuytfughubwwjadfkhjasbdfjsabfasjbfasjbfkhjasbdfkhjasbfkjhasbfkashjbfahkjsf';
        $this->form->secondName      = 'uuuuuuuuuuhggiuytfughubwwjadfkhjasbdfjsabfasjbfasjbfkhjasbdfkhjasbfkjhasbfkashjbfahkjsf';
        $this->form->phone           = 'lalala';
        $I->assertFalse($this->form->validate());
    }

    public function validateTestGoodResult(UnitTester $I)
    {
        $I->wantTo('Good Result Validation');
        $this->form                  = new RegisterForm();
        $this->form->login           = 'master';
        $this->form->email           = 'mail123@mail.com';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'Владислав';
        $this->form->lastName        = 'Иванцов';
        $this->form->secondName      = 'Васильевич';
        $this->form->phone           = '89138118685';
        $I->assertTrue($this->form->validate());
    }
    /*public function validateTestRegister(UnitTester $I)
    {
        $I->wantTo('Good Result Register');
        $this->form                  = new RegisterForm();
        $this->form->login           = 'lomaster';
        $this->form->email           = 'mail123@mail.com';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'Владислав';
        $this->form->lastName        = 'Иванцов';
        $this->form->secondName      = 'Васильевич';
        $this->form->phone           = '89138118685';
        $I->assertTrue($this->form->register());
        $I->seeInDatabase('b_profile', [
            'firstName'  => 'Владислав',
            'lastName'   => 'Иванцов',
            'secondName' => 'Васильевич',
            'email'      => 'mail123@mail.com',
            'phone'      => '89138118685',
        ]);
        $I->seeInDatabase('b_user', [
            'login' => 'lomaster',
        ]);
    }


    public function validateTestRegisterRepeate(UnitTester $I)
    {
        $I->wantTo('Bad Result Register Repeate');
        $this->form                  = new RegisterForm();
        $this->form->login           = 'lomaster';
        $this->form->email           = 'mail123@mail.com';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'Владислав';
        $this->form->lastName        = 'Иванцов';
        $this->form->secondName      = 'Васильевич';
        $this->form->phone           = '89138118685';
        $I->assertTrue($this->form->register());
        $I->seeInDatabase('b_profile', [
            'firstName'  => 'Владислав',
            'lastName'   => 'Иванцов',
            'secondName' => 'Васильевич',
            'email'      => 'mail123@mail.com',
            'phone'      => '89138118685',
        ]);
        $I->seeInDatabase('b_user', [
            'login' => 'lomaster',
        ]);
        $I->assertFalse($this->form->register());
    }

    public function validateTestRegisterRepeateLogin(UnitTester $I)
    {
        $I->wantTo('Bad Result Register Repeate Login');
        $this->form                  = new RegisterForm();
        $this->form->login           = 'Master';
        $this->form->email           = 'mail123@mail.com';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'Владислав';
        $this->form->lastName        = 'Иванцов';
        $this->form->secondName      = 'Васильевич';
        $this->form->phone           = '89138118685';
        $I->assertFalse($this->form->register());
        $I->dontSeeInDatabase('b_profile', [
            'firstName'  => 'Владислав',
            'lastName'   => 'Иванцов',
            'secondName' => 'Васильевич',
            'email'      => 'mail123@mail.com',
            'phone'      => '89138118685',
        ]);
    }

    public function validateTestRegisterRepeateMail(UnitTester $I)
    {
        $I->wantTo('Bad Result Register Repeate Mail');
        $this->form                  = new RegisterForm();
        $this->form->login           = 'LoMaster';
        $this->form->email           = 'mail@mail.com';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'Владислав';
        $this->form->lastName        = 'Иванцов';
        $this->form->secondName      = 'Васильевич';
        $this->form->phone           = '89138118685';
        $I->assertFalse($this->form->register());
        $I->dontSeeInDatabase('b_profile', [
            'firstName'  => 'Владислав',
            'lastName'   => 'Иванцов',
            'secondName' => 'Васильевич',
            'email'      => 'mail123@mail.com',
            'phone'      => '89138118685',
        ]);
    }

    public function validateTestRegisterRepeatePhone(UnitTester $I)
    {
        $I->wantTo('Bad Result Register Repeate Phone');
        $this->form                  = new RegisterForm();
        $this->form->login           = 'LoMaster';
        $this->form->email           = 'mail123@mail.com';
        $this->form->password        = 'Gfhjkzrf123@';
        $this->form->passwordConfirm = 'Gfhjkzrf123@';
        $this->form->firstName       = 'Владислав';
        $this->form->lastName        = 'Иванцов';
        $this->form->secondName      = 'Васильевич';
        $this->form->phone           = '88005553535';
        $I->assertFalse($this->form->register());
        $I->dontSeeInDatabase('b_profile', [
            'firstName'  => 'Владислав',
            'lastName'   => 'Иванцов',
            'secondName' => 'Васильевич',
            'email'      => 'mail123@mail.com',
            'phone'      => '89138118685',
        ]);
    }*/
}