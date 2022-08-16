<?php

App::uses('MovimentacoesController', 'Controller');

/**
 * MovimentacoesController Test Case
 */
class MovimentacoesControllerTest extends ControllerTestCase {
    
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
        $this->testAction('/movimentacoes');
    }

    /**
     * testCadastar method
     *
     * @return void
     */
    public function testCadastrar() {
        $dados = [
            'Movimentacao' => [
		'conta_id' => 1,
		'pessoa_id' => 1,
                'valor' => '10.50',
                'tipo_movimentacao' => 'C',
                'dt_movimento' => date('Y-m-d H:i:s'),
            ]
        ];
         $this->testAction('/movimentacoes/cadastrar', ['data' => $dados, 'method' => 'post']);
    }

    /**
     * testDelete method
     *
     * @return void
     */
//    public function testDelete() {
//        $dados = [
//            'Movimentacao.id' => 1
//        ];
//        $this->testAction('/movimentacoes/delete/1', ['data' => $dados, 'method' => 'post']);
//    }

}
