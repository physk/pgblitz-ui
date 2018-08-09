$(document).ready(function() {
    function update() {
        $.getJSON("get_data.php", function(json){
                var data = sortData(re)
                var $table = $('#filterTable');
                $table.find('tbody').empty().append($bodyContent);
        });
    }
    
});