<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hubby'); ?></dt>
		<dd>
			<?php echo h($user['User']['hubby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Login Time'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_login_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Ip'); ?></dt>
		<dd>
			<?php echo h($user['User']['created_ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified Ip'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified_ip']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Messages'); ?></h3>
	<?php if (!empty($user['Message'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('To Id'); ?></th>
		<th><?php echo __('From Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Message'] as $message): ?>
		<tr>
			<td><?php echo $message['id']; ?></td>
			<td><?php echo $message['user_id']; ?></td>
			<td><?php echo $message['to_id']; ?></td>
			<td><?php echo $message['from_id']; ?></td>
			<td><?php echo $message['content']; ?></td>
			<td><?php echo $message['created']; ?></td>
			<td><?php echo $message['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'messages', 'action' => 'view', $message['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'messages', 'action' => 'edit', $message['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'messages', 'action' => 'delete', $message['id']), array('confirm' => __('Are you sure you want to delete # %s?', $message['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
