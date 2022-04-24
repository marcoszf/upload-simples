<html lang="en">
<head>
    <title>Utilizando Laravel 9 com Image Intervention</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css">

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
</div>

<div class="container mt-5">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" width="1%">#</th>
            <th scope="col" width="15%">Imagem</th>
            <th scope="col">Descrição</th>
            <th scope="col" width="10%">Data de criação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($image as $img)
            <tr>
                <th scope="row">{{ $img->id }}</th>
                <td>
                    <a href="/images/{{$img->filename}}" data-lightbox="roadtrip">
                        <img src="/thumbnail/{{$img->filename}}"  />
                    </a>

                </td>
                <td>{{ $img->description }}</td>
                <td>{{ $img->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $image->links() !!}
    </div>
</div>
</body>
</html>

<style>
    svg {
        max-width: 20px;
    }

    p {
        margin-top: 1rem;
    }
</style>
