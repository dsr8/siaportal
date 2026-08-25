<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <title>View Prospect</title>
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
       

         <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        

         <SCRIPT language="JavaScript">
function st_change(id,st)
{

 //var st= document.getElementById("pstatus").value;

 //alert(id);
 //alert(st);
 //var st="ffff";
 //var aa="ffff";
  
  //  var hi= confirm("Do you really want to change");
  //  if (hi== true){
       // alert("hi");
       
     $.ajax({   type: "POST",       
          url: '<?php echo base_url().'/Siaportal/st_changem';?>/'+id+'/'+st, 
          
          
    success: function(result){  
     // alert(result);
      
    //$('#status'+id).html('Recode Delet').delay(5000).fadeOut();
    //$('#mark_dropped'+id).hide();
    //$('#l'+id).hide();
    //$('#sub').show();
    
    //$('#ddd'+id).removeClass('hide');
    //$('#ddd'+id).addClass('show') ;
    //.delay(5000).removeClass('show').addClass('hide')
    }         

       } ); 
    
    
    
  //  }else{
      //  alert("Meany!!!");
   // }
}
 </SCRIPT>

        

         <SCRIPT language="JavaScript">
function add_status(id,st)
{

//var stt =document.getElementById("ppstatus").value;
//var removeData=st.replace("%"," ");

//alert(removeData);
       
     $.ajax({   type: "POST",       
          url: '<?php echo base_url().'/Siaportal/st_chang';?>/'+id+'/'+st, 
          
          
    success: function(result){  
    
    }         

       } ); 
    
    
  
}
 </SCRIPT>


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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .select2-container--default .select2-selection--single {
                height: 36px; border: 1px solid #ddd; border-radius: 6px; background: #fff;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 34px; padding-left: 10px; font-size: 13px; color: #333;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow { height: 34px; }
            .select2-container--default.select2-container--focus .select2-selection--single,
            .select2-container--default.select2-container--open  .select2-selection--single {
                border-color: #6f42c1;
            }
            .select2-dropdown { border: 1px solid #6f42c1; border-radius: 6px; font-size: 13px; }
            .select2-container--default .select2-results__option--highlighted[aria-selected] { background: #6f42c1; }
            #baBox .select2-container { width: 100% !important; margin-bottom: 10px; }
        </style>
        <style>
            /* ── Modern restyle: scoped to this page only (.vp-page), doesn't touch
               shared Bootstrap classes used elsewhere in the app. ── */
            .vp-page h1.mt-4 { font-size: 22px; font-weight: 800; color: #1f2430; display: flex; align-items: center; gap: 10px; }
            .vp-page h1.mt-4::before {
                content: ''; width: 34px; height: 34px; border-radius: 10px; flex-shrink: 0;
                background: linear-gradient(135deg, #4CAF50, #3d9140);
                -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'/%3E%3Ccircle cx='9' cy='7' r='4'/%3E%3Cpath d='M23 21v-2a4 4 0 0 0-3-3.87'/%3E%3Cpath d='M16 3.13a4 4 0 0 1 0 7.75'/%3E%3C/svg%3E") center/20px no-repeat;
                mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'/%3E%3Ccircle cx='9' cy='7' r='4'/%3E%3Cpath d='M23 21v-2a4 4 0 0 0-3-3.87'/%3E%3Cpath d='M16 3.13a4 4 0 0 1 0 7.75'/%3E%3C/svg%3E") center/20px no-repeat;
            }
            .vp-page .breadcrumb { display: none; }

            .vp-search-row > div.vp-icon-field { position: relative; }
            .vp-search-row > div.vp-icon-field i,
            .vp-search-row > div.vp-icon-field svg { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #9aa0aa; font-size: 13px; width: 13px; height: 13px; pointer-events: none; }
            .vp-search-row > div.vp-icon-field .form-control { padding-left: 34px; }

            .vp-card { border: 1px solid #f0f1f4; border-radius: 18px !important; box-shadow: 0 4px 20px rgba(20,20,43,0.07); overflow: hidden; }
            .vp-card > .card-header { display: none; }
            .vp-card > .card-body { padding: 22px 24px; }

            .vp-search-row { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin-bottom: 18px; }
            .vp-search-row .form-control {
                border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px; height: 42px;
                transition: border-color .15s ease, box-shadow .15s ease;
            }
            .vp-search-row .form-control:focus { outline: none; border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.1); border-color: #6f42c1; }
            .vp-search-row > div { flex: 1 1 160px; min-width: 140px; }
            .vp-search-row > div.vp-search-btns { flex: 0 0 auto; display: flex; gap: 8px; min-width: 0; }
            .vp-btn-search { background: linear-gradient(135deg, #4CAF50, #3d9140); border: none; color: #fff; font-weight: 700; border-radius: 10px; padding: 10px 20px; font-size: 13.5px; box-shadow: 0 3px 10px rgba(76,175,80,0.3); display: inline-flex; align-items: center; gap: 7px; }
            .vp-btn-search:hover { color: #fff; opacity: .92; }
            .vp-btn-reset { background: #f1f2f4; border: none; color: #1f2430; font-weight: 700; border-radius: 10px; padding: 10px 18px; font-size: 13.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 7px; }
            .vp-btn-reset:hover { background: #e8e9ec; color: #1f2430; text-decoration: none; }

            .vp-table thead th { background: #fafbfc !important; font-size: 11px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: .03em; border-bottom: 1px solid #eef0f2 !important; padding: 12px 14px !important; }
            .vp-table td { border-color: #f1f2f4 !important; vertical-align: top; padding: 14px !important; font-size: 12.5px; }
            .vp-table tbody tr { transition: background-color .12s ease; }
            .vp-table tbody tr:nth-child(even) { background: #fbfbfd; }
            .vp-table tbody tr:hover { background: #f5f2fc; }


            .vp-id-card-top { display: flex; align-items: center; justify-content: space-between; gap: 6px; }
            .vp-id-badge { display: inline-block; background: #f1eefc; color: #6f42c1; font-size: 10.5px; font-weight: 800; padding: 2px 7px; border-radius: 6px; }
            .vp-id-hide { display: inline-flex; align-items: center; gap: 3px; color: #c0392b; font-size: 10px; font-weight: 700; text-decoration: none; padding: 2px 6px; border-radius: 6px; transition: background-color .12s ease; }
            .vp-id-hide:hover { background: #fbeaec; color: #c0392b; text-decoration: none; }
            .vp-id-name { font-size: 13.5px; font-weight: 700; color: #1f2430; margin-top: 5px; }
            .vp-dup-badge { display: inline-block; color: #fff; padding: 1px 6px; border-radius: 3px; font-size: 10px; font-weight: bold; margin-top: 4px; cursor: pointer; position: relative; }
            .vp-id-rows { margin-top: 8px; display: flex; flex-direction: column; gap: 5px; }
            .vp-id-row { display: flex; align-items: center; gap: 6px; }
            .vp-id-icon { display: inline-flex; align-items: center; justify-content: center; width: 19px; height: 19px; border-radius: 50%; flex-shrink: 0; }
            .vp-id-icon-blue { background: #eaf2fe; }
            .vp-id-icon-green { background: #e8f6ee; }
            .vp-id-icon-amber { background: #fdf3e2; }
            .vp-id-row-text { flex: 1; font-size: 11.5px; color: #4b5160; overflow-wrap: anywhere; }
            .vp-id-copy { flex-shrink: 0; color: #9aa0aa; background: transparent; border: 1px solid transparent; border-radius: 6px; padding: 2px 4px; line-height: 1; cursor: pointer; transition: background-color .12s ease, color .12s ease; }
            .vp-id-copy:hover { background: #f1eefc; color: #6f42c1; border-color: #e6defa; }
            .vp-id-copyall { display: block; width: 100%; margin-top: 10px; background: #fdf3d7; color: #856404; border: 1px solid #f5e3ab; border-radius: 6px; padding: 5px 8px; font-size: 10.5px; font-weight: 700; cursor: pointer; transition: background-color .12s ease; }
            .vp-id-copyall:hover { background: #fbe9b8; }

            /* Appointment card — same green theme as the Client list page's .vc-appt-card, so a
               booked appointment reads consistently across both pages instead of looking like
               two different designs for the same concept. */
            .vp-appt-card { background: #e8f6ee; border: 1px solid #c3e6cb; border-radius: 8px; padding: 7px 9px; margin-top: 6px; box-sizing: border-box; }
            .vp-appt-top { display: flex; align-items: center; justify-content: space-between; gap: 5px; flex-wrap: nowrap; margin-bottom: 5px; }
            .vp-appt-badge { display: inline-flex; align-items: center; gap: 4px; background: #fff; color: #1f7a4d; font-size: 9.5px; font-weight: 700; padding: 2px 7px; border-radius: 8px; white-space: nowrap; flex-shrink: 0; }
            .vp-appt-top .vp-pill { white-space: nowrap; flex-shrink: 0; }
            .vp-appt-datetime { display: flex; gap: 10px; flex-wrap: wrap; font-size: 11px; font-weight: 700; color: #1f2430; margin-bottom: 5px; padding-bottom: 5px; border-bottom: 1px dashed #c3e6cb; }
            .vp-appt-datetime i { color: #1f7a4d; margin-right: 3px; }
            .vp-appt-rows { display: flex; flex-direction: column; gap: 3px; }
            .vp-appt-row { display: flex; align-items: center; gap: 6px; font-size: 10px; color: #333; line-height: 1.3; }
            .vp-appt-row i { color: #1f7a4d; width: 11px; text-align: center; flex-shrink: 0; }
            .vp-appt-assigned { display: flex; align-items: center; gap: 5px; font-size: 10px; color: #1a73e8; margin-top: 5px; padding-top: 5px; border-top: 1px dashed #c3e6cb; }
            .vp-appt-assigned i { width: 11px; text-align: center; flex-shrink: 0; }

            /* Small status/appointment pills used throughout the Id column. */
            .vp-pill { display: inline-block; font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 10px; }

            /* Action-button column ("Email/SMS") — restyles the existing .on buttons without
               touching their onclick/href logic. */
            .vp-actions .on { border-radius: 9px !important; border: none !important; box-shadow: none !important; font-weight: 700 !important; text-align: center !important; transition: transform .12s ease, opacity .12s ease; }
            .vp-actions .on:hover, .vp-actions button:not(:disabled):hover { transform: translateY(-1px); opacity: .93; }
            .vp-actions a.on[href*="immigration_enquiry_mail"] { background: linear-gradient(135deg, #4CAF50, #3d9140) !important; color: #fff !important; }
            .vp-actions a.on[href*="edit_prospect"] { background: #1f2430 !important; color: #fff !important; }
            .vp-actions a.on[onclick*="move_to_client"] { background: #2d3340 !important; color: #fff !important; }

            /* Team status column — sized up so it reads as the primary column for this table
               (widest, largest controls), and wrapped in the same amber "status card" treatment
               used on the Client list page (view_client.php's .vc-status-box) so the two pages
               match instead of this one looking like a bare, unstyled form control. */
            .vp-status-box { min-width: 260px; }
            .vp-status-card { background: #fdf3e2; border: 1px solid #f6e2b8; border-radius: 8px; padding: 9px 10px; box-sizing: border-box; }
            .vp-status-label { display: flex; align-items: center; gap: 5px; font-size: 10px; font-weight: 700; letter-spacing: .03em; text-transform: uppercase; color: #a5670a; margin-bottom: 6px; }
            .vp-status-box select#pstatus { width: 100%; border: 1px solid #f6e2b8; border-radius: 6px; padding: 8px 9px; font-size: 13px; font-weight: 600; background: #fff; transition: border-color .15s ease, box-shadow .15s ease; }
            .vp-status-box select#pstatus:focus { outline: none; border-color: #c98a1a; box-shadow: 0 0 0 3px rgba(201,138,26,.15); }
            /* The textarea carries an inline width:284px which used to force this whole column
               (and the table beyond the visible viewport) wide on every screen size — box-sizing
               makes the !important width fill the column instead of adding to a fixed 284px. */
            .vp-status-box textarea#ppstatus { width: 100% !important; max-width: 300px; box-sizing: border-box; border: 1px solid #f6e2b8; border-radius: 6px; font-size: 12.5px; line-height: 1.5; padding: 8px 9px; background: #fff; transition: border-color .15s ease, box-shadow .15s ease; }
            .vp-status-box textarea#ppstatus:focus { outline: none; border-color: #c98a1a; box-shadow: 0 0 0 3px rgba(201,138,26,.15); }
            .vp-status-box textarea#ppstatus::placeholder { color: #c9ab7a; }

            .vp-plain-cell { font-size: 12.5px; color: #4b5160; }
            .vp-meta-row { display: flex; align-items: center; gap: 6px; margin-bottom: 4px; }
            .vp-meta-row:last-child { margin-bottom: 0; }

            /* Book Appointment button — same purple accent used for the "+ New"/status pills
               elsewhere on this page, with a distinct green "done" state instead of a flat,
               unstyled disabled button. */
            .vp-book-btn {
                display: flex; align-items: center; justify-content: center; gap: 7px;
                width: 177px; margin-top: 5px; padding: 7px 8px;
                background: linear-gradient(135deg, #7c4fd6, #6f42c1); color: #fff;
                border: none; border-radius: 9px; font-size: 12.5px; font-weight: 700; cursor: pointer;
                box-shadow: 0 3px 8px rgba(111,66,193,0.28); transition: transform .12s ease, opacity .12s ease;
            }
            .vp-book-btn:hover { transform: translateY(-1px); opacity: .93; }
            .vp-book-btn-done { background: linear-gradient(135deg, #34b874, #27ae60); box-shadow: 0 3px 8px rgba(39,174,96,0.28); opacity: .9; cursor: default; }
            .vp-book-btn-done:hover { transform: none; opacity: .9; }

            /* Agreement / Consent cell: only a category line + two clickable status chips show
               on the page; the fee breakdown / sign status / actions open in a shared popup
               (#acWrap) instead of taking up permanent row space. */
            .vp-ac-cell { min-width: 210px; }
            .vp-ac-grid { display: flex; flex-wrap: wrap; gap: 8px; }
            .vp-ac-chip {
                flex: 1 1 90px; display: flex; flex-direction: column; align-items: flex-start; gap: 4px;
                border: 1px solid #e2e3e5; border-radius: 8px; padding: 7px 10px; cursor: pointer;
                font-family: inherit; text-align: left; transition: box-shadow .12s ease, transform .12s ease;
            }
            .vp-ac-chip:hover { box-shadow: 0 2px 8px rgba(20,20,43,0.1); transform: translateY(-1px); }
            .vp-ac-chip-label { font-size: 9.5px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: .05em; }

            /* Shared popup for Agreement / Consent full detail. */
            #acWrap { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 99999; overflow-y: auto; background: rgba(0,0,0,0.55); }
            #acBox { background: #fff; border-radius: 10px; width: 420px; max-width: 94%; margin: 60px auto; box-shadow: 0 8px 30px rgba(0,0,0,0.4); }
            #acBox .ac-head { background: #1f2430; color: #fff; padding: 14px 18px; border-radius: 10px 10px 0 0; display: flex; justify-content: space-between; align-items: center; gap: 10px; }
            #acBox .ac-head strong { font-size: 14px; }
            #acBox .ac-head span { font-size: 20px; cursor: pointer; line-height: 1; }
            #acBox .ac-body { padding: 16px 18px; }

            /* Table scroll container: slim, unobtrusive scrollbar instead of the bulky OS default. */
            .vp-table-scroll::-webkit-scrollbar { width: 8px; height: 8px; }
            .vp-table-scroll::-webkit-scrollbar-track { background: transparent; }
            .vp-table-scroll::-webkit-scrollbar-thumb { background: #d7d9e0; border-radius: 8px; }
            .vp-table-scroll::-webkit-scrollbar-thumb:hover { background: #b9bcc6; }

            @media (max-width: 700px) {
                .vp-card > .card-body { padding: 16px 14px; }
                .vp-search-row { flex-direction: column; align-items: stretch; }
                .vp-search-row > div { flex: 1 1 auto; min-width: 0; width: 100%; }
                .vp-search-row .vp-search-btns { flex-direction: row; width: 100%; }
                .vp-btn-search, .vp-btn-reset { flex: 1; text-align: center; }

                /* Table → stacked cards, using each td's data-label as the row's mini-heading,
                   instead of forcing a sideways-scrolling 7-column table on a phone screen. */
                .vp-table { border: none !important; }
                .vp-table thead { display: none; }
                .vp-table, .vp-table tbody, .vp-table tr { display: block; width: 100%; }
                .vp-table tr {
                    margin-bottom: 16px; border: 1px solid #eef0f2 !important; border-radius: 14px;
                    box-shadow: 0 2px 10px rgba(20,20,43,0.06); overflow: hidden;
                }
                .vp-table td {
                    display: block; width: 100% !important; max-width: none !important; min-width: 0 !important;
                    box-sizing: border-box; border: none !important; border-bottom: 1px solid #f4f5f7 !important;
                    padding: 12px 14px !important;
                }
                .vp-table tr td:last-child { border-bottom: none !important; }
                .vp-table td[data-label]::before {
                    content: attr(data-label);
                    display: block; font-size: 10.5px; font-weight: 800; color: #6f42c1;
                    text-transform: uppercase; letter-spacing: .04em; margin-bottom: 6px;
                }

                /* Action column: turn the stacked <br>-separated links/buttons into a clean,
                   evenly-spaced flex column so every action (including the plain, non-.on
                   Book Appointment button) goes full-width and gets consistent gaps. */
                .vp-actions { display: flex; flex-direction: column; gap: 8px; }
                .vp-actions br { display: none; }
                .vp-actions center { display: block; }
                .vp-actions .on,
                .vp-actions button { width: 100% !important; margin: 0 !important; box-sizing: border-box; }

                /* Team status controls should fill the full stacked card width on mobile,
                   not the desktop max-width:220px cap used to keep the table compact. */
                .vp-status-box select#pstatus,
                .vp-status-box textarea#ppstatus { width: 100% !important; max-width: none !important; box-sizing: border-box; }

                /* Book Appointment modal: use the screen as a near-full-height sheet instead
                   of a small centered box with large top/bottom margins. */
                #baBox { margin: 10px auto; max-height: 96vh; overflow-y: auto; }
                #baBox .ba-btns { flex-direction: column; }
                #baBox .ba-btns button { width: 100%; box-sizing: border-box; }
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
                    <div class="container-fluid vp-page">
                        <h1 class="mt-4">View Prospect</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>


                        <div class="card mb-4 vp-card">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('Siaportal/view_prospect');?>" class="mb-3">
                                    <div class="vp-search-row">
                                        <div class="vp-icon-field">
                                            <i class="fas fa-hashtag"></i>
                                            <input type="number" name="search_id" class="form-control" placeholder="Search by ID" value="<?php echo isset($search_id) ? htmlspecialchars($search_id) : ''; ?>">
                                        </div>
                                        <div class="vp-icon-field">
                                            <i class="fas fa-user"></i>
                                            <input type="text" name="search_name" class="form-control" placeholder="Search by Name" value="<?php echo isset($search_name) ? htmlspecialchars($search_name) : ''; ?>">
                                        </div>
                                        <div class="vp-icon-field">
                                            <i class="fas fa-phone"></i>
                                            <input type="text" name="search_phone" class="form-control" placeholder="Search by Phone No" value="<?php echo isset($search_phone) ? htmlspecialchars($search_phone) : ''; ?>">
                                        </div>
                                        <div class="vp-icon-field">
                                            <i class="fas fa-filter"></i>
                                            <select name="search_status" class="form-control">
                                                <option value="">-- Team Status --</option>
                                                <option value="Retainer_sent_but_waiting_for_signatures" <?php echo (isset($search_status) && $search_status=='Retainer_sent_but_waiting_for_signatures') ? 'selected' : ''; ?>>Retainer sent but waiting for signatures</option>
                                                <option value="Appointment_Booked" <?php echo (isset($search_status) && $search_status=='Appointment_Booked') ? 'selected' : ''; ?>>Appointment Booked</option>
                                                <option value="Dropped" <?php echo (isset($search_status) && $search_status=='Dropped') ? 'selected' : ''; ?>>Dropped</option>
                                                <option value="Retainer_Declined" <?php echo (isset($search_status) && $search_status=='Retainer_Declined') ? 'selected' : ''; ?>>Retainer Declined</option>
                                                <option value="Follow_up_next_month" <?php echo (isset($search_status) && $search_status=='Follow_up_next_month') ? 'selected' : ''; ?>>Follow up next month</option>
                                                <option value="Waiting_for_one_year_of_experience" <?php echo (isset($search_status) && $search_status=='Waiting_for_one_year_of_experience') ? 'selected' : ''; ?>>Waiting for one year of experience</option>
                                                <option value="Waiting_for_wes_or_ielts" <?php echo (isset($search_status) && $search_status=='Waiting_for_wes_or_ielts') ? 'selected' : ''; ?>>Waiting for wes or ielts</option>
                                                <option value="Dont_want_to_continue_with_us" <?php echo (isset($search_status) && $search_status=='Dont_want_to_continue_with_us') ? 'selected' : ''; ?>>Dont want to continue with us</option>
                                                <option value="Not_decided_or_needs_time_to_decide" <?php echo (isset($search_status) && $search_status=='Not_decided_or_needs_time_to_decide') ? 'selected' : ''; ?>>Not decided or needs time to decide</option>
                                                <option value="Not_contactable_or_reachable" <?php echo (isset($search_status) && $search_status=='Not_contactable_or_reachable') ? 'selected' : ''; ?>>Not contactable or reachable</option>
                                                <option value="Done_Delete" <?php echo (isset($search_status) && $search_status=='Done_Delete') ? 'selected' : ''; ?>>Done/Delete</option>
                                            </select>
                                        </div>
                                        <div class="vp-search-btns">
                                            <button type="submit" class="vp-btn-search"><i class="fas fa-search"></i> Search</button>
                                            <a href="<?php echo base_url('Siaportal/view_prospect');?>" class="vp-btn-reset"><i class="fas fa-redo"></i> Reset</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive vp-table-scroll" style="max-height:75vh; overflow-y:auto; overflow-x:auto;">
                                    <table class="table table-bordered vp-table" id="dataTable1" width="50%" cellspacing="0">
                                        <thead style="position:sticky;top:0;z-index:10;background:#fff;">
                                            <tr>
                                                 <th><i class="fas fa-hashtag" style="color:#9aa0aa;margin-right:5px;"></i>Id</th>

                 <th><i class="fas fa-bolt" style="color:#9aa0aa;margin-right:5px;"></i>Email/SMS</th>

                <!--th >Add on Date</th-->
                 <th ><i class="fas fa-tasks" style="color:#9aa0aa;margin-right:5px;"></i>Team status</th>

                <th ><i class="fas fa-id-badge" style="color:#9aa0aa;margin-right:5px;"></i>Team / Admin</th>

                <th ><i class="fas fa-file-signature" style="color:#9aa0aa;margin-right:5px;"></i>Agreement / Consent</th>



                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                             <?php foreach($prospect as $allcat){ ?>
                                            <tr>
                                                 <td data-label="Id" style="min-width:170px;max-width:210px;word-break:break-word;">
                                                    <?php $pid = (int)$allcat['id']; ?>
                                                    <div class="vp-id-card">
                                                        <div class="vp-id-card-top">
                                                            <span class="vp-id-badge">#<?php echo $allcat['id'];?></span>
                                                            <a class="vp-id-hide" href="<?php echo base_url('Siaportal/hide_prospect/'.$allcat['id']);?>" onclick="return confirm('Hide this record?');" title="Hide this record">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                                                Hide
                                                            </a>
                                                        </div>

                                                        <div class="vp-id-name"><?php echo $allcat['heading'];?></div>

                                                        <?php if (!empty($dupProspectIds[$pid])): ?>
                                                            <?php
                                                                $dups    = $dupProspectIds[$pid];
                                                                $preview = array_slice($dups, 0, 2);
                                                                $rest    = count($dups) - 2;
                                                                $allStr  = htmlspecialchars(implode(', ', $dups));
                                                                $preStr  = implode(', ', $preview);
                                                                $moreStr = $rest > 0 ? ' +' . $rest . ' more' : '';
                                                            ?>
                                                            <span class="vp-dup-badge" style="background:#6f42c1;" onclick="toggleDupTooltip(this)" data-allids="<?php echo $allStr; ?>">Prospect [<?php echo $preStr . $moreStr; ?>]</span>
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
                                                            <span class="vp-dup-badge" style="background:#e74c3c;" onclick="toggleDupTooltip(this)" data-allids="<?php echo $allStr; ?>">Client [<?php echo $preStr . $moreStr; ?>]</span>
                                                        <?php endif; ?>

                                                        <div class="vp-id-rows">
                                                            <div class="vp-id-row">
                                                                <span class="vp-id-icon vp-id-icon-blue"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                                                                <span class="vp-id-row-text"><?php echo $allcat['email'] ?? '';?></span>
                                                                <button onclick="copyVal(this)" data-copy="<?php echo htmlspecialchars($allcat['email'] ?? '');?>" class="vp-id-copy" title="Copy Email"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                                            </div>
                                                            <div class="vp-id-row">
                                                                <span class="vp-id-icon vp-id-icon-green"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#1f7a4d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></span>
                                                                <span class="vp-id-row-text"><?php echo $allcat['number'] ?? '';?></span>
                                                                <button onclick="copyVal(this)" data-copy="<?php echo htmlspecialchars($allcat['number'] ?? '');?>" class="vp-id-copy" title="Copy Phone"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                                            </div>
                                                            <?php if(!empty($allcat['address'])): ?>
                                                            <div class="vp-id-row">
                                                                <span class="vp-id-icon vp-id-icon-amber"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#c98a1a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span>
                                                                <span class="vp-id-row-text"><?php echo htmlspecialchars($allcat['address']);?></span>
                                                                <button onclick="copyVal(this)" data-copy="<?php echo htmlspecialchars($allcat['address']);?>" class="vp-id-copy" title="Copy Address"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <button onclick="copyAllInfo(this)"
                                                            data-id="<?php echo htmlspecialchars($allcat['id'].'  '.$allcat['heading']);?>"
                                                            data-email="<?php echo htmlspecialchars($allcat['email'] ?? '');?>"
                                                            data-phone="<?php echo htmlspecialchars($allcat['number'] ?? '');?>"
                                                            data-address="<?php echo htmlspecialchars($allcat['address'] ?? '');?>"
                                                            class="vp-id-copyall" title="Copy All">Copy All</button>
                                                    </div>

                                                    <?php if (!empty($bookedIds[(int)$allcat['id']])):
                        $appt = $bookedIds[(int)$allcat['id']];
                        $sBg     = [0=>'#fff3cd',1=>'#d1e7dd',2=>'#cfe2ff',3=>'#f8d7da'];
                        $sColors = [0=>'#856404',1=>'#0f5132',2=>'#084298',3=>'#842029'];
                        $sLabels = [0=>'Pending',1=>'Confirmed',2=>'Completed',3=>'Cancelled'];
                        $sb = $sBg[$appt['status']] ?? '#d1e7dd';
                        $sc = $sColors[$appt['status']] ?? '#0f5132';
                        $sl = $sLabels[$appt['status']] ?? '';
                    ?>
                        <div class="vp-appt-card">
                            <div class="vp-appt-top">
                                <span class="vp-appt-badge"><i class="fas fa-calendar-check"></i> Appt Booked</span>
                                <span class="vp-pill" style="background:<?php echo $sb; ?>;color:<?php echo $sc; ?>;"><?php echo $sl; ?></span>
                            </div>
                            <div class="vp-appt-datetime">
                                <span><i class="fas fa-calendar-day"></i> <?php echo date('d M Y', strtotime($appt['date'])); ?></span>
                                <span><i class="fas fa-clock"></i> <?php echo date('h:i A', strtotime($appt['time'])); ?></span>
                            </div>
                            <div class="vp-appt-rows">
                        <?php if (!empty($appt['service_type'])): ?>
                                <div class="vp-appt-row"><i class="fas fa-briefcase"></i><span><?php echo htmlspecialchars($appt['service_type']); ?></span></div>
                        <?php endif; ?>
                        <?php if (!empty($appt['appointment_type'])): ?>
                                <div class="vp-appt-row" style="color:#6f42c1;font-weight:600;"><i class="fas fa-calendar-alt" style="color:#6f42c1;"></i><span><?php echo htmlspecialchars($appt['appointment_type']); ?></span></div>
                        <?php endif; ?>
                        <?php if (!empty($appt['consultation_type'])): ?>
                                <div class="vp-appt-row"><i class="fas fa-headset"></i><span><?php echo htmlspecialchars($appt['consultation_type']); ?><?php
                                    if ($appt['consultation_type'] === 'In-Person' && !empty($appt['office_location'])) {
                                        echo ' – ' . htmlspecialchars($appt['office_location']);
                                    } elseif (!empty($appt['contact_method'])) {
                                        echo ' – ' . htmlspecialchars($appt['contact_method']);
                                    }
                                ?></span></div>
                        <?php endif; ?>
                            </div>
                            <div class="vp-appt-assigned" style="<?php echo empty($appt['assigned_to']) ? 'color:#aaa;' : ''; ?>">
                                <i class="fas fa-user"></i> <?php echo !empty($appt['assigned_to']) ? htmlspecialchars($appt['assigned_to']) : 'Unassigned'; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                                                </td>


 <td class="vp-actions" data-label="Email / SMS"> <a  class="on" style="background:lightgreen;margin-bottom: 5px;color:black; width: 177px;
    font-size: 13px;" href="<?php echo base_url();?>/Siaportal/immigration_enquiry_mail/<?php echo $allcat['id'];?>/<?php echo $allcat['mail_send'];?>"><i class="fa fa-envelope" aria-hidden="true"></i>Send Follow Up Email(<?php echo $allcat['mail_send'];?>)(<?php echo $allcat['mail_send_on'];?>)</a><br>

                    <a  style="color:white; margin-bottom: 5px; width: 177px;
    font-size: 13px;" class="on" target="_blank" href="<?php echo base_url();?>/Siaportal/edit_prospect/<?php echo $allcat['id'];?>"><i class="fas fa-pen" style="margin-right:5px;"></i>Edit</a><br>

    <!--a onclick="sms(<?php echo $allcat['id'];?>)"  class="on" style="background: blue;margin-bottom: 5px;color:white;  width: 177px;
    font-size: 13px;" ><i class="fa fa-comment"></i>(<?php echo $allcat['sms_send'];?>)(<?php echo $allcat['sms_send_on'];?>)</a-->
    
    <center><a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', ($allcat['ccode'] ?? '').($allcat['number'] ?? '')); ?>" target="_blank" >
 <img class="whatsapp_icon" style="width:28px;height:28px;" src="https://siaimmigration.com/assets/images/whatsapp/whatsapp.png" alt="">
</a>   </center>                                          
                                                 
                                                 
                                                 
                                                   <a href="#" style="color:white; width: 177px; font-size: 13px; background: black; margin-bottom: 5px;" class="on" onclick="move_to_client(<?php echo $allcat['id'];?>,<?php echo $allcat['number'];?>)"><i class="fas fa-user-check" style="margin-right:5px;"></i>Move To client</a>

    <?php if (!empty($bookedIds[(int)$allcat['id']])): ?>
    <button type="button"
        class="vp-book-btn vp-book-btn-done"
        title="<?php $a=$bookedIds[(int)$allcat['id']]; echo date('d M Y',strtotime($a['date'])).' '.date('h:i A',strtotime($a['time'])); ?>"
        disabled>
        <i class="fas fa-check-circle"></i> Appointment Booked
    </button>
    <?php else: ?>
    <button type="button"
        class="vp-book-btn"
        data-pid="<?php echo (int)$allcat['id'];?>"
        data-pname="<?php echo htmlspecialchars($allcat['heading'] ?? '', ENT_QUOTES, 'UTF-8');?>"
        data-pemail="<?php echo htmlspecialchars($allcat['email'] ?? '', ENT_QUOTES, 'UTF-8');?>"
        data-pphone="<?php echo htmlspecialchars((!empty($allcat['ccode']) ? '+' . ltrim($allcat['ccode'], '+') . ' ' : '') . ($allcat['number'] ?? ''), ENT_QUOTES, 'UTF-8');?>"
        onclick="openBookModal(this)">
        <i class="fas fa-calendar-plus"></i> Book Appointment
    </button>
    <?php endif; ?>

  </td>
                                             

                                                <!--td ><?php echo $allcat['insert_on'];?></hr></td-->

 <td class="vp-status-box" data-label="Team Status">

                          <div class="vp-status-card">
                          <div class="vp-status-label"><i class="fas fa-tasks"></i> Team Status</div>
                          <select onchange="st_change(<?php echo $allcat['id'];?>,this.value)" id="pstatus" name="pstatus">
                            <?php if($allcat['pstatus']=='') {?>
                            <option value="">Select value</option>
<?php } else {?>

   <option style="background-color:#55BCC9;" value="<?php echo $allcat['pstatus']; ?>"><?php echo str_replace('_', ' ',$allcat['pstatus']);?></option>

<?php } ?>


 <option style="background-color:#E27D60;" value="Retainer_sent_but_waiting_for_signatures">Retainer sent but waiting for signatures </option>
  <option style="background-color:#5B8DB8;" value="Appointment_Booked">Appointment Booked</option>
                      <option style="background-color:#E8A87C;" value="Dropped">Dropped</option>
                      <option style="background-color:#C38D9E;"value="Retainer_Declined">Retainer Declined </option>
                      <option style="background-color:#41B3A3;" value="Follow_up_next_month">Follow up next month </option>
  <option style="background-color:#8D8741;" value="Waiting_for_one_year_of_experience">Waiting  for one year of experience</option>
   <option style="background-color:#659DBD;"  value="Waiting_for_wes_or_ielts">Waiting for wes or ielts</option>
   <option style="background-color:#DAAD86;" value="Dont_want_to_continue_with_us">Dont want to  continue with us </option>
   <option style="background-color:#BC986A;"value="Not_decided_or_needs_time_to_decide">Not decided or needs time to decide</option>
  <option style="background-color:#FBEEC1;" value="Not_contactable_or_reachable">Not contactable or reachable</option>
   <option  style="background-color:red;" value="Done_Delete">Done/Delete</option>

                                                </select>
                          </div>

                          <div class="vp-status-card" style="margin-top:8px;">
                          <div class="vp-status-label"><i class="fas fa-sticky-note"></i> Note</div>
                          <textarea style="width:284px;line-height:1.5;" rows="4" placeholder="Add a note..." name="ppstatus" id="ppstatus" onkeyup="add_status(<?php echo $allcat['id'];?>,this.value)"><?php echo str_replace('%20', ' ', $allcat['ppstatus']);?></textarea>
                          </div>
                                              </td>


                                                <td class="vp-plain-cell" data-label="Team / Admin">
                                                    <?php if (!empty($allcat['team_member'])): ?>
                                                    <div class="vp-meta-row"><i class="fas fa-id-badge" style="color:#1f7a4d;"></i><span><?php echo $allcat['team_member'];?></span></div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($allcat['admin_status'])): ?>
                                                    <div class="vp-meta-row"><i class="fas fa-shield-alt" style="color:#2563eb;"></i><span><?php echo $allcat['admin_status'];?></span></div>
                                                    <?php endif; ?>
                                                    <?php if (empty($allcat['team_member']) && empty($allcat['admin_status'])): ?>
                                                    <span style="color:#c3c6cc;">—</span>
                                                    <?php endif; ?>
                                                </td>
                                               <td data-label="Agreement / Consent" class="vp-ac-cell" style="min-width:210px;">
                                                    <?php $prospectApps = $applicationsByProspect[(int) $allcat['id']] ?? []; ?>
                                                    <?php if (empty($prospectApps)): ?>
                                                    <div style="border:1px dashed #ccc;border-radius:8px;background:#fafafa;padding:14px 10px;text-align:center;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#aaa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:6px;"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                                                        <div style="font-size:12px;color:#999;margin-bottom:10px;">No Application Yet</div>
                                                        <a href="#" onclick="caOpen(<?php echo (int) $allcat['id']; ?>, <?php echo htmlspecialchars(json_encode($allcat['heading'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP), ENT_QUOTES); ?>);return false;" style="display:inline-block;border:1px solid #1a73e8;color:#1a73e8;background:#fff;border-radius:5px;padding:5px 12px;font-size:12px;font-weight:600;text-decoration:none;">+ Create Agreement</a>
                                                        <br>
                                                        <a href="<?php echo base_url('declaration/Declaration/create?prospect_id=' . (int) $allcat['id']); ?>" target="_blank" style="display:inline-block;margin-top:6px;border:1px solid #4c3ff5;color:#4c3ff5;background:#fff;border-radius:5px;padding:5px 12px;font-size:12px;font-weight:600;text-decoration:none;">+ Start Consent</a>
                                                    </div>
                                                    <?php else: ?>
                                                    <?php
                                                        // Same visual language as agreement_card.php's $agCardTheme, so the
                                                        // popup content reads as matching siblings, not a bolted-on badge.
                                                        $vpAgreementTheme = [
                                                            'draft'     => ['bg' => '#f4f5f7', 'border' => '#e2e3e5', 'pill' => '#6c757d'],
                                                            'sent'      => ['bg' => '#fdf6e3', 'border' => '#f5e3ab', 'pill' => '#f5a623'],
                                                            'viewed'    => ['bg' => '#eaf2fe', 'border' => '#cfe2ff', 'pill' => '#3b82f6'],
                                                            'signed'    => ['bg' => '#eaf7ef', 'border' => '#c3e6cb', 'pill' => '#2ecc71'],
                                                            'declined'  => ['bg' => '#fbeaec', 'border' => '#f1c0c5', 'pill' => '#e23b3b'],
                                                            'cancelled' => ['bg' => '#fbeaec', 'border' => '#f1c0c5', 'pill' => '#e23b3b'],
                                                        ];
                                                        $vpConsentTheme = $vpAgreementTheme;
                                                    ?>
                                                    <?php foreach ($prospectApps as $pAppIdx => $pApp): ?>
                                                        <?php if ($pAppIdx > 0): ?><hr style="margin:10px 0;border-top:1px dashed #ddd;"><?php endif; ?>
                                                        <div style="font-size:10.5px;font-weight:700;color:#666;margin-bottom:6px;" title="<?php echo htmlspecialchars(($pApp['ct'] ?? '') . ' — ' . ($pApp['ty'] ?? '')); ?>">
                                                            <?php echo htmlspecialchars($pApp['ct'] ?? 'Uncategorized'); ?> — <?php echo htmlspecialchars($pApp['ty'] ?? ''); ?>
                                                        </div>

                                                        <?php
                                                            $pAgRow   = $agreementStatus[(int) $pApp['id']] ?? null;
                                                            $pAgTheme = $vpAgreementTheme[$pAgRow['status'] ?? 'draft'] ?? $vpAgreementTheme['draft'];
                                                            $pDcRow   = $declarationStatus[(int) $pApp['id']] ?? null;
                                                            $pDcTheme = $vpConsentTheme[$pDcRow['status'] ?? 'draft'] ?? $vpConsentTheme['draft'];
                                                            $acAgId = 'ac-detail-ag-' . (int) $pApp['id'];
                                                            $acDcId = 'ac-detail-dc-' . (int) $pApp['id'];
                                                        ?>

                                                        <!-- Compact summary shown on the page — click either chip for the full
                                                             fee breakdown / sign status / actions in a popup. -->
                                                        <div class="vp-ac-grid">
                                                            <button type="button" class="vp-ac-chip" style="background:<?php echo $pAgTheme['bg']; ?>;border-color:<?php echo $pAgTheme['border']; ?>;" onclick="vpOpenAcModal('<?php echo $acAgId; ?>', 'Agreement — <?php echo htmlspecialchars($pApp['ct'] ?? ''); ?>')">
                                                                <span class="vp-ac-chip-label">Agreement</span>
                                                                <span class="vp-pill" style="background:<?php echo $pAgTheme['pill']; ?>;color:#fff;"><?php echo $pAgRow ? esc(ucfirst($pAgRow['status'])) : 'None'; ?></span>
                                                            </button>
                                                            <button type="button" class="vp-ac-chip" style="background:<?php echo $pDcTheme['bg']; ?>;border-color:<?php echo $pDcTheme['border']; ?>;" onclick="vpOpenAcModal('<?php echo $acDcId; ?>', 'Consent — <?php echo htmlspecialchars($pApp['ct'] ?? ''); ?>')">
                                                                <span class="vp-ac-chip-label">Consent</span>
                                                                <span class="vp-pill" style="background:<?php echo $pDcTheme['pill']; ?>;color:#fff;"><?php echo $pDcRow ? esc(ucfirst($pDcRow['status'])) : 'None'; ?></span>
                                                            </button>
                                                        </div>

                                                        <!-- Full detail — hidden on the page, cloned into the shared popup on click. -->
                                                        <div id="<?php echo $acAgId; ?>" style="display:none;">
                                                            <?php echo view('admin/partials/agreement_card', [
                                                                'agRow'         => $pAgRow,
                                                                'applicationId' => (int) $pApp['id'],
                                                                'categoryLabel' => $pApp['ct'] ?? '',
                                                                'typeLabel'     => $pApp['ty'] ?? '',
                                                            ]); ?>
                                                        </div>
                                                        <div id="<?php echo $acDcId; ?>" style="display:none;">
                                                            <?php if ($pDcRow): ?>
                                                                <div style="background:<?php echo $pDcTheme['bg']; ?>;border:1px solid <?php echo $pDcTheme['border']; ?>;border-radius:6px;padding:10px 12px;width:100%;box-sizing:border-box;font-size:11px;">
                                                                    <div style="font-weight:700;color:#1f2430;">Status:
                                                                        <span style="display:inline-block;background:<?php echo $pDcTheme['pill']; ?>;color:#fff;font-size:10px;font-weight:700;padding:2px 8px;border-radius:10px;"><?php echo esc(ucfirst($pDcRow['status'])); ?></span>
                                                                    </div>
                                                                    <div style="margin-top:8px;display:flex;gap:5px;">
                                                                        <a target="_blank" href="<?php echo base_url(); ?>/declaration/Declaration/detail/<?php echo $pDcRow['id']; ?>" style="flex:1;display:block;text-align:center;background:#fff;color:<?php echo $pDcTheme['pill']; ?>;border:1px solid <?php echo $pDcTheme['pill']; ?>;border-radius:4px;padding:5px 6px;font-size:10.5px;font-weight:600;text-decoration:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">&#128065; View</a>
                                                                        <form method="post" target="_blank" action="<?php echo base_url(); ?>/declaration/Declaration/start_from_application/<?php echo (int) $pApp['id']; ?>" style="flex:1;margin:0;" onsubmit="this.querySelector('button').disabled = true;">
                                                                            <button type="submit" style="display:block;width:100%;background:#fff;color:#4c3ff5;border:1px solid #4c3ff5;border-radius:4px;padding:5px 6px;font-size:10.5px;font-weight:600;cursor:pointer;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">+ New</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            <?php else: ?>
                                                                <div style="background:#f4f5f7;border:1px solid #e2e3e5;border-radius:6px;padding:14px 10px;text-align:center;width:100%;box-sizing:border-box;">
                                                                    <div style="font-size:11.5px;font-weight:700;color:#41464b;">No Consent</div>
                                                                    <div style="font-size:10.5px;color:#9aa0aa;margin-bottom:8px;">(Not Created Yet)</div>
                                                                    <form method="post" target="_blank" action="<?php echo base_url(); ?>/declaration/Declaration/start_from_application/<?php echo (int) $pApp['id']; ?>" style="margin:0;" onsubmit="this.querySelector('button').disabled = true;">
                                                                        <button type="submit" style="display:inline-block;background:#fff;color:#4c3ff5;border:1px solid #4c3ff5;border-radius:4px;padding:5px 12px;font-size:11px;font-weight:600;cursor:pointer;">+ Start Consent</button>
                                                                    </form>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                               </td>
                                            </tr>
                                           <?php } ?>
                                           
                                        </tbody>
                                    </table>
                    <!--?php $pager = \Config\Services::pager(); ?-->
                    
<?= $pager->links() ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?= view('agreement/_create_modal'); ?>

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
       
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        (function() {
            var params = new URLSearchParams(window.location.search);
            if (params.get('edit_success')) {
                history.replaceState({}, '', window.location.pathname);
                Swal.fire({
                    icon: 'success',
                    title: 'Updated!',
                    text: 'Record updated successfully.',
                    confirmButtonColor: '#1a73e8',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        })();
        </script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
       
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>/public/dist/assets/demo/datatables-demo.js"></script>




    
    
<SCRIPT language="JavaScript">
function sms(id)
{
  
  
    var hi= confirm(" mobile number in right format e.g 17782575709 ");

  //  alert(id);
    if (hi == true){
       // alert("hi");



        $url = 'immigration_enquiry_sms/'+id;
       // alert($url);
     window.location.href = $url; 
    
    
    
    }else{


 $url = 'edit_prospect/'+id;
     //   alert($url);
     window.location.href = $url; 

     
    }
}
 </SCRIPT>

<SCRIPT language="JavaScript">
function move_to_client(id,num)
{
  
  
    var hi= confirm("You want to move client");

  //  alert(id);
    if (hi == true){
       // alert("hi");
 var hi1= confirm("Mobile number is correct "+num);
if(hi1 == true){

        //$url = 'move_to_client/'+id;
        $url = 'edit_move_to_client/'+id;
       // alert($url);
     window.location.href = $url; 
    
    }else{
 $url = 'https://canada.siaimmigration.com/Siaportal/edit_prospect/'+id;
       // alert($url);
     window.location.href = $url; 

    }
    
    }else{


 $url = 'view_prospect';
     //   alert($url);
     window.location.href = $url; 

     
    }
}

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
function copyAllInfo(btn) {
    var lines = [
        btn.getAttribute('data-id'),
        btn.getAttribute('data-email'),
        btn.getAttribute('data-phone'),
        btn.getAttribute('data-address')
    ].filter(function(v){ return v && v.trim() !== ''; });
    navigator.clipboard.writeText(lines.join('\r\n')).then(function() {
        var orig = btn.innerHTML;
        btn.innerHTML = '&#10003; Copied!';
        setTimeout(function() { btn.innerHTML = orig; }, 1500);
    });
}
function copyVal(btn) {
    var text = btn.getAttribute('data-copy');
    navigator.clipboard.writeText(text).then(function() {
        var svg = btn.querySelector('svg');
        if (svg) {
            var original = svg.outerHTML;
            svg.outerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';
            setTimeout(function() { btn.querySelector('svg').outerHTML = original; }, 1500);
        } else {
            var orig = btn.innerHTML;
            btn.innerHTML = '&#10003;';
            setTimeout(function() { btn.innerHTML = orig; }, 1500);
        }
    });
}
function sendDupAlert(btn, id) {
    btn.disabled = true;
    btn.textContent = 'Sending...';
    fetch('<?php echo base_url('Siaportal/send_duplicate_alert/'); ?>' + id)
        .then(function(r){ return r.json(); })
        .then(function(data){
            if (data.status === 'ok') {
                btn.textContent = '✓ Sent!';
                btn.style.background = '#27ae60';
            } else {
                btn.textContent = '✗ Failed';
                btn.style.background = '#c0392b';
                alert('Error: ' + data.msg);
            }
        })
        .catch(function(){
            btn.textContent = '✗ Error';
            btn.style.background = '#c0392b';
        });
}
 </SCRIPT>

             <script>
  $(function () {
          $('#dataTable1').dataTable( {
  "iDisplayLength": 20,
  "bPaginate":false,
  "showNEntries" : false,
   "bInfo" : false,
   "ordering": false,
   "autoWidth": false
});

  });
</script>

<!-- ===== Agreement / Consent Detail Popup ===== -->
<div id="acWrap" onclick="vpAcMaybeClose(event)">
  <div id="acBox">
    <div class="ac-head">
      <strong id="acTitle">Detail</strong>
      <span onclick="vpCloseAcModal()">&times;</span>
    </div>
    <div class="ac-body" id="acBody"></div>
  </div>
</div>
<script>
function vpOpenAcModal(sourceId, title) {
    var source = document.getElementById(sourceId);
    if (!source) return;
    document.getElementById('acTitle').textContent = title;
    document.getElementById('acBody').innerHTML = source.innerHTML;
    document.getElementById('acWrap').style.display = 'block';
    document.body.style.overflow = 'hidden';
}
function vpCloseAcModal() {
    document.getElementById('acWrap').style.display = 'none';
    document.body.style.overflow = '';
}
function vpAcMaybeClose(e) {
    if (e.target === document.getElementById('acWrap')) vpCloseAcModal();
}
</script>
<!-- ===== End Agreement / Consent Detail Popup ===== -->

<!-- ===== Book Appointment Modal ===== -->
<style>
#baWrap {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 99999;
    overflow-y: auto;
    background: rgba(20,20,43,0.55);
}
#baBox {
    background: #fff;
    border-radius: 14px;
    width: 520px;
    max-width: 96%;
    margin: 40px auto 40px;
    box-shadow: 0 16px 40px rgba(20,20,43,0.35);
    overflow: hidden;
}
#baBox .ba-head {
    background: linear-gradient(135deg, #7c4fd6, #6f42c1);
    color: #fff;
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
#baBox .ba-head strong { display: flex; align-items: center; gap: 8px; font-size: 15px; }
#baBox .ba-head span {
    display: flex; align-items: center; justify-content: center;
    width: 26px; height: 26px; border-radius: 50%;
    font-size: 18px; line-height: 1; cursor: pointer;
    background: rgba(255,255,255,0.15); transition: background-color .12s ease;
}
#baBox .ba-head span:hover { background: rgba(255,255,255,0.28); }
#baBox .ba-body { padding: 20px 22px; max-height: 78vh; overflow-y: auto; }

#baBox .ba-section { margin-bottom: 16px; }
#baBox .ba-section-title {
    display: flex; align-items: center; gap: 7px;
    font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: .04em;
    color: #6f42c1; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #f1eefc;
}

#baBox label { font-weight: 700; margin-bottom: 5px; display: block; font-size: 12.5px; color: #1f2430; }
#baBox label.ba-label-plain { font-weight: 500; color: #4b5160; }
#baBox .ba-req { color: #e23b3b; font-weight: 700; }
#baBox input, #baBox textarea, #baBox select {
    width: 100%; padding: 9px 11px;
    border: 1.5px solid #e0e3e8; border-radius: 8px;
    font-size: 13px; box-sizing: border-box; color: #1f2430;
    margin-bottom: 12px; transition: border-color .15s ease, box-shadow .15s ease;
}
#baBox input:focus, #baBox textarea:focus, #baBox select:focus {
    outline: none; border-color: #6f42c1; box-shadow: 0 0 0 3px rgba(111,66,193,0.12);
}
#baBox input[readonly] { background: #f7f6fb; color: #6b7280; }
#baBox input[type="radio"] { width: auto; margin: 0; accent-color: #6f42c1; }

#baBox .ba-row2 { display: flex; gap: 12px; }
#baBox .ba-row2 > div { flex: 1; }

#baBox .ba-radio-group { display: flex; gap: 18px; margin-bottom: 12px; }
#baBox .ba-radio-group label {
    font-weight: 500; color: #333; display: flex; align-items: center; gap: 6px;
    cursor: pointer; margin-bottom: 0;
}

#baBox .ba-btns { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 4px; padding-top: 14px; border-top: 1px solid #f1f2f4; }
#baBox .ba-btns button {
    display: flex; align-items: center; gap: 6px;
    padding: 9px 16px; border: none; border-radius: 8px;
    cursor: pointer; font-size: 12.5px; font-weight: 700;
    transition: transform .12s ease, opacity .12s ease;
}
#baBox .ba-btns button:hover:not(:disabled) { transform: translateY(-1px); opacity: .93; }
.ba-btn-check  { background: #f1f2f4; color: #1f2430; }
.ba-btn-submit { background: linear-gradient(135deg, #34b874, #27ae60); color: #fff; box-shadow: 0 3px 8px rgba(39,174,96,0.28); }
.ba-btn-cancel { background: #fff; color: #6b7280; border: 1.5px solid #e0e3e8 !important; }
.ba-btn-submit:disabled { background: #b9e3c6; box-shadow: none; cursor: not-allowed; }
#ba_avail_msg, #ba_book_msg { min-height: 20px; font-size: 12.5px; margin-bottom: 6px; font-weight: 600; }
</style>

<div id="baWrap" onclick="baMaybeClose(event)">
  <div id="baBox">
    <div class="ba-head">
      <strong><i class="fas fa-calendar-plus"></i> Book Appointment</strong>
      <span onclick="baClose()">&times;</span>
    </div>
    <div class="ba-body">
      <form id="baForm" onsubmit="return false;">
        <input type="hidden" id="ba_pid" name="prospect_id">

        <div class="ba-section">
            <div class="ba-section-title"><i class="fas fa-user"></i> Client Details</div>
            <label>Client Name</label>
            <input type="text" id="ba_name"  name="client_name"  readonly>

            <div class="ba-row2">
                <div>
                    <label>Client Email</label>
                    <input type="text" id="ba_email" name="client_email">
                </div>
                <div>
                    <label>Client Phone</label>
                    <input type="text" id="ba_phone" name="client_phone">
                </div>
            </div>
        </div>

        <div class="ba-section">
            <div class="ba-section-title"><i class="fas fa-calendar-day"></i> Schedule</div>
            <div class="ba-row2">
                <div>
                    <label>Appointment Date <span class="ba-req">*</span></label>
                    <input type="date" id="ba_date"  name="appointment_date" onchange="baResetSlot()">
                </div>
                <div>
                    <label>Appointment Time <span class="ba-req">*</span></label>
                    <input type="time" id="ba_time"  name="appointment_time" onchange="baResetSlot()">
                </div>
            </div>
            <div id="ba_avail_msg"></div>
        </div>

        <div class="ba-section">
            <div class="ba-section-title"><i class="fas fa-briefcase"></i> Service &amp; Type</div>
            <label>Service Type <span class="ba-req">*</span></label>
            <select id="ba_service" name="service_type">
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

            <label>Appointment Type <span class="ba-req">*</span></label>
            <select id="ba_appt_type" name="appointment_type">
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

            <label>Consultation Type <span class="ba-req">*</span></label>
            <div class="ba-radio-group">
                <label><input type="radio" name="consultation_type" value="Telephonic" onchange="baToggleConsult(this.value)"> Telephonic</label>
                <label><input type="radio" name="consultation_type" value="In-Person" onchange="baToggleConsult(this.value)"> In-Person</label>
            </div>

            <div id="ba_contact_method_wrap" style="display:none;">
                <label>Preferred Contact Method <span class="ba-req">*</span></label>
                <select id="ba_contact_method" name="contact_method">
                    <option value="">-- Select Contact Method --</option>
                    <option value="Phone Call">Phone Call</option>
                    <option value="WhatsApp">WhatsApp</option>
                </select>
            </div>

            <div id="ba_office_location_wrap" style="display:none;">
                <label>Office Location <span class="ba-req">*</span></label>
                <select id="ba_office_location" name="office_location">
                    <option value="">-- Select Office Location --</option>
                    <option value="Surrey">Surrey Office</option>
                    <option value="Kamloops">Kamloops Office</option>
                </select>
            </div>
        </div>

        <div class="ba-section">
            <div class="ba-section-title"><i class="fas fa-sliders-h"></i> Preferences</div>
            <div class="ba-row2">
                <div>
                    <label class="ba-label-plain">Inside Canada</label>
                    <div class="ba-radio-group">
                        <label><input type="radio" name="inside_canada" value="Yes"> Yes</label>
                        <label><input type="radio" name="inside_canada" value="No"> No</label>
                    </div>
                </div>
                <div>
                    <label class="ba-label-plain">Existing Client</label>
                    <div class="ba-radio-group">
                        <label><input type="radio" name="existing_client" value="Yes"> Yes</label>
                        <label><input type="radio" name="existing_client" value="No"> No</label>
                    </div>
                </div>
            </div>

            <label class="ba-label-plain">Immigration Status</label>
            <input type="text" id="ba_immigration_status" name="immigration_status" placeholder="e.g. Visitor, Study Permit, Work Permit...">
        </div>

        <div class="ba-section">
            <div class="ba-section-title"><i class="fas fa-sticky-note"></i> Notes &amp; Assignment</div>
            <label class="ba-label-plain">Notes</label>
            <textarea id="ba_notes" name="notes" rows="3"></textarea>

            <label class="ba-label-plain">Assign Team Member</label>
            <select id="ba_assigned" name="assigned_to">
                <option value="">— Unassigned —</option>
                <?php foreach ($teamMembers as $tm): ?>
                <option value="<?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>">
                    <?php echo htmlspecialchars($tm['firstname'].' '.$tm['lastname']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="ba_book_msg"></div>

        <div class="ba-btns">
          <button type="button" class="ba-btn-check"  onclick="baCheckSlot()"><i class="fas fa-search"></i> Check Availability</button>
          <button type="button" class="ba-btn-submit" id="ba_submit" onclick="baSubmit()" disabled><i class="fas fa-check"></i> Confirm Booking</button>
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
    document.getElementById('ba_pid').value    = btn.getAttribute('data-pid');
    document.getElementById('ba_name').value   = btn.getAttribute('data-pname');
    document.getElementById('ba_email').value  = btn.getAttribute('data-pemail');
    document.getElementById('ba_phone').value  = btn.getAttribute('data-pphone');
    document.getElementById('ba_date').value   = '';
    document.getElementById('ba_time').value   = '';
    document.getElementById('ba_service').value    = '';
    document.getElementById('ba_appt_type').value  = '';
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
    var member = document.getElementById('ba_assigned').value;
    document.getElementById('ba_avail_msg').innerHTML = '<span style="color:#888">Checking...</span>';
    $.post('<?php echo base_url("appoint/Appoint/check_availability"); ?>',
        { appointment_date: date, appointment_time: time, team_member: member },
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
                document.getElementById('ba_book_msg').innerHTML = '<span style="color:green;font-weight:bold">&#10003; Appointment booked! Emails sent. Refreshing...</span>';
                setTimeout(function(){ window.location.href = window.location.href; }, 1500);
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

    </body>
</html>
