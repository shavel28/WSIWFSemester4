<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone PDF Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
</head>

<body>
    <h2>Dropzone PDF Upload in Laravel</h2>

    <form action="{{ route('pdf_store') }}" class="dropzone" id="pdf-upload" enctype="multipart/form-data">
        @csrf
    </form>

    <button type="button" id="button" class="btn btn-primary">Upload</button>

    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#pdf-upload', {
            maxFilesize: 10, // Maksimal ukuran file (MB)
            acceptedFiles: ".pdf",
            addRemoveLinks: true,
            autoProcessQueue: false,
            parallelUploads: 10, // Perbolehkan upload hingga 10 file sekaligus
            uploadMultiple: false, // unggah file satu" dlm req terpisah
            paramName: "file[]", // Nama parameter untuk form
            maxFiles: 10, // Izinkan maksimal 10 file
            init: function () {
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on('sending', function (file, xhr, formData) {
                    var data = $('#pdf-upload').serializeArray();
                    $.each(data, function (key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            }
        });

    </script>
</body>

</html>