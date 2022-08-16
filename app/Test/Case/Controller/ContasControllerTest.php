<?php

App::uses('ContasController', 'Controller');

/**
 * ContasController Test Case
 */
class ContasControllerTest extends ControllerTestCase {
    
    public $fixtures = [
    	'app.conta',
    	'app.pessoa',
    	'app.movimentacao'
    ];

    /**
     * testIndex method
     *
     * @return void
     */
    public function testIndex() {
        $this->testAction('/contas');
    }

    /**
     * testCadastar method
     *
     * @return void
     */
    public function testCadastrar() {
        $dados = [
            'Conta' => [
		'id' => 1,
                'pessoa_id' => 1,
                'numero_conta' => '03905226006',
            ]
        ];
         $this->testAction('/contas/cadastrar', ['data' => $dados, 'method' => 'post']);
    }

    /**
     * testEditar method
     *
     * @return void
     */
    public function testEditar() {
        $this->testAction('/contas/editar/1');
    }

    /**
     * testDelete method
     *
     * @return void
     */
    public function testDelete() {
        $dados = [
            'Conta.id' => 1
        ];
        $this->testAction('/contas/delete/1', ['data' => $dados, 'method' => 'post']);
    }

}
