<?php

App::uses('AppController', 'Controller');

class ContasController extends AppController {

    public $components = ['Paginator', 'Flash'];

    public function index() {
      
        $this->set('dados', $this->Paginator->paginate());
        $this->set('pessoas', $this->Conta->Pessoa->find('list', ['fields' => ['Pessoa.id', 'Pessoa.nome_cpf']]));
        
        if ($this->request->is('post')) {
            $this->cadastrar();
        }

        if ($this->request->is('get') && Hash::get($this->request->pass, '0') || $this->request->is('put')) {
            $contaId = Hash::get($this->request->pass, '0');
            $this->editar($contaId);
        }
    }

    public function cadastrar() {
        
        $dadosSalvar = (array) $this->request->data;

        if ($this->Conta->saveAll($dadosSalvar, ['validate' => 'first'])) {
            $this->Flash->success(__('Dados Salvos com sucesso'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('Não foi possivel salvar, verifique os erros e tente novamente.'));
            return false;
        }
    }

    public function editar($id = null) {

        if (!$this->Conta->exists($id)) {
            $this->Flash->error(__('Conta não encontrada.'));
            return $this->redirect(['action' => 'index']);
        }

        if (empty($this->request->data)) {
            $this->Conta->recursive = -1;
            $this->request->data = $this->Conta->find('first', ['conditions' => ['Conta.id' => $id]]);
        }

        $this->set('pessoas', $this->Conta->Pessoa->find('list', ['fields' => ['Pessoa.id', 'Pessoa.nome_cpf']]));
        $this->set('title', 'Editar Conta');

        if ($this->request->is('put')) {
            
            $dadosSalvar = (array) $this->request->data;
            
            if ($this->Conta->saveAll($dadosSalvar, ['validate' => 'first'])) {
                $this->Flash->success(__('Dados salvos com sucesso.'));
                return $this->redirect(['controller' => 'contas', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possivel salvar, verifique os erros e tente novamente.'));
                return false;
            }
        }
        
        return true;
    }

    public function delete($id = null) {
        
        $this->request->allowMethod('post', 'delete');
        
        if (!$this->Conta->exists($id)) {
            $this->Flash->error(__('Conta não encontrada.'));
            return $this->redirect(['action' => 'index']);
        }
        

        $deletarValido = $this->Conta->valida_reqistros_deletar($id);
        
        if ($deletarValido) {
            if ($this->Conta->delete($id)) {
                $this->Flash->success(__('Dado deletado com sucesso.'));
            } else {
                $this->Flash->error(__('Não foi possivel deletar.'));
            }
        }

        if ($deletarValido == false) {
            $this->Flash->error(__('Não foi possivel deletar, conta possui movimentações.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
