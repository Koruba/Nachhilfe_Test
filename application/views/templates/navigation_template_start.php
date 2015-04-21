<li>
    <a class="w active" href="<?php echo base_url().'index.php/course'; ?>">Start</a>
</li>
<?php
if ($this->session->userdata('login') != TRUE)
{
?>
	<li>
		<a class="w" href="<?php echo base_url().'index.php/user/login'; ?>">Login</a>
	</li>
<?php
}

if ($this->session->userdata('login') == TRUE)
{
?>
	<li>
		<a class="w" href="<?php echo base_url().'index.php/user/detail'; ?>">Nutzerbereich</a>
	</li>
	<li>
		<a class="w" href="<?php echo base_url().'index.php/user/logout'; ?>">Logout</a>
	</li>
<?php
}

if ($this->session->userdata('login') != TRUE)
{
?>
	<li>
		<a class="w" href="<?php echo base_url().'index.php/user/register'; ?>">Registrieren</a>
	</li>
<?php
}
?>
::after