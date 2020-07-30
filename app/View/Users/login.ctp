<div class="login-form">
    <?php echo $this->Form->create(); ?>
        <h3 class="card-title text-center">LOGIN FORM</h3>
        <div class="form-group">
          <?php echo $this->Form->input('email', array('class'=>'form-control', 'required')); ?>
        </div>
        <div class="form-group">
        <?php echo $this->Form->input('password', array('class'=>'form-control', 'required')); ?>
        </div>
        <div align="center">
            <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
        </div>
    <?php echo $this->Form->end(); ?>
    <div class="text-center small" style="color:white;">Don't have an account? <?php echo $this->Html->link(__('Sign Up'), array('action' => 'add')); ?></div>
</div> 
