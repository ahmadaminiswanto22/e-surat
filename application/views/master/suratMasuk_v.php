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
    <h2>Data Surat Masuk</h2>
    <div class="btn">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm tambahSuratMasuk" data-toggle="modal" data-target="#formSuratMasuk">
        Tambah Data Baru
      </button>
      <!-- Modal -->
      <div class="modal fade bd-example-modal-md" id="formSuratMasuk" tabindex="-1" aria-labelledby="judulSuratMasuk" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulSuratMasuk">Tambah Data Surat Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url();?>SuratMasuk/tambah_surat" method="post" enctype="multipart/form_open">
            
            <input type="hidden" name="id_suratMasuk" id="id_suratMasuk">
              <div class="form-group row">
                <label for="nomor" class="col-sm-3 col-form-label col-form-label-sm">Nomor</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" name="nomor" id="nomor" placeholder="Nomor Surut" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="lampiran" class="col-sm-3 col-form-label col-form-label-sm">Lampiran Surat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" name="lampiran" id="lampiran" placeholder="Lampiran Surat" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="perihal" class="col-sm-3 col-form-label col-form-label-sm">Perihal Surat</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control form-control-sm" name="perihal" id="perihal" placeholder="Perihal Surat" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="asal_surat" class="col-sm-3 col-form-label col-form-label-sm">Asal Surat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" name="asal_surat" id="asal_surat" placeholder="Masukan Asal Instansi Surat" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="siswa" class="col-sm-3 col-form-label col-form-label-sm">Nama Siswa</label>
                <div class="col-sm-9">
                <select type="text" class="form-control form-control-sm" name="siswa" id='siswa' required>
                  <option value="">--Pilih Siswa--</option>
                    <?php
                      foreach ($siswa as $swa){
                    ?>
                    <option value="<?= $swa['id_siswa']; ?>" > <?= $swa['nama'];?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="kelas" class="col-sm-3 col-form-label col-form-label-sm">Kelas</label>
                <div class="col-sm-9">
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
                <label for="petugas" class="col-sm-3 col-form-label col-form-label-sm">Petugas</label>
                <div class="col-sm-9">
                <select type="text" class="form-control form-control-sm" name="petugas" id='petugas' required>
                  <option value="">--Pilih Petugas--</option>
                  <option value="hubin">Hubin</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_srtMasuk" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Input</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control form-control-sm" name="tgl_srtMasuk" id="tgl_srtMasuk" placeholder="Tanggal Input Surat" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="gambar" class="col-sm-3 col-form-label col-form-label-sm">Upload Surat</label>
                <div class="custom-file-sm col-sm-9">
                  <!-- <input type="file" class="form-control form-control-sm" name="gambar" id="gambar" placeholder="pilih gambar" required> -->
                  <input type='file' name="gambar" id="gambar" accept="image/*" onchange="loadFile(event)"/> <br>
                </div>
              </div>
              <img width="120px" height="200px" id="output" src="#" alt="Pilih Gambar" />
              
              <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> Simpan</button>
                <button type="reset" name="kembali" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-redo-alt"></i> Kembali</button>
              </div>
              
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      //tampil gambar
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
    <table class="table-bordered display" id="example" style="width:100%">
      <thead class="text-center">
        <tr>
            <th style="width:2%">No</th>
            <th style="width:20%">Nomor</th>
            <th style="width:20%">Perihal</th>
            <th style="width:20%">Asal Surat</th>
            <th style="width:20%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $no = 1;
            foreach ($suratMasuk as $sm) {
        ?>
        <tr>
        <td class="text-center"><?=$no++ ;?></td>
            <td><?= $sm['nomor']; ?></td>
            <td><?= $sm['perihal']; ?></td>
            <td><?= $sm['asal_surat']; ?></td>
            <td class="text-center">

              <!-- <a href="<?= base_url(); ?>SuratMasuk/detail/<?= $sm['id_suratMasuk']; ?>" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formDetailSuratMasuk"><i class="fas fa-eye"></i> Detail</a> -->
              <a id="detail" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
               data-nomor="<?=$sm['nomor'];?>"
               data-perihal="<?=$sm['perihal'];?>"
               data-id_siswa="<?=$sm['nama'];?>"
               > Detail</a>

              <a data-toggle="modal" data-target="#formSuratMasuk" data-id="<?= $sm['id_suratMasuk'];?>" type="submit" class="btn btn-success btn-sm tampilUbahSuratMasuk"><i class="fas fa-edit"></i> Edit</a>
              
              <a href="<?= base_url(); ?>suratMasuk/hapus_Surat/<?= $sm['id_suratMasuk']; ?>" type="button" class="btn btn-danger btn-sm tombol"><i class="fas fa-trash-alt"></i> Hapus</a>
            </td>
        </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

<div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" aria-labelledby="judulDetailSuratMasuk" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulDetailSuratMasuk">Data Detail Surat Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body table-responsive">
              <table class="table table-borderless no-margin">
                <tbody>
                  <tr>
                    <th>Nomor</th>
                    <td><span id="nomor"></span></td>
                  </tr>
                  <tr>
                    <th>Perihal</th>
                    <td><span id="perihal"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>
<script>
  $(document).ready(function() {
    $(document).on('click', '#detail', function() {
      var nomor = $(this).data('nomor');
      var perihal = $(this).data('perihal');
      $('#nomor').text(nomor);
      $('#perihal').text(perihal);
      // console.log(nomor);
    });
  });
</script>

<!-- //Modal Detail -->
<!-- <div class="modal fade bd-example-modal-lg" id="formDetailSuratMasuk" tabindex="-1" aria-labelledby="judulDetailSuratMasuk" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulDetailSuratMasuk">Data Detail Surat Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="" method="" enctype="multipart/form_open">
            
            <fieldset disabled>
            <div class="form-group row">
                <label for="nomor" class="col-sm-3 col-form-label col-form-label-sm">Nomor</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" value="<?= $sm['nomor']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="lampiran" class="col-sm-3 col-form-label col-form-label-sm">Lampiran Surat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" value="<?= $sm['lampiran']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="perihal" class="col-sm-3 col-form-label col-form-label-sm">Perihal Surat</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control form-control-sm" value=""><?= $sm['perihal']; ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="asal_surat" class="col-sm-3 col-form-label col-form-label-sm">Asal Surat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" value="<?= $sm['asal_surat']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="siswa" class="col-sm-3 col-form-label col-form-label-sm">Nama Siswa</label>
                <div class="col-sm-9">                  
                  <option class="form-control form-control-sm" value="<?= $swa['id_siswa']; ?>" > <?= $swa['nama'];?></option>                  
                </div>
              </div>

              <div class="form-group row">
                <label for="kelas" class="col-sm-3 col-form-label col-form-label-sm">Kelas</label>
                <div class="col-sm-9">                 
                  <option class="form-control form-control-sm" value="<?= $swa['id_kelas']; ?>" > <?= $kls['jenjang'];?> <?= $kls['jurusan'];?> </option>                  
                </div>
              </div>
              <div class="form-group row">
                <label for="petugas" class="col-sm-3 col-form-label col-form-label-sm">Petugas</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" value="<?= $sm['petugas']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_srtMasuk" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Input</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control form-control-sm" value="<?= $sm['tgl_srtMasuk']; ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="gambar" class="col-sm-3 col-form-label col-form-label-sm mr-3">File Surat</label>
                <div class="custom-file-sm col-sm-7">
                  <td><img src= "<?= base_url();?>gambar/<?=$sm['gambar'];?>" width="250px" height="100px"></td>
                </div>
              </div>
              </fieldset>
              <div class="modal-footer">
                <button type="reset" name="kembali" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div -->

      