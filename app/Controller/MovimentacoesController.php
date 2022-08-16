<?php

App::uses('AppController', 'Controller');

class MovimentacoesController extends AppController {

    public $components = ['Paginator', 'Flash'];

    public function index() {
       
        $this->set('dados', $this->Paginator->paginate());
        $this->set('dados_total', $this->Movimentacao->find('first', ['fields' => 'Movimentacao.saldo']));
        $this->set('pessoas', $this->Movimentacao->Pessoa->find('list', ['fields' => ['Pessoa.id', 'Pessoa.nome_cpf']]));
        $this->set('contas', $this->Movimentacao->Conta->busca('conta_numero_saldo'));
       
        if ($this->request->is('post')) {
            $this->cadastrar();
        }
    }

    public function cadastrar() {
        $dadosSalvar = (array) $this->request->data;
        $dadosSalvar['Movimentacao']['dt_movimento'] = date('Y-m-d h:m:s');

        if ($this->Movimentacao->saveAll($dadosSalvar, ['validate' => 'first'])) {
            $this->Flash->success(__('Dados Salvos com sucesso'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__(' Não foi possivel salvar, verifique os erros e tente novamente.'));
            return false;
        }
    }

}
