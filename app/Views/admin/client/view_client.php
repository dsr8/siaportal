
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
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>



 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

          <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



        <style type="text/css">
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
    box-shadow: 0 0.1em 0.2em rgba(0, 0, 0, .3);
    /* background-image: linear-gradient(145deg, rgba(255, 255, 255, .5), rgba(255, 255, 255, 0) 1em), linear-gradient(0deg, rgba(0, 0, 0, .2), transparent); */
    background: linear-gradient(-90deg, #333, #333);
}

/*

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #DCDCDC;
}
*/


        .dup-tooltip {
            position:absolute;
            background:#333;
            color:#fff;
            padding:8px 10px;
            border-radius:6px;
            font-size:11px;
            white-space:nowrap;
            min-width:130px;
            z-index:9999;
            top:100%;
            left:0;
            margin-top:4px;
            line-height:1.4;
            box-shadow:0 2px 8px rgba(0,0,0,0.5);
        }
        .dup-tooltip .dup-id-row {
            display:block;
            padding:2px 0;
            border-bottom:1px solid rgba(255,255,255,0.1);
        }
        .dup-tooltip .dup-id-row:last-child { border-bottom:none; }
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
                        <h1 class="mt-4">View Client</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        
                       
                        <!-- Search Bar -->
                        <div class="card mb-3">
                            <div class="card-body py-2">
                                <form method="get" action="" class="form-inline">
                                    <input type="number" name="search_id" class="form-control mr-2" placeholder="Search by ID" value="<?php echo htmlspecialchars($search_id ?? ''); ?>" style="width:120px;">
                                    <input type="text" name="search_name" class="form-control mr-2" placeholder="Search by Name" value="<?php echo htmlspecialchars($search_name ?? ''); ?>" style="width:180px;">
                                    <input type="text" name="search_phone" class="form-control mr-2" placeholder="Search by Phone No" value="<?php echo htmlspecialchars($search_phone ?? ''); ?>" style="width:180px;">
                                    <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-search"></i> Search</button>
                                    <a href="<?php echo base_url('Siaportal/view_client'); ?>" class="btn btn-secondary"><i class="fa fa-refresh"></i> Refresh</a>
                                </form>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>Export Data</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             <?php foreach($client as $allcat){ ?>
                                            <tr>
                                                <td>
                                               
                                               
                 
             

 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-3"><i style="color:#80ced6;"class="fa fa-id-card" aria-hidden="true"></i><?php echo $allcat['id'];?>
        <?php $pid = (int)$allcat['id']; ?>
        <?php if (!empty($dupProspectIds[$pid])): ?>
            <?php
                $dups    = $dupProspectIds[$pid];
                $preview = array_slice($dups, 0, 2);
                $rest    = count($dups) - 2;
                $allStr  = htmlspecialchars(implode(', ', $dups));
                $preStr  = implode(', ', $preview);
                $moreStr = $rest > 0 ? ' +' . $rest . ' more' : '';
            ?>
            <span style="background:#6f42c1;color:#fff;padding:1px 6px;border-radius:3px;font-size:10px;font-weight:bold;margin-left:4px;cursor:pointer;position:relative;"
                  onclick="toggleDupTooltip(this)"
                  data-allids="<?php echo $allStr; ?>">
                Prospect [<?php echo $preStr . $moreStr; ?>]
            </span>
        <?php endif; ?>
        <?php if (!empty($dupClientIds[$pid])): ?>
            <?php
                $dups    = $dupClientIds[$pid];
                $preview = array_slice($dups, 0, 2);
                $rest    = count($dups) - 2;
                $allStr  = htmlspecialchars(implode(', ', $dups));
                $preStr  = implode(', ', $preview);
                $moreStr = $rest > 0 ? ' +' . $rest . ' more' : '';
            ?>
            <span style="background:#e74c3c;color:#fff;padding:1px 6px;border-radius:3px;font-size:10px;font-weight:bold;margin-left:4px;cursor:pointer;position:relative;"
                  onclick="toggleDupTooltip(this)"
                  data-allids="<?php echo $allStr; ?>">
                Client [<?php echo $preStr . $moreStr; ?>]
            </span>
        <?php endif; ?> <br>



          <?php if($allcat['news_image1']==""){ ?>

                          <label style="color:#ff7b25">Recoding not uploaded yet</label>

                        <?php 
                    }else { 


if($allcat['voice_added']=='siaportal'){
                     ?>
 
 <?php } else { ?>

                  
                  <?php } } ?>


                  <br>






         
<i class="fa fa-bookmark" aria-hidden="true"></i> <?php echo $allcat['heading'];?><br>
<i class="fa fa-mobile" aria-hidden="true"></i><?php echo $allcat['number'];?><br>
<i class="fa fa-envelope-open" aria-hidden="true"></i><?php echo $allcat['email'];?><br>

<?php if (!empty($bookedIds[(int)$allcat['id']])):
    $appt = $bookedIds[(int)$allcat['id']];
    $sColors = [0=>'#856404',1=>'#0f5132',2=>'#084298',3=>'#842029'];
    $sLabels = [0=>'Pending',1=>'Confirmed',2=>'Completed',3=>'Cancelled'];
    $sc = $sColors[$appt['status']] ?? '#0f5132';
    $sl = $sLabels[$appt['status']] ?? '';
?>
    <span style="display:inline-block;background:#d1e7dd;color:#0f5132;font-size:10px;font-weight:700;padding:2px 8px;border-radius:10px;margin-top:3px;">&#128197; Appt Booked</span><br>
    <small style="font-size:10px;color:#333;">&#128198; <?php echo date('d M Y', strtotime($appt['date'])); ?> &nbsp;&#128336; <?php echo date('h:i A', strtotime($appt['time'])); ?></small><br>
    <small style="font-size:10px;font-weight:700;color:<?php echo $sc; ?>;"><?php echo $sl; ?></small><br>
    <?php if (!empty($appt['service_type'])): ?>
    <small style="font-size:10px;color:#555;">&#128203; <?php echo htmlspecialchars($appt['service_type']); ?></small><br>
    <?php endif; ?>
    <?php if (!empty($appt['appointment_type'])): ?>
    <small style="font-size:10px;color:#6f42c1;font-weight:600;">&#128197; <?php echo htmlspecialchars($appt['appointment_type']); ?></small><br>
    <?php endif; ?>
    <?php if (!empty($appt['consultation_type'])): ?>
    <small style="font-size:10px;color:#333;">&#128222; <?php echo htmlspecialchars($appt['consultation_type']); ?><?php
        if ($appt['consultation_type'] === 'In-Person' && !empty($appt['office_location'])) {
            echo ' – ' . htmlspecialchars($appt['office_location']);
        } elseif (!empty($appt['contact_method'])) {
            echo ' – ' . htmlspecialchars($appt['contact_method']);
        }
    ?></small><br>
    <?php endif; ?>
    <small style="font-size:10px;color:<?php echo !empty($appt['assigned_to']) ? '#1a73e8' : '#aaa'; ?>;">&#128100; <?php echo !empty($appt['assigned_to']) ? htmlspecialchars($appt['assigned_to']) : 'Unassigned'; ?></small>
<?php endif; ?>

<?php if (!empty($bookedIds[(int)$allcat['id']])): ?>
<button type="button"
    style="background:#27ae60;margin-top:6px;color:white;width:100%;font-size:12px;border:none;padding:5px 8px;cursor:default;border-radius:3px;display:block;opacity:0.85;"
    title="<?php $a=$bookedIds[(int)$allcat['id']]; echo date('d M Y',strtotime($a['date'])).' '.date('h:i A',strtotime($a['time'])); ?>"
    disabled>
    &#10003; Appointment Booked
</button>
<?php else: ?>
<button type="button"
    style="background:#6f42c1;margin-top:6px;color:white;width:100%;font-size:12px;border:none;padding:5px 8px;cursor:pointer;border-radius:3px;display:block;"
    data-pid="<?php echo (int)$allcat['id'];?>"
    data-pname="<?php echo htmlspecialchars($allcat['heading'] ?? '', ENT_QUOTES, 'UTF-8');?>"
    data-pemail="<?php echo htmlspecialchars($allcat['email'] ?? '', ENT_QUOTES, 'UTF-8');?>"
    data-pphone="<?php echo htmlspecialchars((!empty($allcat['ccode']) ? '+' . ltrim($allcat['ccode'], '+') . ' ' : '') . ($allcat['number'] ?? ''), ENT_QUOTES, 'UTF-8');?>"
    onclick="openBookModal(this)">
    &#128197; Book Appointment
</button>
<?php endif; ?>

          
            <?php 
            $a = $allcat['address'];
            $b = $allcat['city'];
            $c = $allcat['family'];
             if($a=="" || $b==''|| $c=''){ 

            ?>

            <lable >  <a onclick="aa();"  href=""><i class="fa fa-plus" aria-hidden="true"></i></a></lable><lable>


<script type = "text/javascript">
 function aa()
 {  
alert('Complet Your profile first');
}
</script>
<!-- Modal -->


            <?php  } else { ?>
          <lable >  <a  target="_blank" href="<?php echo base_url();?>/Siaportal/add_client_application/<?php echo $allcat['id'];?>"><i class="fa fa-plus" aria-hidden="true"></i></a></lable><lable>

        <?php } ?>
             <a  target="_blank" href="<?php echo base_url();?>/Siaportal/edit_client_prospect/<?php echo $allcat['id'];?>"> <img style="height:20px;width:40px;" src="<?php echo base_url();?>/assets/edit.png"></a>
            </lable><label>
             <a  target="_blank" href="<?php echo base_url();?>/Siaportal/full_view_client/<?php echo $allcat['id'];?>"> <i class="fa fa-binoculars" aria-hidden="true"></i></a>
            </label>




          </div>


         <div class="col-xl-9 col-md-9">

            <?php 

           $host="localhost";
  $db="sia_database";
  $user="sia_user";
  $password="Sia@8080";

$con = mysqli_connect($host,$user,$password,'sia_database')or die(mysqli_error());
 //$CI =& get_instance();
   // $CI->load->model('Backoffice_model');
$ddd=$allcat['id'];
  $SelQuery = "SELECT tbl_client_application.*,tbl_category.category as cat,tbl_type_client.type as ttyy, tbl_status.app_status as apps, CONCAT(tbl_reg.firstname, ' ', tbl_reg.lastname) as team_name
FROM tbl_client_application
LEFT JOIN tbl_category ON tbl_client_application.category = tbl_category.id
LEFT JOIN  tbl_type_client ON tbl_client_application.type = tbl_type_client.id
LEFT JOIN  tbl_status ON tbl_client_application.application_status = tbl_status.id
LEFT JOIN tbl_reg ON tbl_client_application.assign_to = tbl_reg.id



where tbl_client_application.`siaportalid` =$ddd ";
   //exit();
    
  $Query=mysqli_query($con,$SelQuery) or die(mysqli_error());
     while($GetData=mysqli_fetch_array($Query)){
                    ?>
          

    <div class="row">

      
      <div class="col-xl-3 col-md-3  "  data-toggle="tooltip" title="<?php echo $GetData['cat'];?>" >
        <div class="row">

       <div class="col-xl-12 col-md-12" style="background-color:#6b5b95; font-size: 13px;color:#fff;" > <i  class="fa fa-id-badge" style="color:#fff; margin-left:1px;" ></i> <?php echo $GetData['cat'];?>

</div>
<?php if(!empty($GetData['team_name'])): ?>
<div class="col-xl-12 col-md-12" style="background-color:#009b77; font-size: 12px;color:#fff;"><i class="fa fa-user" style="color:#fff; margin-left:1px;"></i> <?php echo $GetData['team_name']; ?></div>
<?php endif; ?>
</div>

      </div>
     

       <div class="col-xl-3 col-md-3"  data-toggle="tooltip" title="<?php echo $GetData['ttyy'];?>">


<div  style="background-color:#feb236;font-size: 13px;color:#fff; ">
          <i style="color:#fff; margin-left:1px;" class="fa fa-list-alt" aria-hidden="true"></i>  <?php echo substr($GetData['ttyy'], 0, 15);?>

</div>

      </div>
       <div class="col-xl-3 col-md-3"  data-toggle="tooltip" title="<?php echo $GetData['apps'];?>">
<div style="background-color:#d64161;font-size: 13px;color:#fff;">
  
        <i style="color:#fff;margin-left:1px;" class="fa fa-bullhorn" aria-hidden="true"></i> <?php echo substr($GetData['apps'], 0, 15);?>
      
</div>
      </div>
       <div class="col-xl-1 col-md-1"  >

        <?php $block =$GetData['application_status'];

$allid= array(490,485,480,475,471,451,438,433,428,423,418,413,408,403,398,393,388,383,378,373,368,363,358,353,348,343,338,333,324,307,298,290,282,272,264,256,245,233,222,212,204,196,188,180,170,160,150,140,133,127,117,107,97,85,75,64,55,44,33,21,13,491,486,481,476,439,434,429,424,419,414,409,404,399,394,389,384,379,374,369,364,359,354,349,344,339,334,325,308,299,291,283,273,265,257,246,234,223,213,205,197,189,181,171,161,151,141,134,128,118,108,98,86,76,65,54,43,34,22,14);
if(in_array($block,$allid)){ ?>



<?php }else{

        ?>
         <a  target="_blank" href="<?php   echo base_url();?>/Siaportal/edit_client_application/<?php echo $GetData['category'];?>/<?php echo $GetData['id'];?>/<?php echo $GetData['siaportalid'];?>/<?php echo $GetData['type'];?> ">
        <img style="height:20px;width:20px;" src="<?php echo base_url();?>/assets/ed.png">

      </a>
<?php } ?>
      <br> <a  target="_blank" href="<?php   echo base_url();?>/Siaportal/full_view_client_application/<?php echo $GetData['category'];?>/<?php echo $GetData['id'];?>/<?php echo $GetData['siaportalid'];?>/<?php echo $GetData['type'];?> "> <i class="fa fa-binoculars" aria-hidden="true"></i></a>

       </div>

        <div class="col-xl-2 col-md-2"  >
        <?php
          $agAppId = (int) $GetData['id'];
          $agRow = $agreementStatus[$agAppId] ?? null;
          if ($agRow):
              $agBadgeColors = [
                  'draft'     => ['#e2e3e5', '#41464b'],
                  'sent'      => ['#fff3cd', '#856404'],
                  'viewed'    => ['#cfe2ff', '#084298'],
                  'signed'    => ['#d1e7dd', '#0f5132'],
                  'declined'  => ['#f8d7da', '#842029'],
                  'cancelled' => ['#f8d7da', '#842029'],
              ];
              [$agBg, $agFg] = $agBadgeColors[$agRow['status']] ?? ['#e2e3e5', '#41464b'];
        ?>
          <span style="display:inline-block;background:<?php echo $agBg; ?>;color:<?php echo $agFg; ?>;font-size:10px;font-weight:700;padding:2px 8px;border-radius:10px;">
            &#128196; Agreement: <?php echo ucfirst($agRow['status']); ?>
          </span><br>
          <a target="_blank" href="<?php echo base_url(); ?>/agreement/Agreement/detail/<?php echo $agRow['id']; ?>" style="font-size:11px;">View</a>
        <?php else: ?>
          <form method="post" target="_blank" action="<?php echo base_url(); ?>/agreement/Agreement/start_from_application/<?php echo $agAppId; ?>" style="margin:0;"
                onsubmit="this.querySelector('button').disabled = true;">
            <button type="submit"
               style="display:inline-block;background:#e23b3b;color:#fff;font-size:11px;font-weight:600;padding:4px 10px;border-radius:4px;border:none;cursor:pointer;">
              Start E-Sign
            </button>
          </form>
        <?php endif; ?>
       </div>
   </div>

  <hr style="margin-top: 0px; margin-bottom: 3px;">

<?php } ?>
             </div>
             </div>
              </div>
         



  </form>



<script type = "text/javascript">
 function dev(categoryid1)
 {  
alert('dss');
// var categoryid=document.getElementById('category').value;
 alert(categoryid1);
var url= '<?php echo base_url().'/Siaportal/gettype';?>/'+categoryid1;
//alert(url);
 //alert(url);
    $.ajax({  type: "POST",     
     url: '<?php echo base_url().'/Siaportal/gettype';?>/'+categoryid1, 
      
     success: function(result)
     {
     alert("rtpe");
     $('#subcat11').html(result);
     //<option>fgfdsg</option>
     }         
       } ); 
}
</script>


<script type = "text/javascript">
 function status()
 {  
//alert('dss');
 var categoryid=document.getElementById('subcat').value;
 //alert(categoryid);
var url= '<?php echo base_url().'/Siaportal/gettype_status';?>/'+categoryid;
//alert(url);
 //alert(url);
    $.ajax({  type: "POST",     
     url: '<?php echo base_url().'/Siaportal/gettype_status';?>/'+categoryid, 
      
     success: function(result)
     {
   // alert("ghdfghg");
     $('#file_status').html(result);
     //<option>fgfdsg</option>
     }         
       } ); 
}
</script>



    </div>
  </div>
</div>

<!----->





          </div>


</div>
</div>
                                               
</td>
                                            </tr>









                                           <?php } ?>
                                           
                                        </tbody>
                                    </table>
