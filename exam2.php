<?php

	session_save_path("./sess");
	session_start();

	include "config.php";
?>

<div class="container">
		<div class="row">

				<?php
					if(isset($_SESSION[$sessId]))
					{
						?>
						<script>
							function goLogout()
							{
								location.href='logout.php';
							}
						</script>

						<?php

						echo "
						<div class=\"col text-end\">
							<span class='text-primary fw-bold'>$_SESSION[$sessName]</span> 님 
							<button type='button' class='btn btn-primary' onClick=goLogout() >Exit</button>
						</div>	
						";
					}else
					{
						?>
						<form method="post" action="login.php">
						<div class="col text-end">
							<input type="text" name="id" placehoder="ID">
							<input type="password" name="pass" placehoder="비밀번호">
							<button type="submit" class="btn btn-primary">로그인</button>
						</div>
						</form>

						<?php
					}
				?>
			
		</div>

	</div>
