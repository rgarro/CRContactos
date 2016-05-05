<?php
/**
 * Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2014, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users index">
	<h2><i class="fa-icon-group"></i> <?php echo __d('users', 'Users'); ?></h2>

	<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable table-hover">
	<thead>
		<th><i class="fa-icon-user"></i> <?php echo $this->Paginator->sort('username'); ?></th>
		<th><i class="fa-icon-calendar"></i> <?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions">&nbsp;</th>
	</thead>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) :
			$class = ' class="altrow"';
		endif;
		?>
		<tr<?php echo $class; ?>>
			<td><?php echo $this->Html->link($user[$model]['username'], array('action' => 'view', $user[$model]['id'])); ?></td>
			<td><?php echo $user[$model]['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('users', 'View'), array('action' => 'view', $user[$model]['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>
<?php echo $this->element('Users.Users/sidebar'); ?>
