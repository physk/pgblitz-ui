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
                $jsonArray[$file->status][$file->filebase]["upload"] = array("percent"=> $matches[1], "rate"=>$matches[2], "time"=>$matches[3]); 
            }
            else {
                $jsonArray[$file->status][$file->filebase]["upload"] = array("percent"=>"100%", "rate"=>"0MB/s", "time"=>"0s");
            }
        }
        if($file->status == "done") {
            $startime = new DateTime();
            $startime->setTimestamp($file->starttime);
            $endtime = new DateTime();
            $endtime->setTimestamp($file->endtime);
            $interval = $startime->diff($endtime);
            $hours = $interval->format("H");
            $min = $interval->format("i");
            $sec = $interval->format("s");
            $timetaken = "";
            if($hours > 0) {
                $timetaken .= $hours . "h ";
            }
            if($min > 0) {
                $timetaken .= $min . "m ";
            }
            $timetaken .= $sec . "s";
            $jsonArray[$file->status][$file->filebase]["timetaken"] = $timetaken;
        }
                                                    
    }
}
if(!is_array($jsonArray)){
    $jsonArray = array(
        "moving"=>"null",
        "uploading"=>"null",
        "vfs"=>"null",
        "done"=>"null"
    );
}
if(!is_array($jsonArray["moving"]))
{
    $jsonArray["moving"] = null;
}
if(!is_array($jsonArray["uploading"]))
{
    $jsonArray["uploading"] = null;
}
if(!is_array($jsonArray["vfs"]))
{
    $jsonArray["vfs"] = null;
}
if(!is_array($jsonArray["done"]))
{
    $jsonArray["done"] = null;
}
echo json_encode($jsonArray);