<?php

$title = empty($title) ? 'Cadastro de Pessoa' : $title ;
?>

<h2><?php echo $title; ?></h2>
<?php echo $this->Form->create('Pessoa',['class'=>'form-group']); ?>
<div class="mb-5">
    <div class="row mb-3">

        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-5">
            <?= $this->Form->input('Pessoa.nome', ['type'=> 'text', 'label'=> false, 'class'=>'form-control', 'required' => false]);?>
        </div>
    </div> 
    <div class="row mb-3">
        <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
        <div class="col-sm-5">
            <?= $this->Form->input('Pessoa.cpf', ['type' => 'text','label' => false, 'class' => 'form-control', 'required' => false]);?>
        </div>
    </div>
    <div class="row mb-3">
        <label for="endereco" class="col-sm-2 col-form-label">Endereço</label>
        <div class="col-md-3">
            <?= $this->Form->input('Pessoa.endereco', ['type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false]);?>
        </div>
    </div>
</div>

<?php
    echo $this->Form->input('Pessoa.id', ['type' => 'hidden']);  
    echo $this->Form->submit('Salvar',['class'=>'btn btn-primary mb-3']); 
    echo $this->Form->end(); 
?>

<script>

    $("#PessoaCpf").on('keyup', function () {
        var src = this;
        var valor = src.value;
        src.setAttribute("maxlength", "14");
        if (valor.length == 3 || valor.length == 7)
            src.value += ".";
        if (valor.length == 11)
            src.value += "-";
    });
    $("#PessoaNome").blur(function () {
        var src = this;
        var pessoaNome = src.value;
        palavraCaptalizada = pessoaNome.toLowerCase().replace(/(?:^|\s)\S/g, function (arg) {
            return arg.toUpperCase();
        });
        src.value = palavraCaptalizada;
    });

</script>
