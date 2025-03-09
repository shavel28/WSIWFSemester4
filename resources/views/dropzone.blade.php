<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone Image Upload in Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2 class="text-center">Upload Multiple Images</h2>
        <form action="{{ route('dropzone.store') }}" class="dropzone" id="dropzone">
            @csrf
        </form>
        <button type="button" class="btn btn-primary mt-3" id="upload">Upload</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>

    <script>
        Dropzone.options.dropzone = {
            maxFilesize: 5, // ukuran maksimal 5MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false,
            parallelUploads: 10,
            init: function() {
                var submitButton = document.querySelector("#upload");
                var myDropzone = this;

                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue();
                });

                this.on("sending", function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                });
            }
        };
    </script>

</body>
</html>
