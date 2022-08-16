<!DOCTYPE html>
<html>
<head>
	<?php echo $this->element('header'); ?>	
</head>
<body class="bg-light">
    <main class="container">    
        <div class="card">
            
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo Router::url(['controller' => 'pessoas', 'action' => 'index']); ?>">Pessoa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Router::url(['controller' => 'contas', 'action' => 'index']); ?>">Conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Router::url(['controller' => 'movimentacoes', 'action' => 'index']); ?>">Movimentação</a>
                </li>
            </ul>
        </div>
        
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <?php echo $this->fetch('script'); ?>
        <?php echo $this->fetch('css'); ?>
    </main>
</body>
</html>
 
