@extends('layouts.mainLayout')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3>Posts Data Table</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index => $data)
                            <tr>
                                <td>{{$index +1}}</td>
                                <td>{{$data->user}}</td>
                                <td>{{$data->title}}</td>
                                <td><img height="120" width="120" src="/public/storage/postimage/{{$data->picname}}"></td>
                                <td>{{$data->caption}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection