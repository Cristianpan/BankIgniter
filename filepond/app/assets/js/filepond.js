import * as FilePond from 'filepond'; 
// PLUGINS
//  image-preview
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
// ----
// validate-size
import FilePondPluginImageValidateSize from 'filepond-plugin-file-validate-size';
// ----
// exif-ofientation
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
// ----
// file-encode
import FilePondPluginFileEncode from 'filepond-plugin-file-encode';
// ---- 


FilePond.registerPlugin(
    // encodes the file as base64 data
    FilePondPluginFileEncode,
    // validates the size of the file
    FilePondPluginImageValidateSize,
    // corrects mobile image orientation
    FilePondPluginImageExifOrientation,
    // previews dropped images
    FilePondPluginImagePreview
);
    
    
// get a reference to the input elements
const inputMultipleElements = document.querySelectorAll('.filepond-input-multiple');

FilePond.setOptions({
    labelIdle: 'Arrastra y suelta tu imagen o  <u style="cursor:pointer;">Selecciona</u>',
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,


    server: {
        url: window.location,
        process: {
            url: '/process',
            method: 'POST',
            onload: (response) => {
                response = JSON.parse(response);
                console.log(response);
                return response.key;
            }
        },
        revert: './revert',
    }
});


// loop over input elements
Array.from(inputMultipleElements).forEach(function(inputElement) {
    // create a FilePond instance at the input element location
    const pond = FilePond.create(inputElement);
    pond.on('processfile', (err, file) => {
        if(!err) {
            console.log('Archivo procesado', file);
        } else {
            console.error("Error al procesar el archivo: ", err);
        }
    });
});