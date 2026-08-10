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
         <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
         <style>
  label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}

.hidden{ 
    display: none;
}

.dekho{ 
    display: block;
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
                        <h1 class="mt-4">Edit Client</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                       <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/edit_move_to_client/<?php echo $client['0']['id'];?>"> 
                        <div class="row">
                            <div class="col-xl-6 col-md-6 selectEntry">

                                <!--div class="form-group"><label class="small mb-1" for="inputFirstName">Voice Notes</label>
          <div >

                         

                          

                        </div>
</div-->
                                
<div class="form-group"><label class="small mb-1" for="inputFirstName"> Name</label>
    <input class="form-control py-4" name="name" id="name" type="text" placeholder="Enter  name" value="<?php echo $client['0']['heading'];?>" /></div>


<div class="row">
                <!--div class="col-md-6">
                     <label class="small mb-1">Country code</label>
                    <select class="form-control" name="cc" id="cc" style="height: 36px;">
                         <option value="" selected="selected">Please select</option>
                    <option value="93">Afghanistan</option>
                    <option value="355">Albania</option>
                    <option value="213">Algeria</option>
                    <option value="1684">American Samoa</option>
                    <option value="376">Andorra</option>
                    <option value="244">Angola</option>
                    <option value="1264">Anguilla</option>
                    <option value="672">Antarctica</option>
                    <option value="1268">Antigua and Barbuda</option>
                    <option value="54">Argentina</option>
                    <option value="374">Armenia</option>
                    <option value="297">Aruba</option>
                    <option value="61">Australia</option>
                    <option value="43">Austria</option>
                    <option value="994">Azerbaijan</option>
                    <option value="1242">Bahamas</option>
                    <option value="973">Bahrain</option>
                    <option value="880">Bangladesh</option>
                    <option value="1246">Barbados</option>
                    <option value="375">Belarus</option>
                    <option value="32">Belgium</option>
                    <option value="501">Belize</option>
                    <option value="229">Benin</option>
                    <option value="1441">Bermuda</option>
                    <option value="975">Bhutan</option>
                    <option value="591">Bolivia</option>
                    <option value="387">Bosnia and Herzegovina</option>
                    <option value="267">Botswana</option>
                    <option value="55">Brazil</option>
                    <option value="246">British Indian Ocean Territory</option>
                    <option value="1284">British Virgin Islands</option>
                    <option value="673">Brunei</option>
                    <option value="359">Bulgaria</option>
                    <option value="226">Burkina Faso</option>
                    <option value="257">Burundi</option>
                    <option value="855">Cambodia</option>
                    <option value="237">Cameroon</option>
                    <option value="1">Canada</option>
                    <option value="238">Cape Verde</option>
                    <option value="1345">Cayman Islands</option>
                    <option value="236">Central African Republic</option>
                    <option value="235">Chad</option>
                    <option value="56">Chile</option>
                    <option value="86">China</option>
                    <option value="61">Christmas Island</option>
                    <option value="61">Cocos Islands</option>
                    <option value="57">Colombia</option>
                    <option value="269">Comoros</option>
                    <option value="682">Cook Islands</option>
                    <option value="506">Costa Rica</option>
                    <option value="385">Croatia</option>
                    <option value="53">Cuba</option>
                    <option value="599">Curacao</option>
                    <option value="357">Cyprus</option>
                    <option value="420">Czech Republic</option>
                    <option value="243">Democratic Republic of the Congo</option>
                    <option value="45">Denmark</option>
                    <option value="253">Djibouti</option>
                    <option value="1767">Dominica</option>
                    <option value="670">East Timor</option>
                    <option value="593">Ecuador</option>
                    <option value="20">Egypt</option>
                    <option value="503">El Salvador</option>
                    <option value="240">Equatorial Guinea</option>
                    <option value="291">Eritrea</option>
                    <option value="372">Estonia</option>
                    <option value="251">Ethiopia</option>
                    <option value="500">Falkland Islands</option>
                    <option value="298">Faroe Islands</option>
                    <option value="679">Fiji</option>

                    <option value="358">Finland</option>
                    <option value="33">France</option>
                    <option value="689">French Polynesia</option>
                    <option value="241">Gabon</option>
                    <option value="220">Gambia</option>
                    <option value="995">Georgia</option>
                    <option value="49">Germany</option>
                    <option value="233">Ghana</option>

                    <option value="350">Gibraltar</option>
                    <option value="30">Greece</option>
                    <option value="299">Greenland</option>
                    <option value="1473">Grenada</option>
                    <option value="1671">Guam</option>

                    <option value="502">Guatemala</option>
                    <option value="441481">Guernsey</option>
                    <option value="224">Guinea</option>
                    <option value="245">Guinea-Bissau</option>
                    <option value="592">Guyana</option>
                    <option value="509">Haiti</option>
                    <option value="504">Honduras</option>
                    <option value="852">Hong Kong</option>
                    <option value="36">Hungary</option>
                    <option value=" 354">Iceland</option>
                    <option value="91">India</option>
                    <option value="62">Indonesia</option>
                    <option value="98">Iran</option>
                    <option value="964">Iraq</option>
                    <option value="353">Ireland</option>
                    <option value="441624">Isle of Man</option>
                    <option value="972">Israel</option>
                    <option value="39">Italy</option>
                    <option value="225">Ivory Coast</option>
                    <option value="1876">Jamaica</option>
                    <option value="81">Japan</option>
                    <option value="441534">Jersey</option>
                    <option value="962">Jordan</option>
                    <option value="7">Kazakhstan</option>
                    <option value="254">Kenya</option>
                    <option value="686">Kiribati</option>
                    <option value="383">Kosovo</option>
                    <option value="965">Kuwait</option>
                    <option value="996">Kyrgyzstan</option>
                    <option value="856">Laos</option>
                    <option value="371">Latvia</option>
                    <option value="961">Lebanon</option>
                    <option value="266">Lesotho</option>
                    <option value="231">Liberia</option>
                    <option value="218">Libya</option>
                    <option value="423">Liechtenstein</option>
                    <option value="370">Lithuania</option>
                    <option value="352">Luxembourg</option>
                    <option value="853">Macau</option>
                    <option value="389">Macedonia</option>
                    <option value="261">Madagascar</option>
                    <option value="265">Malawi</option>
                    <option value="60">Malaysia</option>
                    <option value="960">Maldives</option>
                    <option value="223">Mali</option>
                    <option value="356">Malta</option>
                    <option value="692">Marshall Islands</option>
                    <option value="222">Mauritania</option>
                    <option value="230">Mauritius</option>
                    <option value="262">Mayotte</option>
                    <option value="52">Mexico</option>
                    <option value="691">Micronesia</option>
                    <option value="373">Moldova</option>
                    <option value="377">Monaco</option>
                    <option value="976">Mongolia</option>
                    <option value="382">Montenegro</option>
                    <option value="1664">Montserrat</option>
                    <option value="212">Morocco</option>
                    <option value="258">Mozambique</option>
                    <option value="95">Myanmar</option>
                    <option value="264">Namibia</option>
                    <option value="674">Nauru</option>
                    <option value="977">Nepal</option>
                    <option value="31">Netherlands</option>
                    <option value="599">Netherlands Antilles</option>
                    <option value="687">New Caledonia</option>
                    <option value="64">New Zealand/option>
                    <option value="505">Nicaragua</option>
                    <option value="227">Niger</option>
                    <option value="234">Nigeria</option>
                    <option value="683">Niue</option>
                    <option value="850">North Korea</option>
                    <option value="47">Norway</option>
                    <option value="968">Oman</option>
                    <option value="92">Pakistan</option>
                    <option value="680">Palau</option>
                    <option value="970">Palestine</option>
                    <option value="507">Panama</option>
                    <option value="675">Papua New Guinea</option>
                    <option value="595">Paraguay</option>
                    <option value="51">Peru</option>
                    <option value="63">Philippines</option>
                    <option value="64">Pitcairn</option>
                    <option value="48">Poland</option>
                    <option value="351">Portugal</option>
                    <option value="974">Qatar</option>
                    <option value="242">Republic of the Congo</option>
                    <option value="262">Reunion</option>
                    <option value="40">Romania</option>
                    <option value="7">Russia</option>
                    <option value="250">Rwanda</option>
                    <option value="590">Saint Barthelemy</option>
                    <option value="290">Saint Helena</option>
                    <option value="1869">Saint Kitts and Nevis</option>
                    <option value="1758">Saint Lucia</option>
                    <option value="590">Saint Martin</option>
                    <option value="508">Saint Pierre and Miquelon</option>
                    <option value="685">Samoa</option>
                    <option value="378">San Marino</option>
                    <option value="966">Saudi Arabia</option>
                    <option value="221">Senegal</option>
                    <option value="381">Serbia</option>
                    <option value="248">Seychelles</option>
                    <option value="232">Sierra Leone</option>
                    <option value="65">Singapore</option>
                    <option value="252">Somalia</option>
                    <option value="27">South Africa</option>
                    <option value="82">South Korea</option>
                    <option value="211">South Sudan</option>
                    <option value="34">Spain</option>
                     <option value="94">Sri Lanka</option>
                    <option value="249">Sudan</option>
                    <option value="597">Suriname</option>
                     <option value="268">Swaziland</option>
                    <option value="46">Sweden</option>
                    <option value="41">Switzerland</option>
                     <option value="963">Syria</option>
                    <option value="886">Taiwan</option>
                    <option value="66">Thailand</option>
                     <option value="971">United Arab Emirates</option>
                    <option value="44">United Kingdom</option>
                    <option value="1">United States</option>
                     <option value="379">Vatican</option>
                    <option value="260">Zambia</option>
                    <option value="263">Zimbabwe</option>
                  
                    </select>

                </div-->

 <div class="col-md-12">


<div class="form-group"><label class="small mb-1">Contact Number</label>
    <div style="display:flex; gap:8px; align-items:center;">
        <input type="hidden" name="cc" id="cc" value="<?php echo esc($client['0']['cc'] ?? '', 'attr'); ?>" />
        <input class="form-control py-4" name="contact" id="contact" type="text" placeholder="Enter contact number" value="<?php echo $client['0']['number'];?>" style="flex:1;" />
    </div>
</div>
  </div>
</div>
<div class="row">
                <!--div class="col-md-6">
                     <label class="small mb-1">Country code</label>
                    <select class="form-control" name="cc" id="cc" style="height: 36px;">
                         <option value="" selected="selected">Please select</option>
                    <option value="93">Afghanistan</option>
                    <option value="355">Albania</option>
                    <option value="213">Algeria</option>
                    <option value="1684">American Samoa</option>
                    <option value="376">Andorra</option>
                    <option value="244">Angola</option>
                    <option value="1264">Anguilla</option>
                    <option value="672">Antarctica</option>
                    <option value="1268">Antigua and Barbuda</option>
                    <option value="54">Argentina</option>
                    <option value="374">Armenia</option>
                    <option value="297">Aruba</option>
                    <option value="61">Australia</option>
                    <option value="43">Austria</option>
                    <option value="994">Azerbaijan</option>
                    <option value="1242">Bahamas</option>
                    <option value="973">Bahrain</option>
                    <option value="880">Bangladesh</option>
                    <option value="1246">Barbados</option>
                    <option value="375">Belarus</option>
                    <option value="32">Belgium</option>
                    <option value="501">Belize</option>
                    <option value="229">Benin</option>
                    <option value="1441">Bermuda</option>
                    <option value="975">Bhutan</option>
                    <option value="591">Bolivia</option>
                    <option value="387">Bosnia and Herzegovina</option>
                    <option value="267">Botswana</option>
                    <option value="55">Brazil</option>
                    <option value="246">British Indian Ocean Territory</option>
                    <option value="1284">British Virgin Islands</option>
                    <option value="673">Brunei</option>
                    <option value="359">Bulgaria</option>
                    <option value="226">Burkina Faso</option>
                    <option value="257">Burundi</option>
                    <option value="855">Cambodia</option>
                    <option value="237">Cameroon</option>
                    <option value="1">Canada</option>
                    <option value="238">Cape Verde</option>
                    <option value="1345">Cayman Islands</option>
                    <option value="236">Central African Republic</option>
                    <option value="235">Chad</option>
                    <option value="56">Chile</option>
                    <option value="86">China</option>
                    <option value="61">Christmas Island</option>
                    <option value="61">Cocos Islands</option>
                    <option value="57">Colombia</option>
                    <option value="269">Comoros</option>
                    <option value="682">Cook Islands</option>
                    <option value="506">Costa Rica</option>
                    <option value="385">Croatia</option>
                    <option value="53">Cuba</option>
                    <option value="599">Curacao</option>
                    <option value="357">Cyprus</option>
                    <option value="420">Czech Republic</option>
                    <option value="243">Democratic Republic of the Congo</option>
                    <option value="45">Denmark</option>
                    <option value="253">Djibouti</option>
                    <option value="1767">Dominica</option>
                    <option value="670">East Timor</option>
                    <option value="593">Ecuador</option>
                    <option value="20">Egypt</option>
                    <option value="503">El Salvador</option>
                    <option value="240">Equatorial Guinea</option>
                    <option value="291">Eritrea</option>
                    <option value="372">Estonia</option>
                    <option value="251">Ethiopia</option>
                    <option value="500">Falkland Islands</option>
                    <option value="298">Faroe Islands</option>
                    <option value="679">Fiji</option>

                    <option value="358">Finland</option>
                    <option value="33">France</option>
                    <option value="689">French Polynesia</option>
                    <option value="241">Gabon</option>
                    <option value="220">Gambia</option>
                    <option value="995">Georgia</option>
                    <option value="49">Germany</option>
                    <option value="233">Ghana</option>

                    <option value="350">Gibraltar</option>
                    <option value="30">Greece</option>
                    <option value="299">Greenland</option>
                    <option value="1473">Grenada</option>
                    <option value="1671">Guam</option>

                    <option value="502">Guatemala</option>
                    <option value="441481">Guernsey</option>
                    <option value="224">Guinea</option>
                    <option value="245">Guinea-Bissau</option>
                    <option value="592">Guyana</option>
                    <option value="509">Haiti</option>
                    <option value="504">Honduras</option>
                    <option value="852">Hong Kong</option>
                    <option value="36">Hungary</option>
                    <option value=" 354">Iceland</option>
                    <option value="91">India</option>
                    <option value="62">Indonesia</option>
                    <option value="98">Iran</option>
                    <option value="964">Iraq</option>
                    <option value="353">Ireland</option>
                    <option value="441624">Isle of Man</option>
                    <option value="972">Israel</option>
                    <option value="39">Italy</option>
                    <option value="225">Ivory Coast</option>
                    <option value="1876">Jamaica</option>
                    <option value="81">Japan</option>
                    <option value="441534">Jersey</option>
                    <option value="962">Jordan</option>
                    <option value="7">Kazakhstan</option>
                    <option value="254">Kenya</option>
                    <option value="686">Kiribati</option>
                    <option value="383">Kosovo</option>
                    <option value="965">Kuwait</option>
                    <option value="996">Kyrgyzstan</option>
                    <option value="856">Laos</option>
                    <option value="371">Latvia</option>
                    <option value="961">Lebanon</option>
                    <option value="266">Lesotho</option>
                    <option value="231">Liberia</option>
                    <option value="218">Libya</option>
                    <option value="423">Liechtenstein</option>
                    <option value="370">Lithuania</option>
                    <option value="352">Luxembourg</option>
                    <option value="853">Macau</option>
                    <option value="389">Macedonia</option>
                    <option value="261">Madagascar</option>
                    <option value="265">Malawi</option>
                    <option value="60">Malaysia</option>
                    <option value="960">Maldives</option>
                    <option value="223">Mali</option>
                    <option value="356">Malta</option>
                    <option value="692">Marshall Islands</option>
                    <option value="222">Mauritania</option>
                    <option value="230">Mauritius</option>
                    <option value="262">Mayotte</option>
                    <option value="52">Mexico</option>
                    <option value="691">Micronesia</option>
                    <option value="373">Moldova</option>
                    <option value="377">Monaco</option>
                    <option value="976">Mongolia</option>
                    <option value="382">Montenegro</option>
                    <option value="1664">Montserrat</option>
                    <option value="212">Morocco</option>
                    <option value="258">Mozambique</option>
                    <option value="95">Myanmar</option>
                    <option value="264">Namibia</option>
                    <option value="674">Nauru</option>
                    <option value="977">Nepal</option>
                    <option value="31">Netherlands</option>
                    <option value="599">Netherlands Antilles</option>
                    <option value="687">New Caledonia</option>
                    <option value="64">New Zealand/option>
                    <option value="505">Nicaragua</option>
                    <option value="227">Niger</option>
                    <option value="234">Nigeria</option>
                    <option value="683">Niue</option>
                    <option value="850">North Korea</option>
                    <option value="47">Norway</option>
                    <option value="968">Oman</option>
                    <option value="92">Pakistan</option>
                    <option value="680">Palau</option>
                    <option value="970">Palestine</option>
                    <option value="507">Panama</option>
                    <option value="675">Papua New Guinea</option>
                    <option value="595">Paraguay</option>
                    <option value="51">Peru</option>
                    <option value="63">Philippines</option>
                    <option value="64">Pitcairn</option>
                    <option value="48">Poland</option>
                    <option value="351">Portugal</option>
                    <option value="974">Qatar</option>
                    <option value="242">Republic of the Congo</option>
                    <option value="262">Reunion</option>
                    <option value="40">Romania</option>
                    <option value="7">Russia</option>
                    <option value="250">Rwanda</option>
                    <option value="590">Saint Barthelemy</option>
                    <option value="290">Saint Helena</option>
                    <option value="1869">Saint Kitts and Nevis</option>
                    <option value="1758">Saint Lucia</option>
                    <option value="590">Saint Martin</option>
                    <option value="508">Saint Pierre and Miquelon</option>
                    <option value="685">Samoa</option>
                    <option value="378">San Marino</option>
                    <option value="966">Saudi Arabia</option>
                    <option value="221">Senegal</option>
                    <option value="381">Serbia</option>
                    <option value="248">Seychelles</option>
                    <option value="232">Sierra Leone</option>
                    <option value="65">Singapore</option>
                    <option value="252">Somalia</option>
                    <option value="27">South Africa</option>
                    <option value="82">South Korea</option>
                    <option value="211">South Sudan</option>
                    <option value="34">Spain</option>
                     <option value="94">Sri Lanka</option>
                    <option value="249">Sudan</option>
                    <option value="597">Suriname</option>
                     <option value="268">Swaziland</option>
                    <option value="46">Sweden</option>
                    <option value="41">Switzerland</option>
                     <option value="963">Syria</option>
                    <option value="886">Taiwan</option>
                    <option value="66">Thailand</option>
                     <option value="971">United Arab Emirates</option>
                    <option value="44">United Kingdom</option>
                    <option value="1">United States</option>
                     <option value="379">Vatican</option>
                    <option value="260">Zambia</option>
                    <option value="263">Zimbabwe</option>
                  
                    </select>

                </div-->

 <div class="col-md-12">
    <div class="form-group"><label class="small mb-1">Alternet Contact Number</label>
    <div style="display:flex; gap:8px; align-items:center;">
        <select name="alt_cc" id="alt_cc" style="flex:0 0 48%;">
            <option value="">Country Code</option>
            <optgroup label="⭐ Suggested">
                <option value="1" <?php echo (($client['0']['alt_cc'] ?? '') == '1') ? 'selected' : ''; ?>>🇨🇦 Canada (+1)</option>
            </optgroup>
            <optgroup label="All Countries">
                <option value="93" <?php echo (($client['0']['alt_cc'] ?? '') == '93') ? 'selected' : ''; ?>>🇦🇫 Afghanistan (+93)</option>
                <option value="355" <?php echo (($client['0']['alt_cc'] ?? '') == '355') ? 'selected' : ''; ?>>🇦🇱 Albania (+355)</option>
                <option value="213" <?php echo (($client['0']['alt_cc'] ?? '') == '213') ? 'selected' : ''; ?>>🇩🇿 Algeria (+213)</option>
                <option value="54" <?php echo (($client['0']['alt_cc'] ?? '') == '54') ? 'selected' : ''; ?>>🇦🇷 Argentina (+54)</option>
                <option value="61" <?php echo (($client['0']['alt_cc'] ?? '') == '61') ? 'selected' : ''; ?>>🇦🇺 Australia (+61)</option>
                <option value="43" <?php echo (($client['0']['alt_cc'] ?? '') == '43') ? 'selected' : ''; ?>>🇦🇹 Austria (+43)</option>
                <option value="880" <?php echo (($client['0']['alt_cc'] ?? '') == '880') ? 'selected' : ''; ?>>🇧🇩 Bangladesh (+880)</option>
                <option value="32" <?php echo (($client['0']['alt_cc'] ?? '') == '32') ? 'selected' : ''; ?>>🇧🇪 Belgium (+32)</option>
                <option value="55" <?php echo (($client['0']['alt_cc'] ?? '') == '55') ? 'selected' : ''; ?>>🇧🇷 Brazil (+55)</option>
                <option value="1" <?php echo (($client['0']['alt_cc'] ?? '') == '1') ? 'selected' : ''; ?>>🇨🇦 Canada (+1)</option>
                <option value="56" <?php echo (($client['0']['alt_cc'] ?? '') == '56') ? 'selected' : ''; ?>>🇨🇱 Chile (+56)</option>
                <option value="86" <?php echo (($client['0']['alt_cc'] ?? '') == '86') ? 'selected' : ''; ?>>🇨🇳 China (+86)</option>
                <option value="57" <?php echo (($client['0']['alt_cc'] ?? '') == '57') ? 'selected' : ''; ?>>🇨🇴 Colombia (+57)</option>
                <option value="20" <?php echo (($client['0']['alt_cc'] ?? '') == '20') ? 'selected' : ''; ?>>🇪🇬 Egypt (+20)</option>
                <option value="33" <?php echo (($client['0']['alt_cc'] ?? '') == '33') ? 'selected' : ''; ?>>🇫🇷 France (+33)</option>
                <option value="49" <?php echo (($client['0']['alt_cc'] ?? '') == '49') ? 'selected' : ''; ?>>🇩🇪 Germany (+49)</option>
                <option value="233" <?php echo (($client['0']['alt_cc'] ?? '') == '233') ? 'selected' : ''; ?>>🇬🇭 Ghana (+233)</option>
                <option value="91" <?php echo (($client['0']['alt_cc'] ?? '') == '91') ? 'selected' : ''; ?>>🇮🇳 India (+91)</option>
                <option value="62" <?php echo (($client['0']['alt_cc'] ?? '') == '62') ? 'selected' : ''; ?>>🇮🇩 Indonesia (+62)</option>
                <option value="98" <?php echo (($client['0']['alt_cc'] ?? '') == '98') ? 'selected' : ''; ?>>🇮🇷 Iran (+98)</option>
                <option value="964" <?php echo (($client['0']['alt_cc'] ?? '') == '964') ? 'selected' : ''; ?>>🇮🇶 Iraq (+964)</option>
                <option value="353" <?php echo (($client['0']['alt_cc'] ?? '') == '353') ? 'selected' : ''; ?>>🇮🇪 Ireland (+353)</option>
                <option value="972" <?php echo (($client['0']['alt_cc'] ?? '') == '972') ? 'selected' : ''; ?>>🇮🇱 Israel (+972)</option>
                <option value="39" <?php echo (($client['0']['alt_cc'] ?? '') == '39') ? 'selected' : ''; ?>>🇮🇹 Italy (+39)</option>
                <option value="81" <?php echo (($client['0']['alt_cc'] ?? '') == '81') ? 'selected' : ''; ?>>🇯🇵 Japan (+81)</option>
                <option value="962" <?php echo (($client['0']['alt_cc'] ?? '') == '962') ? 'selected' : ''; ?>>🇯🇴 Jordan (+962)</option>
                <option value="254" <?php echo (($client['0']['alt_cc'] ?? '') == '254') ? 'selected' : ''; ?>>🇰🇪 Kenya (+254)</option>
                <option value="965" <?php echo (($client['0']['alt_cc'] ?? '') == '965') ? 'selected' : ''; ?>>🇰🇼 Kuwait (+965)</option>
                <option value="961" <?php echo (($client['0']['alt_cc'] ?? '') == '961') ? 'selected' : ''; ?>>🇱🇧 Lebanon (+961)</option>
                <option value="60" <?php echo (($client['0']['alt_cc'] ?? '') == '60') ? 'selected' : ''; ?>>🇲🇾 Malaysia (+60)</option>
                <option value="52" <?php echo (($client['0']['alt_cc'] ?? '') == '52') ? 'selected' : ''; ?>>🇲🇽 Mexico (+52)</option>
                <option value="212" <?php echo (($client['0']['alt_cc'] ?? '') == '212') ? 'selected' : ''; ?>>🇲🇦 Morocco (+212)</option>
                <option value="977" <?php echo (($client['0']['alt_cc'] ?? '') == '977') ? 'selected' : ''; ?>>🇳🇵 Nepal (+977)</option>
                <option value="31" <?php echo (($client['0']['alt_cc'] ?? '') == '31') ? 'selected' : ''; ?>>🇳🇱 Netherlands (+31)</option>
                <option value="64" <?php echo (($client['0']['alt_cc'] ?? '') == '64') ? 'selected' : ''; ?>>🇳🇿 New Zealand (+64)</option>
                <option value="234" <?php echo (($client['0']['alt_cc'] ?? '') == '234') ? 'selected' : ''; ?>>🇳🇬 Nigeria (+234)</option>
                <option value="47" <?php echo (($client['0']['alt_cc'] ?? '') == '47') ? 'selected' : ''; ?>>🇳🇴 Norway (+47)</option>
                <option value="92" <?php echo (($client['0']['alt_cc'] ?? '') == '92') ? 'selected' : ''; ?>>🇵🇰 Pakistan (+92)</option>
                <option value="63" <?php echo (($client['0']['alt_cc'] ?? '') == '63') ? 'selected' : ''; ?>>🇵🇭 Philippines (+63)</option>
                <option value="48" <?php echo (($client['0']['alt_cc'] ?? '') == '48') ? 'selected' : ''; ?>>🇵🇱 Poland (+48)</option>
                <option value="974" <?php echo (($client['0']['alt_cc'] ?? '') == '974') ? 'selected' : ''; ?>>🇶🇦 Qatar (+974)</option>
                <option value="7" <?php echo (($client['0']['alt_cc'] ?? '') == '7') ? 'selected' : ''; ?>>🇷🇺 Russia (+7)</option>
                <option value="966" <?php echo (($client['0']['alt_cc'] ?? '') == '966') ? 'selected' : ''; ?>>🇸🇦 Saudi Arabia (+966)</option>
                <option value="65" <?php echo (($client['0']['alt_cc'] ?? '') == '65') ? 'selected' : ''; ?>>🇸🇬 Singapore (+65)</option>
                <option value="27" <?php echo (($client['0']['alt_cc'] ?? '') == '27') ? 'selected' : ''; ?>>🇿🇦 South Africa (+27)</option>
                <option value="82" <?php echo (($client['0']['alt_cc'] ?? '') == '82') ? 'selected' : ''; ?>>🇰🇷 South Korea (+82)</option>
                <option value="34" <?php echo (($client['0']['alt_cc'] ?? '') == '34') ? 'selected' : ''; ?>>🇪🇸 Spain (+34)</option>
                <option value="94" <?php echo (($client['0']['alt_cc'] ?? '') == '94') ? 'selected' : ''; ?>>🇱🇰 Sri Lanka (+94)</option>
                <option value="46" <?php echo (($client['0']['alt_cc'] ?? '') == '46') ? 'selected' : ''; ?>>🇸🇪 Sweden (+46)</option>
                <option value="41" <?php echo (($client['0']['alt_cc'] ?? '') == '41') ? 'selected' : ''; ?>>🇨🇭 Switzerland (+41)</option>
                <option value="66" <?php echo (($client['0']['alt_cc'] ?? '') == '66') ? 'selected' : ''; ?>>🇹🇭 Thailand (+66)</option>
                <option value="971" <?php echo (($client['0']['alt_cc'] ?? '') == '971') ? 'selected' : ''; ?>>🇦🇪 United Arab Emirates (+971)</option>
                <option value="44" <?php echo (($client['0']['alt_cc'] ?? '') == '44') ? 'selected' : ''; ?>>🇬🇧 United Kingdom (+44)</option>
                <option value="1" <?php echo (($client['0']['alt_cc'] ?? '') == '1') ? 'selected' : ''; ?>>🇺🇸 United States (+1)</option>
                <option value="84" <?php echo (($client['0']['alt_cc'] ?? '') == '84') ? 'selected' : ''; ?>>🇻🇳 Vietnam (+84)</option>
                <option value="260" <?php echo (($client['0']['alt_cc'] ?? '') == '260') ? 'selected' : ''; ?>>🇿🇲 Zambia (+260)</option>
                <option value="263" <?php echo (($client['0']['alt_cc'] ?? '') == '263') ? 'selected' : ''; ?>>🇿🇼 Zimbabwe (+263)</option>
            </optgroup>
        </select>
        <input class="form-control py-4" name="alt_mobile_no" id="alt_mobile_no" type="text" placeholder="Enter Alternet Contact Number" value="<?php echo $client['0']['alt_mobile_no'];?>" style="flex:1;" />
    </div>
    </div>
  </div>
</div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label>
    <input class="form-control py-4"name="email" id="email" type="text" placeholder="Enter email"value="<?php echo $client['0']['email'];?>" /></div>
    <div class="form-group"><label class="small mb-1" for="inputFirstName">Date of Birth</label>
    <input class="form-control py-4"name="dob" id="dob_1" type="date" placeholder="Enter Date of Birth" value="<?php echo $client['0']['user_dob'];?>" required /></div>
    
	<?php /* ?>
	<div class="form-group"><label class="small mb-1" for="inputFirstName">Client Status</label>
    <input class="form-control py-4"name="client_status" id="client_status" type="text" placeholder="Enter client status" value="<?php echo $client['0']['client_status'];?>" /></div>
	<?php */ ?>

                            </div>
                            <div class="col-xl-6 col-md-6 selectEntry">

<div class="form-group"><label class="small mb-1" for="inputFirstName">Address</label><input class="form-control py-4" id="address" type="text" name="address" placeholder="Enter address" required="required" value="<?php echo $client['0']['address'];?>" /></div>
<div class="form-group"><label class="small mb-1" for="inputFirstName">City</label><input class="form-control py-4" id="city" type="text" name="city" value="<?php echo $client['0']['city'];?>" placeholder="Enter City" required="required" /></div>

    <div class="form-group"><label class="small mb-1" for="inputFirstName">Spouse Name(Optional)</label><input class="form-control py-4" id="spouse_name" name="spouse_name"type="text" placeholder="Enter spouse name" value="<?php echo $client['0']['spouse_name'];?>" /></div>

<div class="form-group">
    <label class="small mb-1" for="team_member">Assign Team Member</label>
    <select class="form-control" name="team_member" id="team_member">
        <option value="">-- Select Team Member --</option>
        <?php foreach($team as $tm) { ?>
            <option value="<?php echo $tm['id']; ?>" <?php echo (isset($client['0']['team_member']) && $client['0']['team_member'] == $tm['id']) ? 'selected' : ''; ?>>
                <?php echo $tm['firstname'] . ' ' . $tm['lastname']; ?>
            </option>
        <?php } ?>
    </select>
</div>

 <div class="form-group">
 <input type="submit" id="siasubmit"  class="form-control py-4" style="background-color: green;text-align: center;color: white" name="submit" value="Submit">
</div>

<?php /* ?>
<div class="form-group"><label class="small mb-1" for="inputFirstName">Source</label><select class="form-control"NAME="source">
<option value="<?php echo $client['0']['source'];?>"><?php echo $client['0']['source'];?></option>
          <option value="Facebook">Facebook</option>
          <option value="Webform">Webform</option>
          <option value="Phone/WhatsApp">Phone/WhatsApp</option>
          <option value="Email">Email</option>
          <option value="LinkedIn">LinkedIn</option>
          <option value="Google my Bus">Google my Bus</option>
          <option value="Live Chat">Live Chat</option>
          <option value="Instagram">Instagram</option>
           <option value="YouTube">YouTube</option>
           <option value="Reffrence/Agent">Reffrence/Agent</option>
            <option value="Existing client">Existing client</option>
            <option value="YouTube">Other</option>
                                
                                </select></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Agent Name</label>
<select class="form-control"NAME="agent_name">
 <option value="<?php echo $client['0']['agent_name'];?>"><?php echo $client['0']['agent_name'];?> </option>
                                <?php foreach($agent as $tta) {                     
                                    
                                    ?>
                                
                                
                                <option value="<?php echo $tta['name'];?>"><?php echo $tta['name'];?></option>
                                
                                <?php } ?>
                                </select>
                                </div>



<div class="form-group">
        <label class="small mb-1" for="inputFirstName">Family Tree</label><br>

<input  id="spouse_name" name="family"type="radio" value="yes" />Yes
<input  id="spouse_name" name="family"type="radio" value="no" />No




        <input class="form-control dekho" id="master_sia_id" value="<?php echo $client['0']['master_sia_id'];?>" name="master_sia_id"type="text" placeholder="Enter Family Tree" /></div>

<div class="form-group"><label class="small mb-1" for="inputFirstName">Reference</label><input class="form-control py-4" id="reff" name="reff"type="text" value="<?php echo $client['0']['reff'];?>" placeholder="Enter Reference" /></div>

<?php */ ?>
                               
                            </div>
        
         </form>                   
                           
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


          <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    // #cc (Contact Number's country code) is now a hidden input, not a <select> — no
    // select2 initialization needed, it just carries the existing value through on submit.
    $('#alt_cc').select2({ placeholder: 'Country Code', allowClear: false, dropdownParent: $('body') });
});
</script>

