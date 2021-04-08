<html>

<head>

<title>Latihan Select dnanmis</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('tema/bootstrap1/css/bootstrap.min.css') ?>">
<script type="text/javascript" src="<?php echo base_url('tema/bootstrap1/jquery.min.js') ?>"></script>


<script type="text/javascript">

$(document).ready(function(){
 
 $('#kecamatan').change(function(){ 
     var id=$(this).val();
     $.ajax({
         url : "<?php echo site_url('pengaduan/get_desa');?>",
         method : "POST",
         data : {id: id},
         async : true,
         dataType : 'json',
         success: function(data){
              
             var html = '';
             var i;
             for(i=0; i<data.length; i++){
                 html += '<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>';
             }
             $('#desa').html(html);

         }
     });
     return false;
 }); 
  
});
</script>


</head>

<body>
    <div class="container">
 
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <h3>Product Form:</h3>
            <form>
                   <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                        <option value="">No Selected</option>
                        <?php foreach($kecamatan as $row):?>
                        <option value="<?php echo $row->id_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Desa</label>
                    <select class="form-control" id="desa" name="desa" required>
                        <option>No Selected</option>
 
                    </select>
                  </div>
            </form>
        </div>
      </div>
 
    </div>
</body>

</html>