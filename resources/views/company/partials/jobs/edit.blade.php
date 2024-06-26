@extends('company.main')
@section('konten')
    <div class="row">
        <div class="col col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Lowongan Pekerjaan</h3>
            </ul>
                </div>
                <form method="POST" action="{{route('jobs.update',$jobs->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="job_title">Nama Pekerjaan</label>
                            <input type="text" value="{{ old('job_title', $jobs->jobTitle) }}" class="form-control  @error('job_title') is-invalid @enderror" name="job_title" id="job_title">
                            @error('job_title')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Pekerjaan</label>
                            <textarea rows="5" class="form-control @error('job_description') is-invalid @enderror" name="job_description">{{ old('job_description', $jobs->jobDescription) }}</textarea>
                            @error('job_description')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">KATEGORI</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $jobs->category_id ? 'selected' : '' }}>{{ $k->categoryName }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_require">Syarat Pekerjaan</label>
                            <input type="text" value="{{ old('job_require', $jobs->jobRequire) }}" class="form-control @error('job_require') is-invalid @enderror" name="job_require" id="job_require">
                            @error('job_require')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_location">Lokasi Kerja</label>
                            <input type="text" value="{{ old('job_location', $jobs->jobLocation) }}" class="form-control @error('job_location') is-invalid @enderror" name="job_location" id="job_location">
                            @error('job_location')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_type">Jenis Pekerjaan</label>
                            {{-- <input type="text" value="{{ old('job_type', $jobs->jobType) }}" class="form-control @error('job_type') is-invalid @enderror" name="job_type" id="job_type"> --}}
                         
                            <select name="job_type" id="job_type"  class="form-control">
                                <option value="wfh" {{ old('job_type', $jobs->jobType) == 'wfh' ? 'selected' : '' }} >WFH</option>
                                <option value="wfo" {{ old('job_type', $jobs->jobType) == 'wfo' ? 'selected' : '' }}>WFO</option>
                                <option value="hybrid" {{ old('job_type', $jobs->jobType) == 'hybrid' ? 'selected' : '' }} >Hybrid</option>
                            </select>
                            @error('job_type')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_salary">Gaji</label>
                            <input type="text" class="form-control  @error('job_salary') is-invalid @enderror"
                                name="job_salary" id="job_salary" value="{{ old('job_salary', $jobs->salary) }}">
                            @error('job_salary')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_status">Status Pekerjaan</label>
                            <select name="job_status" id="job_status"  class="form-control">
                                <option value="buka" {{ old('job_status', $jobs->jobStatus) == 'buka' ? 'selected' : '' }} >Buka</option>
                                <option value="tutup" {{ old('job_status', $jobs->jobStatus) == 'tutup' ? 'selected' : '' }}>Tutup</option>
                              </select>
                            @error('job_status')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>

            </div>
            <ul>
        </div>
    </div>
@endsection
