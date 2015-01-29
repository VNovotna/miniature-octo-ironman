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
        $component = new \App\Components\Container\ContainerComponent($this->container);
        /** @todo cannot be harcoded */
        $component->setId(3);
        return $component;
    }

    public function renderDefault() {
        $this->template->layoutName = 'f2f';
    }

}
