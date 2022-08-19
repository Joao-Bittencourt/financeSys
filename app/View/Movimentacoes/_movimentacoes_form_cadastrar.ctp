<h2>Cadastro de Movimentação</h2>
<?php echo $this->Form->create('Movimentacao',['class'=>'form-group']); ?>
    <div class="mb-5">
        <div class="row mb-3">
     
            <label for="pessoa" class="col-sm-2 col-form-label">Pessoa</label>
            <div class="col-sm-5">
                <?php echo $this->Form->input('Movimentacao.pessoa_id',['label'=> false,'empty' => '- selecione', 'class'=>'form-control']);?>
            </div>
        </div> 
        <div class="row mb-3">
            <label for="numero_conta" class="col-sm-2 col-form-label">Numero da Conta</label>
            <div class="col-sm-5">
                <?php echo $this->Form->input('Movimentacao.conta_id', ['empty' => ' - selecione','label' => false, 'class' => 'form-control', 'required' => false]);?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="valor" class="col-sm-2 col-form-label">Valor</label>
            <div class="col-sm-5">
                <?php echo $this->Form->input('Movimentacao.valor', ['type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false]);?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="tipo_movimentacao" class="col-sm-2 col-form-label">Depositar / Sacar</label>
            <div class="col-sm-5">
                <?php echo $this->Form->input('Movimentacao.tipo_movimentacao', ['label' => false, 'options' => ['C' => 'Depositar', 'D' => 'Retirar'], 'empty' => '- selecione - ', 'class' => 'form-control', 'required' => false]);?>
            </div>
        </div>
    </div>
    
<?php 
    echo $this->Form->submit('Salvar',['class'=>'btn btn-primary mb-3']);
    echo $this->Form->end();
?>

<script>
 $("#MovimentacaoValor").on('keyup',function () {
        var src = this;
        var valorValue = src.value;
        var valorFormatado = Formatar(valorValue);
        src.value = valorFormatado;
                  
        function Formatar(valor)
            {
                const v = ((valor.replace(/\D/g, '') / 100).toFixed(2) + '').split('.');

                const m = v[0].split('').reverse().join('').match(/.{1,3}/g);

                for (let i = 0; i < m.length; i++)
                    m[i] = m[i].split('').reverse().join('') + '.';

                const r = m.reverse().join('');

                return r.substring(0, r.lastIndexOf('.')) + ',' + v[1];
            }        
    });
</script>