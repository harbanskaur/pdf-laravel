<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{asset('assets/style.css')}}">
<body>
    <table class="table">
    <h2>Employe's Data : </h2>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Department</th>
        </tr>
        @foreach ($student as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->department}}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{url('pdf-generate')}}" class="link"><button>Generate Pdf</button></a>
</body>
</html>