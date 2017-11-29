document.addEventListener('DOMContentLoaded', function(){

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').attr('style','display:block');
        }

        reader.readAsDataURL(input.files[0]);
    }
}


var ajaxSubmission = function(data){
  var info = data;
  
}


$("#imgInp").change(function(){
    readURL(this);
});
});