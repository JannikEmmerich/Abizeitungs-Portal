<?php
	$ps = $mysqli->prepare("SELECT username FROM users WHERE id = ?");
	$ps->bind_param("s", $user);
	$ps->execute();
	$result = $ps->get_result();
	$arr = $result->fetch_assoc();
?>
			<div id="footer"> 
				<a href="#top" style="float:left">top</a>
				<div style="float:right">AbizeitungsPortal - <?php echo $arr['username']; ?></div>
			</div>
		</div>
	</body>
</html>
