<?php

use app\forms\BookForm;

class BookFormCest
{
    // tests
    protected $form;

    // tests
    public function validateTestBadResult(UnitTester $I)
    {
        $I->wantTo('Bad Result Validation');
        $this->form              = new BookForm();
        $this->form->name        = '';
        $this->form->description = '" OR ""=""; --';
        $this->form->year        = 'Gfhjkzrf123@';
        $this->form->authorId    = '';
        $this->form->genreId     = '';
        $I->assertFalse($this->form->validate());
    }

    public function validateTestGoodResult(UnitTester $I)
    {
        $I->wantTo('Good Result Validation');
        $this->form              = new BookForm();
        $this->form->name        = 'Книга';
        $this->form->description = 'Очень интересная книга';
        $this->form->year        = '2002';
        $this->form->authorId    = '1';
        $this->form->genreId     = '1';
        $I->assertTrue($this->form->validate());
    }

    /*public function validateTestCreateBad(UnitTester $I)
    {
        $I->wantTo('Bad Result Create');
        $this->form              = new BookForm();
        $this->form->name        = '';
        $this->form->description = '" OR ""=""; --';
        $this->form->year        = 'Gfhjkzrf123@';
        $this->form->authorId    = '';
        $this->form->genreId     = '';
        $I->assertFalse($this->form->create());
        $I->dontSeeInDatabase('b_book', [
            'name'        => '',
            'description' => '" OR ""=""; --',
        ]);
    }

    public function validateTestCreateGood(UnitTester $I)
    {
        $I->wantTo('Good Result Create');
        $this->form              = new BookForm();
        $this->form->name        = 'Книга';
        $this->form->description = 'Очень интересная книга';
        $this->form->year        = '14';
        $this->form->authorId    = '1';
        $this->form->genreId     = '1';
        $I->assertTrue($this->form->create());
        $I->seeInDatabase('b_book', [
            'name'        => 'Книга',
            'description' => 'Очень интересная книга',
            'year'        => '2002',
            'authorId'    => '1',
            'genreId'     => '1',
        ]);
    }

    public function validateTestUpdateBad(UnitTester $I)
    {
        $I->wantTo('Bad Result Update');
        $this->form              = new BookForm();
        $this->form->name        = 'Книга';
        $this->form->description = 'Очень интересная книга';
        $this->form->year        = '14';
        $this->form->authorId    = '1';
        $this->form->genreId     = '1';
        $I->assertFalse($this->form->update(1));
        $I->dontSeeInDatabase('b_book', [
            'name'        => 'Книга',
            'description' => 'Очень интересная книга',
            'year'        => '2002',
            'authorId'    => '1',
            'genreId'     => '1',
        ]);
    }

    public function validateTestUpdateGood(UnitTester $I)
    {
        $I->wantTo('Good Result Update');
        $this->form              = new BookForm();
        $this->form->name        = 'Книга';
        $this->form->description = 'Очень интересная книга';
        $this->form->year        = '14';
        $this->form->authorId    = '1';
        $this->form->genreId     = '1';
        $I->assertTrue($this->form->create());
        $I->seeInDatabase('b_book', [
            'name'        => 'Книга',
            'description' => 'Очень интересная книга',
            'year'        => '2002',
            'authorId'    => '1',
            'genreId'     => '1',
        ]);
        $this->form->name        = 'Книга про людей';
        $this->form->description = 'Очень интересная книга про людей';
        $this->form->year        = '14';
        $this->form->authorId    = '2';
        $this->form->genreId     = '2';
        $I->assertTrue($this->form->update($this->form->getIdBook()));
        $I->seeInDatabase('b_book', [
            'name'        => 'Книга про людей',
            'description' => 'Очень интересная книга про людей',
            'year'        => '2002',
            'authorId'    => '2',
            'genreId'     => '2',
        ]);
    }

    public function validateTestUpdateBadValidation(UnitTester $I)
    {
        $I->wantTo('Bad Validation Result Update');
        $this->form              = new BookForm();
        $this->form->name        = 'Книга';
        $this->form->description = 'Очень интересная книга';
        $this->form->year        = '14';
        $this->form->authorId    = '1';
        $this->form->genreId     = '1';
        $I->assertTrue($this->form->create());
        $I->seeInDatabase('b_book', [
            'name'        => 'Книга',
            'description' => 'Очень интересная книга',
            'year'        => '2002',
            'authorId'    => '1',
            'genreId'     => '1',
        ]);
        $this->form->name        = '';
        $this->form->description = '" OR ""=""; --';
        $this->form->year        = 'Gfhjkzrf123@';
        $this->form->authorId    = '';
        $this->form->genreId     = '';
        $I->assertFalse($this->form->update($this->form->getIdBook()));
        $I->dontSeeInDatabase('b_book', [
            'name'        => '',
            'description' => '" OR ""=""; --',
        ]);
    }*/
}
