$(document).ready(function() {
    editPicture('#edit-picture', '#preview-img-avatar');
    editPicture('#edit-picture-mobile', '#preview-img-avatar-mobile');

    function editPicture(editPictureId, previewAvatar) {
        $(editPictureId).change(function() {
            $('.edit-avatar').hide();
            $(previewAvatar).show();

            var file = $(editPictureId).get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $(previewAvatar).attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        });
    }
});
