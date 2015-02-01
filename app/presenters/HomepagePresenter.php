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

    /**
     * @var array array('name'=>'', 'id'=>'') 
     */
    private $layout;

    /**
     * @var array
     */
    private $containerIds;

    /**
     * @return \Nette\Application\UI\Multiplier
     */
    protected function createComponentContainer() {
        return new \Nette\Application\UI\Multiplier(function ($id) {
            return new \App\Components\Container\ContainerComponent($this->container, $id);
        });
    }

    public function actionDefault() {
        $this->layout = $this->container->getLayout();
        $this->containerIds = $this->container->getContainers($this->layout['id']);
    }

    public function renderDefault() {
        $this->template->layoutName = $this->layout['name'];
        $this->template->containerIds = $this->containerIds;
    }

}
