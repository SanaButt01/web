
<html>
<head>
 <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com
/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
 </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
 </script>
 <style>
 body {
   
            background-color:#1E1B26;
display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color:orange;
            color:white;
        }
   

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #1E1B26;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
      </style>
</head>
<body>


  <form action="{{$url}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>{{$title}}</h1>
    
   <div class="form-group" style="width:100%">
<label  for="text">Title</label>
<input type="text" name="title"class="form-control" value="{{$books->title ??''}}" placeholder="Enter title"/></div>

     <div class="form-group"style="width:100%">
     <label  for="">Image</label>
     @if(isset($books) && $books->path)
        <img src="{{ asset('storage/' . $books->path) }}" alt="Book Image" style="max-width: 200px; max-height: 200px;">
     
    @endif

    <!-- File upload input for book image -->
    <input type="file" name="path">
     {{--<input type="file"name="image"id=""class="form-control" placeholder="Enter image"/>--}}
   
        </div>
        <div class="form-group"style="width:100%">
<label  for="text">Author</label>
<input type="text" name="author"class="form-control" value="{{$books->author ??''}}" placeholder="Enter Author's name" /></div>

 <div class="form-group" style="width:100%">
<label  for="">Description</label>
<textarea name="description" id=""class="form-control"placeholder="Enter details">{{$books->description ??''}}</textarea></div>
<label  for="text">Price</label>
<input type="number" name="price"class="form-control" value="{{$books->price ??''}}"placeholder="Enter price"/></div>
<span class="text-danger">

</span>
 
 <div class="form-group" style="width:100%">
<button class="btn">{{ isset($books) ? 'Update Book' : 'Add Book' }}</button>
</div>
</form>
   