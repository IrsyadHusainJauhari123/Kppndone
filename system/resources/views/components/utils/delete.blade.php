{{-- <form action="{{ $url }}" method="post" class="form-inline"
    onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Yakin Akan Menghapus Data Ini?')">
        <i class="fa fa-times"></i>
    </button>

    <button class="btn btn-link btn-danger"><i class="fa fa-times"></i></button>
</form> --}}

<form action="{{ $url }}" method="POST" class="form-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-link btn-danger" onclick="return confirm('Yakin Akan Menghapus Data Ini?')">
        <i class="fa fa-times"></i>
    </button>
</form>





{{-- <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button> --}}
