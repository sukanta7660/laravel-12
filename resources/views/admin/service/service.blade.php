@extends('layouts.admin_master')
@section('title','All Sevices')
@section('content')
<div class="row">
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="{{action('Admin\Service\ServiceController@create')}}" class="btn btn-primary btn-sm">Add a new Seervice</a></h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>User</th>
                <th>Publish Date</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
              @foreach ($services as $key => $item)
              <tr>
                <td>{{$i++}}</td>
                @php
                    $path = $item->image == 'default.jpg' ? asset('default/default.jpg') : asset('uploads/services/'.$item->image);
                @endphp
                <td>
                    <img src="{{$path}}" alt="" srcset="" width="50" height="30">
                </td>
                <td>{{$item->title}}</td>
                <td>{{$item->decription}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{date('F d, Y H:i a',strtotime($item->created_at))}}</td>
                <td class="text-right">
                    <a href="{{action('Admin\Service\ServiceController@update_page',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Are you sure to delete?')" href="{{action('Admin\Service\ServiceController@delete',$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$services->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
