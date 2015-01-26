<?php

namespace App\Components\Container;

/**
 * Description of ContainerComponent
 *
 * @author Viky Novotných
 */
class ContainerComponent extends \App\Components\GenericComponent {
    /** @TODO: issue #3 */
    /** @TODO: issue #4 */
    protected function createComponentPageItem($params) {
        return new \Nette\Application\UI\Multiplier(function ($name) {
            dump($name);
            if ($name == 'textControl') {
                return new \App\Components\Text\TextControl(NULL, NULL, 0, TRUE);
            }
            if ($name == 'redTextControl') {
                return new \App\Components\RedText\RedTextControl(NULL, NULL, 0, FALSE);
            }
        });
    }

    public function render() {
        $this->template->setFile(__DIR__ . '/container.latte');
        $this->template->render();
    }

}
