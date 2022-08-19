<?php

class MovimentacaoFixture extends CakeTestFixture {

    public $name = 'Movimentacao';
    public $fields = [
        'id' => ['type' => 'integer', 'key' => 'primary'],
        'conta_id' => ['type' => 'integer'],
        'pessoa_id' => ['type' => 'integer'],
        'valor' => ['type' => 'decimal', 'length' => '13,2'],
        'tipo_movimentacao' => ['type' => 'string', 'length' => 2],
        'dt_movimento' => 'datetime'
    ];

    public function init() {
        $this->records = [
            [
                'id' => 1,
                'conta_id' => 1,
                'pessoa_id' => 1,
                'valor' => '10.50',
                'tipo_movimentacao' => 'C',
                'dt_movimento' => '2021-06-01 15:00:00'
            ],
            [
                'id' => 2,
                'conta_id' => 2,
                'pessoa_id' => 2,
                'valor' => '10.50',
                'tipo_movimentacao' => 'C',
                'dt_movimento' => '2021-06-01 15:00:00'
            ],
            [
                'id' => 3,
                'conta_id' => 1,
                'pessoa_id' => 1,
                'valor' => '5.25',
                'tipo_movimentacao' => 'D',
                'dt_movimento' => '2021-06-01 15:01:00'
            ],
            [
                'id' => 4,
                'conta_id' => 2,
                'pessoa_id' => 2,
                'valor' => '5.50',
                'tipo_movimentacao' => 'D',
                'dt_movimento' => '2021-06-01 15:02:00'
            ],
            
        ];
        parent::init();
    }

}
