$(document).ready(function() {
    function update() {
        $.getJSON("https://pgblitz.mooncakemedia.co.uk/api.php", function(json){
                var data = [];
                data["moving"] = [];
                data["uploading"] = [];
                data["vfs"] = [];
                data["done"] = [];
                $.each( json, function( status, statusArray ) {
                    switch(status) {
                        case "moving":
                            console.log(statusArray);
                            if(statusArray !== null)
                            {
                                $.each( statusArray, function( file, array) {
                                    data["moving"].push( "<tr>");
                                    data["moving"].push( "  <td>" + array.filebase + "</td>" );
                                    data["moving"].push( "  <td>" + array.filepath + "</td>" );
                                    data["moving"].push( "  <td>" + array.gdsa + "</td>" );
                                    data["moving"].push( "  <td>/mnt/pgblitz/" + array.gdsa + "/" + array.filepath + "</td>" );
                                    data["moving"].push( "</tr>" );
                                });
                                
                            }
                            else {
                                data["moving"].push( "<tr>" );
                                data["moving"].push( "  <td class=\"text-muted\" colspan=\"4\">No entries found.</td>");
                                data["moving"].push( "</tr>" );
                            }
                            break;
                        case "uploading":
                            console.log(statusArray);
                            if(statusArray !== null)
                            {
                                $.each( statusArray, function( file, array ) {
                                    data["uploading"].push( "<tr>" );
                                    data["uploading"].push( "  <th>" + array["filebase"] + "</th>" );
                                    data["uploading"].push( "  <td>" + array["GDSA"] + "</td>" );
                                    data["uploading"].push( "  <td><div class=\"progress\"><div class=\"progress-bar progress-bar-striped progress-bar-animated bg-success\" role=\"progressbar\" aria-valuenow=\"" + array.upload["percent"] + "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: " + array.upload["percent"] + "\">" + array.upload["percent"] + "</div></div></td>" );
                                    if(array.upload["rate"] >= 70)
                                    {
                                        data["uploading"].push( "  <td>" + array.upload["rate"] + " <i class=\"fas fa-fighter-jet\" style=\"color:green; float:right;\"></i></td>" );
                                    }
                                    else if(array.upload["rate"] < 70 && array.upload["rate"] >= 40) {
                                        data["uploading"].push( "  <td>" + array.upload["rate"] + " <i class=\"fas fa-truck\" style=\"color:yellow; float:right;\"></i></td>" );
                                    }
                                    else {
                                        data["uploading"].push( "  <td>" + array.upload["rate"] + " <i class=\"fas fa-dolly\" style=\"color:red; float:right;\"></i></td>" );
                                    }
                                    data["uploading"].push( "  <td>" + array.upload["time"] + "</td>" );
                                    data["uploading"].push( "</tr>" );
                                });
                            }
                            else {
                                data["uploading"].push( "<tr>" );
                                data["uploading"].push( "  <td class=\"text-muted\" colspan=\"5\">No entries found.</td>");
                                data["uploading"].push( "</tr>" );
                            }
                            break;
                        case "vfs":
                            console.log(statusArray);
                            if(statusArray !== null)
                            {
                                $.each( statusArray, function( file, array ) {
                                    data["vfs"].push( "<tr>" );
                                    data["vfs"].push( "  <td>/tdrive" + array["filedir"] + array["filebase"] + "</td>" );
                                    data["vfs"].push( "</tr>" );
                                });
                                
                            }
                            else {
                                data["vfs"].push( "<tr>" );
                                data["vfs"].push( "  <td class=\"text-muted\">No entries found.</td>");
                                data["vfs"].push( "</tr>" );
                            }
                            break;
                        case "done":
                            console.log(statusArray);
                            if(statusArray !== null)
                            {
                                $.each( statusArray, function( file, array ) {
                                    data["done"].push( "<tr>" );
                                    data["done"].push( "  <td>/tdrive" + array["filedir"] + "/" + array["filebase"] +"</td>" );
                                    data["done"].push( "  <td>" + array["GDSA"] + "</td>" );
                                    data["done"].push( "  <td>" + array["timetaken"] + "</td>" );
                                    data["done"].push( "</tr>" );
                                });
                            }
                            else {
                                data["done"].push( "<tr>" );
                                data["done"].push( "  <td class=\"text-muted\" colspan=\"3\">No entries found.</td>");
                                data["done"].push( "</tr>" );
                            }
                            break;
                    }
                });
                for (var i in data)
                {
                    var bodyContent = data[i].join( "\n" );
                    console.log(bodyContent);
                    var $table = $('#' + i);
                    $table.find('tbody').empty().append(bodyContent); 
                }
        });
    }
    update();
    setInterval(update, 5000);
    console.log("Running");
});