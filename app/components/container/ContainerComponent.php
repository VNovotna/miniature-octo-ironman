<?php

namespace App\Components\Container;

/**
 * Description of ContainerComponent
 *
 * @author Viky Novotných
 */
class ContainerComponent extends \App\Components\GenericComponent {

    /**
     * @var \Nette\Database\Context
     */
    public $context;

    public function __construct(\Nette\Database\Context $context, $id = NULL, $edit = FALSE) {
        $this->context = $context;
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
