<br/>
<section class="mt-5 mb-3">
  <div class="container">
  
    <h2>Cetak Surat</h2>
    <div class="btn">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm tambahCetakSurat" data-toggle="modal" data-target="#formCetakSurat">
        Cari Siswa
      </button>

      <div id="detail_siswa" style="position:absolute;"> </div>

      <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" id="formCetakSurat" tabindex="-1" aria-labelledby="judulCetakSurat" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulCetakSurat">Data Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="overflow:scroll;height:500px;">
            <table class="table-bordered  display" id="example" style="width:100%; font-size:12px;"">
              <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $no=0;
                foreach ($siswa as $a):
                  $no++;
                  $id_siswa=$a['id_siswa'];
                  $nis=$a['nis'];
                  $nama=$a['nama'];
                  $jenjang=$a['jenjang'];
                  $jurusan=$a['jurusan'];
              ?>
                <tr>
                    <td style="text-align:center;"><?= $no;?></td>
                    <td style="text-align:center;"><?= $id_siswa;?></td>
                    <td style="text-align:center;"><?= $nis;?></td>
                    <td style="text-align:center;"><?= $nama;?></td>
                    <td  style="text-align:center;"><?= $jenjang;?> <?= $jurusan;?></td>
                    <td style="text-align:center;">
                      <form action="<?= base_url().'transaksi/add_to_cart'?>" method="post">
                        <input type="hidden" name="id_siswa" value="<?= $id_siswa?>">
                        <input type="hidden" name="nis" value="<?= $nis?>">
                        <input type="hidden" name="nama" value="<?= $nama;?>">
                        <input type="hidden" name="jenjang" value="<?= $jenjang;?>">
                        <input type="hidden" name="jurusan" value="<?= $jurusan;?>">
                        <button type="button" class="btn btn-sm btn-info" onclick="ambilData(<?= $id_siswa?>,<?= $nis?>)" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table class="table-bordered display" id="" style="width:100%; font-size:14px;margin-top:10px;"">
      <thead class="text-center">
        <tr>
          <th>No</th>
          <th>ID</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      
      </tbody>
    </table>
  </div>
</section>


<script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#id_siswa").focus();
            $("#id_siswa").on("input",function(){
                var id = {id_siswa:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'transaksi/get_siswa';?>",
               data: id,
               success: function(msg){
               $('#detail_siswa').html(msg);
               }
            });
            }); 

        
        });
    </script>

