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
    <h2>Data Kelas</h2>
    <div class="btn">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm tambahKelas" data-toggle="modal" data-target="#formKelas">
        Tambah Data Baru
      </button>
      <!-- Modal -->
      <div class="modal fade" id="formKelas" tabindex="-1" aria-labelledby="judulKelas" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulKelas">Tambah Data Kelas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url(); ?>kelas/tambah_kelas" method="post">
              <input type="hidden" name="id_kelas" id="id_kelas">
              <div class="form-group row">
                <label for="jenjang" class="col-sm-2 col-form-label col-form-label-sm">Jenjang</label>
                <div class="col-sm-6">
                  <select type="text" class="form-control form-control-sm" name="jenjang" id="jenjang" required>
                    <option>--Pilih Jenjang--</option>
                    <option value="XII">XII</option>
                    <option value="XI">XI</option>
                    <option value="X">X</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label col-form-label-sm">Jurusan</label>
                <div class="col-sm-6">
                  <select type="text" class="form-control form-control-sm" name="jurusan" id="jurusan" required>
                    <option>--Pilih Jurusan--</option>
                    <option value="RPL">RPL</option>
                    <option value="MM">MM</option>
                    <option value="AKL">AKL</option>
                    <option value="OTKP">OTKP</option>
                    <option value="BDP">BDP</option>
                    <option value="PKM">PKM</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="jmlh" class="col-sm-2 col-form-label col-form-label-sm">Jumlah Siswa</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-sm" name="jmlh" id="jmlh" placeholder="Jumlah Siswa" required>
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
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $no = 1;
            foreach ($kelas as $kls) {
        ?>
        <tr>
            <td class="text-center"><?=$no++ ;?></td>
            <td><?= $kls['jenjang']; ?></td>
            <td><?= $kls['jurusan']; ?></td>
            <td><?= $kls['jmlh']; ?></td>
            
            <td class="text-center">
              <a data-toggle="modal" data-target="#formKelas" data-id="<?= $kls['id_kelas'];?>" type="submit" class="btn btn-success btn-sm tampilUbahKelas"><i class="far fa-edit"></i>Edit</a>
              
              <a href="<?= base_url(); ?>Kelas/hapus_kelas/<?= $kls['id_kelas']; ?>" type="button" class="btn btn-danger btn-sm tombol"><i class="far fa-trash-alt"></i>Hapus</a>
            </td>
        </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

