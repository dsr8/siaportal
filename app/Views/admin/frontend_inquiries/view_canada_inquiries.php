<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <title>Frontend Inq</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
         <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         <style>
             .on {
    width: 6em;
    margin: .0em;
    padding: .4em 1em;
    text-align: center;
    border-radius: .25em;
    display: inline-block;
    background: lightgreen;
    box-sizing: border-box;
    font: 1em/1em 'Segoe UI';
    color: #fff;
    border: 1px solid rgba(0, 0, 0, .15);
    box-shadow: 0 .1em .2em rgba(0, 0, 0, .3);
   /*  background-image: linear-gradient(145deg, rgba(255, 255, 255, .5), rgba(255, 255, 255, 0) 1em),
                      linear-gradient(0deg, rgba(0, 0, 0, .2), transparent); */
	background: linear-gradient(-90deg, #333, #333);
}

.team-status-textarea, .admin-status-textarea {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Segoe UI', Arial, sans-serif;
    font-size: 12px;
    resize: vertical;
    transition: border-color 0.3s ease;
}

.team-status-textarea:focus, .admin-status-textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
}

.mail-status-select {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Segoe UI', Arial, sans-serif;
    font-size: 12px;
    transition: border-color 0.3s ease;
}

.mail-status-select:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
}

.save-status-team, .save-status-admin, .save-status-mail {
    display: block;
    margin-top: 4px;
    font-size: 11px;
    min-height: 16px;
}


         </style>
    </head>
    <body class="sb-nav-fixed">
        <?= view ('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                

<?= view('admininclude/admin_nav'); ?>

                 
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">View Canada Inquiries</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>---</th>
                                                <th>Voice</th>
                                                 <th>Name</th>

                                                <th>Officio id /</br>Add on Date</th>
                                                
                                                
                                                  <th>Type</th>
                                                  
                                                    <th>country code/Number</th>
                                                    <th>Team status</th>
                                                    <th>Admin Status</th>
                                                    <th>Mail Status</th>


                                                   <th>Action</th>
                                                   <th>Edit</th>
                                                   <th>SMS</th>
                                                   
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             	<?php foreach($new_record as $allcat) { ?>
                <tr id="dd<?php echo $allcat['id'];?>">
                  <td style="width:5px;"><?php echo $allcat['id'];?> </td>
                  <td style="width:80px;font-size:11px;">
                  <?php
                    $ekey = strtolower(trim($allcat['email'] ?? ''));
                    if(!empty($ekey) && isset($emailMap[$ekey])) {
                        foreach($emailMap[$ekey] as $em) {
                            $label = $em['entery_status']=='client' ? 'C' : 'P';
                            $color = $em['entery_status']=='client' ? '#007bff' : '#6f42c1';
                            echo '<span style="background:'.$color.';color:#fff;padding:1px 4px;border-radius:3px;margin-bottom:2px;display:inline-block;">'.$label.'-'.$em['id'].'</span><br>';
                        }
                    }
                  ?>
                  </td>
 <td style="background-color:red;">
				 	<?php if($allcat['news_image1']==""){ ?>

				 		  <label style="color:white">Recoding not uploaded yet</label>

				 		<?php 
				 	}else { ?>
				  
				  <?php } ?>
</td>

                  <?php if ($allcat['from_web']!=''){ ?>
                  <td style="width:5px;color:red"><?php echo $allcat['heading'];?> </td>
              <? } else { ?>

<td style="width:5px;"><?php echo $allcat['heading'];?> </td>
          <?php    } ?>
				  <td style="width:5px;"><?php echo $allcat['short_news'];?>/<?php echo $allcat['insert_on'];?></hr>
				  
				  <br>
				  <?php echo $allcat['agent_name'];?>
				  <br>
				  <?php echo $allcat['team_member'];?>
				  
				  
				  </td>
				  
				 
				  <td style="width:5px;"> <?php echo $allcat['typee'];?><br>

<a href="#" onclick="move_OVERSE(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white; " >OVERSE</a><br>
				  </td>
				 
				  <td style="width:5px;"><?php echo $allcat['ccode'];?><?php echo $allcat['number'];?> </td>
                  <td style="width:150px;">
                    <textarea style="width:100%; height:80px;" class="team-status-textarea" data-id="<?php echo $allcat['id'];?>" data-type="team" placeholder="Team status..."><?php echo $allcat['agent_status'];?></textarea>
                    <small class="form-text text-muted save-status-team" data-id="<?php echo $allcat['id'];?>"></small>
                  </td>
                  <td style="width:150px;">
                    <textarea style="width:100%; height:80px;" class="admin-status-textarea" data-id="<?php echo $allcat['id'];?>" data-type="admin" placeholder="Admin status..."><?php echo $allcat['admin_status'];?></textarea>
                    <small class="form-text text-muted save-status-admin" data-id="<?php echo $allcat['id'];?>"></small>
                  </td>
                  <td style="width:150px;">
                    <select class="mail-status-select" data-id="<?php echo $allcat['id'];?>" style="width:100%;">
                    <option value="">Select a option</option>
                    <option value="1">Processed/Delete</option>
                    <option value="2">Dropped/Delete</option>
                    <option value="3">Appoint/without Appoint/Delete</option>
                    </select>
                    <small class="form-text text-muted save-status-mail" data-id="<?php echo $allcat['id'];?>"></small>
                  </td>
                  
                 <td>
                 	<a  class="on" style="background: lightgreen;margin-bottom: 5px;color:black; " href="<?php echo base_url();?>/Siaportal/immigration_enquiry_maila/<?php echo $allcat['id'];?>/<?php echo $allcat['mail_send'];?>">Send Mail(<?php echo $allcat['mail_send'];?>)<br>(<?php echo $allcat['mail_send_on'];?>)</a><br>

                 	<a  class="on" target="_blank" href="<?php echo base_url();?>/Siaportal/edit_immigration_enquiry/<?php echo $allcat['id'];?>">Edit</a></td>

<td>
                 	<!--<a onclick="sms(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white; " >SMS Send(<?php echo $allcat['sms_send'];?>)<br>(<?php echo $allcat['sms_send_on'];?>)</a>-->
					
					<a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $allcat['ccode'].$allcat['number']); ?>" target="_blank" >
 <img class="whatsapp_icon"  src="https://siaimmigration.com/assets/images/whatsapp/whatsapp.png" alt="">
</a>
					<br>

                 	<a href="#" onclick="move_newrecord(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white; " >Move to Student</a><br>

                 	<a href="#" onclick="move_prospect(<?php echo $allcat['id'];?>)"  class="on" style="background: purple;margin-bottom: 5px;color:white; " >Move to Prospect</a><br>

                </td> 	
 

                </tr>
                <?php } ?>
               
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>
                                <a href="#"></a>
                               
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/datatables-demo.js"></script>
        
        <script>
        // AJAX Auto-Save on Focus Out
        $(document).ready(function() {
            // Team/Admin status textarea blur event
            $(document).on('blur', '.team-status-textarea, .admin-status-textarea', function() {
                var textarea = $(this);
                var recordId = textarea.data('id');
                var updateType = textarea.data('type');
                var statusValue = textarea.val();
                var statusElement = $('.save-status-' + updateType + '[data-id="' + recordId + '"]');
                var actionUrl;

                if (updateType === 'team') {
                    actionUrl = '<?php echo base_url();?>/Siaportal/edit_team_immigration_enquiry';
                } else if (updateType === 'admin') {
                    actionUrl = '<?php echo base_url();?>/Siaportal/edit_admin_immigration_enquiry';
                }

                if (!statusValue || statusValue.trim() === '') {
                    statusElement.text('');
                    return;
                }

                // Show saving status
                statusElement.html('<i class="fas fa-spinner fa-spin"></i> Saving...').css('color', '#007bff');

                $.ajax({
                    type: 'POST',
                    url: actionUrl + '/' + recordId,
                    data: {
                        id: recordId,
                        status: statusValue,
                        submit: 'Update'
                    },
                    success: function(response) {
                        statusElement.html('<i class="fas fa-check"></i> Saved').css('color', '#28a745');
                        setTimeout(function() {
                            statusElement.fadeOut(300, function() {
                                $(this).text('').show();
                            });
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        statusElement.html('<i class="fas fa-exclamation-circle"></i> Error').css('color', '#dc3545');
                    }
                });
            });

            // Mail status select change event
            $(document).on('change', '.mail-status-select', function() {
                var select = $(this);
                var recordId = select.data('id');
                var statusValue = select.val();
                var statusElement = $('.save-status-mail[data-id="' + recordId + '"]');
                var actionUrl = '<?php echo base_url();?>/Siaportal/mail_immigration_enquiry';

                if (!statusValue) {
                    statusElement.text('');
                    return;
                }

                // Show saving status
                statusElement.html('<i class="fas fa-spinner fa-spin"></i> Saving...').css('color', '#007bff');

                $.ajax({
                    type: 'POST',
                    url: actionUrl + '/' + recordId,
                    data: {
                        id: recordId,
                        status: statusValue,
                        submit: 'Update'
                    },
                    success: function(response) {
                        statusElement.html('<i class="fas fa-check"></i> Saved').css('color', '#28a745');
                        setTimeout(function() {
                            $('#dd' + recordId).fadeOut(500);
                        }, 1000);
                    },
                    error: function(xhr, status, error) {
                        statusElement.html('<i class="fas fa-exclamation-circle"></i> Error').css('color', '#dc3545');
                    }
                });
            });
        });
        </script>
        
        <SCRIPT language="JavaScript">
function move_newrecord(id)
{
	
	
    var hi= confirm("Are You really want to move");

   // alert(id);
    if (hi == true){
       // alert("hi");



        $url = 'move_to_new_record/'+id;
       // alert($url);
		 window.location.href = $url;	
		
		
		
    }else{


 $url = 'view_canada_inquiries';
     //   alert($url);
		 window.location.href = $url;	

     
    }
}
 </SCRIPT>
 
 
   <SCRIPT language="JavaScript">
function move_prospect(id)
{
    var hi = confirm("Are You really want to move to Prospect?");
    if (hi == true){
        var $url = 'move_to_prospect/' + id;
        window.location.href = $url;
    } else {
        window.location.href = '/Siaportal/view_canada_inquiries';
    }
}
 </SCRIPT>

   <SCRIPT language="JavaScript">
function move_OVERSE(id)
{
	
	
    var hi= confirm("Are You really want to move");

  //  alert(id);
    if (hi == true){
       // alert("hi");



        $url = 'move_to_OVERSE/'+id;
       // alert($url);
		 window.location.href = $url;	
		
		
		
    }else{


 $url = '/Siaportal/view_canada_inquiries';
     //   alert($url);
		 window.location.href = $url;	

     
    }
}
 </SCRIPT>
 
 
 
        
        
                  <script>
  $(function () {
          $('#dataTable1').dataTable( {
  "iDisplayLength": 50,
 
 
});
   
     var oTable = $('#dataTable1').dataTable();
    
        // Sort immediately with columns 0 and 1
       oTable.fnSort( [ [0,'desc'] ] );
    
  });
</script>

    </body>
</html>
