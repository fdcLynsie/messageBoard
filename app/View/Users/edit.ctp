<div class="edit-form">    
	<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','type'=>'file')); ?>
		<h3 class="card-title text-center">EDIT FORM</h3>
		<div align="center">
			<img id="previewImg" src="https://image.ibb.co/k6XBpp/profil_img.jpg" style="width: 50%; height: 50%;" >
			<!-- <?php echo $this->Html->image($loggedinUser['User']['image'], array('border' => '0','width'=>'100%', 'height'=>'100%')); ?> -->
		</div>
		<?php echo $this->Form->input('image',array('type'=>'file')); ?>
		<?php	echo $this->Form->input('name');?>
		<?php	
			$options = array('0' => 'Select Gender','1' => 'Male', '2' => 'Female');
			echo $this->Form->input('gender', array('type'=>'select','options'=>$options));
		?>
		<?php	echo $this->Form->input('birthdate',array('type'=>'text','id'=>'date-pick'));?>
		<?php	echo $this->Form->input('hubby');?>
		
		<div align="center">
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	<?php echo $this->Form->end(); ?>
</div> 


<script>
	$(document).ready(function() {
		function previewFile(input){
			var file = $("input[type=file]").get(0).files[0];
	
			if(file){
				var reader = new FileReader();
	
				reader.onload = function(){
					$("#previewImg").attr("src", reader.result);
				}
				reader.readAsDataURL(file);
			}
		}
		$('#UserImage').change(function () {
			//after clicking the choose file it will display the picture
			previewFile(this);
		})

		$('#date-pick').datepicker({
			dateFormat: "yy-mm-dd",
		});	
	});
</script>