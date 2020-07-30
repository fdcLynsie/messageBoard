<div class="container-fluid user-profile">
  <div class="col-md-12">
	<div class="row">
		<div class="col-md-3">
		<div class="card" id="user">
			<div class="card-header">Profile ID: <?php echo $loggedinUser['User']['id'] ?> <?php echo $this->Html->link('Edit Profile',array('controller'=>'users','action'=>'edit',$loggedinUser['User']['id']), array('class'=>'action'));?></div>
				<?php 
					$img = $loggedinUser['User']['image'] != '' ? $loggedinUser['User']['image'] : '/img/user.png';
					switch($loggedinUser['User']['gender']){
						case 1;
							$gender='Male';
							break;
						case 2;
							$gender='Female';
							break;
						default;
							$gender='Not to Mention';
					}
				?>
				<?php echo $this->Html->image($img, array('border' => '0','width'=>'100%', 'height'=>'100%')); ?>
				<div class="card-block" align="center" style="margin-top: 5px;">
					<h4 class="card-title"><?php echo $loggedinUser['User']['name'] ?></h4>
					<div class="row mt-2">
						<div class="col">
							<i class="fa fa-envelope"></i> <?php echo $loggedinUser['User']['email'] ?>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col">Gender: <?php echo $gender ?></div>
					</div>
					<div class="row mt-2">
						<div class="col">Birthdate:  <?php echo date("F d, Y ",  strtotime($loggedinUser['User']['birthdate'])) ?></div>
					</div>
					<div class="row mt-2">
						<div class="col">Joined: <?php echo $loggedinUser['User']['created'] ?></div>
					</div>
					<div class="row mt-2">
						<div class="col">Last Login: <?php echo $loggedinUser['User']['last_login_time'] ?></div>
					</div>
					<div class="row mt-2">
						<div class="col">
							Hobby
							<textarea id="w3review" name="w3review" style="font-size: 12px">
								<?php echo $loggedinUser['User']['hubby'] ?>
							</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
		test2
		</div>
	</div>
  </div>
</div>