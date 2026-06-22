
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Add Prospect</title>
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAUlL6ANPK/ACAY/8Ae17/AJ+K/wAAAO0ALwD/AKWR/wDq5v8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABmgAAAAACGYGaAAAUAAIZgZoAABQAAhmBmgAZmZgCGYGaAVmZnUIZgZok2FhY5hmBmiUVmZUmGYGaAAEZAAIZgZoAAhoAAhmBmgAACAACGYGaAAAAAAIZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAH/EAAB7xAAAe8QAAGDEAABARAAAAAQAAAAEAABxxAAAccQAAHvEAAB/xAAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
        <link href="<?php echo base_url();?>/public/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            body { background: #f0f4f8; }

            .form-wrapper {
                min-height: 80vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 30px 15px;
            }

            .form-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 8px 40px rgba(0,0,0,0.12);
                width: 100%;
                max-width: 520px;
                overflow: hidden;
            }

            .form-card-header {
                background: linear-gradient(135deg, #4CAF50, #2E7D32);
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
                border-color: #4CAF50;
                box-shadow: 0 0 0 3px rgba(76,175,80,0.12);
                background: #fff;
            }

            /* Phone row */
            .phone-row {
                display: flex;
                gap: 10px;
                align-items: flex-start;
            }

            .phone-row .cc-wrap {
                flex: 0 0 52%;
            }

            .phone-row .num-wrap {
                flex: 1;
            }

            /* Select2 */
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
                border-color: #4CAF50;
                box-shadow: 0 0 0 3px rgba(76,175,80,0.12);
                background: #fff;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 48px;
                padding-left: 14px;
                font-size: 13px;
                color: #333;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 48px;
            }
            .select2-results__option { font-size: 13px; }

            .num-input {
                padding-left: 14px;
            }

            .btn-submit {
                width: 100%;
                background: linear-gradient(135deg, #4CAF50, #2E7D32);
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
                                    <h2>Add New Prospect</h2>
                                    <p>Fill in the details below and click Add Prospect.</p>
                                </div>

                                <form id="contactForm" method="post" action="<?php echo base_url();?>/Siaportal/add_prospect" enctype="multipart/form-data">
                                    <div class="form-card-body">

                                        <!-- Name -->
                                        <div class="field-group">
                                            <label for="heading">Name <span class="req">*</span></label>
                                            <div class="field-icon-wrap">
                                                <i class="fas fa-user fi"></i>
                                                <input class="form-input" id="heading" type="text" name="heading" placeholder="Enter full name" autocomplete="off" />
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="field-group" style="position:relative;">
                                            <label for="email">Email <span class="req">*</span></label>
                                            <div class="field-icon-wrap">
                                                <i class="fas fa-envelope fi"></i>
                                                <input class="form-input" id="email" type="text" name="email" placeholder="Enter email address" autocomplete="off" />
                                            </div>
                                            <div id="email-search-results" style="display:none;position:absolute;z-index:999;background:#fff;border:1px solid #ddd;border-radius:8px;width:100%;box-shadow:0 4px 16px rgba(0,0,0,0.12);max-height:220px;overflow-y:auto;margin-top:2px;"></div>
                                        </div>

                                        <!-- Phone -->
                                        <div class="field-group">
                                            <label>Phone Number <span class="req">*</span></label>
                                            <small style="color:#333;display:block;margin-bottom:4px;">Enter Country Code then Contact Number - NO + and NO 0</small>
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
                                                            <option value="61">🇨🇽 Christmas Island (+61)</option>
                                                            <option value="61">🇨🇨 Cocos Islands (+61)</option>
                                                            <option value="57">🇨🇴 Colombia (+57)</option>
                                                            <option value="269">🇰🇲 Comoros (+269)</option>
                                                            <option value="682">🇨🇰 Cook Islands (+682)</option>
                                                            <option value="506">🇨🇷 Costa Rica (+506)</option>
                                                            <option value="385">🇭🇷 Croatia (+385)</option>
                                                            <option value="53">🇨🇺 Cuba (+53)</option>
                                                            <option value="599">🇨🇼 Curacao (+599)</option>
                                                            <option value="357">🇨🇾 Cyprus (+357)</option>
                                                            <option value="420">🇨🇿 Czech Republic (+420)</option>
                                                            <option value="243">🇨🇩 Democratic Republic of the Congo (+243)</option>
                                                            <option value="45">🇩🇰 Denmark (+45)</option>
                                                            <option value="253">🇩🇯 Djibouti (+253)</option>
                                                            <option value="1767">🇩🇲 Dominica (+1767)</option>
                                                            <option value="670">🇹🇱 East Timor (+670)</option>
                                                            <option value="593">🇪🇨 Ecuador (+593)</option>
                                                            <option value="20">🇪🇬 Egypt (+20)</option>
                                                            <option value="503">🇸🇻 El Salvador (+503)</option>
                                                            <option value="240">🇬🇶 Equatorial Guinea (+240)</option>
                                                            <option value="291">🇪🇷 Eritrea (+291)</option>
                                                            <option value="372">🇪🇪 Estonia (+372)</option>
                                                            <option value="251">🇪🇹 Ethiopia (+251)</option>
                                                            <option value="500">🇫🇰 Falkland Islands (+500)</option>
                                                            <option value="298">🇫🇴 Faroe Islands (+298)</option>
                                                            <option value="679">🇫🇯 Fiji (+679)</option>
                                                            <option value="358">🇫🇮 Finland (+358)</option>
                                                            <option value="33">🇫🇷 France (+33)</option>
                                                            <option value="689">🇵🇫 French Polynesia (+689)</option>
                                                            <option value="241">🇬🇦 Gabon (+241)</option>
                                                            <option value="220">🇬🇲 Gambia (+220)</option>
                                                            <option value="995">🇬🇪 Georgia (+995)</option>
                                                            <option value="49">🇩🇪 Germany (+49)</option>
                                                            <option value="233">🇬🇭 Ghana (+233)</option>
                                                            <option value="350">🇬🇮 Gibraltar (+350)</option>
                                                            <option value="30">🇬🇷 Greece (+30)</option>
                                                            <option value="299">🇬🇱 Greenland (+299)</option>
                                                            <option value="1473">🇬🇩 Grenada (+1473)</option>
                                                            <option value="1671">🇬🇺 Guam (+1671)</option>
                                                            <option value="502">🇬🇹 Guatemala (+502)</option>
                                                            <option value="441481">🇬🇬 Guernsey (+441481)</option>
                                                            <option value="224">🇬🇳 Guinea (+224)</option>
                                                            <option value="245">🇬🇼 Guinea-Bissau (+245)</option>
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
                                                            <option value="441624">🇮🇲 Isle of Man (+441624)</option>
                                                            <option value="972">🇮🇱 Israel (+972)</option>
                                                            <option value="39">🇮🇹 Italy (+39)</option>
                                                            <option value="225">🇨🇮 Ivory Coast (+225)</option>
                                                            <option value="1876">🇯🇲 Jamaica (+1876)</option>
                                                            <option value="81">🇯🇵 Japan (+81)</option>
                                                            <option value="441534">🇯🇪 Jersey (+441534)</option>
                                                            <option value="962">🇯🇴 Jordan (+962)</option>
                                                            <option value="7">🇰🇿 Kazakhstan (+7)</option>
                                                            <option value="254">🇰🇪 Kenya (+254)</option>
                                                            <option value="686">🇰🇮 Kiribati (+686)</option>
                                                            <option value="383">🇽🇰 Kosovo (+383)</option>
                                                            <option value="965">🇰🇼 Kuwait (+965)</option>
                                                            <option value="996">🇰🇬 Kyrgyzstan (+996)</option>
                                                            <option value="856">🇱🇦 Laos (+856)</option>
                                                            <option value="371">🇱🇻 Latvia (+371)</option>
                                                            <option value="961">🇱🇧 Lebanon (+961)</option>
                                                            <option value="266">🇱🇸 Lesotho (+266)</option>
                                                            <option value="231">🇱🇷 Liberia (+231)</option>
                                                            <option value="218">🇱🇾 Libya (+218)</option>
                                                            <option value="423">🇱🇮 Liechtenstein (+423)</option>
                                                            <option value="370">🇱🇹 Lithuania (+370)</option>
                                                            <option value="352">🇱🇺 Luxembourg (+352)</option>
                                                            <option value="853">🇲🇴 Macau (+853)</option>
                                                            <option value="389">🇲🇰 Macedonia (+389)</option>
                                                            <option value="261">🇲🇬 Madagascar (+261)</option>
                                                            <option value="265">🇲🇼 Malawi (+265)</option>
                                                            <option value="60">🇲🇾 Malaysia (+60)</option>
                                                            <option value="960">🇲🇻 Maldives (+960)</option>
                                                            <option value="223">🇲🇱 Mali (+223)</option>
                                                            <option value="356">🇲🇹 Malta (+356)</option>
                                                            <option value="692">🇲🇭 Marshall Islands (+692)</option>
                                                            <option value="222">🇲🇷 Mauritania (+222)</option>
                                                            <option value="230">🇲🇺 Mauritius (+230)</option>
                                                            <option value="262">🇾🇹 Mayotte (+262)</option>
                                                            <option value="52">🇲🇽 Mexico (+52)</option>
                                                            <option value="691">🇫🇲 Micronesia (+691)</option>
                                                            <option value="373">🇲🇩 Moldova (+373)</option>
                                                            <option value="377">🇲🇨 Monaco (+377)</option>
                                                            <option value="976">🇲🇳 Mongolia (+976)</option>
                                                            <option value="382">🇲🇪 Montenegro (+382)</option>
                                                            <option value="1664">🇲🇸 Montserrat (+1664)</option>
                                                            <option value="212">🇲🇦 Morocco (+212)</option>
                                                            <option value="258">🇲🇿 Mozambique (+258)</option>
                                                            <option value="95">🇲🇲 Myanmar (+95)</option>
                                                            <option value="264">🇳🇦 Namibia (+264)</option>
                                                            <option value="674">🇳🇷 Nauru (+674)</option>
                                                            <option value="977">🇳🇵 Nepal (+977)</option>
                                                            <option value="31">🇳🇱 Netherlands (+31)</option>
                                                            <option value="599">🇧🇶 Netherlands Antilles (+599)</option>
                                                            <option value="687">🇳🇨 New Caledonia (+687)</option>
                                                            <option value="64">🇳🇿 New Zealand (+64)</option>
                                                            <option value="505">🇳🇮 Nicaragua (+505)</option>
                                                            <option value="227">🇳🇪 Niger (+227)</option>
                                                            <option value="234">🇳🇬 Nigeria (+234)</option>
                                                            <option value="683">🇳🇺 Niue (+683)</option>
                                                            <option value="850">🇰🇵 North Korea (+850)</option>
                                                            <option value="47">🇳🇴 Norway (+47)</option>
                                                            <option value="968">🇴🇲 Oman (+968)</option>
                                                            <option value="92">🇵🇰 Pakistan (+92)</option>
                                                            <option value="680">🇵🇼 Palau (+680)</option>
                                                            <option value="970">🇵🇸 Palestine (+970)</option>
                                                            <option value="507">🇵🇦 Panama (+507)</option>
                                                            <option value="675">🇵🇬 Papua New Guinea (+675)</option>
                                                            <option value="595">🇵🇾 Paraguay (+595)</option>
                                                            <option value="51">🇵🇪 Peru (+51)</option>
                                                            <option value="63">🇵🇭 Philippines (+63)</option>
                                                            <option value="64">🇵🇳 Pitcairn (+64)</option>
                                                            <option value="48">🇵🇱 Poland (+48)</option>
                                                            <option value="351">🇵🇹 Portugal (+351)</option>
                                                            <option value="974">🇶🇦 Qatar (+974)</option>
                                                            <option value="242">🇨🇬 Republic of the Congo (+242)</option>
                                                            <option value="262">🇷🇪 Reunion (+262)</option>
                                                            <option value="40">🇷🇴 Romania (+40)</option>
                                                            <option value="7">🇷🇺 Russia (+7)</option>
                                                            <option value="250">🇷🇼 Rwanda (+250)</option>
                                                            <option value="590">🇧🇱 Saint Barthelemy (+590)</option>
                                                            <option value="290">🇸🇭 Saint Helena (+290)</option>
                                                            <option value="1869">🇰🇳 Saint Kitts and Nevis (+1869)</option>
                                                            <option value="1758">🇱🇨 Saint Lucia (+1758)</option>
                                                            <option value="590">🇲🇫 Saint Martin (+590)</option>
                                                            <option value="508">🇵🇲 Saint Pierre and Miquelon (+508)</option>
                                                            <option value="685">🇼🇸 Samoa (+685)</option>
                                                            <option value="378">🇸🇲 San Marino (+378)</option>
                                                            <option value="966">🇸🇦 Saudi Arabia (+966)</option>
                                                            <option value="221">🇸🇳 Senegal (+221)</option>
                                                            <option value="381">🇷🇸 Serbia (+381)</option>
                                                            <option value="248">🇸🇨 Seychelles (+248)</option>
                                                            <option value="232">🇸🇱 Sierra Leone (+232)</option>
                                                            <option value="65">🇸🇬 Singapore (+65)</option>
                                                            <option value="252">🇸🇴 Somalia (+252)</option>
                                                            <option value="27">🇿🇦 South Africa (+27)</option>
                                                            <option value="82">🇰🇷 South Korea (+82)</option>
                                                            <option value="211">🇸🇸 South Sudan (+211)</option>
                                                            <option value="34">🇪🇸 Spain (+34)</option>
                                                            <option value="94">🇱🇰 Sri Lanka (+94)</option>
                                                            <option value="249">🇸🇩 Sudan (+249)</option>
                                                            <option value="597">🇸🇷 Suriname (+597)</option>
                                                            <option value="268">🇸🇿 Swaziland (+268)</option>
                                                            <option value="46">🇸🇪 Sweden (+46)</option>
                                                            <option value="41">🇨🇭 Switzerland (+41)</option>
                                                            <option value="963">🇸🇾 Syria (+963)</option>
                                                            <option value="886">🇹🇼 Taiwan (+886)</option>
                                                            <option value="66">🇹🇭 Thailand (+66)</option>
                                                            <option value="971">🇦🇪 United Arab Emirates (+971)</option>
                                                            <option value="44">🇬🇧 United Kingdom (+44)</option>
                                                            <option value="1">🇺🇸 United States (+1)</option>
                                                            <option value="379">🇻🇦 Vatican (+379)</option>
                                                            <option value="260">🇿🇲 Zambia (+260)</option>
                                                            <option value="263">🇿🇼 Zimbabwe (+263)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="num-wrap field-icon-wrap">
                                                    <i class="fas fa-phone fi"></i>
                                                    <input class="form-input num-input" id="number" type="text" name="number" placeholder="Phone number" autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button type="submit" class="btn-submit">
                                            <i class="fas fa-user-plus"></i> Add Prospect
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
            $('#cc').select2({ placeholder: 'Country code', allowClear: false });
            $('#cc').val('1').trigger('change');

            $('#contactForm').validate({
                rules: {
                    heading: { required: true },
                    email:   { required: true, email: true },
                    number:  { required: true },
                    cc:      { required: true }
                },
                messages: {
                    heading: 'Name is required',
                    email:   'Email is required',
                    number:  'Phone number is required',
                    cc:      'Country code is required'
                },
                errorElement: 'label',
                errorPlacement: function(error, element) {
                    if (element.attr('name') === 'cc') {
                        error.insertAfter(element.closest('.phone-row'));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });

        // Email search on keyup
        $(document).ready(function () {
            var searchUrl = '<?php
                $scheme = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off") ? "https" : "http";
                $host   = $_SERVER["HTTP_HOST"];
                $uri    = strtok($_SERVER["REQUEST_URI"], "?");
                $parts  = array_values(array_filter(explode("/", $uri)));
                $base   = count($parts) > 2 ? "/" . implode("/", array_slice($parts, 0, count($parts) - 2)) : "";
                echo $scheme . "://" . $host . $base . "/Siaportal/search_by_email";
            ?>';
            var prospectUrl = '<?php echo $scheme . "://" . $host . $base . "/Siaportal/view_prospect"; ?>';
            var timer;

            $('#email').on('keyup', function () {
                clearTimeout(timer);
                var val = $(this).val().trim();
                var $box = $('#email-search-results');
                if (val.length < 3) { $box.hide().empty(); return; }
                timer = setTimeout(function () {
                    $.ajax({
                        url: searchUrl,
                        type: 'GET',
                        data: { email: val },
                        dataType: 'json',
                        success: function (data) {
                            $box.empty();
                            if (!data || data.length === 0) { $box.hide(); return; }
                            $.each(data, function (i, row) {
                                var isClient = row.entery_status === 'client';
                                var label    = isClient ? 'C' : 'P';
                                var badgeBg  = isClient ? '#007bff' : '#6f42c1';
                                var $item = $('<div>')
                                    .css({ padding:'9px 14px', borderBottom:'1px solid #f0f0f0', display:'flex', alignItems:'center', justifyContent:'space-between', cursor:'pointer' })
                                    .addClass('email-result-item')
                                    .attr('data-email', row.email);
                                var $left = $('<span>').css({ fontSize:'13px', fontWeight:'600', color:'#333' }).text(row.heading);
                                var $right = $('<span>').css({ display:'flex', alignItems:'center', gap:'8px' });
                                $right.append('<span style="background:'+badgeBg+';color:#fff;font-size:11px;padding:2px 8px;border-radius:5px;font-weight:700;">'+label+'-'+row.id+'</span>');
                                $item.append($left).append($right);
                                $box.append($item);
                            });
                            $box.show();
                        }
                    });
                }, 400);
            });

            $(document).on('click', '.email-result-item', function () {
                $('#email').val($(this).attr('data-email'));
                $('#email-search-results').hide().empty();
            });

            $(document).on('click', function (e) {
                if (!$(e.target).closest('#email, #email-search-results').length) {
                    $('#email-search-results').hide().empty();
                }
            });
        });
        </script>
    </body>
</html>
