<?php


class Doctupload_SVR
{
	function __constant()
	{

	}
    function startupload_many($file,$destination,$fileformname)
    {
       $filenames=array();
        if(($file[$fileformname]['name'][0])!="")
        {
            if(count($file[$fileformname]['size']>1))
            {
                for($j=0;$j<count($file[$fileformname]['name']);$j++)
                {
                    $RandomNumber = time();
                   $target_file = basename($_FILES[$fileformname]['name'][$j]);
                    $filename = $RandomNumber . $target_file;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $result = move_uploaded_file($_FILES[$fileformname]['tmp_name'][$j],$destination . "/$filename");
                    array_push($filenames, $filename);
                }
            }
        }
        return $filenames;
    }

    function startupload_single($file,$destination,$fileformname)
    {
        $filename="-";
        if(($file[$fileformname]['name'])!=""){
            $RandomNumber = time().rand();
            $imageFileType = pathinfo( basename($_FILES[$fileformname]['name']), PATHINFO_EXTENSION);
            $filename = $RandomNumber . ".".$imageFileType;
            chmod($destination, 0755);
            $result = move_uploaded_file($_FILES[$fileformname]['tmp_name'], $destination . "/$filename");
        }
        return  $filename;
    }

}