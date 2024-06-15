<html>
<head>
 <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com
/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
 </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
 </script>
 <style>
.table{
border:2px solid black;
}
td,tr{
 
}
 </style>
</head>
<body>
<div class="container">
<table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Author</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>

        </tr>
        @foreach($books as $book)
        <tr>
        <td>{{ $book->id }}</td>
        <td> {{ $book->title}}</td>
            <td class="table-image">
        <img src="{{ asset($book->path) }}" alt="Image"style="width:'40px';height:40px"></td>
        <td>{{ $book->author }}</td>
        <td> {{ $book->description}}</td>
        <td>{{ $book->price}}</td>
         <td><a class='btn btn-sm'href="{{ route('books.edit', ['id'=>$book->id] )}}"style='background-color:purple;color:white;border:none;outline:none;font-size:20px;'><span class='glyphicon glyphicon glyphicon-edit'></span></a>
<a class='btn btn-default' href="{{ route('books.delete', ['id'=>$book->id] )}}"style='background-color:violet;color:white;border:none;outline:none;font-size:20px;'><span class='glyphicon glyphicon-trash'></span></a></td>
        </tr>
       @endforeach
 
</table>
</div>
</body>