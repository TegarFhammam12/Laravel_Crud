@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('BukuController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="judul" class="form-control" value="{{$data->judul}}" placeholder="Judul Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="pengarang" class="form-control" value="{{$data->pengarang}}" placeholder="Pengarang Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="kategori" class="form-control" value="{{$data->kategori}}" placeholder="Kategori Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="tahunTerbit" class="form-control" value="{{$data->tahunTerbit}}" placeholder="Tahun Terbit Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="penerbit" class="form-control" value="{{$data->penerbit}}" placeholder="Penerbit Buku" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>

@endsection