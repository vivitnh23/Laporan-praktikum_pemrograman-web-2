const Artikel = {
  data() {
    return {
      artikel: [],
      showForm: false,
      formTitle: 'Tambah Artikel',
      formData: {
        id: null,
        judul: '',
        isi: '',
        status: 0
      },
      statusOptions: [
        { value: 0, text: 'Draft' },
        { value: 1, text: 'Publish' }
      ]
    };
  },
  mounted() {
    this.loadData();
  },
  methods: {
    loadData() {
      axios.get(apiUrl + '/post')
        .then(response => {
          this.artikel = response.data;
        })
        .catch(error => console.log(error));
    },
    tambah() {
      this.formData = { id: null, judul: '', isi: '', status: 0 };
      this.formTitle = 'Tambah Artikel';
      this.showForm = true;
    },
    edit(row) {
      this.formData = { ...row };
      this.formTitle = 'Edit Artikel';
      this.showForm = true;
    },
    saveData() {
      if (this.formData.id) {
        axios.put(apiUrl + '/post/' + this.formData.id, this.formData)
          .then(() => {
            this.loadData();
            this.closeForm();
          })
          .catch(error => console.log(error));
      } else {
        axios.post(apiUrl + '/post', this.formData)
          .then(() => {
            this.loadData();
            this.closeForm();
          })
          .catch(error => console.log(error));
      }
    },
    hapus(index, id) {
      if (confirm('Yakin ingin menghapus artikel ini?')) {
        axios.delete(apiUrl + '/post/' + id)
          .then(() => {
            this.artikel.splice(index, 1);
          })
          .catch(error => console.log(error));
      }
    },
    closeForm() {
      this.showForm = false;
      this.formData = { id: null, judul: '', isi: '', status: 0 };
    },
    statusText(status) {
      return status == 1 ? 'Publish' : 'Draft';
    }
  },
  template: `
    <div>
      <h2>Manajemen Data Artikel</h2>
      <button @click="tambah">Tambah Data</button>

      <!-- Modal Form -->
      <div class="modal" v-if="showForm">
        <div class="modal-content">
          <span class="close" @click="closeForm">&times;</span>
          <form @submit.prevent="saveData">
            <h3>{{ formTitle }}</h3>
            <div>
              <input type="text" v-model="formData.judul" placeholder="Judul Artikel" required>
            </div>
            <div>
              <textarea v-model="formData.isi" rows="6" placeholder="Isi Artikel" required></textarea>
            </div>
            <div>
              <select v-model="formData.status">
                <option v-for="option in statusOptions" :value="option.value" :key="option.value">
                  {{ option.text }}
                </option>
              </select>
            </div>
            <button type="submit">Simpan</button>
            <button type="button" @click="closeForm">Batal</button>
          </form>
        </div>
      </div>

      <!-- Tabel Data -->
      <table border="1" cellpadding="8" cellspacing="0" style="width:100%; margin-top:20px;">
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in artikel" :key="row.id">
            <td>{{ row.id }}</td>
            <td>{{ row.judul }}</td>
            <td>{{ statusText(row.status) }}</td>
            <td>
              <a href="#" @click.prevent="edit(row)">Edit</a> |
              <a href="#" @click.prevent="hapus(index, row.id)">Hapus</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  `
};