<?php

class ContaTest extends CakeTestCase {

    public $fixtures = [
        'app.conta'
    ];
    public $Conta = null;

    public function setUp() {
        $this->Conta = ClassRegistry::init('Conta');
    }

    public function testExistModel() {
        $this->assertTrue(is_a($this->Conta, 'Conta'));
    }

    public function testEmptyNumeroConta() {
        $data = ['numero_conta' => null];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);

        $data = ['numero_conta' => ''];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);

        $data = ['numero_conta' => '   '];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);
    }

    public function testNumericNumeroConta() {
        $data = ['numero_conta' => 'a'];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);

        $data = ['numero_conta' => '   '];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);
    }

    public function testUniqueNumeroConta() {
        $data = [
            'pessoa_id' => 1,
            'numero_conta' => '867470',
        ];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);
    }

    public function testEmptyPessoaId() {
        $data = ['pessoa_id' => null];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);

        $data = ['pessoa_id' => ''];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);

        $data = ['pessoa_id' => '   '];
        $saved = $this->Conta->save($data);
        $this->assertFalse($saved);
    }

    public function testBuscaListaContaSaldo() {

        $result = $this->Conta->buscaListaContaSaldo();

        $expected = [
            1 => '867470 - Saldo : R$ 0,00',
            2 => '826820 - Saldo : R$ 0,00'
        ];

        $this->assertTrue($expected == $result);
    }
    
    public function testValidaReqistrosDeletarValido() {

        $contaId = 1;
        
        $result = $this->Conta->valida_reqistros_deletar($contaId);
        
        $this->assertTrue($result);
    }
    
    public function testValidaReqistrosDeletarInvalido() {
        
        $contaId = 1;
        $dataMovimentacao = [
            'conta_id' => $contaId,
            'pessoa_id' => 1,
            'valor' => '1.25',
            'tipo_movimentacao' => 'C',
            'dt_movimento' =>  date('Y-m-d h:m:s')
        ];
        $this->Conta->Movimentacao->save($dataMovimentacao);
        
        $result = $this->Conta->valida_reqistros_deletar($contaId);
        
        $this->assertFalse($result);
    }

}
