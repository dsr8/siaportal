<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <title>Siaportal</title>
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
                        <h1 class="mt-4">View Overseas</h1>
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
                                                <th  style="width:5px;">Id</th>

               <th style="width:10px;">Voice</th>
				<th style="width:10px;">Name</th>
				<th style="width:5px;">Officio id /</br>Add on Date</th>
				<th style="width:5px;">Source</th>
				<th style="width:5px;">Type</th>
				<th style="width:5px;">Team Mamber Name	</th>
				<th style="width:5px;">country code/Number</th>
				<th style="width:5px;">Team status</th>
				<th style="width:5px;">Admin Status</th>
				
				<!--th style="width:5px;"> Image</th>
				<th style="width:5px;">Voice</th-->
				<th style="width:5px;">Action</th>
				<th style="width:5px;">Edit</th>
				<th style="width:5px;">SMS</th>
                                                   
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             	<?php foreach($new_record as $allcat) { ?>
                <tr id="dd<?php echo $allcat['id'];?>">
                  <td style="width:5px;"><?php echo $allcat['id'];?> </td>
 <td style="background-color:red;">
				 	<?php if($allcat['news_image1']==""){ ?>

				 		  <label style="color:white">Recoding not uploaded yet</label>

				 		<?php 
				 	}else { ?>
				  
				  <?php } ?>
</td>

                  <?php if ($allcat['from_web']!=''){ ?>
                  <td style="width:5px;color:red"><?php echo $allcat['heading'];?> 
                  
                  
                  
                  
                  
                  </td>
              <? } else { ?>

<td style="width:5px;"><?php echo $allcat['heading'];?>





</td>
          <?php    } ?>
				  <td style="width:5px;"><?php echo $allcat['short_news'];?>/<?php echo $allcat['insert_on'];?></hr>
				  
				  
				  
				  <br>
				  <?php echo $allcat['agent_name'];?>
				  <br>
				  <?php echo $allcat['team_member'];?>
				  
				  </td>
				  
			
				  <td style="width:5px;"> <?php echo $allcat['typee'];?></td>
				 
				  <td style="width:5px;"><?php echo $allcat['ccode'];?><?php echo $allcat['number'];?> </td>
				   <form action="<?php echo base_url();?>/Siaportal/edit_team_immigration_enquiry/<?php  echo $allcat['id'];?>/overseas" method="post">
				  <input type="hidden" name="id" value="<?php  echo $allcat['id'];?>">
				  <td style="width:5px;"><textarea style="width:70px;" name="status"> <?php echo $allcat['agent_status'];?></textarea>
				 
				  
				  <input type="submit" name="submit" value="Update">
				  </td>
				  </form>
				  
				    <form action="<?php echo base_url();?>/Siaportal/edit_admin_immigration_enquiry/<?php  echo $allcat['id'];?>/overseas" method="post">
				  <input type="hidden" name="id" value="<?php  echo $allcat['id'];?>">
				  <td style="width:5px;"><textarea style="width:70px;"name="status"> <?php echo $allcat['admin_status'];?></textarea>
				 
				  
				  <input type="submit" name="submit" value="Update">
				  </td>
				  </form>
				 
				 
				  
				  <!--td style="width:5px;"><a href="<?php echo base_url();?>assets_admin/uploads/news_image/<?php echo $allcat['image'];?>"target="_blank" download><img  style="height:80px;width:80px;" src="<?php echo base_url();?>assets_admin/uploads/news_image/<?php echo $allcat['image'];?>" ></a>
				  
				  
				  
				  </td-->
				  <!--td style="width:20ox;">
				  
			


<audio controls  style="width:20ox;">
  <source src="<?php echo base_url();?>assets_admin/uploads/news_image/<?php echo $allcat['news_image1'];?>" type="audio/mpeg"/>
  <source src="<?php echo base_url();?>assets_admin/uploads/news_image/<?php echo $allcat['news_image1'];?>" type="audio/mp3"/>
  <source src="<?php echo base_url();?>assets_admin/uploads/news_image/<?php echo $allcat['news_image1'];?>" type="audio/mp4"/>
  <source src="<?php echo base_url();?>assets_admin/uploads/news_image/<?php echo $allcat['news_image1'];?>" type="audio/ogg"/>
  <object type="application/x-shockwave-flash" data="media/OriginalMusicPlayer.swf" width="225" height="86"> 
   <param name="movie" value="media/OriginalMusicPlayer.swf"/>
   <param name="FlashVars" value="mediaPath=vincent.mp3" /> 
  </object> 
</audio>
				  </td-->
				 
				 
				 
				 
				 

				 
				
                 <form action="<?php echo base_url();?>/Siaportal/mail_immigration_enquiry/<?php  echo $allcat['id'];?>/overseas" method="post">
				  <input type="hidden" name="id" value="<?php  echo $allcat['id'];?>">
				  <td style="width:5px;">
				  
				  <select name="status">
				  <option value="">Select a option</option>
				  <option value="1">Processed/Delete</option>
				  <option value="2">Dropped/Delete</option>
				   <option value="3">Appointment/Delete</option>
				  </select>
				  
				  
				 
				  
				  <input type="submit" name="submit" value="Update">
				  </td>
				  </form>
                  
                 <td>
                 	<a  class="on" style="background: lightgreen;margin-bottom: 5px;color:black; " href="<?php echo base_url();?>/Siaportal/immigration_enquiry_maila/<?php echo $allcat['id'];?>/1/overseas">Send Mail(<?php echo $allcat['mail_send'];?>)<br>(<?php echo $allcat['mail_send_on'];?>)</a><br>

                 	<a  class="on" target="_blank" href="<?php echo base_url();?>/Siaportal/edit_immigration_enquiry/<?php echo $allcat['id'];?>/overseas">Edit</a></td>

<td>
                 	<!--<a onclick="sms(<?php echo $allcat['id'];?>,'overseas')"  class="on" style="background: blue;margin-bottom: 5px;color:white; " >SMS Send(<?php echo $allcat['sms_send'];?>)<br>(<?php echo $allcat['sms_send_on'];?>)</a>-->
					
					<a href="https://wa.me/<?php echo $allcat['ccode'];?><?php echo $allcat['number'];?>" target="_blank" >
 <img class="whatsapp_icon"  src="https://siaimmigration.com/assets/images/whatsapp/whatsapp.png" alt="">
</a>
					<br>

                 	<a href="#" onclick="move_newrecord(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white; " >Move to Student</a><br>

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
  $(function () {
          $('#dataTable1').dataTable( {
  "iDisplayLength": 50,
 
 
});
   
     var oTable = $('#dataTable1').dataTable();
    
        // Sort immediately with columns 0 and 1
       oTable.fnSort( [ [0,'desc'] ] );
    
  });
</script>


 <SCRIPT language="JavaScript">
function move_newrecord(id)
{
	
	
    var hi= confirm("Are You really want to move");

   // alert(id);
    if (hi == true){
       // alert("hi");



        $url = 'move_to_new_record/'+id+'/'+over;
       // alert($url);
		 window.location.href = $url;	
		
		
		
    }else{


 $url = '/Siaportal/view_overseas';
     //   alert($url);
		 window.location.href = $url;	

     
    }
}
 </SCRIPT>

    </body>
</html>
