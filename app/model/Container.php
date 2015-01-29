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

    /**
     * @param \Nette\Database\Context $context
     */
    public function __construct(\Nette\Database\Context $context) {
        $this->context = $context;
    }

    /**
     * @param int $id id of container
     * @return array array('component_name'=>'id', ...)
     */
    public function getComponents($id) {
        $container = $this->context->table("container");
        throw new \Nette\NotImplementedException;
    }

    /**
     * 
     * @param string $name
     * @return \App\Components\GenericComponent descendants
     */
    public function createComponent($name) {
        if ($name == 'textControl') {
            return new \App\Components\Text\TextControl(0, FALSE);
        }
        if ($name == 'redTextControl') {
            return new \App\Components\RedText\RedTextControl(0, FALSE);
        }
    }

}
