<?php
	if(!isset($_SESSION['id_user'])){
	echo "<script>
			alert(\"Anda Berhasil Logout\");
			document.location=\"../\"
		</script>";
	}
	else{unset($_SESSION['id_user']);
	echo "<script>
			alert(\"Anda Berhasil Logout\");
			document.location=\"../\"
		</script>";
	}
?>