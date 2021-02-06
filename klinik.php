<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 
	<h2>Data BANDARA</h2>
	<br/>
	<a href="insert.php">+ TAMBAH DATA</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>Poliklinik</th>
			<th>Jumlah Antrian</th>
		</tr>
		<?php 
        include 'connection.php';
        
		$data = mysqli_query($koneksi->connect,"SELECT * from clinic");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['name_clinic']; ?></td>
				<td><?php echo $d['queue']; ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>