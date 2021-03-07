@extends('index')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-8 col-sm-12">
                    <a href="{{ url('my-article') }}" class="btn btn-outline-secondary">Back</a>
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body form-shadow">
                                    <form method="POST" action="{{ url('create-article') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="judul">Judul<span class="required-field">*</span></label>
                                            <input type="text" id="judul" name="judul" class="form-control"
                                                placeholder="Judul artikel">
                                        </div>
                                        <div class="form-group">
                                            <label for="konten">Konten<span class="required-field">*</span></label>
                                            <textarea name="konten" id="konten" cols="30" rows="10"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail<span class="required-field">*</span></label>
                                            <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="tag">Tag<span class="required-field">*</span></label>
                                            <input type="text" id="tag" name="tag" class="form-control"
                                                placeholder="Cth: teknologi,sosial,kriminal">
                                        </div>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
