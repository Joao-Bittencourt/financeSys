<?php

$tableHeaders = [];
$tableHeaders[]=  $this->Paginator->sort('Pessoa.nome', 'Nome');
$tableHeaders[]= 'CPF';
$tableHeaders[]= $this->Paginator->sort('Conta.numero_conta', 'Número da Conta');
$tableHeaders[]= 'Editar';
$tableHeaders[]= 'Remover';

$tableCells = [];
if( !empty($dados)){
    foreach ($dados as $key => $dado){
        $tableCells[$key][] = Hash::get($dado, 'Pessoa.nome', '-');
        $tableCells[$key][] = Hash::get($dado, 'Pessoa.cpf_formatado', '-');
        $tableCells[$key][] = Hash::get($dado, 'Conta.numero_conta', '-');
        $tableCells[$key][] = $this->Html->link('editar',['controller' => 'contas','action' => 'editar', Hash::get($dado, 'Conta.id')]);
        $tableCells[$key][] = $this->Form->postLink('Remover', [ 'action' => 'delete', Hash::get($dado, 'Conta.id')], ['confirm' => ' Deseja realmente deletar o registro?']);
    }
}
?>
<table class="table table-striped table-sm">
    
<?php
echo $this->Html->tableHeaders($tableHeaders);
echo $this->Html->tableCells($tableCells);
?>
</table>