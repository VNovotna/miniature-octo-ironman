<?php

namespace App\Presenters;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    /**
     * @inject
     * @var \Nette\Database\Context
     */
    public $context;

    protected function createComponentContainer() {
        return new \App\Components\Container\ContainerComponent($this->context);
    }

    public function renderDefault() {
        $this->template->layoutName = 'f2f';
    }

}
