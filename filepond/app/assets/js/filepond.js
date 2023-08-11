import * as FilePond from "filepond";

import FilePondPluginImagePreview from "filepond-plugin-image-preview";

import FilePondPluginImageExifOrientation from "filepond-plugin-image-exif-orientation";

import FilePondPluginFileEncode from "filepond-plugin-file-encode";

import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

FilePond.registerPlugin(
  FilePondPluginFileEncode,
  FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview, 
  FilePondPluginFileValidateType
);

// get a reference to the input elements
const inputMultipleElements = document.querySelectorAll(
  ".filepond-input-multiple"
);

FilePond.setOptions({
  labelIdle:
    'Arrastra y suelta tu imagen o  <u style="cursor:pointer;">Selecciona</u>',
  imagePreviewHeight: 170,
  imageCropAspectRatio: "1:1",
  imageResizeTargetWidth: 200,
  imageResizeTargetHeight: 200,
  acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg', 'video/mp4'],
  labelFileTypeNotAllowed : 'Archivo no valido',
  fileValidateTypeLabelExpectedTypes: `Se espera {allTypes}`,
  chunkUploads: true,
  chunkSize: 1000000,

  server: {
    url: window.location,
    process: {
      url: "/process",
      method: "POST",
      onload: (response) => {
        response =
          response instanceof XMLHttpRequest
            ? JSON.parse(response.responseText)
            : JSON.parse(response);

        console.log(response);

        return response.key;
      },
    },
    revert: "./revert",
  },
});

// loop over input elements
Array.from(inputMultipleElements).forEach(function (inputElement) {
  // create a FilePond instance at the input element location
  const pond = FilePond.create(inputElement);

  pond.on("error", (err, file) => {
    console.log(err, file); 
  })

});