<?= $pager->links() ?>
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
<!-- ===== Book Appointment Modal ===== -->
<style>
#baWrap { display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:9999;overflow-y:auto; }
#baBox  { background:#fff;border-radius:10px;max-width:500px;width:94%;margin:40px auto;box-shadow:0 8px 32px rgba(0,0,0,0.25); }
#baBox .ba-head { background:linear-gradient(135deg,#6f42c1,#4a2d8a);color:#fff;padding:14px 18px;border-radius:10px 10px 0 0;display:flex;justify-content:space-between;align-items:center; }
#baBox .ba-head span { cursor:pointer;font-size:22px;line-height:1; }
#baBox .ba-body { padding:20px; }
#baBox label { font-weight:600;margin-bottom:4px;display:block;font-size:13px; }
#baBox input, #baBox textarea, #baBox select {
    width:100%;padding:7px 10px;border:1px solid #ccc;border-radius:4px;font-size:13px;box-sizing:border-box;margin-bottom:10px;
}
#baBox input[readonly] { background:#f5f5f5; }
#baBox .ba-btns { display:flex;gap:8px;flex-wrap:wrap;margin-top:6px; }
#baBox .ba-btns button { padding:7px 16px;border:none;border-radius:4px;cursor:pointer;font-size:13px;font-weight:600; }
.ba-btn-check  { background:#6c757d;color:#fff; }
.ba-btn-submit { background:#28a745;color:#fff; }
.ba-btn-cancel { background:#e2e6ea;color:#333; }
.ba-btn-submit:disabled { background:#94d3a2;cursor:not-allowed; }
#ba_avail_msg, #ba_book_msg { min-height:22px;font-size:13px;margin-bottom:6px; }
</style>

<div id="baWrap" onclick="baMaybeClose(event)">
  <div id="baBox">
    <div class="ba-head">
      <strong>&#128197; Book Appointment</strong>
      <span onclick="baClose()">&times;</span>
    </div>
    <div class="ba-body">
      <form id="baForm" onsubmit="return false;">
        <input type="hidden" id="ba_pid"   name="prospect_id">

        <label>Client Name</label>
        <input type="text" id="ba_name"  name="client_name"  readonly>

        <label>Client Email</label>
        <input type="text" id="ba_email" name="client_email">

        <label>Client Phone</label>
        <input type="text" id="ba_phone" name="client_phone">

        <label>Appointment Date <span style="color:red">*</span></label>
        <input type="date" id="ba_date" name="appointment_date" onchange="baResetSlot()">

        <label>Appointment Time <span style="color:red">*</span></label>
        <input type="time" id="ba_time" name="appointment_time" onchange="baResetSlot()">

        <div id="ba_avail_msg"></div>

        <label>Service Type <span style="color:red">*</span></label>
        <select id="ba_service" name="service_type" style="width:100%;padding:8px 10px;border:1px solid #ddd;border-radius:6px;font-size:13px;margin-bottom:10px;">
            <option value="">-- Select Service Type --</option>
            <option value="Permanent Residency">Permanent Residency</option>
            <option value="Citizenship Application">Citizenship Application</option>
            <option value="Spousal Sponsorship / Common-Law Sponsorship">Spousal Sponsorship / Common-Law Sponsorship</option>
            <option value="Parent / Grandparent Sponsorship">Parent / Grandparent Sponsorship</option>
            <option value="Work Permit (New / Extension / LMIA)">Work Permit (New / Extension / LMIA)</option>
            <option value="Spousal Open Work Permit (SOWP)">Spousal Open Work Permit (SOWP)</option>
            <option value="Employers Hiring Foreign Workers">Employers Hiring Foreign Workers</option>
            <option value="Study Permit (New / Extension / Change of Status)">Study Permit (New / Extension / Change of Status)</option>
            <option value="College / University Admissions">College / University Admissions</option>
            <option value="Post Graduate Work Permit (PGWP)">Post Graduate Work Permit (PGWP)</option>
            <option value="Visitor Visa / TRV">Visitor Visa / TRV</option>
            <option value="Super Visa">Super Visa</option>
            <option value="PR Card Renewal">PR Card Renewal</option>
            <option value="Passport Renewal">Passport Renewal</option>
            <option value="OCI Application">OCI Application</option>
            <option value="CAIPS / GCMS Notes">CAIPS / GCMS Notes</option>
            <option value="OTHER">OTHER</option>
        </select>

        <label>Appointment Type <span style="color:red">*</span></label>
        <select id="ba_appt_type" name="appointment_type" style="width:100%;padding:8px 10px;border:1px solid #ddd;border-radius:6px;font-size:13px;margin-bottom:10px;">
            <option value="">-- Select Appointment Type --</option>
            <option value="Rapid / Free Consultation (General Inquiry)">Rapid / Free Consultation (General Inquiry)</option>
            <option value="Paid Telephonic Immigration Consultation">Paid Telephonic Immigration Consultation</option>
            <option value="Paid In-Person Immigration Consultation">Paid In-Person Immigration Consultation</option>
            <option value="Free College / University Admissions Consultation">Free College / University Admissions Consultation</option>
            <option value="Existing Client Appointment">Existing Client Appointment</option>
            <option value="Prospective Client (Had Previous Appointment)">Prospective Client (Had Previous Appointment)</option>
            <option value="Overseas PR Consultation (Outside Canada – Paid)">Overseas PR Consultation (Outside Canada – Paid)</option>
            <option value="LMIA / LMIA-Based Work Permit Consultation">LMIA / LMIA-Based Work Permit Consultation</option>
        </select>

        <label>Consultation Type <span style="color:red">*</span></label>
        <div style="margin-bottom:10px;display:flex;gap:20px;">
            <label style="font-weight:normal;display:flex;align-items:center;gap:5px;cursor:pointer;">
                <input type="radio" name="consultation_type" value="Telephonic" onchange="baToggleConsult(this.value)"> Telephonic
            </label>
            <label style="font-weight:normal;display:flex;align-items:center;gap:5px;cursor:pointer;">
                <input type="radio" name="consultation_type" value="In-Person" onchange="baToggleConsult(this.value)"> In-Person
            </label>
        </div>

        <div id="ba_contact_method_wrap" style="display:none;">
            <label>Preferred Contact Method <span style="color:red">*</span></label>
            <select id="ba_contact_method" name="contact_method" style="width:100%;padding:8px 10px;border:1px solid #ddd;border-radius:6px;font-size:13px;margin-bottom:10px;">
                <option value="">-- Select Contact Method --</option>
                <option value="Phone Call">Phone Call</option>
                <option value="WhatsApp">WhatsApp</option>
            </select>
        </div>

        <div id="ba_office_location_wrap" style="display:none;">
            <label>Office Location <span style="color:red">*</span></label>
            <select id="ba_office_location" name="office_location" style="width:100%;padding:8px 10px;border:1px solid #ddd;border-radius:6px;font-size:13px;margin-bottom:10px;">
                <option value="">-- Select Office Location --</option>
                <option value="Surrey">Surrey Office</option>
                <option value="Kamloops">Kamloops Office</option>
            </select>
        </div>

        <label>Inside Canada</label>
        <div style="margin-bottom:10px;display:flex;gap:20px;">
            <label style="font-weight:normal;display:flex;align-items:center;gap:5px;cursor:pointer;">
                <input type="radio" name="inside_canada" value="Yes"> Yes
            </label>
            <label style="font-weight:normal;display:flex;align-items:center;gap:5px;cursor:pointer;">
                <input type="radio" name="inside_canada" value="No"> No
            </label>
        </div>

        <label>Existing Client</label>
        <div style="margin-bottom:10px;display:flex;gap:20px;">
            <label style="font-weight:normal;display:flex;align-items:center;gap:5px;cursor:pointer;">
                <input type="radio" name="existing_client" value="Yes"> Yes
            </label>
            <label style="font-weight:normal;display:flex;align-items:center;gap:5px;cursor:pointer;">
                <input type="radio" name="existing_client" value="No"> No
            </label>
        </div>

        <label>Immigration Status</label>
        <input type="text" id="ba_immigration_status" name="immigration_status" placeholder="e.g. Visitor, Study Permit, Work Permit..." style="margin-bottom:10px;">

        <label>Notes</label>
        <textarea id="ba_notes" name="notes" rows="3" style="margin-bottom:10px;"></textarea>

        <label>Assign Team Member</label>
        <select id="ba_assigned" name="assigned_to" style="margin-bottom:10px;">
            <option value="">— Unassigned —</option>
            <?php foreach ($teamMembers as $tm): ?>
            <option value="<?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>">
                <?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>
            </option>
            <?php endforeach; ?>
        </select>

        <div id="ba_book_msg"></div>

        <div class="ba-btns">
          <button type="button" class="ba-btn-check"  onclick="baCheckSlot()">Check Availability</button>
          <button type="button" class="ba-btn-submit" id="ba_submit" onclick="baSubmit()" disabled>Confirm Booking</button>
          <button type="button" class="ba-btn-cancel" onclick="baClose()">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function baToggleConsult(val) {
    document.getElementById('ba_contact_method_wrap').style.display  = (val === 'Telephonic') ? 'block' : 'none';
    document.getElementById('ba_office_location_wrap').style.display = (val === 'In-Person')  ? 'block' : 'none';
    document.getElementById('ba_contact_method').value  = '';
    document.getElementById('ba_office_location').value = '';
}
function openBookModal(btn) {
    document.getElementById('ba_pid').value   = btn.getAttribute('data-pid');
    document.getElementById('ba_name').value  = btn.getAttribute('data-pname');
    document.getElementById('ba_email').value = btn.getAttribute('data-pemail');
    document.getElementById('ba_phone').value = btn.getAttribute('data-pphone');
    document.getElementById('ba_date').value  = '';
    document.getElementById('ba_time').value  = '';
    document.getElementById('ba_service').value   = '';
    document.getElementById('ba_appt_type').value = '';
    document.getElementById('ba_notes').value               = '';
    document.getElementById('ba_assigned').value            = '';
    document.getElementById('ba_immigration_status').value  = '';
    document.querySelectorAll('#baForm input[name="inside_canada"]').forEach(function(r){ r.checked = false; });
    document.querySelectorAll('#baForm input[name="existing_client"]').forEach(function(r){ r.checked = false; });
    document.querySelectorAll('#baForm input[name="consultation_type"]').forEach(function(r){ r.checked = false; });
    document.getElementById('ba_contact_method_wrap').style.display  = 'none';
    document.getElementById('ba_office_location_wrap').style.display = 'none';
    document.getElementById('ba_contact_method').value  = '';
    document.getElementById('ba_office_location').value = '';
    document.getElementById('ba_avail_msg').innerHTML = '';
    document.getElementById('ba_book_msg').innerHTML  = '';
    document.getElementById('ba_submit').disabled     = true;
    document.getElementById('baWrap').style.display   = 'block';
    document.body.style.overflow = 'hidden';
}
function baClose() {
    document.getElementById('baWrap').style.display = 'none';
    document.body.style.overflow = '';
}
function baMaybeClose(e) {
    if (e.target === document.getElementById('baWrap')) baClose();
}
function baResetSlot() {
    document.getElementById('ba_avail_msg').innerHTML = '';
    document.getElementById('ba_submit').disabled = true;
}
function baCheckSlot() {
    var date = document.getElementById('ba_date').value;
    var time = document.getElementById('ba_time').value;
    if (!date || !time) {
        document.getElementById('ba_avail_msg').innerHTML = '<span style="color:orange">Please select date and time first.</span>';
        return;
    }
    document.getElementById('ba_avail_msg').innerHTML = '<span style="color:#888">Checking...</span>';
    $.post('<?php echo base_url("appoint/Appoint/check_availability"); ?>',
        { appointment_date: date, appointment_time: time },
        function(res) {
            if (res.available) {
                document.getElementById('ba_avail_msg').innerHTML = '<span style="color:green;font-weight:bold">&#10003; Slot is available!</span>';
                document.getElementById('ba_submit').disabled = false;
            } else {
                document.getElementById('ba_avail_msg').innerHTML = '<span style="color:red;font-weight:bold">&#10007; Slot already booked. Choose another time.</span>';
                document.getElementById('ba_submit').disabled = true;
            }
        }, 'json'
    ).fail(function() {
        document.getElementById('ba_avail_msg').innerHTML = '<span style="color:red">Error. Please try again.</span>';
    });
}
function baSubmit() {
    if (!document.getElementById('ba_service').value.trim()) {
        document.getElementById('ba_book_msg').innerHTML = '<span style="color:orange">Please select a service type.</span>';
        return;
    }
    var ct = document.querySelector('#baForm input[name="consultation_type"]:checked');
    if (!ct) {
        document.getElementById('ba_book_msg').innerHTML = '<span style="color:orange">Please select Consultation Type.</span>';
        return;
    }
    if (ct.value === 'Telephonic' && !document.getElementById('ba_contact_method').value) {
        document.getElementById('ba_book_msg').innerHTML = '<span style="color:orange">Please select a Contact Method.</span>';
        return;
    }
    if (ct.value === 'In-Person' && !document.getElementById('ba_office_location').value) {
        document.getElementById('ba_book_msg').innerHTML = '<span style="color:orange">Please select an Office Location.</span>';
        return;
    }
    document.getElementById('ba_book_msg').innerHTML  = '<span style="color:#888">Saving...</span>';
    document.getElementById('ba_submit').disabled     = true;
    $.post('<?php echo base_url("appoint/Appoint/book_from_prospect"); ?>',
        $('#baForm').serialize(),
        function(res) {
            if (res.success) {
                document.getElementById('ba_book_msg').innerHTML = '<span style="color:green;font-weight:bold">&#10003; Appointment booked! Emails sent.</span>';
                setTimeout(function(){ baClose(); location.reload(); }, 2000);
            } else {
                document.getElementById('ba_book_msg').innerHTML = '<span style="color:red">' + res.msg + '</span>';
                document.getElementById('ba_submit').disabled = false;
            }
        }, 'json'
    ).fail(function() {
        document.getElementById('ba_book_msg').innerHTML = '<span style="color:red">Error. Please try again.</span>';
        document.getElementById('ba_submit').disabled = false;
    });
}

$(function() {
    $('#ba_appt_type').select2({
        placeholder: '-- Select Appointment Type --',
        allowClear: true,
        dropdownParent: $('#baBox')
    });

    $('#ba_service').select2({
        placeholder: '-- Select Service Type --',
        allowClear: true,
        dropdownParent: $('#baBox')
    });
});
</script>
<!-- ===== End Book Appointment Modal ===== -->

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
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</script>

 <script>
        $('#dataTable').dataTable( {
  "iDisplayLength": 50,
 
 
});

         var oTable = $('#dataTable').dataTable();
    
        // Sort immediately with columns 0 and 1
       oTable.fnSort( [ [0,'desc'] ] );


      
</script>


    
        <script>

$(document).ready(function () {

    $('#myform1').validate({ // initialize the plugin
        rules: {
            category: {
                required: true
               
            },
            
             email: {
                required: true
               
            },
            contact: {
                required: true
               
            },
            
           
           
        },
        messages: {
        category: "Category Is required",
         subcat: "Type Is required",
          app_status: "Status Is required",
           
           
              
       
         }
        
    });

});
</script>





    <script>
    function toggleDupTooltip(el) {
        var existing = el.querySelector('.dup-tooltip');
        if (existing) { existing.remove(); return; }
        var ids = el.getAttribute('data-allids').split(',');
        var div = document.createElement('div');
        div.className = 'dup-tooltip';
        ids.forEach(function(id) {
            var row = document.createElement('span');
            row.className = 'dup-id-row';
            row.textContent = id.trim();
            div.appendChild(row);
        });
        el.appendChild(div);
        document.addEventListener('click', function closeTip(e) {
            if (!el.contains(e.target)) { var t = el.querySelector('.dup-tooltip'); if (t) t.remove(); document.removeEventListener('click', closeTip); }
        });
    }
    </script>
    </body>
</html>
