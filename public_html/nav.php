<nav id="navBar" class="navElement">
		<?php 
		session_start();
		if(isset($_SESSION['username'])){
		
			echo "<div id='loginBlock' class='navLink'>";
			echo "logged in as <label>" . $_SESSION['username'] . "</label>";
			echo " <a href='logout.php'>log out</a>";
		}
		?>
		</div>
	</div>
</nav>