<!--script>
 $("#myform").submit(function(event) {

  var str = $("#audio").val();
  
  if(str==""){
    alert("Please Record a voice messages");

 event.preventDefault();
}

});
</script-->
    
        <script>

$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            name: {
                required: true               
            },
            
             email: {
                required: true               
            },
            contact: {
                required: true               
            },
            alt_mobile_no: {
                required: true               
            },
             dob: {
                required: true               
            },
            client_status: {
                required: true               
            },
            /*spouse_name: {
                required: true               
            },*/
            reff: {
                required: true              
            },
            city: {
                required: true               
            },
            source: {
                required: true
               
            },
             agent_name: {
                required: true

            },
            team_member: {
                required: true
            },



        },
        messages: {
        name: "Name Is Required",
        contact: "Contact Number Is Required",
        email: "Email Is Required",
        alt_mobile_no: "Alternet Contact Number Is Required",
        city: "City Is Required",
        source: "Source Is Required",
        reff: "Reference Is Required",
        agent_name: "Agent Name Is Required",
        spouse_name: "Spouse Name Is Required",
        client_status: "Client Status Is Required",
        dob: "Date Of Birth Is Required",
        team_member: "Please Select Team Member",
           
           
              
       
         }
        
    });

});
</script>

<script>
  $(function() {


    $( "#dob" ).datepicker({

dateFormat: 'yy-mm-dd',
autoclose: true

    });
      });
</script>
    </body>
</html>
