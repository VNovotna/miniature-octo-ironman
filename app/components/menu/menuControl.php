<?php

namespace App\Components;

/**
 * Description of menuControl
 *
 * @author Viky Novotných
 */
class MenuControl extends GenericComponent {

    public function render($id = NULL) {
        if ($id != NULL) {
            $this->id = $id;
        }
        if ($this->edit == TRUE) {
            $this->template->setFile(__DIR__ . '/menu-edit.latte');
            $this->template->render();
        } else {
            $this->template->setFile(__DIR__ . '/menu.latte');
            $this->template->render();
        }
    }

}
