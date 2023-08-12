import * as FilePond from "filepond";

import FilePondPluginImagePreview from "filepond-plugin-image-preview";

import FilePondPluginImageExifOrientation from "filepond-plugin-image-exif-orientation";

import FilePondPluginFileEncode from "filepond-plugin-file-encode";

import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";

let storageImages = [];

getStorageImages();

function getStorageImages() {
  const aux = localStorage.getItem("storageImages");
  if (aux) {
    storageImages = JSON.parse(aux);

    deleteFilesTmp();
  }
}

FilePond.registerPlugin(
  FilePondPluginFileEncode,
  FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview,
  FilePondPluginFileValidateType
);

// get a reference to the input elements
const inputMultipleElements = document.querySelector(
  ".filepond-input-multiple"
);

FilePond.setOptions({
  labelIdle:
    'Arrastra y suelta tu imagen o  <u style="cursor:pointer;">Selecciona</u>',
  imagePreviewHeight: 170,
  imageCropAspectRatio: "1:1",
  imageResizeTargetWidth: 200,
  imageResizeTargetHeight: 200,
  acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg", "video/mp4"],
  labelFileTypeNotAllowed: "Archivo no valido",
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

        storageImages = [...storageImages, response.key];
        localStorage.setItem("storageImages", JSON.stringify(storageImages));

        console.log(localStorage.getItem("storageImages"));

        return response.key;
      },
    },
    revert: "./revert",
  }
});

const pond = FilePond.create(inputMultipleElements);

async function deleteFilesTmp() {
  const url = "/deleteTmp";

  const response = await fetch(url, {
    method: "DELETE",
    body: JSON.stringify(storageImages),
    headers: {
      "Content-Type": "application/json",
    },
  });

  const result = await response.json();

  if (result.ok) {
    localStorage.removeItem("storageImages");
  }
}
