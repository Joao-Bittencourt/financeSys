<?php

App::uses('AppController', 'Controller');

class PessoasController extends AppController {

    public $components = ['Paginator', 'Flash'];

    public function index() {
        
        $this->set('dados', $this->Paginator->paginate());

        if ($this->request->is('post') && !empty($this->request->data)) {
            $this->cadastrar();
        }
        
        if ($this->request->is('get') && Hash::get($this->request->pass, '0') || $this->request->is('put')) {
            $PessoaId = Hash::get($this->request->pass, '0');
            $this->editar($PessoaId);
        }
    }

    public function cadastrar() {
        $dadosSalvar = (array) $this->request->data;

        if ($this->Pessoa->saveAll($dadosSalvar, ['validate' => 'first'])) {
            $this->Flash->success(__('Dados salvos com sucesso.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('Não foi possivel salvar, verifique os erros e tente novamente.'));
            return false;
        }
    }

    public function editar($id = null) {
        if (!$this->Pessoa->exists($id)) {
            $this->Flash->error(__('Pessoa não encontrada.'));
            return $this->redirect(['action' => 'index']);
        }
        if(empty($this->request->data)){
            $this->request->data = $this->Pessoa->find('first', ['conditions' => ['Pessoa.id' => $id]]);
            
        }
        
        $this->set('title', 'Editar Pessoa');
        if ($this->request->is('put')) {

            $dadosSalvar = (array) $this->request->data;
            if ($this->Pessoa->saveAll($dadosSalvar, ['validate' => 'first'])) {
                $this->Flash->success(__('Dados salvos com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possivel salvar, verifique os erros e tente novamente.'));
                return false;
            }
        }
        return true;
    }

    public function delete($id = null) {
        if (!$this->Pessoa->exists($id)) {
            $this->Flash->error(__('Pessoa não encontrada.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pessoa->delete($id)) {
            $this->Flash->success(__('Dado deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possivel deletar.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
