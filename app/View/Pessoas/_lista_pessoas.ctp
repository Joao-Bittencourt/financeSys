<?php

$tableHeaders = [];
$tableHeaders[]=  $this->Paginator->sort('Pessoa.nome', 'Nome');
$tableHeaders[]= 'CPF';
$tableHeaders[]= $this->Paginator->sort('Pessoa.endereco', 'Endereço');
$tableHeaders[]= 'Editar';
$tableHeaders[]= 'Remover';

$tableCells = [];
if( !empty($dados)){
    foreach ($dados as $key => $dado){
        $tableCells[$key][] = Hash::get($dado, 'Pessoa.nome', '-');
        $tableCells[$key][] = Hash::get($dado, 'Pessoa.cpf', '-');
        $tableCells[$key][] = Hash::get($dado, 'Pessoa.endereco', '-');
        $tableCells[$key][] = $this->Html->link('editar',['controller' => 'pessoas', 'action' => 'editar', Hash::get($dado, 'Pessoa.id')]);
        $tableCells[$key][] = $this->Form->postLink('Remover', [ 'action' => 'delete', Hash::get($dado, 'Pessoa.id')], ['confirm' => ' Deseja realmente deletar o registro?']);
         
    }
}
?>
<table class="table table-striped table-sm">
    
<?php
    echo $this->Html->tableHeaders($tableHeaders);
    echo $this->Html->tableCells($tableCells);
?>
</table>