<?php

$tableHeaders = [];
$tableHeaders[]=  $this->Paginator->sort('Movimentacao.dt_movimento', 'Data');
$tableHeaders[]= $this->Paginator->sort('Movimentacao.valor_int', 'Valor');

$tableCells = [];
if( !empty($dados)){
    foreach ($dados as $key => $dado){
        $tableCells[$key][] = Hash::get($dado, 'Movimentacao.dt_movimento_formatado', '-');
        
        $valor = Hash::get($dado, 'Movimentacao.valor_formatado', '-');
        switch (Hash::get($dado, 'Movimentacao.tipo_movimentacao')){
            case 'D':
                $tableCells[$key][] = [$valor, ['class' => 'text-danger']];
                break;
            case 'C':
            default :
                $tableCells[$key][] = $valor;
        }
    }
}

?>
<h2>Extrato</h2>
<table class="table table-striped table-sm">
    
<?php
echo $this->Html->tableHeaders($tableHeaders);
echo $this->Html->tableCells($tableCells); 
?>
</table>
<h3>Saldo : R$ <?= $dados_total['Movimentacao']['saldo'];?></h3>