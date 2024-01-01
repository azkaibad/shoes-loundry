@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">
    <div class="table-wrapper ">
      <div class="table-title m-3">
        <div class="row">
          <div class="col-sm-10">
              <h2>Review <b>Pelanggan</b></h2>
          </div>
  </div>
</div>
  <div class="row">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pelanggan</th>
              <th>Kode Pesanan</th>
              <th>Rating</th>
              <th>Komentar</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td >{{ $review->pesanan->kode_pesanan }}</td>
                    <td>{{ $review->rating }}/5</td>
                    
                    <td>{{ $review->komentar }}</td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  </div>
  </div>

@endsection