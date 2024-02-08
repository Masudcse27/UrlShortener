<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    @yield('primary_css')
    <title>Document</title>
</head>
<body>

@yield('primary_content')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
    $('#shortenUrlBtn').click(function () {
        $.ajax({
            url: '{{route("make.short")}}',
            type: 'POST',
            data: $('#urlShortenerForm').serialize(),
            dataType: 'json',
            success: function (response) {
                var shortenedUrl = response.shortened_url;
                var originalUrl =response.original_url
                $('#shortenedUrl').attr('href', shortenedUrl).text(shortenedUrl);
                $('#originalurl').attr('href', originalUrl).text(originalUrl);
                $('#shortenedUrlDiv').show();
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) { 
                    var errors = xhr.responseJSON.errors;
                    if (errors.hasOwnProperty('original_url')) {
                        $('#originalUrlError').text(errors.original_url[0]).show();
                        $('.form-control[name="original_url"]').addClass('is-invalid');
                    }
                }
                else if (xhr.status == 401) {
                    location.replace("{{ route('login') }}")
                } 
                else {
                    console.error(error);
                }
            }
        });
    });
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>