<?php
namespace Documents\Controller\Admin;

use Documents\Controller\AppController;

/**
 * Bundles Controller
 *
 * @property \Documents\Model\Table\BundlesTable $Bundles
 */
class BundlesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('bundles', $this->paginate($this->Bundles));
        $this->set('_serialize', ['bundles']);
    }

    /**
     * View method
     *
     * @param string|null $id Bundle id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bundle = $this->Bundles->get($id, [
            'contain' => ['Templates']
        ]);
        $this->set('bundle', $bundle);
        $this->set('_serialize', ['bundle']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bundle = $this->Bundles->newEntity();
        if ($this->request->is('post')) {
            $bundle = $this->Bundles->patchEntity($bundle, $this->request->data);
            if ($this->Bundles->save($bundle)) {
                $this->Flash->success(__('The bundle has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bundle could not be saved. Please, try again.'));
            }
        }
        $templates = $this->Bundles->Templates->find('list', ['limit' => 200]);
        $this->set(compact('bundle', 'templates'));
        $this->set('_serialize', ['bundle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bundle id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bundle = $this->Bundles->get($id, [
            'contain' => ['Templates']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bundle = $this->Bundles->patchEntity($bundle, $this->request->data);
            if ($this->Bundles->save($bundle)) {
                $this->Flash->success(__('The bundle has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bundle could not be saved. Please, try again.'));
            }
        }
        $templates = $this->Bundles->Templates->find('list', ['limit' => 200]);
        $this->set(compact('bundle', 'templates'));
        $this->set('_serialize', ['bundle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bundle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bundle = $this->Bundles->get($id);
        if ($this->Bundles->delete($bundle)) {
            $this->Flash->success(__('The bundle has been deleted.'));
        } else {
            $this->Flash->error(__('The bundle could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
