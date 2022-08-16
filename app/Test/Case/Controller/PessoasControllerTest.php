<?php

App::uses('PessoasController', 'Controller');

/**
 * PessoasController Test Case
 */
class PessoasControllerTest extends ControllerTestCase {
    
    public $fixtures = [
    	'app.pessoa'
    ];

    /**
     * testIndex method
     *
     * @return void
     */
    public function testIndex() {
        $this->testAction('/pessoas');
    }

    /**
     * testCadastar method
     *
     * @return void
     */
    public function testCadastrar() {
        $dados = [
            'Pessoa' => [
		'nome' => 'Lorem ipsum dolor sit amet',
		'cpf' => '039.052.260-04',
		'endereco' => 'Lorem ipsum dolor sit amet',	
            ]
        ];
         $this->testAction('/pessoas/cadastrar', ['data' => $dados, 'method' => 'post']);
    }

    /**
     * testEditar method
     *
     * @return void
     */
    public function testEditar() {
        $this->testAction('/pessoas/editar/1');
    }

    /**
     * testDelete method
     *
     * @return void
     */
    public function testDelete() {
        $dados = [
            'Pessoa.id' => 1
        ];
        $this->testAction('/pessoas/delete/1', ['data' => $dados, 'method' => 'post']);
    }

}
