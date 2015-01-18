<?php

namespace App\Components;

/**
 * Description of GenericComponent
 *
 * @author Viky Novotných
 */
class GenericComponent extends \Nette\Application\UI\Control {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var boolean
     */
    protected $edit = FALSE;

    public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEdit($edit) {
        $this->edit = $edit;
    }
    /**
     * @param boolean $edit
     */
    public function handleEdit($edit){
        $this->edit = $edit;
    }

    public function render() {
        
    }

}
