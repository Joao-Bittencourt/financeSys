<?php

$title = empty($title) ? 'Cadastro de Conta' : $title ;

?>

<h2><?php echo $title; ?></h2>

    <?php echo $this->Form->create('Conta',['class'=>'form-group']); ?>
<div class="mb-5">
    <div class="row mb-3">

        <label for="pessoa" class="col-sm-2 col-form-label">Pessoa</label>
        <div class="col-sm-5">
                <?php echo $this->Form->input('Conta.pessoa_id',['label'=> false,'empty' => ' - selecione', 'class'=>'form-control']);?>
        </div>
    </div> 
    <div class="row mb-3">
        <label for="numero_conta" class="col-sm-2 col-form-label">Numero da Conta</label>
        <div class="col-sm-5">
                <?php echo $this->Form->input('Conta.numero_conta', ['type' => 'text','label' => false, 'class' => 'form-control', 'required' => false]);?>
        </div>
    </div>
</div>

<?php

echo $this->Form->input('Conta.id', ['type' => 'hidden']);
echo $this->Form->submit('Salvar',['class'=>'btn btn-primary mb-3']); 
echo $this->Form->end(); 
