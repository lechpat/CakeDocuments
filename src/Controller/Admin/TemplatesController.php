<?php
namespace Documents\Controller\Admin;

use Documents\Controller\AppController;

/**
 * Templates Controller
 *
 * @property \Documents\Model\Table\TemplatesTable $Templates
 */
class TemplatesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('templates', $this->paginate($this->Templates));
        $this->set('_serialize', ['templates']);
    }

    /**
     * View method
     *
     * @param string|null $id Template id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        $this->set('template', $template);
        $this->set('_serialize', ['template']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $template = $this->Templates->newEntity();
        $template->accessible('id', true);
        if ($this->request->is('post')) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(__('The template has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('template'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Template id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(__('The template has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('template'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $template = $this->Templates->get($id);
        if ($this->Templates->delete($template)) {
            $this->Flash->success(__('The template has been deleted.'));
        } else {
            $this->Flash->error(__('The template could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
