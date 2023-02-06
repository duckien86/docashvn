<h1>Thống kê câu trả lời khảo sát</h1>
<br>

<?php
$stt_cauhoi = 0;
foreach ($result as $row) {
	if ($row['type'] == 'cauhoi') {
		$stt_cauhoi++;
		echo "<p><b>" . $stt_cauhoi . ". " . $row['noidung'] . "</b></p>";
		$stt_dapan = 0;
	} else {
		$stt_dapan++;
		echo "<p style='padding-left:20px'>" . $stt_dapan . ". " .  $row['noidung'] . " - <b>(Trả lời: " . $row['dem'] . ")</b></p>";
	}
}
?>