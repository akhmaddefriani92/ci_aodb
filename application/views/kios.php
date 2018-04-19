<!--taruh content disini-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
            <h4>Dkios Printing</h4>
          
          <form class="row" method="POST" action="<?php echo site_url('Daily/Result');?>">
              <div class="form-group col-md-2">
                    <label class="control-label">Tanggal</label>
                    <input class="form-control" id="tanggal" type="text" name="tanggal" placeholder="dM" value="<?= $yest?>">
                </div>
                  
                  <div class="form-group col-md-2">
                    <label class="control-label">Kota</label>
                    <select name="kota" id="kota"class="form-control">
                      <option value="CT1">CT1</option>
                      <option value="DJB">DJB</option>
                      <option value="HLP">HLP</option>
                      <option value="CT3">CT3</option>
                      <option value="PLM">PLM</option>
                      <option value="PNK">PNK</option>
                      <option value="PDG">PDG</option>
                      <option value="PGK">PGK</option>
                      <option value="PKU">PKU</option>
                      <option value="BDO">BDO</option>
                      <option value="KNO">KNO</option>
                      <option value="DTB">DTB</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4 align-self-end">
                    <button class="btn btn-primary" type="button" name="submit" id="cari" >Submit</button>
                  </div>
                </form>  
            
       
        <div id="show" style="display: none;">
          <div id="wait" style="display: none;">
            <center><img src="<?php echo base_url('assets/img/332.GIF');?>"/></center>
          </div>          
          <h4>Tanggal : <b id="re_tanggal"></b>&nbsp; Kota: <b id="re_kota"></b></h4>
          <br><br>
          <table class="table table-stripped table-bordered" id="printing">
              <thead>
                <th>Airlines</th>
                <th>Total</th>
            </thead>    
                <tbody>
                </tbody>
            </table>
        </div>  
  </div>
</div>
<!-- /. ROW  -->     

                
            
  

<script>

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#dataTables').DataTable({ 
        responsive: true   
      });

      $('#tanggal').datepicker({
          format: "yyyy-mm-dd",
          autoclose:true,
          maxDate: "+1d"
          // maxDate: "-0"
      });    

    
        $("#cari").click(function(){
        //alert("The paragraph was clicked.");
          $("#show").css("display", "block");
          $("#wait").css("display", "block");

          var tanggal = $("#tanggal").val();
          var kota = $("#kota").val();
           // alert(tanggal+' '+kota);
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('Kios/ResultList/')?>",
            data: "tanggal="+tanggal+"&kota="+kota,
            success: function(data){
            $("#re_tanggal").text(tanggal);
            $("#re_kota").text(kota);
                
              var data = $.parseJSON(data);
              var tr ="";
              $.each(data, function(index, val) {
                  // alert(val.total);
                  tr+="<tr>";
                  tr+="<td>"+val.airlines+"</td>";
                  tr+="<td>"+val.total+"</td>";
                  tr+="</tr>";

              }); 

              $("#printing tbody").html(tr);

              $("#wait").css("display", "none");

             //success  
            },
            error: function(xhr, textStatus, errorThrown){
              alert('request failed connection lost');
                location.reload();
              } 

          });
    });//ajax

        });//cari   
    



    
    

</script>