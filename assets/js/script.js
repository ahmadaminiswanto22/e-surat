// dataTabel
$(document).ready(function() {
        $('#example').DataTable();
} );

// sweetalert
const flashData = $('.flash-data').data('flashdata');
if( flashData ) {
    Swal.fire({
        title: 'Data ',
        text: 'Berhasil ' + flashData,
        icon: 'success',
        confirmButtonText: 'Oke'
    });
}

//console.log(flashData);

//tombol hapus
$('.tombol').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah Anda Yaikin?',
      text: "Data Akan Dihapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
       document.location.href = href;
      }
    })
    
});

// ajax edit surat
$(function(){
  $('.tambahSuratMasuk').on('click', function() {
    $('#judulSuratMasuk').html('Tambah Data Surat Masuk');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#nomor').val("");
    $('#lampiran').val("");
    $('#perihal').val("");
    $('#asal_surat').val("");
    $('#siswa').val("");
    $('#kelas').val("");
    $('#petugas').val("");
    $('#tgl_srtMasuk').val("");
    $('#gambar').val("");
    $('#id_suratMasuk').val("");
  });

  $('.tampilUbahSuratMasuk').on('click', function(){
    $('#judulSuratMasuk').html('Edit Data Surat Masuk');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', '<?= base_url();?>SuratMasuk/edit_surat');
    const id_suratMasuk = $(this).data('id');
    // console.log(id);

    $.ajax({
      url:'http://localhost/ci-eSurat/SuratMasuk/getedit_surat',
      data: {id : id_suratMasuk},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#nomor').val(data.nomor);
        $('#lampiran').val(data.lampiran);
        $('#perihal').val(data.perihal);
        $('#asal_surat').val(data.asal_surat);
        $('#siswa').val(data.id_siswa);
        $('#kelas').val(data.id_kelas);
        $('#petugas').val(data.petugas);
        $('#tgl_srtMasuk').val(data.tgl_srtMasuk);
        $('#gambar').val(data.gambar);
        $('#output').val(data.gambar);

        $('#id_suratMasuk').val(data.id_suratMasuk);
      }
    }); 
  });
  
});

// ajax edit siswa
$(function(){
  $('.tambahSiswa').on('click', function() {
    $('#judulSiswa').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#nis').val("");
    $('#nama').val("");
    $('#jenis_kelamin').val("");
    $('#id_kelas').val("--Pilih Kelas--");
    $('#tempat_lahir').val("");
    $('#tgl_lahir').val("");
    $('#alamt').val("");
    $('#id_siswa').val("");
    
  });

  $('.tampilUbahSiswa').on('click', function(){
    $('#judulSiswa').html('Edit Data Siswa');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', 'http://localhost/ci-eSurat/siswa/edit_siswa');
    const id_siswa = $(this).data('id');
    // console.log(id);

    $.ajax({
      url:'http://localhost/ci-eSurat/siswa/getedit_siswa',
      data: {id : id_siswa},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#nis').val(data.nis);
        $('#nama').val(data.nama);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#tgl_lahir').val(data.tgl_lahir);
        $('#alamt').val(data.alamt);
        $('#kelas').val(data.id_kelas);
        $('#id_siswa').val(data.id_siswa);
        if(data.jenis_kelamin=="L"){
          $('input:radio[id=jenis_kelaminL]')[0].checked = true;
          $('input:radio[id=jenis_kelaminP]')[0].checked = false;
        }else{
          $('input:radio[id=jenis_kelaminL]')[0].checked = false;
          $('input:radio[id=jenis_kelaminP]')[0].checked = true;
        }
        
      }
    }); 
  });
  
});

// ajax edit kelas
$(function(){
  $('.tambahKelas').on('click', function() {
    $('#judulKelas').html('Tambah Data Kelas');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#jenjang').val("--Pilih Jenjang--");
    $('#jurusan').val("--Pilih Jurusan--");
    $('#jmlh').val("");
    $('#id_kelas').val("");
  });

  $('.tampilUbahKelas').on('click', function(){
    $('#judulKelas').html('Edit Data Kelas');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', 'http://localhost/ci-eSurat/kelas/edit_kelas');
    const id_kelas = $(this).data('id');
    // console.log(id);

    $.ajax({
      url:'http://localhost/ci-eSurat/kelas/getedit_kelas',
      data: {id : id_kelas},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#jenjang').val(data.jenjang);
        $('#jurusan').val(data.jurusan);
        $('#jmlh').val(data.jmlh);
        $('#id_kelas').val(data.id_kelas);
        
      }
    }); 
  });
  
});

// ajax edit user
$(function(){
  $('.tambahUser').on('click', function() {
    $('#judulUser').html('Tambah Data User');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#username').val("");
    $('#email').val("");
    $('#password').val("");
    $('#password2').val("");
    $('#nama').val("");
    $('#akses').val("");
    $('#id_user').val("");
  });

  $('.tampilUbahUser').on('click', function(){
    $('#judulUser').html('Edit Data User');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', 'http://localhost/ci-eSurat/registrasi/edit_user');
    const id_user = $(this).data('id');
    // console.log(id_user);

    $.ajax({
      url:'http://localhost/ci-eSurat/registrasi/getedit_user',
      data: {id : id_user},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#username').val(data.username);
        $('#email').val(data.email);
        $('#password').val(data.password);
        $('#password2').val(data.password);
        $('#nama').val(data.nama);
        $('#akses').val(data.akses);
        $('#id_user').val(data.id_user);
        
      }
    }); 
  });
  
});



// $(function(){
//   $('.tambahCetakSurat').on('click', function() {
//     $('#judulCetakSurat').html('Form Kelola Surat');
//     $('.modal-footer button[type=submit]').html('Simpan');
//     $('#idCetak').val("");
//     $('#no_surat').val("");
//     $('#tgl_surat').val("");
//     $('#lampiran').val("");
//     $('#perihal').val("");
//     $('#perusahaan').val("");
//     $('#almt_perusahaan').val("");
//     $('#id_user').val("");
//     $('#id_siswa').val("");
//     $('#nama').val("");
//     $('#nis').val("");
//     $('#id_kelas').val("");
//   });

//   $('.tampilUbahSurat').on('click', function(){
//     $('#judulCetakSurat').html('Form Edit Kelola Surat');
//     $('.modal-footer button[type=submit]').html('Edit');
//     $('.modal-body form').attr('action', 'http://localhost/ci-eSurat/transaksi/edit_surat');
//     const idCetak = $(this).data('id');
//     // console.log(idCetak);
//     $.ajax({
//       url:'http://localhost/ci-eSurat/transaksi/getedit_surat',
//       data: {id : idCetak},
//       method: 'post',
//       dataType: 'json',
//       success: function(data){
//         // console.log(data);
//         $('#idCetak').val(data.idCetak);
//         $('#no_surat').val(data.no_surat);
//         $('#tgl_surat').val(data.tgl_surat);
//         $('#lampiran').val(data.lampiran);
//         $('#perihal').val(data.perihal);
//         $('#perusahaan').val(data.perusahaan);
//         $('#almt_perusahaan').val(data.almt_perusahaan);
//         $('#id_user').val(data.id_user);
//         $('#id_siswa').val(data.id_siswa);
//         $('#nama').val(data.nama);
//         $('#nis').val(data.nis);
//         $('#id_kelas').val(data.id_kelas);
        
//       }
//     });
   
//   });
  
// });




