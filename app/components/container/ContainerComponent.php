<?php

namespace App\Components\Container;

/**
 * Description of ContainerComponent
 *
 * @author Viky Novotných
 */
class ContainerComponent extends \App\Components\GenericComponent {

    /**
     * @var \App\Model\Container
     */
    public $container;

    public function __construct(\App\Model\Container $container, $id = NULL, $edit = FALSE) {
        $this->container = $container;
        $this->id = $id;
        $this->edit = $edit;
    }

    protected function createComponentPageItem($params) {
        return new \Nette\Application\UI\Multiplier(function ($name) {
            return $this->container->createComponent($name);
        });
    }

    public function render() {
        $this->template->components = $this->container->getComponents($this->id);
        $this->template->setFile(__DIR__ . '/container.latte');
        $this->template->render();
    }

}
