<?php

class PessoaTest extends CakeTestCase {

    public $fixtures = [
        'app.pessoa'
    ];
    public $Pessoa = null;

    public function setUp() {
        $this->Pessoa = ClassRegistry::init('Pessoa');
    }

    public function testExistModel() {
        $this->assertTrue(is_a($this->Pessoa, 'Pessoa'));
    }

    public function testEmptyNome() {
        $data = ['nome' => null];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);

        $data = ['nome' => ''];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);

        $data = ['nome' => '   '];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);
    }

    public function testMaxLengthNome() {

        $nomeMaxLength = str_pad('jhon doe', 240, 'a');

        $data = ['nome' => $nomeMaxLength];
        $saved = $this->Pessoa->save($data);

        $this->assertFalse($saved);
    }

    public function testValidaNomeNome() {

        $data = ['nome' => 'jhon doe 123'];
        $saved = $this->Pessoa->save($data);

        $this->assertFalse($saved);
    }

    public function testEmptyCpf() {
        $data = ['cpf' => null];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);

        $data = ['cpf' => ''];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);

        $data = ['cpf' => '   '];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);
    }

    public function testUniqueCpf() {
        $data = ['cpf' => '22793178004'];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);
    }

    public function testEmptyEndereco() {
        $data = ['endereco' => null];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);

        $data = ['endereco' => ''];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);

        $data = ['endereco' => '   '];
        $saved = $this->Pessoa->save($data);
        $this->assertFalse($saved);
    }

    public function testValidaNomeValido() {
        $data = ['nome' => 'jhon doe'];
        $saved = $this->Pessoa->valida_nome($data);
        $this->assertTrue($saved);
    }

    public function testValidaNomeInvalido() {
        $data = ['nome' => 'jhon doe 123'];
        $saved = $this->Pessoa->valida_nome($data);
        $this->assertFalse($saved);
    }

    public function testVirtualFieldNomeCpf() {

        $pessoa = $this->Pessoa->find('first');

        $this->assertTrue(isset($pessoa['Pessoa']['nome_cpf']));
        $this->assertTrue(is_string($pessoa['Pessoa']['nome_cpf']));
    }

    public function testVirtualFieldCpfFormatado() {

        $pessoa = $this->Pessoa->find('first');

        $this->assertTrue(isset($pessoa['Pessoa']['cpf_formatado']));
    }

}
