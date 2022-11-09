<br />

<section class="mt-5 mb-3">
  <div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?> "></div>
    <?php if ($this->session->flashdata('flash')) { ?>

    <?php } ?>
    <h2>Cetak Surat</h2>
    <div class="btn">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm tambahCetakSurat" data-toggle="modal" data-target="#formCetakSurat">
        <i class="fa fa-plus"></i> Tambah
      </button>
    </div>

    <table class="table-bordered  display" id="example" style="width:100%; font-size:12px;">
      <thead>
        <tr>
          <!-- <th data-field="state" data-checkbox="true" data-halign="center" data-align="center"></th>
							<th data-field="selling"  data-halign="center" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Action</th>
							<th data-field="no_surat"  data-halign="center" data-align="left"  data-sortable="true" data-filter-control="input">NO Surat  </th>
							<th data-field="nama"  data-halign="center" data-align="left"  data-sortable="true" data-filter-control="input">Nama Siswa </th>
							<th data-field="nis"  data-halign="center" data-align="left"  data-sortable="true" data-filter-control="input">NIS  </th>
							<th data-field="id_siswa"  data-halign="center" data-align="left"  data-sortable="true" data-filter-control="input">Kompetensi Keahlian  </th> -->
          <th align="center" style="width:2%">No</th>
          <th align="center" style="width:15%">Aksi</th>
          <th align="center" style="width:20%">Nomor Surat</th>
          <th align="center" style="width:5%">Lampiran</th>
          <th align="center" style="width:20%">Perihal</th>
          <th align="center" style="width:20%">Tgl Surat</th>
          <th align="center" style="width:20%">Perusahaan</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($transaksi as $ts) {
        ?>
          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td>
              <a class="btn btn-sm btn-info btn-xs" href="javascript:void(0)" onclick="cetakData(<?= $ts['idCetak']; ?>)" title="Print"><i class="fa fa-print"></i></a>
              <!-- <a class="btn btn-sm btn-success btn-xs" id="edit" class="btn btn-sm btn-success" href="javascript:void(0)" title="Ubah"><i id="edt" class="fas fa-edit"></i></a> -->
              <a data-toggle="modal" data-target="#editCetakSurat<?= $ts['idCetak']; ?>" data-id="" type="submit" class="btn btn-success btn-sm tampilUbahSurat"><i id="edt" class="fas fa-edit"></i></a>
              <a class="btn btn-sm btn-danger btn-xs tombol" id="remove" href="<?= base_url(); ?>Transaksi/hapusSurat/<?= $ts['idCetak']; ?>" title="Hapus"><i class="far fa-trash-alt"></i></a>
            </td>
            <td><?= $ts['nomor']; ?></td>
            <td><?= $ts['lampiran']; ?></td>
            <td><?= $ts['perihal']; ?></td>
            <td><?= $ts['tgl_surat']; ?></td>
            <td><?= $ts['perusahaan']; ?></td>

          </tr>

        <?php } ?>
      </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="formCetakSurat" tabindex="-1" aria-labelledby="judulCetakSurat" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="judulCetakSurat">Form Kelola Surat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="overflow:scroll;height:500px;">
            <form action="<?= base_url(); ?>transaksi/tambah_surat" method="post">
              <input type="hidden" value="" name="set" id="set" />
              <input type="hidden" value="" name="barispopup" id="barispopup" />
              <input type="hidden" name="idCetak" id="idCetak">
              <div class="form-group row">
                <label for="no_surat" class="col-sm-3 col-form-label col-form-label-sm">Nomor</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control form-control-sm" name="no_surat" id="no_surat" placeholder="Masukan Nomor Surat" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_surat" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Surat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control form-control-sm" name="tgl_surat" id="tgl_surat" placeholder="Kota, tgl bln thn" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="lampiran" class="col-sm-3 col-form-label col-form-label-sm">Lampiran</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control form-control-sm" name="lampiran" id="lampiran" placeholder="Lamiran Surat" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="perihal" class="col-sm-3 col-form-label col-form-label-sm">Perihal</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="perihal" id="perihal" required></input>
                </div>
              </div>
              <div class="form-group row">
                <label for="perihal" class="col-sm-3 col-form-label col-form-label-sm">Perusahaan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="perusahaan" id="perusahaan" required></input>
                </div>
              </div>
              <div class="form-group row">
                <label for="almt_perusahaan" class="col-sm-3 col-form-label col-form-label-sm">Alamat Perusahaan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="almt_perusahaan" id="almt_perusahaan" required></input>
                </div>
              </div>
              <div class="form-group row">
                <label for="id_user" class="col-sm-3 col-form-label col-form-label-sm">Nama User</label>
                <div class="col-sm-8">
                  <select type="text" class="form-control form-control-sm" name="id_user" id='id_user' required>
                    <option value="">--Pilih User--</option>
                    <?php
                    foreach ($user as $us) {
                    ?>
                      <option value="<?= $us['id_user']; ?>"> <?= $us['nama']; ?> </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div>
                <div class="panel panel-default">
                  <div class="panel-heading mb-2">
                    <button type="button" id="btnNewRow" name="btnNewRow" class="btn btn-sm btn-success" onclick="addRow();"><i class="fa fa-plus"></i>
                      <span>Baris Baru</span>
                      <input type="hidden" value="" name="barispopup" id="barispopup" />
                    </button>
                  </div>

                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="tabeleliminasi">
                        <thead>
                          <tr>
                            <td align="center" style="width:3%">Action </td>
                            <td align="center" style="width:20%">Nama Siswa </td>
                            <td align="center" style="width:30%">NIS</td>
                            <td align="center" style="width:20%">Kelas </td>

                          </tr>

                          <tr id="bookTemplate" name="rowda" class="hide">
                            <td style="text-align: center;" valign="top">
                              <button type='button' style='text-align: center; padding:8px 15px;' id='btnDelRowX' name='btnDelRowX' class='btn btn-sm btn-danger btn-sm btn-round' title='Hapus'><span><i class='fa fa-minus'></i></span></button>
                            </td>

                            <td align="center" style="text-align: center;" class="form-group " valign="top">
                              <input class='form-control input-sm ' type='hidden' name='id_siswa' id='id_siswa' readonly>
                              <input class='form-control input-sm ' type='text' name='nama' id='nama' placeholder="Cari Siswa" readonly>
                            </td>
                            <td align="center" style="text-align: center;" class="form-group " valign="top">
                              <input class='form-control input-sm ' type='text' name='nis' id='nis' readonly>
                            </td>
                            <td align="center" style="text-align: center;" class="form-group " valign="top">
                              <input class='form-control input-sm nomor ' type='text' name='id_kelas' id='id_kelas' readonly>
                            </td>


                          </tr>


                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->

                  </div>
                  <!-- /.panel-body -->
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" name="submit" id="btnSave" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" name="kembali" id="btl" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-redo-alt"></i> Kembali</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- edit -->
    <?php $no = 0;
    foreach ($transaksi as $ts) {
      $no++; ?>
      <div class="modal fade bd-example-modal-lg" id="editCetakSurat<?= $ts['idCetak']; ?>" tabindex="-1" aria-labelledby="editCetakSurat" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCetakSurat">Form Edit Kelola Surat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="overflow:scroll;height:500px;">
              <form action="<?= base_url(); ?>transaksi/tambah_surat" method="post">
                <input type="hidden" value="" name="set" id="set" />
                <!-- <input type="hidden" value="" name="barispopup" id="barispopup" /> -->
                <input type="hidden" name="idCetak" id="idCetak" value="<?= $ts['idCetak']; ?>">
                <div class="form-group row">
                  <label for="no_surat" class="col-sm-3 col-form-label col-form-label-sm">Nomor</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" name="no_surat" id="no_surat" value="<?= $ts['nomor']; ?>" placeholder="Masukan Nomor Surat" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tgl_surat" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Surat</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" name="tgl_surat" id="tgl_surat" value="<?= $ts['tgl_surat']; ?>" placeholder="Kota, tgl bln thn" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampiran" class="col-sm-3 col-form-label col-form-label-sm">Lampiran</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" name="lampiran" id="lampiran" value="<?= $ts['lampiran']; ?>" placeholder="Lamiran Surat" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perihal" class="col-sm-3 col-form-label col-form-label-sm">Perihal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="perihal" id="perihal" value="<?= $ts['perihal']; ?>" required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perihal" class="col-sm-3 col-form-label col-form-label-sm">Perusahaan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="perusahaan" id="perusahaan" value="<?= $ts['perusahaan']; ?>" required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="almt_perusahaan" class="col-sm-3 col-form-label col-form-label-sm">Alamat Perusahaan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="almt_perusahaan" id="almt_perusahaan" value="<?= $ts['almt_perusahaan']; ?>" required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="id_user" class="col-sm-3 col-form-label col-form-label-sm">Nama User</label>
                  <div class="col-sm-8">
                    <select type="text" class="form-control form-control-sm" name="id_user" id='id_user' required>
                      <option value="<?= $ts['id_user']; ?>"><?= $ts['nama']; ?></option>
                      <?php
                      foreach ($user as $us) {
                      ?>
                        <option value="<?= $us['id_user']; ?>"> <?= $us['nama']; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div>
                  <div class="panel panel-default">
                    <div class="panel-heading mb-2">
                      <button type="button" id="btnNewRow" name="btnNewRow" class="btn btn-sm btn-success" onclick="addRow();"><i class="fa fa-plus"></i>
                        <span>Baris Baru</span>
                        <input type="hidden" value="" name="barispopup" id="barispopup" />
                      </button>
                    </div>

                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tabeleliminasi">
                          <thead>
                            <tr>
                              <td align="center" style="width:3%">Action </td>
                              <td align="center" style="width:20%">Nama Siswa </td>
                              <td align="center" style="width:30%">NIS</td>
                              <td align="center" style="width:20%">Kelas </td>

                            </tr>

                            <tr id="bookTemplate" name="rowda" class="hide">
                              <td style="text-align: center;" valign="top">
                                <button type='button' style='text-align: center; padding:8px 15px;' id='btnDelRowX' name='btnDelRowX' class='btn btn-sm btn-danger btn-sm btn-round' title='Hapus'><span><i class='fa fa-minus'></i></span></button>
                              </td>

                              <td align="center" style="text-align: center;" class="form-group " valign="top">
                                <input class='form-control input-sm ' type='hidden' name='id_siswa' id='id_siswa' readonly>
                                <input class='form-control input-sm ' type='text' name='nama' id='nama' value="<?= $ts['nama']; ?>" placeholder="Cari Siswa" readonly>
                              </td>
                              <td align="center" style="text-align: center;" class="form-group " valign="top">
                                <input class='form-control input-sm ' type='text' name='nis' id='nis' value="<?= $ts['nis']; ?>" readonly>
                              </td>
                              <td align="center" style="text-align: center;" class="form-group " valign="top">
                                <input class='form-control input-sm nomor ' type='text' name='id_kelas' id='id_kelas' readonly>
                              </td>


                            </tr>


                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit" id="btnSave" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Edit</button>
                  <button type="reset" name="kembali" id="btl" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-redo-alt"></i> Kembali</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- exit -->

  </div>

</section>





<div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:75%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4>Data Siswa </h4>
      </div>
      <div class="modal-body">
        <table id="tabledata" data-toggle="table" data-search="true" data-show-export="true" data-minimum-count-columns="2" data-pagination="true" data-height="500" data-url="<?php echo base_url(); ?>/Transaksi/loadDataSiswa" data-side-pagination="server" data-pagination="true" data-sort-name="id_siswa" data-sort-order="asc">
          <thead>
            <tr>

              <th data-field="nama" data-halign="center" data-align="left" data-sortable="true">Nama Siswa </th>
              <th data-field="nis" data-halign="center" data-align="left" data-sortable="true">NIS </th>
              <th data-field="id_kelas" data-formatter="fformatkelas" data-halign="center" data-align="left" data-sortable="true">Kelas </th>
              <th data-field="cari" id="pilih" data-halign="center" data-align="center" data-formatter="operateFormatterPilih" data-events="operateEventspilih">Pilih Data</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->