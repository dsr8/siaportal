<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Edit Client</title>
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            body { background: #f0f4f8; }

            .form-wrapper {
                min-height: 80vh;
                display: flex;
                align-items: flex-start;
                justify-content: center;
                padding: 30px 15px;
            }

            .form-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 8px 40px rgba(0,0,0,0.12);
                width: 100%;
                max-width: 640px;
                overflow: hidden;
            }

            .form-card-header {
                background: linear-gradient(135deg, #1a73e8, #0d47a1);
                color: #fff;
                padding: 28px 32px;
            }

            .form-card-header h2 {
                font-size: 22px;
                font-weight: 700;
                margin: 0 0 4px;
            }

            .form-card-header p {
                margin: 0;
                font-size: 13px;
                opacity: 0.85;
            }

            .form-card-body {
                padding: 28px 32px 32px;
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .field-group label {
                display: block;
                font-size: 12px;
                font-weight: 700;
                color: #555;
                text-transform: uppercase;
                letter-spacing: 0.6px;
                margin-bottom: 7px;
            }

            .field-group label span.req {
                color: #e53935;
                margin-left: 2px;
            }

            .field-icon-wrap {
                position: relative;
            }

            .field-icon-wrap .fi {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: #aaa;
                font-size: 14px;
                pointer-events: none;
            }

            .form-input {
                width: 100%;
                padding: 13px 14px 13px 40px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                font-size: 15px;
                color: #333;
                background: #fafafa;
                outline: none;
                transition: border-color 0.2s, box-shadow 0.2s;
                box-sizing: border-box;
            }

            .form-input:focus {
                border-color: #1a73e8;
                box-shadow: 0 0 0 3px rgba(26,115,232,0.12);
                background: #fff;
            }

            /* Phone row */
            .phone-row {
                display: flex;
                gap: 10px;
                align-items: flex-start;
            }

            .phone-row .cc-wrap { flex: 0 0 52%; }
            .phone-row .num-wrap { flex: 1; }

            .num-input { padding-left: 14px; }

            /* Two-column row */
            .two-col {
                display: flex;
                gap: 16px;
            }

            .two-col .field-group { flex: 1; }

            /* Select2 overrides */
            .select2-container { width: 100% !important; }
            .select2-container .select2-selection--single {
                height: 50px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                background: #fafafa;
                transition: border-color 0.2s;
            }
            .select2-container--default.select2-container--open .select2-selection--single,
            .select2-container--default.select2-container--focus .select2-selection--single {
                border-color: #1a73e8;
                box-shadow: 0 0 0 3px rgba(26,115,232,0.12);
                background: #fff;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 48px;
                padding-left: 14px;
                font-size: 13px;
                color: #333;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow { height: 48px; }
            .select2-results__option { font-size: 13px; }

            .btn-submit {
                width: 100%;
                background: linear-gradient(135deg, #1a73e8, #0d47a1);
                color: #fff;
                border: none;
                padding: 15px;
                border-radius: 10px;
                font-size: 16px;
                font-weight: 700;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                transition: opacity 0.2s, transform 0.1s;
                margin-top: 4px;
            }

            .btn-submit:hover { opacity: 0.92; }
            .btn-submit:active { transform: scale(0.98); }

            label.error {
                display: block;
                color: #e53935;
                font-size: 12px;
                font-weight: 500;
                margin-top: 5px;
                text-transform: none;
                letter-spacing: 0;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?= view('admininclude/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?= view('admininclude/admin_nav'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="form-wrapper">
                            <div class="form-card">

                                <div class="form-card-header">
                                    <h2>Edit Client</h2>
                                    <p>Update the details below and click Save Changes.</p>
                                </div>

                                <form id="myform" method="post" action="<?php echo base_url();?>/Siaportal/edit_client_prospect/<?php echo $client['0']['id'];?>">
                                    <div class="form-card-body">

                                        <!-- Name -->
                                        <div class="field-group">
                                            <label for="name">Name <span class="req">*</span></label>
                                            <div class="field-icon-wrap">
                                                <i class="fas fa-user fi"></i>
                                                <input class="form-input" id="name" name="name" type="text" placeholder="Enter full name" value="<?php echo htmlspecialchars($client['0']['heading']); ?>" />
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="field-group">
                                            <label for="email">Email <span class="req">*</span></label>
                                            <div class="field-icon-wrap">
                                                <i class="fas fa-envelope fi"></i>
                                                <input class="form-input" id="email" name="email" type="text" placeholder="Enter email address" value="<?php echo htmlspecialchars($client['0']['email']); ?>" />
                                            </div>
                                        </div>

                                        <!-- Contact Number -->
                                        <div class="field-group">
                                            <label>Contact Number <span class="req">*</span></label>
                                            <div class="phone-row">
                                                <div class="cc-wrap">
                                                    <select name="cc" id="cc">
                                                        <option value="">Please select</option>
                                                        <optgroup label="⭐ Suggested">
                                                            <option value="1">🇨🇦 Canada (+1)</option>
                                                        </optgroup>
                                                        <optgroup label="All Countries">
                                                            <option value="93">🇦🇫 Afghanistan (+93)</option>
                                                            <option value="355">🇦🇱 Albania (+355)</option>
                                                            <option value="213">🇩🇿 Algeria (+213)</option>
                                                            <option value="1684">🇦🇸 American Samoa (+1684)</option>
                                                            <option value="376">🇦🇩 Andorra (+376)</option>
                                                            <option value="244">🇦🇴 Angola (+244)</option>
                                                            <option value="1264">🇦🇮 Anguilla (+1264)</option>
                                                            <option value="672">🇦🇶 Antarctica (+672)</option>
                                                            <option value="1268">🇦🇬 Antigua and Barbuda (+1268)</option>
                                                            <option value="54">🇦🇷 Argentina (+54)</option>
                                                            <option value="374">🇦🇲 Armenia (+374)</option>
                                                            <option value="297">🇦🇼 Aruba (+297)</option>
                                                            <option value="61">🇦🇺 Australia (+61)</option>
                                                            <option value="43">🇦🇹 Austria (+43)</option>
                                                            <option value="994">🇦🇿 Azerbaijan (+994)</option>
                                                            <option value="1242">🇧🇸 Bahamas (+1242)</option>
                                                            <option value="973">🇧🇭 Bahrain (+973)</option>
                                                            <option value="880">🇧🇩 Bangladesh (+880)</option>
                                                            <option value="1246">🇧🇧 Barbados (+1246)</option>
                                                            <option value="375">🇧🇾 Belarus (+375)</option>
                                                            <option value="32">🇧🇪 Belgium (+32)</option>
                                                            <option value="501">🇧🇿 Belize (+501)</option>
                                                            <option value="229">🇧🇯 Benin (+229)</option>
                                                            <option value="1441">🇧🇲 Bermuda (+1441)</option>
                                                            <option value="975">🇧🇹 Bhutan (+975)</option>
                                                            <option value="591">🇧🇴 Bolivia (+591)</option>
                                                            <option value="387">🇧🇦 Bosnia and Herzegovina (+387)</option>
                                                            <option value="267">🇧🇼 Botswana (+267)</option>
                                                            <option value="55">🇧🇷 Brazil (+55)</option>
                                                            <option value="246">🇮🇴 British Indian Ocean Territory (+246)</option>
                                                            <option value="1284">🇻🇬 British Virgin Islands (+1284)</option>
                                                            <option value="673">🇧🇳 Brunei (+673)</option>
                                                            <option value="359">🇧🇬 Bulgaria (+359)</option>
                                                            <option value="226">🇧🇫 Burkina Faso (+226)</option>
                                                            <option value="257">🇧🇮 Burundi (+257)</option>
                                                            <option value="855">🇰🇭 Cambodia (+855)</option>
                                                            <option value="237">🇨🇲 Cameroon (+237)</option>
                                                            <option value="1">🇨🇦 Canada (+1)</option>
                                                            <option value="238">🇨🇻 Cape Verde (+238)</option>
                                                            <option value="1345">🇰🇾 Cayman Islands (+1345)</option>
                                                            <option value="236">🇨🇫 Central African Republic (+236)</option>
                                                            <option value="235">🇹🇩 Chad (+235)</option>
                                                            <option value="56">🇨🇱 Chile (+56)</option>
                                                            <option value="86">🇨🇳 China (+86)</option>
                                                            <option value="57">🇨🇴 Colombia (+57)</option>
                                                            <option value="269">🇰🇲 Comoros (+269)</option>
                                                            <option value="682">🇨🇰 Cook Islands (+682)</option>
                                                            <option value="506">🇨🇷 Costa Rica (+506)</option>
                                                            <option value="385">🇭🇷 Croatia (+385)</option>
                                                            <option value="53">🇨🇺 Cuba (+53)</option>
                                                            <option value="599">🇨🇼 Curacao (+599)</option>
                                                            <option value="357">🇨🇾 Cyprus (+357)</option>
                                                            <option value="420">🇨🇿 Czech Republic (+420)</option>
                                                            <option value="243">🇨🇩 DR Congo (+243)</option>
                                                            <option value="45">🇩🇰 Denmark (+45)</option>
                                                            <option value="253">🇩🇯 Djibouti (+253)</option>
                                                            <option value="593">🇪🇨 Ecuador (+593)</option>
                                                            <option value="20">🇪🇬 Egypt (+20)</option>
                                                            <option value="503">🇸🇻 El Salvador (+503)</option>
                                                            <option value="372">🇪🇪 Estonia (+372)</option>
                                                            <option value="251">🇪🇹 Ethiopia (+251)</option>
                                                            <option value="679">🇫🇯 Fiji (+679)</option>
                                                            <option value="358">🇫🇮 Finland (+358)</option>
                                                            <option value="33">🇫🇷 France (+33)</option>
                                                            <option value="995">🇬🇪 Georgia (+995)</option>
                                                            <option value="49">🇩🇪 Germany (+49)</option>
                                                            <option value="233">🇬🇭 Ghana (+233)</option>
                                                            <option value="30">🇬🇷 Greece (+30)</option>
                                                            <option value="502">🇬🇹 Guatemala (+502)</option>
                                                            <option value="224">🇬🇳 Guinea (+224)</option>
                                                            <option value="592">🇬🇾 Guyana (+592)</option>
                                                            <option value="509">🇭🇹 Haiti (+509)</option>
                                                            <option value="504">🇭🇳 Honduras (+504)</option>
                                                            <option value="852">🇭🇰 Hong Kong (+852)</option>
                                                            <option value="36">🇭🇺 Hungary (+36)</option>
                                                            <option value="354">🇮🇸 Iceland (+354)</option>
                                                            <option value="91">🇮🇳 India (+91)</option>
                                                            <option value="62">🇮🇩 Indonesia (+62)</option>
                                                            <option value="98">🇮🇷 Iran (+98)</option>
                                                            <option value="964">🇮🇶 Iraq (+964)</option>
                                                            <option value="353">🇮🇪 Ireland (+353)</option>
                                                            <option value="972">🇮🇱 Israel (+972)</option>
                                                            <option value="39">🇮🇹 Italy (+39)</option>
                                                            <option value="225">🇨🇮 Ivory Coast (+225)</option>
                                                            <option value="1876">🇯🇲 Jamaica (+1876)</option>
                                                            <option value="81">🇯🇵 Japan (+81)</option>
                                                            <option value="962">🇯🇴 Jordan (+962)</option>
                                                            <option value="7">🇰🇿 Kazakhstan (+7)</option>
                                                            <option value="254">🇰🇪 Kenya (+254)</option>
                                                            <option value="965">🇰🇼 Kuwait (+965)</option>
                                                            <option value="996">🇰🇬 Kyrgyzstan (+996)</option>
                                                            <option value="856">🇱🇦 Laos (+856)</option>
                                                            <option value="371">🇱🇻 Latvia (+371)</option>
                                                            <option value="961">🇱🇧 Lebanon (+961)</option>
                                                            <option value="231">🇱🇷 Liberia (+231)</option>
                                                            <option value="218">🇱🇾 Libya (+218)</option>
                                                            <option value="370">🇱🇹 Lithuania (+370)</option>
                                                            <option value="352">🇱🇺 Luxembourg (+352)</option>
                                                            <option value="60">🇲🇾 Malaysia (+60)</option>
                                                            <option value="960">🇲🇻 Maldives (+960)</option>
                                                            <option value="223">🇲🇱 Mali (+223)</option>
                                                            <option value="356">🇲🇹 Malta (+356)</option>
                                                            <option value="222">🇲🇷 Mauritania (+222)</option>
                                                            <option value="230">🇲🇺 Mauritius (+230)</option>
                                                            <option value="52">🇲🇽 Mexico (+52)</option>
                                                            <option value="373">🇲🇩 Moldova (+373)</option>
                                                            <option value="976">🇲🇳 Mongolia (+976)</option>
                                                            <option value="212">🇲🇦 Morocco (+212)</option>
                                                            <option value="258">🇲🇿 Mozambique (+258)</option>
                                                            <option value="95">🇲🇲 Myanmar (+95)</option>
                                                            <option value="264">🇳🇦 Namibia (+264)</option>
                                                            <option value="977">🇳🇵 Nepal (+977)</option>
                                                            <option value="31">🇳🇱 Netherlands (+31)</option>
                                                            <option value="64">🇳🇿 New Zealand (+64)</option>
                                                            <option value="234">🇳🇬 Nigeria (+234)</option>
                                                            <option value="850">🇰🇵 North Korea (+850)</option>
                                                            <option value="47">🇳🇴 Norway (+47)</option>
                                                            <option value="968">🇴🇲 Oman (+968)</option>
                                                            <option value="92">🇵🇰 Pakistan (+92)</option>
                                                            <option value="970">🇵🇸 Palestine (+970)</option>
                                                            <option value="507">🇵🇦 Panama (+507)</option>
                                                            <option value="675">🇵🇬 Papua New Guinea (+675)</option>
                                                            <option value="51">🇵🇪 Peru (+51)</option>
                                                            <option value="63">🇵🇭 Philippines (+63)</option>
                                                            <option value="48">🇵🇱 Poland (+48)</option>
                                                            <option value="351">🇵🇹 Portugal (+351)</option>
                                                            <option value="974">🇶🇦 Qatar (+974)</option>
                                                            <option value="40">🇷🇴 Romania (+40)</option>
                                                            <option value="7">🇷🇺 Russia (+7)</option>
                                                            <option value="250">🇷🇼 Rwanda (+250)</option>
                                                            <option value="966">🇸🇦 Saudi Arabia (+966)</option>
                                                            <option value="221">🇸🇳 Senegal (+221)</option>
                                                            <option value="381">🇷🇸 Serbia (+381)</option>
                                                            <option value="232">🇸🇱 Sierra Leone (+232)</option>
                                                            <option value="65">🇸🇬 Singapore (+65)</option>
                                                            <option value="252">🇸🇴 Somalia (+252)</option>
                                                            <option value="27">🇿🇦 South Africa (+27)</option>
                                                            <option value="82">🇰🇷 South Korea (+82)</option>
                                                            <option value="211">🇸🇸 South Sudan (+211)</option>
                                                            <option value="34">🇪🇸 Spain (+34)</option>
                                                            <option value="94">🇱🇰 Sri Lanka (+94)</option>
                                                            <option value="249">🇸🇩 Sudan (+249)</option>
                                                            <option value="46">🇸🇪 Sweden (+46)</option>
                                                            <option value="41">🇨🇭 Switzerland (+41)</option>
                                                            <option value="963">🇸🇾 Syria (+963)</option>
                                                            <option value="886">🇹🇼 Taiwan (+886)</option>
                                                            <option value="66">🇹🇭 Thailand (+66)</option>
                                                            <option value="971">🇦🇪 United Arab Emirates (+971)</option>
                                                            <option value="44">🇬🇧 United Kingdom (+44)</option>
                                                            <option value="1">🇺🇸 United States (+1)</option>
                                                            <option value="260">🇿🇲 Zambia (+260)</option>
                                                            <option value="263">🇿🇼 Zimbabwe (+263)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="num-wrap">
                                                    <input class="form-input num-input" id="contact" name="contact" type="text" placeholder="Phone number" value="<?php echo htmlspecialchars($client['0']['number']); ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Alternate Contact -->
                                        <div class="field-group">
                                            <label>Alternate Contact Number</label>
                                            <div class="phone-row">
                                                <div class="cc-wrap">
                                                    <select name="alt_cc" id="cc2">
                                                        <option value="">Please select</option>
                                                        <optgroup label="⭐ Suggested">
                                                            <option value="1">🇨🇦 Canada (+1)</option>
                                                        </optgroup>
                                                        <optgroup label="All Countries">
                                                            <option value="93">🇦🇫 Afghanistan (+93)</option>
                                                            <option value="355">🇦🇱 Albania (+355)</option>
                                                            <option value="213">🇩🇿 Algeria (+213)</option>
                                                            <option value="54">🇦🇷 Argentina (+54)</option>
                                                            <option value="374">🇦🇲 Armenia (+374)</option>
                                                            <option value="61">🇦🇺 Australia (+61)</option>
                                                            <option value="43">🇦🇹 Austria (+43)</option>
                                                            <option value="994">🇦🇿 Azerbaijan (+994)</option>
                                                            <option value="973">🇧🇭 Bahrain (+973)</option>
                                                            <option value="880">🇧🇩 Bangladesh (+880)</option>
                                                            <option value="32">🇧🇪 Belgium (+32)</option>
                                                            <option value="55">🇧🇷 Brazil (+55)</option>
                                                            <option value="1">🇨🇦 Canada (+1)</option>
                                                            <option value="56">🇨🇱 Chile (+56)</option>
                                                            <option value="86">🇨🇳 China (+86)</option>
                                                            <option value="57">🇨🇴 Colombia (+57)</option>
                                                            <option value="385">🇭🇷 Croatia (+385)</option>
                                                            <option value="357">🇨🇾 Cyprus (+357)</option>
                                                            <option value="420">🇨🇿 Czech Republic (+420)</option>
                                                            <option value="45">🇩🇰 Denmark (+45)</option>
                                                            <option value="20">🇪🇬 Egypt (+20)</option>
                                                            <option value="372">🇪🇪 Estonia (+372)</option>
                                                            <option value="251">🇪🇹 Ethiopia (+251)</option>
                                                            <option value="679">🇫🇯 Fiji (+679)</option>
                                                            <option value="358">🇫🇮 Finland (+358)</option>
                                                            <option value="33">🇫🇷 France (+33)</option>
                                                            <option value="995">🇬🇪 Georgia (+995)</option>
                                                            <option value="49">🇩🇪 Germany (+49)</option>
                                                            <option value="233">🇬🇭 Ghana (+233)</option>
                                                            <option value="30">🇬🇷 Greece (+30)</option>
                                                            <option value="852">🇭🇰 Hong Kong (+852)</option>
                                                            <option value="36">🇭🇺 Hungary (+36)</option>
                                                            <option value="91">🇮🇳 India (+91)</option>
                                                            <option value="62">🇮🇩 Indonesia (+62)</option>
                                                            <option value="98">🇮🇷 Iran (+98)</option>
                                                            <option value="964">🇮🇶 Iraq (+964)</option>
                                                            <option value="353">🇮🇪 Ireland (+353)</option>
                                                            <option value="972">🇮🇱 Israel (+972)</option>
                                                            <option value="39">🇮🇹 Italy (+39)</option>
                                                            <option value="81">🇯🇵 Japan (+81)</option>
                                                            <option value="962">🇯🇴 Jordan (+962)</option>
                                                            <option value="7">🇰🇿 Kazakhstan (+7)</option>
                                                            <option value="254">🇰🇪 Kenya (+254)</option>
                                                            <option value="965">🇰🇼 Kuwait (+965)</option>
                                                            <option value="856">🇱🇦 Laos (+856)</option>
                                                            <option value="961">🇱🇧 Lebanon (+961)</option>
                                                            <option value="60">🇲🇾 Malaysia (+60)</option>
                                                            <option value="960">🇲🇻 Maldives (+960)</option>
                                                            <option value="52">🇲🇽 Mexico (+52)</option>
                                                            <option value="212">🇲🇦 Morocco (+212)</option>
                                                            <option value="95">🇲🇲 Myanmar (+95)</option>
                                                            <option value="977">🇳🇵 Nepal (+977)</option>
                                                            <option value="31">🇳🇱 Netherlands (+31)</option>
                                                            <option value="64">🇳🇿 New Zealand (+64)</option>
                                                            <option value="234">🇳🇬 Nigeria (+234)</option>
                                                            <option value="47">🇳🇴 Norway (+47)</option>
                                                            <option value="968">🇴🇲 Oman (+968)</option>
                                                            <option value="92">🇵🇰 Pakistan (+92)</option>
                                                            <option value="970">🇵🇸 Palestine (+970)</option>
                                                            <option value="63">🇵🇭 Philippines (+63)</option>
                                                            <option value="48">🇵🇱 Poland (+48)</option>
                                                            <option value="351">🇵🇹 Portugal (+351)</option>
                                                            <option value="974">🇶🇦 Qatar (+974)</option>
                                                            <option value="40">🇷🇴 Romania (+40)</option>
                                                            <option value="7">🇷🇺 Russia (+7)</option>
                                                            <option value="250">🇷🇼 Rwanda (+250)</option>
                                                            <option value="966">🇸🇦 Saudi Arabia (+966)</option>
                                                            <option value="221">🇸🇳 Senegal (+221)</option>
                                                            <option value="65">🇸🇬 Singapore (+65)</option>
                                                            <option value="27">🇿🇦 South Africa (+27)</option>
                                                            <option value="82">🇰🇷 South Korea (+82)</option>
                                                            <option value="34">🇪🇸 Spain (+34)</option>
                                                            <option value="94">🇱🇰 Sri Lanka (+94)</option>
                                                            <option value="46">🇸🇪 Sweden (+46)</option>
                                                            <option value="41">🇨🇭 Switzerland (+41)</option>
                                                            <option value="886">🇹🇼 Taiwan (+886)</option>
                                                            <option value="66">🇹🇭 Thailand (+66)</option>
                                                            <option value="971">🇦🇪 United Arab Emirates (+971)</option>
                                                            <option value="44">🇬🇧 United Kingdom (+44)</option>
                                                            <option value="1">🇺🇸 United States (+1)</option>
                                                            <option value="260">🇿🇲 Zambia (+260)</option>
                                                            <option value="263">🇿🇼 Zimbabwe (+263)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="num-wrap">
                                                    <input class="form-input num-input" id="alt_mobile_no" name="alt_mobile_no" type="text" placeholder="Alternate number" value="<?php echo htmlspecialchars($client['0']['alt_mobile_no']); ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DOB + Spouse -->
                                        <div class="two-col">
                                            <div class="field-group">
                                                <label for="dob">Date of Birth <span class="req">*</span></label>
                                                <div class="field-icon-wrap">
                                                    <i class="fas fa-birthday-cake fi"></i>
                                                    <input class="form-input" id="dob" name="dob" type="text" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($client['0']['user_dob']); ?>" />
                                                </div>
                                            </div>
                                            <div class="field-group">
                                                <label for="spouse_name">Spouse Name <span class="req">*</span></label>
                                                <div class="field-icon-wrap">
                                                    <i class="fas fa-heart fi"></i>
                                                    <input class="form-input" id="spouse_name" name="spouse_name" type="text" placeholder="Enter spouse name" value="<?php echo htmlspecialchars($client['0']['spouse_name']); ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="field-group">
                                            <label for="address">Address</label>
                                            <div class="field-icon-wrap">
                                                <i class="fas fa-map-marker-alt fi"></i>
                                                <input class="form-input" id="address" name="address" type="text" placeholder="Enter address" value="<?php echo htmlspecialchars($client['0']['address']); ?>" />
                                            </div>
                                        </div>

                                        <!-- City -->
                                        <div class="field-group">
                                            <label for="city">City <span class="req">*</span></label>
                                            <div class="field-icon-wrap">
                                                <i class="fas fa-city fi"></i>
                                                <input class="form-input" id="city" name="city" type="text" placeholder="Enter city" value="<?php echo htmlspecialchars($client['0']['city']); ?>" />
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button type="submit" class="btn-submit">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/public/dist/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

        <script>
        $(document).ready(function () {
            $('#cc').select2({ placeholder: 'Country code', allowClear: false, dropdownParent: $('body') });
            $('#cc').val('<?php echo $client['0']['cc']; ?>').trigger('change');

            $('#cc2').select2({ placeholder: 'Country code', allowClear: false, dropdownParent: $('body') });
            $('#cc2').val('<?php echo $client['0']['alt_cc'] ?? ''; ?>').trigger('change');

            $('#myform').validate({
                rules: {
                    name:         { required: true },
                    email:        { required: true },
                    contact:      { required: true },
                    alt_mobile_no:{ required: true },
                    dob:          { required: true },
                    spouse_name:  { required: true },
                    city:         { required: true }
                },
                messages: {
                    name:          'Name is required',
                    email:         'Email is required',
                    contact:       'Contact number is required',
                    alt_mobile_no: 'Alternate contact number is required',
                    dob:           'Date of birth is required',
                    spouse_name:   'Spouse name is required',
                    city:          'City is required'
                },
                errorElement: 'label'
            });
        });
        </script>
    </body>
</html>
