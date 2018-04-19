<!--taruh content disini-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-primary0 ">
            <div class="panel-heading"><h4 class="page-header">
                  List Data Guilink 
              </h4></div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="row">
                      <div class="col-sm-4"><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add</button>
                            <!-- <button class="btn btn-success" onclick="add_guilink()"><i class="glyphicon glyphicon-plus" id="add"></i> Add GUILink</button> --> <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        </div>

                       
                      
                        <div class="col-sm-4">
                        <label>Airlines</label>
                      <select id="airlinesinx" class='form-control'>
                           <?php
                           $data = $airlines;
                            echo"<option value=''>--ALL Airlines--</option>";
                           // echo"<option ></option>";
                            foreach ($data as $key => $value) {
                              echo "<option value='$value[airlinesinx]'>$value[name]</option>";
                            }
                           ?>
                     </select>
                     </div>
                     <div class="col-sm-2"><br>
                     <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>

                    </div>
                    </form><br/>
                    
                
                <table class="table table-stripped table-bordered" id="dataTables" >
                    <thead >
                        <th>No.</th>
                        <th>IPAddress</th>
                        <th>Airlines</th>
                        <th>GuiID1</th>
                        <th>GuiID2</th>
                        <th>GuiID3</th>
                        <th>GuiID4</th>
                        <th>GuiID5</th>
                        <th>Deletef</th>
                        <th>Action</th>
                    </thead>    
                    <tbody style='text-align: center;'>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->    
             


  <!-- Bootstrap modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form GuiLink</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          
          <div class="form-body">
            
            <div class="form-group">
              <label class="control-label col-md-3">ipaddress</label>
              <div class="col-md-9">
                <select class="form-control" id="ipaddress" name="ipaddress">
                <?php
                    $data = $ipaddress;
                    foreach ($data as $key => $value) {
                        # code...

                        echo "<option value='$value[ipaddressinx]'>$value[ipaddress] $value[name]</option>";
                    }
                ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">guiid1</label>
              <div class="col-md-9">
                <select class="form-control" id="guiid1" name="guiid1">
                <?php
                    $data = $guis;
                    foreach ($data as $key => $value) {
                        # code...
                      $guiid = strtoupper($value["guiid"]);
                        echo "<option value='$guiid'>$guiid</option>";
                    }
                ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">guiid2</label>
              <div class="col-md-9">
                <select class="form-control" id="guiid2" name="guiid2">
                <?php
                    $data = $guis;
                    foreach ($data as $key => $value) {
                        # code...
                      $guiid = strtoupper($value["guiid"]);
                        echo "<option value='$guiid'>$guiid</option>";
                    }
                ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">guiid3</label>
              <div class="col-md-9">
                <select class="form-control" id="guiid3" name="guiid3">
                <?php
                    $data = $guis;
                    foreach ($data as $key => $value) {
                        # code...
                      $guiid = strtoupper($value["guiid"]);
                        echo "<option value='$guiid'>$guiid</option>";
                    }
                ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">guiid4</label>
              <div class="col-md-9">
                <select class="form-control" id="guiid4" name="guiid4">
                <?php
                    $data = $guis;
                    foreach ($data as $key => $value) {
                        # code...
                      $guiid = strtoupper($value["guiid"]);
                        echo "<option value='$guiid'>$guiid</option>";
                    }
                ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">guiid5</label>
              <div class="col-md-9">
                <select class="form-control" id="guiid5" name="guiid5">
                <?php
                    $data = $guis;
                    foreach ($data as $key => $value) {
                        # code...
                      $guiid = strtoupper($value["guiid"]);
                        echo "<option value='$guiid'>$guiid</option>";
                    }
                ?>
                </select>
              </div>
            </div>
            
             
            <div class="form-group">
              <label class="control-label col-md-3">Deletef</label>
              <div class="col-md-9">
                <input name="deletef"  placeholder="0" class="form-control" type="text">
               <span class="help-block"></span>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

<script>

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#dataTables').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Guilink/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.airlinesinx = $('#airlinesinx').val();
            }
        },
        
         "columns": [
                      { "data": "no"},
                      { "data": "ipaddress" },
                      { "data": "name" },
                      { "data": "guiid1" },
                      { "data": "guiid2" },
                      { "data": "guiid3" },
                      { "data": "guiid4" },
                      { "data": "guiid5" },
                      { "data": "deletef" },
                      { "data": "aksi" }
                    ],
        responsive: true   
        //Set column definition initialisation properties.
       /* "columnDefs": [
        { 
          "targets": [ 1 ], //last column
           orderData: [ 0, 1 ]
          //"orderable": false, //set not orderable
        },
        ],
*/
      });

        $("input").change(function(){
          $(this).parent().parent().removeClass('has-error');
          $(this).next().empty();
        });


    });
      $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });

    
    function add_guilink()
    {
      save_method = 'add';
      alert('test');
      
      $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      
      $('.modal-title').text('Add GuiLink'); // Set Title to Bootstrap modal title
      $("#ipaddress").attr('readonly', false);
    }

    function edit_guilink(id)
    {
      save_method = 'update';
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Guilink/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          //$("#Destination").val(data.Destination);
            
            $('[name="deletef"]').val(data.deletef);
            $("#ipaddress").val(data.ipaddress);
            //$('[name="ipaddress"]').prop('readonly', true);
            $("#ipaddress").attr('readonly', true);
            $("#guiid1").val(data.guiid1);
            $("#guiid2").val(data.guiid2);
            $("#guiid3").val(data.guiid3);
            $("#guiid4").val(data.guiid4);
            $("#guiid5").val(data.guiid5);

            
            //var text1 = data.AirlinesINX;
            //alert(text1);
            /*
            $('[name="AirlinesINX"]').filter(function() {
                //may want to use $.trim in here
                return $(this).text() == text1; 
            }).prop('selected', true);
            */
            
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit GuiLink'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      var url;
      if(save_method == 'update') 
      {
       url = "<?php echo site_url('Guilink/ajax_update')?>";   
      }
      else
      {        
        url = "<?php echo site_url('Guilink/ajax_add')?>";
      }
        
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
             
              if(data.status) //if success close modal and reload ajax table
            {
                $('#myModal').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',true); //set button enable 

        }   
      });
    }

    function delete_guilink(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('Guilink/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

    </script>