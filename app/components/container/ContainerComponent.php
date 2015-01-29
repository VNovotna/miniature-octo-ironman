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

    /**
     * @TODO: issue #3 
     * @TODO: issue #4
     */
    protected function createComponentPageItem($params) {
        return new \Nette\Application\UI\Multiplier(function ($name) {
            if ($name == 'textControl') {
                return new \App\Components\Text\TextControl(0, FALSE);
            }
            if ($name == 'redTextControl') {
                return new \App\Components\RedText\RedTextControl(0, FALSE);
            }
        });
    }

    public function render() {
        $this->template->setFile(__DIR__ . '/container.latte');
        $this->template->render();
    }

}
