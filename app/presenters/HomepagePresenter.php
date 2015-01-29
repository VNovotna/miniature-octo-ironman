<?php

namespace App\Presenters;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    /**
     * @inject
     * @var \App\Model\Container
     */
    public $container;

    protected function createComponentContainer() {
        return new \Nette\Application\UI\Multiplier(function ($id) {
            return new \App\Components\Container\ContainerComponent($this->container,$id);
        });
    }

    public function renderDefault() {
        $this->template->layoutName = 'f2f';
    }

}
