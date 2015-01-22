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
    private $id;

    /**
     * @persistent
     * @var boolean
     */
    private $edit;

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
     * @return int
     */
    function getId() {
        return $this->id;
    }

    /**
     * @return boolean
     */
    function getEdit() {
        return $this->edit;
    }

    /**
     * @param boolean $edit
     */
    public function handleEdit($edit) {
        $this->edit = $edit;
    }

    public function render() {
        
    }

}
