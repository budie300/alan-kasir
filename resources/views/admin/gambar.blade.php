 @extends('layouts.admin')

@section('css')
@endsection

@section('content')
 <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Gambar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="formupload" enctype="multipart/form-data" action="{{ url('fotos') }}" method="post">
                @csrf

                <div class="from-group">
                <label>Food ID</label>
                <select name="food_id" class="form-control">
                  @foreach($foods as $f)
                  <option value="{{ $f->id }}">{{ $f->name }}</option>
                  @endforeach
                </select>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="file" name="gambar" class="form-control" placeholder="Enter name" required="">
                  </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection