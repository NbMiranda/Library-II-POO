$(function(){
    $("#search").keyup(function(){
        let search = $(this).val();

        if(search != ''){
            var dados = {
                palavra : search
            }
            $.post('/backend/searchUser.php', dados, function(retorna){
                $(".resultado").html(retorna);
            });
        }else if (search === ''){
            console.log("empty")
        }

    })
});