<?php
/**
 * Conta Fixture
 */
class ContaFixture extends CakeTestFixture {

    public $import = ['model' => 'Conta', 'records' => false];
	

/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'pessoa_id' => 1,
            'numero_conta' => '03905226006',
        ],
    ];

}