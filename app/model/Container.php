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
     * @return array array(0=>array('name'=>'', 'id'=>''), ...)
     */
    public function getComponents($id) {
        $contentTable = $this->context->table("content");
        $components = array();
        foreach ($contentTable->where(array('container_id' => $id)) as $row) {
            $components[] = array('name' => $row->component_name, 'id' => $row->component_id);
        }
        return $components;
    }

    /**
     * @param string $name
     * @return \App\Components\GenericComponent descendants
     */
    public function createComponent($name) {
        $name = "\\App\\Components\\" . \Nette\Utils\Strings::firstUpper($name);
        return new $name;
    }

    /**
     * @return array array('name'=>'', 'id'=>'')
     */
    public function getLayout() {
        $layout = $this->context->table("layout")->fetch();
        return array('id' => $layout->id, 'name' => $layout->name);
    }

    /**
     * @param int $layout_id
     * @return array array(id,id,id)
     */
    public function getContainers($layout_id) {
        $containersTable = $this->context->table("container")->order('order');
        $containers = array();
        foreach ($containersTable->where(array('layout_id' => $layout_id)) as $row) {
            $containers[] = $row->id;
        }
        return $containers;
    }

}
