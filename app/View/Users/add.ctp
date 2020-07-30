<div class="registration-form">    
	<?php echo $this->Form->create('User'); ?>
		<h3 class="card-title text-center">REGISTRATION FORM</h3>
		<?php
			echo $this->Form->input('name', array('class' => 'form-control', 'required'));?></br><?php
			echo $this->Form->input('email', array('class' => 'form-control', 'required'));?></br><?php
			echo $this->Form->input('password', array('class' => 'form-control', 'required'));?></br><?php
			echo $this->Form->input('confirm_password', array('type' => 'password','class' => 'form-control', 'required'));?></br><?php
		?>
		<div align="center">
			<button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
		</div>
	<?php echo $this->Form->end(); ?>
	<div class="text-center small" style="color:white;">Want to go back to Login form? <?php echo $this->Html->link(__('Click Me'), array('action' => 'login')); ?></div>
</div> 
