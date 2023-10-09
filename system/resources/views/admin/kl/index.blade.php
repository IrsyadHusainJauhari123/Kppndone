<x-app title="Admin | Kl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Kode Kementerian</h4>
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
                                    <form action="{{ url('admin/kl/store') }}" method="post"
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
                                        <th>Kode Akun</th>
                                        <th>Kode Kab</th>
                                        <th>Blokir</th>
                                        <th>Kontrak</th>
                                        <th>Realisasi</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        {{-- <th>Office</th> --}}
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Kode Ba</th>
                                        <th>Kode Akun</th>
                                        <th>Kode Kab</th>
                                        <th>Blokir</th>
                                        <th>Kontrak</th>
                                        <th>Realisasi</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th style="width: 10%">Action</th>
                                        {{-- <th>Email</th> --}}
                                        {{-- <th>Office</th> --}}
                                        {{-- <th style="width: 10%">Action</th> --}}
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($list_kl as $kl)
                                        {{-- <tr>
                                                    <td>{{ $loop->iteration }}</td> --}}
                                        </tr>
                                        <td>{{ $kl->kode_ba }}</td>
                                        <td>{{ $kl->kode_akun }}</td>
                                        <td>{{ $kl->kode_kab }}</td>
                                        <td>{{ $kl->blokir }}</td>
                                        <td>{{ $kl->kontrak }}</td>
                                        <td>{{ $kl->realisasi }}</td>
                                        <td>{{ $kl->bulan }}</td>
                                        <td>{{ $kl->tahun }}</td>


                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{ $kl->id }}"
                                                    class="btn btn-link btn-warning btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                @include('components.utils.delete', [
                                                    'url' => url('admin/kl', $kl->id),
                                                ])


                                            </div>

                                            <div class="form-button-action">



                                            </div>
                                        </td>
                                        </tr>
                                        {{-- Modal Edit kl --}}
                                        <div class="modal fade" id="editModal{{ $kl->id }}" tabindex="6"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ url('admin/kl', $kl->id) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit
                                                                Data Dokumen Kl</h5>
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
                                                                    value="{{ $kl->kode_ba }}" class="form-control"
                                                                    id="kode_ba">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kode_akun" class="control-label">Kode
                                                                    Akun</label>
                                                                <input type="kode_akun" name="kode_akun"
                                                                    value="{{ $kl->kode_akun }}" class="form-control"
                                                                    id="kode_akun">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kode_kab" class="control-label">Kode
                                                                    Kab</label>
                                                                <input type="kode_kab" name="kode_kab"
                                                                    value="{{ $kl->kode_kab }}" class="form-control"
                                                                    id="kode_kab">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="blokir" class="control-label">Blokir
                                                                </label>
                                                                <input type="blokir" name="blokir"
                                                                    value="{{ $kl->blokir }}" class="form-control"
                                                                    id="blokir">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kontrak" class="control-label">Kontrak
                                                                </label>
                                                                <input type="kontrak" name="kontrak"
                                                                    value="{{ $kl->kontrak }}" class="form-control"
                                                                    id="kontrak">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="realisasi" class="control-label">Realisasi
                                                                </label>
                                                                <input type="realisasi" name="realisasi"
                                                                    value="{{ $kl->realisasi }}" class="form-control"
                                                                    id="realisasi">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bulan" class="control-label">Bulan
                                                                </label>
                                                                <input type="bulan" name="bulan"
                                                                    value="{{ $kl->bulan }}" class="form-control"
                                                                    id="bulan">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="tahun" class="control-label">Tahun
                                                                </label>
                                                                <input type="tahun" name="tahun"
                                                                    value="{{ $kl->tahun }}" class="form-control"
                                                                    id="tahun">
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
