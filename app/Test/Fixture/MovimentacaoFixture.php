<?php
/**
 * Movimentacao Fixture
 */
class MovimentacaoFixture extends CakeTestFixture {

    public $import = ['model' => 'Movimentacao', 'records' => false];

/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'conta_id' => 1,
            'pessoa_id' => 1,
            'valor' => '10.50',
            'tipo_movimentacao' => 'C',
            'dt_movimento' => '2021-06-01 15:00:00'
        ],
    ];

}