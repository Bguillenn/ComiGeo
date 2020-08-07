<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi vista</title>
</head>
<body>
	<form action="{{ route('ubigeo.import.excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif

            <input type="file" name="file">

            <button>Importar Ubigeo</button>
    </form>
    <form action="{{ route('comisarias.import.excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif

            <input type="file" name="file">

            <button>Importar Comisarias</button>
    </form>
    <form action="{{ route('denuncias.import.excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif

            <input type="file" name="file">

            <button>Importar Denuncias</button>
    </form>
</body>
</html>