<?php

namespace App\Presenters;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {
    /**
     * @inject
     * @var \App\Components\Text\IRegistrationTextControl
     */
    public $textControlFactory;
    
    protected function createComponentTextControl() {
        $text = $this->textControlFactory->create();
        $text->setId(100);
        $text->setEdit(TRUE);
        return $text;
    }

    public function renderDefault() {
        $this->template->layoutName = 'f2f';
    }

}
