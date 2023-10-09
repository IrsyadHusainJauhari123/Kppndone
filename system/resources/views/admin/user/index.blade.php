<x-app>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Akun Admin</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                data-target="#basicModal">
                                <i class="fa fa-plus"></i>
                                | Tambah Data
                            </button>


                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="basicModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header" style="background: #3b4268">
                                            <h5 class="modal-title text-white">Tambah Data Bagian</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            {{-- <div class="form-group">
                                                        <label for="" class="control-label">Bagian</label>
                                                        <select name="id_divisi" class="form-control">
                                                            <option value="">--Pilih Bagian--</option>
                                                            @foreach ($list_divisi as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_divisi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                            <div class="form-group">
                                                <label for="nama" class="control-label">Nama</label>
                                                <input type="text" name="nama" class="form-control"
                                                    id="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    id="email">
                                            </div>
                                            {{-- <div class="form-group">
                                                                <label for="" class="control-label">Level</label>
                                                                <select name="level" class="form-control">
                                                                    <option value="">--Pilih--</option>
                                                                    <option value="Visi">Visi</option>
                                                                    <option value="Misi">Misi</option>
                                                                    <option value="Misi">Tupoksi</option>
                                                                </select>
                                                            </div> --}}

                                            <div class="form-group">
                                                <label for="password" class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password">
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
                        <!--Modal Tambah -->
                        <!--modal Edit-->
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        {{-- <th>Office</th> --}}
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        {{-- <th>Office</th> --}}
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($list_user as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>
                                                {{-- <div class="btn-group">

                                                        <button class="btn btn-warning" data-toggle="modal"
                                                            data-target="#edit{{ $user->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        @include('components.utils.delete', [
                                                            'url' => url('user', $user->id),
                                                        ])
                                                    </div> --}}

                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#editModal{{ $user->id }}"
                                                        class="btn btn-link btn-warning btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    @include('components.utils.delete', [
                                                        'url' => url('admin/user', $user->id),
                                                    ])


                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($list_user as $user)
                                            {{-- Modal Edit User --}}
                                            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ url('admin/user', $user->id) }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit
                                                                    User</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form Edit User -->
                                                                {{-- <form id="editForm{{ $user->id }}"> --}}
                                                                <div class="form-group">
                                                                    <label for="nama"
                                                                        class="control-label">Nama</label>
                                                                    <input type="text" name="nama"
                                                                        value="{{ $user->nama }}" class="form-control"
                                                                        id="nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password"
                                                                        class="control-label">Email</label>
                                                                    <input type="text" name="email"
                                                                        value="{{ $user->email }}" class="form-control"
                                                                        id="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""
                                                                        class="control-">Password</label>
                                                                    <input type="password" class="form-control"
                                                                        name="password">
                                                                </div>
                                                                <!-- Tambahkan input dan field yang sesuai untuk mengedit data pengguna -->
                                                                {{-- </form> --}}
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




{{-- <script>
    // JavaScript (jQuery) untuk mengambil ID
    $(document).ready(function() {
        $(".edit-button").click(function() {
            var dataTarget = $(this).data("target");
            var id = dataTarget.replace("#edit", "{{ $user->id }}");

            console.log("ID edit:", id);

            // Lakukan sesuatu dengan ID ini, misalnya, kirimkan permintaan AJAX, dll.
        });
    });
</script> --}}
