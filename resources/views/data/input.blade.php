@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{url('data')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="judul" class="form-control" placeholder="Judul Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" />
   </div>
   <div class="form-group">
    <input type="text" name="kategori" class="form-control" placeholder="Kategori Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="tahunTerbit" class="form-control" placeholder="Tahun Terbit Buku" />
   </div>
   <div class="form-group">
    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection