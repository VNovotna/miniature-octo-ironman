<?php

namespace App\Components\Container;

/**
 * Description of ContainerComponent
 *
 * @author Viky Novotných
 */
class ContainerComponent extends \App\Components\GenericComponent {

    protected function createComponentPageItem($params){
        return new \Nette\Application\UI\Multiplier(function ($name){
            dump($name);
            return new \App\Components\Text\TextControl;
        });
    }

    public function render() {
        $this->template->setFile(__DIR__ . '/container.latte');
        $this->template->render();
    }

}
