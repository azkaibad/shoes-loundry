@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h3 class=" fw-semibold mb-4">Dashboard</h3>
        <div class="row">
          <div class="col-md-4">
            <div class="card bg-primary">
              <a href="/userlist"><div class="card-body">
                <div class="row">
                  <div class="col-md-6 align-self-start">
                    <h5 class="text-center text-light font-weight-bold pt-2 pb-1">Data Pelanggan</h5>
                  </div>
                  <div class="col-md-6 align-self-end">
                    <h1 class="text-center text-light font-weight-bold pt-2 pb-1"><i class="ti ti-user"></i></h1>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          <div class="col-md-4">
            <div class="card bg-primary">
              <a href="/servicelist"><div class="card-body">
                <div class="row">
                  <div class="col-md-6 align-self-start">
                    <h5 class="text-center text-light font-weight-bold pt-2 pb-1">Jenis Pelayanan</h5>
                  </div>
                  <div class="col-md-6 align-self-end">
                    <h1 class="text-center text-light font-weight-bold pt-2 pb-1"><i class="ti ti-box "></i></h1>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          <div class="col-md-4">
            <div class="card bg-primary">
              <a href="/listsepatu"><div class="card-body">
                <div class="row">
                  <div class="col-md-6 align-self-start">
                    <h5 class="text-center text-light font-weight-bold pt-2 pb-1">Data Jenis Sepatu</h5>
                  </div>
                  <div class="col-md-6 align-self-end">
                    <h1 class="text-center text-light font-weight-bold pt-2 pb-1"><i class="ti ti-shoe "></i></h1>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          <div class="col-md-4">
            <div class="card bg-primary">
              <a href="/pesananlist"><div class="card-body">
                <div class="row">
                  <div class="col-md-6 align-self-start">
                    <h5 class="text-center text-light font-weight-bold pt-2 pb-1">Data Pemesanan</h5>
                  </div>
                  <div class="col-md-6 align-self-end">
                    <h1 class="text-center text-light font-weight-bold pt-2 pb-1"><i class="ti ti-file-description "></i></h1>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          <div class="col-md-4">
            <div class="card bg-primary">
              <a href="/pesananselesai"><div class="card-body">
                <div class="row">
                  <div class="col-md-6 align-self-start">
                    <h5 class="text-center text-light font-weight-bold pt-2 pb-1">Pesanan Selesai</h5>
                  </div>
                  <div class="col-md-6 align-self-end">
                    <h1 class="text-center text-light font-weight-bold pt-2 pb-1"><i class="ti ti-file-invoice "></i></h1>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          <div class="col-md-4">
            <div class="card bg-primary">
              <a href="/reviewlist"><div class="card-body">
                <div class="row">
                  <div class="col-md-6 align-self-start">
                    <h5 class="text-center text-light font-weight-bold pt-2 pb-1">Review Pelanggan</h5>
                  </div>
                  <div class="col-md-6 align-self-end">
                    <h1 class="text-center text-light font-weight-bold pt-2 pb-1"><i class="ti ti-message "></i></h1>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>
@endsection