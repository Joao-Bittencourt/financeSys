<?php

class MovimentacaoTest extends CakeTestCase {

    public $fixtures = [
        'app.movimentacao'
    ];
    public $Movimentacao = null;

    public function setUp() {
        $this->Movimentacao = ClassRegistry::init('Movimentacao');
    }

    public function testExistModel() {
        $this->assertTrue(is_a($this->Movimentacao, 'Movimentacao'));
    }

    public function testEmptyDtMovimento() {
        $data = ['dt_movimento' => null];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['dt_movimento' => ''];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['dt_movimento' => '   '];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);
    }

    public function testEmptyTipoMovimentacao() {
        $data = ['tipo_movimentacao' => null];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['tipo_movimentacao' => ''];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['tipo_movimentacao' => '   '];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);
    }

    public function testValidaTipoMovimentacao() {
        $data = ['tipo_movimentacao' => 'X'];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);
    }

    public function testValorSaldo() {
        $data = [
            'conta_id' => 1,
            'tipo_movimentacao' => 'D',
            'valor' => '1.00'
        ];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);
    }

    public function testContaId() {
        $data = ['conta_id' => null];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['conta_id' => ''];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['conta_id' => '   '];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);
    }
    
    public function testPessoaId() {
        $data = ['pessoa_id' => null];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['pessoa_id' => ''];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);

        $data = ['pessoa_id' => '   '];
        $saved = $this->Movimentacao->save($data);
        $this->assertFalse($saved);
    }

}
