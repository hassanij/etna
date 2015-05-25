$("#acheter").on('click', function(){
    $.ajax({
       url: 'pathToPhpFile.php',
       dataType: 'json',
       success: function(data){
            //data returned from php
       }
    });
)};