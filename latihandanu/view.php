<?php if(!defined('D_KEY_PIPE'))exit;?>
<script type="text/javascript">
	$(document).ready(function () {
		load_first("danulist",DT,false,true,true,0,true);
	});
	function load_data_pegawai(){
	    load_data("danulist",DT);
	}
	function new_pegawai(){
        $('#nama').val('');
        $('#keterangan').val('');
        
        remove_id();
	}
	function save_pegawai(){
	    var data={
        nama:$('#nama').val(),
        keterangan:$('#keterangan').val(),
        
	    }
	    if(check_id())data.id=get_id();
	    $.post(PT,data,function(data){
			if(data!='ok')
				toastr.error(data, '', {positionClass: 'md-toast-bottom-right'});
			else
				toastr.success('SIMPAN DATA PEGAWAI OK', '', {positionClass: 'md-toast-bottom-right'});
			load_data_pegawai();
			$('#modal-pegawai').modal('hide');
	    });
	}
	function edit_pegawai(v){
	    $.get(DT,{id:v},function(data){
	        var data=JSON.parse(data);
            $('#nama').val(data.nama);
            $('#keterangan').val(data.keterangan);
            
	        set_id(v);
	    });
	}
	
    function reformattable_(nRow, aData, iDisplayIndex, iDisplayIndexFull){
         var id=JSON.parse(aData[4]);
        var a='<button data-toggle="modal" data-target="#modal-pegawai" onclick="edit_pegawai('+id+')"> Edit </button>';
            a+='<button onclick = "hapus_pegawai('+id+')"> Hapus </button>';
        
        $('td:eq(4)',nRow).html(a);
        
    }
    function hapus_pegawai(v){
	    $.post(PT,{hapus:v},function(data){
            if(data!='ok')
				toastr.error(data, '', {positionClass: 'md-toast-bottom-right'});
			else
				toastr.success('HAPUS DATA PEGAWAI OK', '', {positionClass: 'md-toast-bottom-right'});
			load_data_pegawai();
	    });
    }
</script>
<main>
	<div class="container">
		<section class="section">
            <div class="card ">
              <h5 class="card-header h5 bg-success text-white">Daftar Data Pegawai</h5>
              <div class="card-body">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-pegawai" onclick="new_pegawai()"><i class="fas fa-plus"></i> Add</button>
                <?=add_table('danulist',array('No','Nama','Keterangan','Status',''),'',false);?>
              </div>
            </div>
		</section>
	</div>
</main>

        <div class="modal fade" id="modal-pegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <!-- Content -->
            <div class="modal-content">

              <!-- Modal cascading tabs -->
              <div class="modal-c-tabs">

                <!-- Tab panels -->
                <div class="tab-content">
                  <!-- Panel 17 -->
                  <div class="tab-pane fade in show active" role="tabpanel">
                    <!-- Body -->
                    <div class="modal-body mb-1">
                    	<h5>Data Pegawai</h5>
                    	<div class="row">
                    		<div class="col-lg-6">
		                      <div class="md-outline md-form">
		                        <input type="text" class="form-control form-control-sm" id="nama" placeholder="nama">
		                        <label for="nama" class="">Nama akun</label>
		                      </div>
							</div>
                    		<div class="col-lg-6">
		                      <div class="md-outline md-form">
		                        <input type="text" class="form-control form-control-sm" id="keterangan" placeholder="keterangan">
		                        <label for="keterangan" class=""></label>
		                      </div>
							</div>

						</div>
                    	<div class="row">
                    		<div class="col-12">
		                      <div class="text-center mt-2">
		                        <button class="btn btn-info btn-sm" onclick="save_pegawai()">Simpan <i class="fa fa-save"></i></button>
		                        <button class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
	                    	  </div>
	                    	</div>
	                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>