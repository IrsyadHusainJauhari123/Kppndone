<x-app title="Admin | KodeBa">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Kode Ba</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                data-target="#basicModal">
                                <i class="fa fa-plus"></i>
                                | Tambah Data
                            </button>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="modal fade" id="basicModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('admin/kodeba/store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header" style="background: #3b4268">
                                            <h5 class="modal-title text-white">Tambah Data Bagian</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="col-md-6">
                                                <label for="dile">Masukan File</label>
                                                <input type="file" name="file" id="file">

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->

                        <!--Modal Tambah -->
                        <!--modal Edit-->
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>Kode Ba</th>
                                        <th>Deskripsi</th>

                                        {{-- <th>Office</th> --}}
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Kode Ba</th>

                                        <th>Deskripsi</th>

                                        <th style="width: 10%">Action</th>
                                        {{-- <th>Email</th> --}}
                                        {{-- <th>Office</th> --}}
                                        {{-- <th style="width: 10%">Action</th> --}}
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($list_kodeba as $kodeba)
                                        {{-- <tr>
                                                    <td>{{ $loop->iteration }}</td> --}}
                                        </tr>
                                        <td>{{ $kodeba->kode_ba }}</td>
                                        <td>{{ $kodeba->deskripsi }}</td>



                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{ $kodeba->kode_ba }}"
                                                    class="btn btn-link btn-warning btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                @include('components.utils.delete', [
                                                    'url' => url('admin/kodeba', $kodeba->kode_ba),
                                                ])


                                            </div>

                                            <div class="form-button-action">



                                            </div>
                                        </td>
                                        </tr>
                                        {{-- Modal Edit kodeba --}}
                                        <div class="modal fade" id="editModal{{ $kodeba->kode_ba }}" tabindex="6"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ url('admin/kodeba', $kodeba->kode_ba) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit
                                                                Data Dokumen kodeba</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="kode_ba" class="control-label">Kode
                                                                    Ba</label>
                                                                <input type="kode_ba" name="kode_ba"
                                                                    value="{{ $kodeba->kode_ba }}" class="form-control"
                                                                    id="kode_ba">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="deskripsi" class="control-label">Kode
                                                                    Akun</label>
                                                                <input type="deskripsi" name="deskripsi"
                                                                    value="{{ $kodeba->deskripsi }}"
                                                                    class="form-control" id="deskripsi">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
