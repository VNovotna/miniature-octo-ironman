<?php

namespace App\Components\Text;

/**
 * Description of TextControl
 *
 * @author Viky Novotných
 */
class TextControl extends \App\Components\GenericComponent {

    public function render() {
        if ($this->edit == TRUE) {
            $this->template->setFile(__DIR__ . '/text-edit.latte');
            $this->template->render();
        } else {
            $this->template->setFile(__DIR__ . '/text.latte');
            $this->template->render();
        }
    }

}
