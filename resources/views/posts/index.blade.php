<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Manage Posts</h1>
                <a href="{{ route('post.create') }}" class="btn btn-success" style="float: right">Create Post</a>
                <table class="table table-bordered">
                    <thead>
                        <th width="80px">Id</th>
                        <th>Title</th>
                        <th width="150px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View Post</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
       
                </table>
            </div>
        </div>
    </div>
</body>
</html>