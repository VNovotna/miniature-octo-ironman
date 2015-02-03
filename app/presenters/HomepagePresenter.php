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
    public $containerModel;

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
            return new \App\Components\Container\ContainerComponent($this->containerModel, $id);
        });
    }

    public function actionDefault() {
        $this->layout = $this->containerModel->getLayout();
        $this->containerIds = $this->containerModel->getContainers($this->layout['id']);
    }

    public function renderDefault() {
        $this->template->layoutName = $this->layout['name'];
        $this->template->containerIds = $this->containerIds;
    }

}
