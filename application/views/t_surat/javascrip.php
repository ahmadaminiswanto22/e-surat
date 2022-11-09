<script>
  //  var $table = $('#example')
  // function tambahData(){
  // 	bersih();
  //      $('#form')[0].reset(); 
  // 	// $('#form').bootstrapValidator('resetForm', true);
  //       $('#modal_form').modal('show'); 
  //       $('.modal-title').text('Form Tambah Menu Transaksi'); 
  // 	  document.getElementById('set').value=0;
  // 	  document.getElementById('btnSave').disabled=false;
  // 	 // $("#id_grup_satu").select2("val","");

  //     }


  function bersih() {
    var y = totalrow + 1;

    for (x = 0; x < y; x++) {
      if (document.getElementById("rowmat" + x)) {
        hapusBaris("rowmat" + x);
      }
    }
    totalrow = 0;
  }

  function hapusBaris(x) {
    if (document.getElementById(x) != null) {

      var $row = $(this).parents('.form-group'),
        $option = $row.find('[name="option[]"]');
      $('#' + x).remove();
    }
  }

  var totalrow = 0;

  function addRow() {
    totalrow++;
    var $template = $('#bookTemplate'),
      $clone = $template
      .clone()
      .removeClass('hide')
      .removeAttr('id')
      .attr('data-book-index', totalrow)
      .attr('id', 'rowmat' + totalrow)
      .insertBefore($template);
    $clone
      .find('[name="btnDelRowX"]').attr('onClick', 'hapusBaris("rowmat' + totalrow + '")').end()
      .find('[name="id_siswa"]').attr('name', 'detail[' + totalrow + '][id_siswa]').attr('id', 'id_siswa' + totalrow).end()
      .find('[name="nama"]').attr('name', 'detail[' + totalrow + '][nama]').attr('id', 'nama' + totalrow).attr('onclick', 'popupCetakSurat(' + totalrow + ')').end()
      .find('[name="nis"]').attr('name', 'detail[' + totalrow + '][nis]').attr('id', 'nis' + totalrow).end()
      .find('[name="id_kelas"]').attr('name', 'detail[' + totalrow + '][id_kelas]').attr('id', 'id_kelas' + totalrow).end();

  }

  function popupCetakSurat(baris) {
    $("#barispopup").val(baris);
    $('#modalTable').modal('show');
    $("#modalTable").css({
      "z-index": "1060"
    });
    $('html,body').scrollTop(0);

    loadDatasiswa(1, 15, 'desc');
  }


  function loadDatasiswa(number, size, order) {
    var $table = $('#tabledata');
    var offset = (number - 1) * size;
    var limit = size;
    // alert('ok');
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>/Transaksi/loadDataSiswa?order=" + order + "&limit=" + limit + "&offset=" + offset,
      dataType: "JSON",
      success: function(result) {
        console.log(result);
        $table.bootstrapTable('load', result);
      }
    });
  }

  function fformatkelas(value, row, index) {
    var jenjang = row.jenjang;
    var jurusan = row.jurusan;
    return jenjang + " " + jurusan;

  }

  function operateFormatterPilih(value, row, index) {
    return [
      '<a class="btn btn-sm btn-primary btn-xs" id="pilih" class="btn btn-sm btn-primary"  href="javascript:void(0)" title="Pilih" >',
      'Pilih',
      '</a> '
    ].join('');
  }

  window.operateEventspilih = {
    'click #pilih': function(e, value, row, index) {

      cariDatapopup(row);
    }

  };

  function cariDatapopup(row) {
    var barisdata = $("#barispopup").val();
    $("#id_siswa" + barisdata).val(row.id_siswa);
    $("#nama" + barisdata).val(row.nama);
    $("#nis" + barisdata).val(row.nis);
    $("#id_kelas" + barisdata).val(row.jenjang + " " + row.jurusan);
    //	 $("#stok"+barisdata).val(row.stok);
    tutupFormpopup();
  }

  function tutupFormpopup() {
    $('#modalTable').modal('hide'); // show bootstrap modal
    bukaModal();

  }

  function bukaModal() {
    $("#modal_formupl").css({
      "overflow-y": "scroll"
    });
  }

  //         $('#formCetakSurat')
  //         .bootstrapValidator({
  // 		 excluded: ':disabled',
  //             feedbackIcons: {
  //                 valid: 'glyphicon glyphicon-ok',
  //                 invalid: 'glyphicon glyphicon-remove',
  //                 validating: 'glyphicon glyphicon-refresh'
  //             },
  //             fields: {
  //                 task: {
  //                     validators: {
  //                         notEmpty: {
  //                             message: 'The task is required'
  //                         }
  //                     }
  //                 }
  //             }
  //         })
  //         .on('status.field.bv', function(e, data) {
  // 		//alert(data.field);
  //             data.bv.disableSubmitButtons(false);
  //         }).on('success.form.bv', function(e,data){
  // 		// alert("ok");
  // 		simpanData();
  // 		 e.preventDefault();


  //     });

  //     function simpanData(){
  // 		// alert(page)
  // 	// document.getElementById("btnSave").disabled=true;
  //  	 var data = $('#formCetakSurat').serializeArray();
  // 			  $.ajax({
  // 				  type: "POST",
  // 				  url: "<?php echo base_url(); ?>/Transaksi/simpanData",
  // 				  data: data,
  // 				  success: function(result) { 
  // 				 // alert(result);
  // 					try {
  // 					  obj = JSON.parse(result);  
  // 					var pesan=obj['pesan'];
  // 					var status=obj['status'];
  // 				  	Command: toastr[status](pesan);
  // 					  } catch (e) {
  // 						  keluarLogin();
  // 					}

  // 					 tutupForm();
  // 					 loadData(1, 15,'desc');
  // 					// $("#no_grup_satu").val("");
  // 				  }
  // 			  });
  // 			  return false;
  //  }

  //  function tutupForm(){
  // 		 $('#form')[0].reset(); // reset form on modals 
  //       	$('#modal_form').modal('hide'); // show bootstrap modal
  // 	}

  //   function loadData(number, size,order){
  // 			//var $table = $('#table');
  //             var offset=(number - 1) * size;
  //             var limit=size;

  //             $.ajax({
  //                     type: "POST",
  //                     url: "<?php echo base_url(); ?>transaksi/loaddataTabel?order="+order+"&limit="+limit+"&offset="+offset,
  //                     dataType:"JSON",
  //                     success: function(result){
  //     				 $table.bootstrapTable('load', result);

  //                     }
  //                 });
  //         }

  function cetakData(id) {
    window.open("<?php echo base_url(); ?>transaksi/cetakSurat?id=" + id);

  }

  // function hapusData(id) {
  //   window.open("<?php echo base_url(); ?>transaksi/hapusSurat?id=" + id);

  // }
</script>