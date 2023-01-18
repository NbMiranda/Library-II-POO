$(function(){
    $("#search").keyup(function(){
        let search = $(this).val();

        if(search != ''){
            
            var dados = {
                palavra : search
            }
            $.post('/backend/operations/booksOperation.php', dados, function(retorna){
                $(".resultado").html(retorna);
            });
        }else if (search === ''){
            document.querySelector('.resultado').innerHTML = ""
        }

    })
});