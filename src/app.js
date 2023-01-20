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

//Image display
const customFile = document.querySelector("#customFile");
var uploadedImage = "";

customFile.addEventListener("change", function(){
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        uploadedImage = reader.result;
        document.querySelector("#display").style.backgroundImage = `url(${uploadedImage})`;
    });
    reader.readAsDataURL(this.files[0]);
})
//Image display 2
const EditFile = document.querySelector("#EditFile");
var editImage = "";

EditFile.addEventListener("change", function(){
    const editReader = new FileReader();
    editReader.addEventListener("load", () => {
        editImage = editReader.result;
        document.querySelector("#Editdisplay").style.backgroundImage = `url(${editImage})`;
    });
    editReader.readAsDataURL(this.files[0]);
})