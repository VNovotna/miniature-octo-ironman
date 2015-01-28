<?php

namespace App\Model;

/**
 * Data model for ContainerComponent
 *
 * @author Viky Novotných
 */
class Container extends \Nette\Object {

    /**
     * @var \Nette\Database\Context
     */
    private $context;

    public function __construct(\Nette\Database\Context $context) {
        $this->context = $context;
    }

    /**
     * @param int $id id of container7
     * @return array array('component_name'=>'id', ...)
     */
    public function getComponents($id) {
        throw new \Nette\NotImplementedException;
    }

}
