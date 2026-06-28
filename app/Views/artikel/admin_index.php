<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<a href="<?= base_url('/admin/artikel/add'); ?>" class="btn" style="margin-bottom:15px; display:inline-block;">+ Tambah Artikel</a>

<form id="search-form" class="form-search">
    <input type="text" name="q" id="search-box" value="<?= esc($q); ?>" placeholder="Cari judul artikel">
    <select name="kategori_id" id="category-filter">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= $k['nama_kategori']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <select name="sort" id="sort-by">
        <option value="id-desc" <?= $sort == 'id-desc' ? 'selected' : ''; ?>>Terbaru</option>
        <option value="id-asc" <?= $sort == 'id-asc' ? 'selected' : ''; ?>>Terlama</option>
        <option value="judul-asc" <?= $sort == 'judul-asc' ? 'selected' : ''; ?>>Judul (A-Z)</option>
        <option value="judul-desc" <?= $sort == 'judul-desc' ? 'selected' : ''; ?>>Judul (Z-A)</option>
    </select>
    <input type="submit" value="Cari" class="btn btn-primary">
</form>

<div id="article-container">
    <p>Memuat data...</p>
</div>

<div class="pager-wrap" id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const articleContainer    = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm          = $('#search-form');
    const searchBox           = $('#search-box');
    const categoryFilter      = $('#category-filter');
    const sortBy              = $('#sort-by');
    const baseAdminUrl        = "<?= base_url('admin/artikel') ?>";

    function renderArticles(articles) {
        if (!articles || articles.length === 0) {
            articleContainer.html('<table class="table"><tbody><tr><td>Tidak ada data.</td></tr></tbody></table>');
            return;
        }

        var html = '<table class="table"><thead><tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr></thead><tbody>';

        articles.forEach(function (a) {
            var isi = a.isi ? a.isi.substring(0, 50) : '';
            html += '<tr>';
            html += '<td>' + a.id + '</td>';
            html += '<td><b>' + a.judul + '</b><p><small>' + isi + '</small></p></td>';
            html += '<td>' + (a.nama_kategori || '-') + '</td>';
            html += '<td>' + a.status + '</td>';
            html += '<td>';
            html += '<a class="btn" href="' + baseAdminUrl + '/edit/' + a.id + '">Ubah</a> ';
            html += '<a class="btn btn-danger" onclick="return confirm(\'Yakin menghapus data?\');" href="' + baseAdminUrl + '/delete/' + a.id + '">Hapus</a>';
            html += '</td>';
            html += '</tr>';
        });

        html += '</tbody></table>';
        articleContainer.html(html);
    }

    function renderPagination(pager) {
        if (!pager || !pager.last_page || pager.last_page <= 1) {
            paginationContainer.html('');
            return;
        }

        var html = '<nav><ul class="pagination">';
        for (var i = 1; i <= pager.last_page; i++) {
            var activeClass = (i === pager.current_page) ? 'active' : '';
            html += '<li class="' + activeClass + '"><a href="#" data-page="' + i + '">' + i + '</a></li>';
        }
        html += '</ul></nav>';
        paginationContainer.html(html);
    }

    function fetchData(page) {
        page = page || 1;
        articleContainer.html('<p>Memuat data...</p>');

        $.ajax({
            url: baseAdminUrl,
            type: 'GET',
            dataType: 'json',
            data: {
                q: searchBox.val(),
                kategori_id: categoryFilter.val(),
                sort: sortBy.val(),
                page: page
            },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (data) {
                renderArticles(data.artikel);
                renderPagination(data.pager);
            },
            error: function () {
                articleContainer.html('<p>Gagal memuat data.</p>');
            }
        });
    }

    searchForm.on('submit', function (e) {
        e.preventDefault();
        fetchData(1);
    });

    categoryFilter.on('change', function () {
        fetchData(1);
    });

    sortBy.on('change', function () {
        fetchData(1);
    });

    paginationContainer.on('click', 'a[data-page]', function (e) {
        e.preventDefault();
        fetchData($(this).data('page'));
    });

    fetchData(1);
});
</script>

<?= $this->include('template/admin_footer'); ?>