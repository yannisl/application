<h1>Entering user data</h1>

<?php echo $this->validation->error_string;?>

<?php echo form_open('email');?>

<p>First Name <input type="text" name="firstname" value="<?php echo $this->validation->firstname;?>" size="50" /></p>

<p>Last Name <input type="text" name="lastname" value="<?php echo $this->validation->lastname;?>" size="50" /></p>

<p>Email <input type="text" name="email" value="<?php echo $this->validation->email;?>" size="50" /></p>

<p><input type="submit" value="Send Data" /></p>

</form>