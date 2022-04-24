<html lang="en">
<head>
    <title>Utilizando Laravel 9 com Image Intervention</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>ops</strong> Houver algum problema no seu envio.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3 class="jumbotron">Teste Marcos Colombelli </h3>
    <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="form-group col-md-4">
                <input type="file" name="filename" class="form-control">
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-top:10px">Salvar</button>
                </div>
            </div>

            <div class="col-md-8">
                <textarea name="description" id="" cols="60" rows="4" placeholder="Descrição"></textarea>
            </div>
        </div>



    </form>

        <div class="row">
            <div class="col-md-6">
                <strong>Imagem Thumbnail:</strong>
            </div>
            <div class="col-md-6">
                <strong>Descrição:</strong>
            </div>
        </div>
        <div class="row">
            @if($image) 
                @foreach($image as $img)
                    <div class="col-md-6">
                        <br/>
                        <img src="/thumbnail/{{$img->filename}}"  />
                    </div>
                    <div class="col-md-6">
                        <p>{{ $img->description  }}</p>
                    </div>
                    {{--<div class="col-md-8">
                        <strong>Imagem Original:</strong>
                        <br/>
                        <img src="/images/{{$img->filename}}" />
                    </div>--}}
                @endforeach
            @endif
        </div>
</div>
</body>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</html>
