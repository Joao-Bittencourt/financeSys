<?php

class PessoaFixture extends CakeTestFixture {

    public $name = 'Pessoa';
    public $fields = [
        'id' => ['type' => 'integer', 'key' => 'primary'],
        'nome' => ['type' => 'string', 'length' => 200],
        'cpf' => ['type' => 'string', 'length' => 11],
        'endereco' => ['type' => 'text'],
    ];

    public function init() {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => '22793178004',
                'endereco' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'id' => 2,
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => '88351319600',
                'endereco' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }

}
