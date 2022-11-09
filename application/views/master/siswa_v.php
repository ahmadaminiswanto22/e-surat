<br/>
<section class="mt-5 mb-3">
  <div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?> "></div>
    <?php if($this->session->flashdata('flash')) { ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">Data
            <strong>Berhasi</strong> <?= $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    </div> -->

    <?php } ?>
    <h2>Data Siswa</h2>
    <div class="btn">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm tambahSiswa" data-toggle="modal" data-target="#formSiswa">
        Tambah Data Baru
      </button>
      <!-- Modal -->
      <div class="modal fade" id="formSiswa" tabindex="-1" aria-labelledby="judulSiswa" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulSiswa">Tambah Data Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url(); ?>siswa/tambah_siswa" method="post">
            <input type="hidden" name="id_siswa" id="id_siswa">
              <div class="form-group row">
                <label for="nis" class="col-sm-2 col-form-label col-form-label-sm">NIS</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" name="nis" id="nis" placeholder="NIS Siswa" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama Siswa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama Siswa" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label col-form-label-sm">Jenis Kelamin</label>
                <div class="col-sm-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelaminL" value="L">
                    <label class="form-check-label" for="jenis_kelaminL">Laki - Laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelaminP" value="P">
                    <label class="form-check-label" for="jenis_kelaminP">Perempuan</label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="kelas" class="col-sm-2 col-form-label col-form-label-sm">Kelas</label>
                <div class="col-sm-10">
                <select type="text" class="form-control form-control-sm" name="kelas" id='kelas' required>
                  <option value="">--Pilih Kelas--</option>
                    <?php
                      foreach ($kelas as $kls){
                    ?>
                    <option value="<?= $kls['id_kelas']; ?>" > <?= $kls['jenjang'];?> <?= $kls['jurusan'];?> </option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label col-form-label-sm">Tempat Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm" name="tempat_lahir" id="tempat_lahir" placeholder="tempat lahir Siswa" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control form-control-sm" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir Siswa" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamt" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="alamt" id="alamt" placeholder="Alamat Siswa" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" name="kembali" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table class="table-bordered display" id="example" style="width:100%">
      <thead class="text-center">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelamin</th>
            <th>Kelas</th>
            <th>TTL</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $no = 1;
            foreach ($siswa as $s) {
        ?>
        <tr>
        <td class="text-center"><?=$no++ ;?></td>
            <td><?= $s['nis']; ?></td>
            <td><?= $s['nama']; ?></td>
            <td><?= $s['jenis_kelamin']; ?></td>
            <td><?= $s['jenjang']; ?> 
                <?= $s['jurusan']; ?>
            </td>
            <td><?= $s['tempat_lahir']; ?>,
                <?= $s['tgl_lahir']; ?>
            </td>
            <td><?= $s['alamt']; ?></td>
            
            <td class="text-center">
              <a data-toggle="modal" data-target="#formSiswa" data-id="<?= $s['id_siswa'];?>" type="submit" class="btn btn-success btn-sm tampilUbahSiswa"><i class="far fa-edit"></i>Edit</a>
              
              <a href="<?= base_url(); ?>Siswa/hapus_Siswa/<?= $s['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm tombol"><i class="far fa-trash-alt"></i>Hapus</a>
            </td>
        </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

