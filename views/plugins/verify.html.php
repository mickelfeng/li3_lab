<h2><?=$this->title('Add Plugin');?></h2>

<?php $errors = $plugin->errors(); ?>

<div id="add-form" class="tab-page">
<h3>Verify</h3>
<?php
echo $this->form->create($plugin, array('method' => 'POST', 'url' => $url));

	if (isset($plugin->id) && isset($plugin->rev)) {
		echo $this->form->hidden('id');
		echo $this->form->hidden('rev');
	}
	?>
	<div class="input">
		<?php
			echo $this->form->label('name', 'Plugin Name', array('class' => 'required'));
			echo $this->form->text('name');
			if (isset($errors['name'])) {
				echo '<p style="color:red">' . implode(', ', $errors['name']) . '</p>';
			}
		?>
	</div>
	<div class="input">
		<?php
			echo $this->form->label('version', 'Version', array('class' => 'required'));
			echo $this->form->text('version');
			if (isset($errors['version'])) {
				echo '<p style="color:red">' . implode(', ', $errors['version']) . '</p>';
			}
		?>
	</div>
	<div class="input">
		<?php
			echo $this->form->label('summary', 'Summary', array('class' => 'required'));
			echo $this->form->text('summary');
			if (isset($errors['summary'])) {
				echo '<div style="color:red">' . implode(', ', $errors['summary']) . '</div>';
			}
		?>
	</div>
	<div class="input">
		<?php
			echo $this->form->label('description', 'Description');
			echo $this->form->textarea('description', array('cols' => 40, 'rows' => 10));
			if (isset($errors['description'])) {
				echo '<div style="color:red">' . implode(', ', $errors['description']) . '</div>';
			}
		?>
	</div>
	<div class="input">
		<?php
			if (isset($errors['sources'])) {
				echo '<div style="color:red">' . implode(', ', $errors['sources']) . '</div>';
			}
			echo $this->form->multi('sources');
		?>
	</div>
	<div class="input">
		<fieldset id="maintainers">
			<legend>Maintainers</legend>
		<?php
			if (isset($errors['maintainers'])) {
				echo '<div style="color:red">' . implode(', ', $errors['maintainers']) . '</div>';
			}
			echo $this->form->multi('maintainers', array('name', 'email', 'website'));
		?>
		</fieldset>
	</div>
	<div class="buttons">
	<?php
		echo $this->form->submit('save', array('name' => 'verified'));
		echo $this->form->submit('cancel', array('value' => 'cancel'));
	?>
	</div>
</form>

</div>
<?php
$this->scripts(
<<<'script'
	$(document).ready(function() {
		$(".sources").input_list();
		$(".maintainers").input_list();
	});
script
);
?>