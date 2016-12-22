<?php

use app\forms\RegisterForm;

class RegisterFormCest extends \Codeception\Test\Unit
{

    // tests
    public function validateTestBadResult()
    {
        $form = new RegisterForm();
        $form->login = '';
        $form->email = 'ololo';
        $form->password = 'Gfhjkzrf123@';
        $form->passwordConfirm = 'Gfhjkzrf123@';
        $form->firstName = 'uuuuuuuuuuhggiuytfughubwwjadfkhjasbdfjsabfasjbfasjbfkhjasbdfkhjasbfkjhasbfkashjbfahkjsf';
        $form->lastName = 'uuuuuuuuuuhggiuytfughubwwjadfkhjasbdfjsabfasjbfasjbfkhjasbdfkhjasbfkjhasbfkashjbfahkjsf';
        $form->secondName = 'uuuuuuuuuuhggiuytfughubwwjadfkhjasbdfjsabfasjbfasjbfkhjasbdfkhjasbfkjhasbfkashjbfahkjsf';
        $form->phone = 'lalala';
        $this->assertFalse($form->validate());
    }
}
