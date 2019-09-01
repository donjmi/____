

	<?php 
while $data = $modif_form->fetch()
	{
	?>

		<form action="" method="POST">
			<input type ="text" name="author" value="<?php echo $data['author']; ?>">
			<input type ="text" name="comment" value="<?php echo $data['comment']; ?>">
			<input type="submit" name="modifier">
		
		
		</form> 

<?php }?>