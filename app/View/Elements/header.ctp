<?php

echo $this->Html->charset(); ?>
<title>

		<?php echo $this->fetch('title'); ?>
</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('offcanvas');
		echo $this->Html->script('bootstrap.bundle.min');
                echo $this->Html->script('jquery-3.3.1.min');
                echo $this->Html->script('jquery-ui.min');
	?>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/">
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

