<div class="marcas view">
	<div class="box-header btn-minimizeb  " data-original-title>
						<h2><i class="fa-icon-star"></i><span class="break"></span> <?php echo __('Marca'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
	<dl>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($marca['Marca']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo File'); ?></dt>
		<dd>
			<?php echo $this->Html->image("{$marca['Marca']['logo_file']}/{$marca['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid"));?>
		</dd>
	</dl>
</div>
</div>
<div class="actions">
	
	<ul>
		<li><?php echo $this->Html->link("<i class='fa-icon-pencil'></i> ".__('Edit Marca'), array('action' => 'edit', $marca['Marca']['id']),array('type' => 'button',
    'class' => 'btn btn-primary btn-small',
    'escape' => false)); ?> </li>
		
		<li><?php echo $this->Html->link("<i class='fa-icon-plus'></i> ".__('New Marca'), array('action' => 'add'),array('type' => 'button',
    'class' => 'btn btn-success btn-small',
    'escape' => false)); ?> </li>
	
	
	<li><?php echo $this->Form->postLink("<i class='fa-icon-trash'></i> ".__('Delete'), array('action' => 'delete', $this->Form->value('Marca.id')), array('type' => 'button',
    'class' => 'btn btn-danger btn-small',
    'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Marca.id'))); ?></li>
		<li>
			<?php echo $this->Html->link("<i class='fa-icon-tasks'></i> ".__('List Marcas'), array('action' => 'index'),array('type' => 'button',
    'class' => 'btn btn-primary btn-small',
    'escape' => false)); ?>
		</li>
	
	</ul>
</div>
