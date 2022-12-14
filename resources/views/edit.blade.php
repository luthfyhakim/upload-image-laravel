<!DOCTYPE html>
<html>

<head>
    <title>Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="row">
        <div class="container">
            <h2 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h2>

            <div class="col-lg-8 mx-auto my-5">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif

                <form action="/upload/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <b>File Gambar</b><br />
                        <img width="150px" src="{{ url('/data_file/' . $data->file) }}">
                        <input type="file" name="file">
                    </div>

                    <div class="form-group">
                        <b>Keterangan</b>
                        <textarea class="form-control" name="keterangan">{{ $data->keterangan }}</textarea>
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary">
                    <a href="/upload" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
