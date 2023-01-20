//Image display 2
const EditFile = document.querySelector("#EditFile");
var uploadedImage = "";

EditFile.addEventListener("change", function(){
    const editReader = new FileReader();
    editReader.addEventListener("load", () => {
        uploadedImage = editReader.result;
        document.querySelector("#Editdisplay").style.backgroundImage = `url(${uploadedImage})`;
    });
    editReader.readAsDataURL(this.files[0]);
})