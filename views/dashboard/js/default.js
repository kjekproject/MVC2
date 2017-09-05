$(document).ready(function() {
   
    $.get('dashboard/xhrGetListings', function(e) {
        for (var i = 0; i < e.length; i++) {
             $('#listInserts').append('<div>' + e[i].text + '<a class="del" rel="' + e[i].id + '" href="#">X</a></div>');
        }
         
         
        $('.del').on('click', function() {
            delItem = $(this);
            var id = $(this).attr('rel');

            $.post('dashboard/xhrDeleteListing', {'id': id}, function(e) {
                delItem.parent().remove();
            }, 'json');
                
            return false;
        });
    
    }, 'json');
   
    $('#insert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        
        $.post(url, data, function(e) {
            $('#listInserts').append('<div>' + e.text + '<a class="del" rel="' + e.id + '" href="#">X</a></div>');
        }, 'json');
        
        return false;
    });
        
});

