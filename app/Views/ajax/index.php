<?= $this->include('template/admin_header'); ?>

<h2>Data Artikel (AJAX)</h2>

<button id="btnShowAdd" class="btn" style="margin-bottom:15px;">+ Tambah Artikel</button>

<div id="formWrapper" style="display:none; margin-bottom:20px; padding:15px; border:1px solid #ddd; border-radius:6px; max-width:500px;">
    <h3 id="formTitle">Tambah Artikel</h3>
    <form id="artikelForm">
        <input type="hidden" id="artikelId" value="">
        <p>
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" required>
        </p>
        <p>
            <label for="isi">Isi</label>
            <textarea name="isi" id="isi" cols="50" rows="6"></textarea>
        </p>
        <p>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" id="btnCancel" class="btn">Batal</button>
        </p>
    </form>
</div>

<div id="alertBox"></div>

<table class="table" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr><td colspan="4">Loading data...</td></tr>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    function showAlert(message, status) {
        var cls = (status === 'OK') ? 'alert-success' : 'alert-danger';
        $('#alertBox').html('<div class="alert ' + cls + '">' + message + '</div>');
        setTimeout(function () { $('#alertBox').html(''); }, 3000);
    }

    function loadData() {
        $('#artikelTable tbody').html('<tr><td colspan="4">Loading data...</td></tr>');

        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            dataType: "json",
            success: function (data) {
                var rows = "";

                if (data.length === 0) {
                    rows = '<tr><td colspan="4">Belum ada data.</td></tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var row = data[i];
                        var judulSafe = (row.judul || '').replace(/"/g, '&quot;');
                        var isiSafe = (row.isi || '').replace(/"/g, '&quot;');

                        rows += '<tr>';
                        rows += '<td>' + row.id + '</td>';
                        rows += '<td>' + row.judul + '</td>';
                        rows += '<td>' + row.status + '</td>';
                        rows += '<td>';
                        rows += '<a href="#" class="btn btn-edit" data-id="' + row.id + '" data-judul="' + judulSafe + '" data-isi="' + isiSafe + '">Ubah</a> ';
                        rows += '<a href="#" class="btn btn-danger btn-delete" data-id="' + row.id + '">Hapus</a>';
                        rows += '</td>';
                        rows += '</tr>';
                    }
                }

                $('#artikelTable tbody').html(rows);
            },
            error: function () {
                $('#artikelTable tbody').html('<tr><td colspan="4">Gagal memuat data.</td></tr>');
            }
        });
    }

    loadData();

    $('#btnShowAdd').on('click', function () {
        $('#formTitle').text('Tambah Artikel');
        $('#artikelForm')[0].reset();
        $('#artikelId').val('');
        $('#formWrapper').show();
    });

    $('#btnCancel').on('click', function () {
        $('#formWrapper').hide();
    });

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();
        $('#formTitle').text('Edit Artikel');
        $('#artikelId').val($(this).data('id'));
        $('#judul').val($(this).data('judul'));
        $('#isi').val($(this).data('isi'));
        $('#formWrapper').show();
    });

    $('#artikelForm').on('submit', function (e) {
        e.preventDefault();
        var id = $('#artikelId').val();
        var url = id
            ? "<?= base_url('ajax/update/') ?>" + id
            : "<?= base_url('ajax/store') ?>";

        $.ajax({
            url: url,
            method: "POST",
            data: {
                judul: $('#judul').val(),
                isi: $('#isi').val()
            },
            dataType: "json",
            success: function (res) {
                showAlert(res.message || 'Berhasil.', res.status);
                if (res.status === 'OK') {
                    $('#formWrapper').hide();
                    loadData();
                }
            },
            error: function () {
                showAlert('Terjadi kesalahan saat menyimpan data.', 'ERROR');
            }
        });
    });

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + id,
                method: "DELETE",
                success: function () {
                    loadData();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error deleting article: ' + textStatus + errorThrown);
                }
            });
        }
    });

});
</script>

<?= $this->include('template/admin_footer'); ?>