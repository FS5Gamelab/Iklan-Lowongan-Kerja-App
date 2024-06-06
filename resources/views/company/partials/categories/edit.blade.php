@extends('company.main')
@section('konten')
    <div class="row">
        <div class="col col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Kategori</h3>
                    </ul>
                </div>
                <form method="POST" action="{{ route('company-category.update',$category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" value="{{ old('nama_kategori',$category->categoryName) }}"
                                class="form-control  @error('nama_kategori') is-invalid @enderror" name="nama_kategori"
                                id="nama_kategori">
                            @error('nama_kategori')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Kategori</label>
                            <textarea rows="5" class="form-control @error('deskripsi_kategori') is-invalid @enderror"
                                name="deskripsi_kategori">{{ old('deskripsi_kategori',$category->categoryDescription) }}</textarea>
                            @error('deskripsi_kategori')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit Kategori</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <ul>
    @endsection


