<?php

namespace App\Components\Text;

/**
 * Description of TextControl
 *
 * @author Viky Novotných
 */
class TextControl extends \Nette\Application\UI\Control {

    /**
     * @var int
     */
    private $id;

    /**
     * @var boolean
     */
    private $edit = FALSE;

    public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEdit($edit) {
        $this->edit = $edit;
    }

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
