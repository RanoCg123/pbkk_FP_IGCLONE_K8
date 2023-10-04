@extends('layouts.mainLayout')

@section('container')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <h1> Add a new Post</h1>
                </div>
                <div class="card bg-light">
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
                            <input type="submit" value="Add a new post" class="btn btn-dark">
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection