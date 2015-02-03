<?php

namespace App\Components;

/**
 * Description of TextControl
 *
 * @author Viky Novotných
 */
class RedTextControl extends \App\Components\GenericComponent {

    /**
     * @var string
     */
    protected $text = "";

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
        $this->text = $this->loadText();
    }

    /**
     * @todo rewrite to mvc
     * @return string
     */
    public function loadText() {
        $connection = new \Nette\Database\Connection('sqlite:../app/components/container/db');
        $context = new \Nette\Database\Context($connection, new \Nette\Database\Structure($connection, new \Nette\Caching\Storages\MemcachedStorage()));
        $table = $context->table('data_redText');
        $row = $table->where(array('id' => $this->id))->fetch();
        if (isset($row->text)) {
            return $row->text;
        }
        return "bad id";
    }

    /**
     * @return \Nette\Application\UI\Form
     */
    protected function createComponentEditForm() {
        $form = new \Nette\Application\UI\Form();
        $form->addTextArea('text', '')
                ->setValue($this->text)
                ->setAttribute('style', 'width:100%;min-height:120px');
        $form->addSubmit('send');
        $form->onSuccess[] = $this->editFormSubmitted;
        return $form;
    }

    /**
     * @param \Nette\Application\UI\Form $form
     */
    public function editFormSubmitted(\Nette\Application\UI\Form $form) {
        /* dump($form); */
        $this->getPresenter()->flashMessage('changes discarted :P');
        $this->redirect('this');
    }

    public function render($id = NULL) {
        if ($this->id == NULL && $id != NULL) {
            $this->id = $id;
            $this->text = $this->loadText();
        }
        $this->template->text = $this->text;
        if ($this->edit == TRUE) {
            $this->template->setFile(__DIR__ . '/text-edit.latte');
            $this->template->render();
        } else {
            $this->template->setFile(__DIR__ . '/text.latte');
            $this->template->render();
        }
    }

}
