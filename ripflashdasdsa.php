<?php
/*
|| Quick rip flash Gunny Zing by Snape Nguyen
|| Today 9-7-2014. Fuck trminhpc :))
*/
set_time_limit (0);

// PHAN NAY KHAI BAO THONG TIN CAN THIET. KHUYEN KHICH DE THEO MAC DINH
$link_res = "http://ddt-a.akamaihd.net/flash/"; # link resource cua zing (hoac cua mot site nao do)
$folder_save = "newflashbr77/"; # thu muc chua flash moi khi he thong tu tai ve
$folder_flash = "newflashbr337v9/"; # thu muc chua flash cu~ (bat cu flash cua phien ban nao cung duoc)

$language = "portugal/"; // ngon ngu file swf (neu rip cua zing thi cu de vietnam. cua nuoc khac thi thay vo cho phu hop)

// cai nay khong biet code thi dung` cham zo nhe loi~ dey"
$folder_flash_ui = 'ui/'.$language;
$folder_flash_swf = 'ui/'.$language.'swf/';
$folder_flash_xml = 'ui/'.$language.'xml/';


// ham save hinh anh
function saveFile($linkdown, $linksave) {
	// content file
	$isOkey = false;
	global $link_res;

	$contents = file_get_contents($link_res.$linkdown);
	if($contents != NULL) {
		// save file
		$savefile = fopen($linksave, 'w');
		fwrite($savefile, $contents);
		fclose($savefile);
		$isOkey = true;
	}
	return $isOkey;
}

// ham lay danh sach cac tap tin trong thu muc
function list_files($directory = '.')
{
	$filelist = array();
    if ($directory != '.')
    {
        $directory = rtrim($directory, '/') . '/';
    }
    
    if ($handle = opendir($directory))
    {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != '.' && $file != '..')
            {
                $filelist[] = $file;
            }
        }
        
        closedir($handle);
    }

    return $filelist;
}

// tien hanh rip flash
// lay danh sach cac file trong root
$file_1 = list_files($folder_flash);
if(count($file_1) > 0) {
	// tien hanh rip
	foreach ($file_1 as $fileDown) {
		# duyet tat ca cac file roi save lai vao thu muc flash moi
		$save = saveFile($fileDown, $folder_save.$fileDown);
		if($save) {
			echo '<font color="blue">Download '.$folder_flash.$fileDown.' success!</font><br/>';
		} else {
			echo '<font color="red">Download '.$folder_flash.$fileDown.' ERROR!!!</font><br/>';
		}
	}
} else {
	echo '<font color="green">Folder '.$folder_flash.' not have files for download.</font><br/>';
}

// lay file trong thu muc ui/language
$file_2 = list_files($folder_flash.$folder_flash_ui);
if(count($file_2) > 0) {
	// tien hanh rip
	foreach ($file_2 as $fileDown) {
		# duyet tat ca cac file roi save lai vao thu muc flash moi
		$save = saveFile($folder_flash_ui.$fileDown, $folder_save.$folder_flash_ui.$fileDown);
		if($save) {
			echo '<font color="blue">Download '.$folder_flash.$folder_flash_ui.$fileDown.' success!</font><br/>';
		} else {
			echo '<font color="red">Download '.$folder_flash.$folder_flash_ui.$fileDown.' ERROR!!!</font><br/>';
		}
	}
} else {
	echo '<font color="green">Folder '.$folder_flash.$folder_flash_ui.' not have files for download.</font><br/>';
}

// lay file trong thu muc ui/language/swf
$file_3 = list_files($folder_flash.$folder_flash_swf);
if(count($file_3) > 0) {
	// tien hanh rip
	foreach ($file_3 as $fileDown) {
		# duyet tat ca cac file roi save lai vao thu muc flash moi
		$save = saveFile($folder_flash_swf.$fileDown, $folder_save.$folder_flash_swf.$fileDown);
		if($save) {
			echo '<font color="blue">Download '.$folder_flash.$folder_flash_swf.$fileDown.' success!</font><br/>';
		} else {
			echo '<font color="red">Download '.$folder_flash.$folder_flash_swf.$fileDown.' ERROR!!!</font><br/>';
		}
	}
} else {
	echo '<font color="green">Folder '.$folder_flash.$folder_flash_swf.' not have files for download.</font><br/>';
}

// lay file trong thu muc ui/language/xml
$file_4 = list_files($folder_flash.$folder_flash_xml);
if(count($file_4) > 0) {
	// tien hanh rip
	foreach ($file_4 as $fileDown) {
		# duyet tat ca cac file roi save lai vao thu muc flash moi
		$save = saveFile($folder_flash_xml.$fileDown, $folder_save.$folder_flash_xml.$fileDown);
		if($save) {
			echo '<font color="blue">Download '.$folder_flash.$folder_flash_xml.$fileDown.' success!</font><br/>';
		} else {
			echo '<font color="red">Download '.$folder_flash.$folder_flash_xml.$fileDown.' ERROR!!!</font><br/>';
		}
	}
} else {
	echo '<font color="green">Folder '.$folder_flash.$folder_flash_xml.' not have files for download.</font><br/>';
}

?>