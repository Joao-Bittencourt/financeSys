<?php

class ContaFixture extends CakeTestFixture {

    public $name = 'Conta';
    public $fields = [
        'id' => ['type' => 'integer', 'key' => 'primary'],
        'pessoa_id' => ['type' => 'integer'],
        'numero_conta' => ['type' => 'string', 'length' => 13],
    ];

    public function init() {
        $this->records = [
            [
                'id' => 1,
                'pessoa_id' => 1,
                'numero_conta' => '867470',
            ],
            [
                'id' => 2,
                'pessoa_id' => 2,
                'numero_conta' => '826820',
            ],
        ];
        parent::init();
    }

}
