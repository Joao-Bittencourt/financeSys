<?php
/**
 * Pessoa Fixture
 */
class PessoaFixture extends CakeTestFixture {

    public $import = ['model' => 'Pessoa', 'records' => false];
	
/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'nome' => 'Lorem ipsum dolor sit amet',
            'cpf' => '03905226006',
            'endereco' => 'Lorem ipsum dolor sit amet',
        ],
    ];

}