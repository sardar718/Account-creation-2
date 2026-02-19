<?php

$file = 'FileRun.zip';
if (!is_file($file)) {
	exit('The file "FileRun.zip" should be located next to this file, but it is not.');
}

$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {
  $rs = $zip->extractTo(getcwd());
	if ($rs) {
		@unlink($file);
		header('Location: ./');
	} else {
		echo 'This installer failed to extract the contents of the archive file "'.$file.'".<br>';
		echo $zip->getStatusString();
	}
} else {
  echo 'This installer failed to open the file "'.$file.'".';
}
