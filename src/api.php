<?php
include("tail.php");
foreach (new DirectoryIterator("/json") as $json) {
    if ($json->isFile() && !$json->isDot()) {
        $file = json_decode(file_get_contents("/json/".$json->getFileName()));
        $jsonArray[$file->status][$file->filebase] = array(
                                                        "GDSA"=>$file->gdsa,
                                                        "filedir"=>$file->filedir,
                                                        "filebase"=>$file->filebase
                                                    );
        if($file->status == "uploading") {
            $log = tailCustom($file->logfile, 6);
            preg_match("/([0-9\%]+) \/\d+\.\d+\w\, (\d+.\d+\w+\/s)\, ([0-9dhms]+)/", $log, $matches);
            if($matches)
            {
                //print_r($matches);
                $jsonArray[$file->status][$file->filebase]["upload"] = array("percent"=> $matches[1], "rate"=>$matches[2], "time"=>$matches[3]); 
            }
            else {
                $jsonArray[$file->status][$file->filebase]["upload"] = array("percent"=>"100%", "rate"=>"0MB/s", "time"=>"0s");
            }
        }
                                                    
    }
}
if(!is_array($jsonArray)){
    $jsonArray = array(
        "moving"=>null,
        "uploading"=>null,
        "vfs"=>null,
        "done"=>null
    );
}
echo json_encode($jsonArray);