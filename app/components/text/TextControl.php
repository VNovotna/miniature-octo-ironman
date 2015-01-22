<?php

namespace App\Components\Text;

/**
 * Description of TextControl
 *
 * @author Viky Novotných
 */
class TextControl extends \App\Components\GenericComponent {

    public function loadText() {
        $context = new \Nette\Database\Context(new \Nette\Database\Connection('sqlite:../app/components/text/db'));
        $table = $context->table('data');
        $row = $table->where(array('component_id' => $this->id))->fetch();
        return $row->text;
    }

    public function render() {
        $this->template->text = $this->loadText();
        if ($this->edit == TRUE) {
            $this->template->setFile(__DIR__ . '/text-edit.latte');
            $this->template->render();
        } else {
            $this->template->setFile(__DIR__ . '/text.latte');
            $this->template->render();
        }
    }

}
