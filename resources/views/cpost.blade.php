<!DOCTYPE html>
<html>
<head>
    <title>Formulir For something</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classy Form Template</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #E1D9D1;
        }
        .card{
            background-color: #71797E ;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <h1> Add a new Post</h1>
            </div>
            <div class="card">
                <div class="card-body">
                        <form action="/cpost" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="user">user:</label>
        <input type="text" name="user" class="form-control" required><br>
        </div>
        <div class="form-group">
        <label for="title">title:</label>
        <input type="text" name="title" class="form-control" required><br>
        </div>
        <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg" required><br>
        </div>
        <div class="form-group">
        <label for="caption">Caption:</label>
        <textarea name="caption" rows="4" class="form-control"></textarea><br>
        </div>
        <input type="submit" value="Add a new post" class="btn btn-light">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>