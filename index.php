<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
  <?php include "./components/navbar.php"; ?>
  <div class="container text-center">
    <h1 class="fs-1">Survey Name</h1>
    <p>Subtitle for the Survey Name</p>
  </div>
  <div class="container">
    <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
          Step 1 <br />
          Personal Info
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
          Step 2 <br />
          Questions w/answers
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
          Step 3 <br />
          Questions w/ratings
        </button>
      </li>
    </ul>
    <form action="./added.php" method="post">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade py-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <div class="row">
            <div class="col-12 col-md-3">
              <label class="form-label">Sex:</label>
              <div class="mb-3 d-flex gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sex" value="male" id="form-male" required>
                  <label class="form-check-label" for="form-male">
                    Male
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sex" value="female" id="form-female" required>
                  <label class="form-check-label" for="form-female">
                    Female
                  </label>
                </div>
              </div>
            </div>
            <div class="mb-3 col-12 col-md-3">
              <label for="form-age" class="form-label">Age:</label>
              <input type="number" name="age" class="form-control" id="form-age" aria-describedby="ageHelp" required>
            </div>
            <div class="mb-3 col-12 col-md-6">
              <label for="form-phone" class="form-label">Phone:</label>
              <input type="tel" name="phone" class="form-control" id="form-phone" aria-describedby="phoneHelp" required>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 mb-3 col-12 col-md-6">
              <label for="form-name" class="form-label">Name:</label>
              <input type="text" name="name" class="form-control" id="form-name" aria-describedby="nameHelp" placeholder="Firstname Lastname">
            </div>
            <div class="mb-3 mb-3 col-12 col-md-6">
              <label for="form-email" class="form-label">Email:</label>
              <input type="email" name="email" class="form-control" id="form-email" aria-describedby="emailHelp" placeholder="username@domain.com">
            </div>
          </div>
          <div class="row">
            <div class="mb-3 mb-3 col-12 col-md-9">
              <label for="form-address" class="form-label">Address:</label>
              <input type="text" name="address" class="form-control" id="form-address" aria-describedby="addressHelp" placeholder="123 Street Name">
            </div>
            <div class="mb-3 mb-3 col-12 col-md-3">
              <label for="form-floor" class="form-label">Apartment or floor:</label>
              <input type="text" name="floor" class="form-control" id="form-floor" aria-describedby="emailHelp" placeholder="B3, 4th Floor, or similar">
            </div>
          </div>
          <div class="row">
            <div class="mb-3 mb-3 col-12 col-md-6">
              <label for="form-city" class="form-label">City:</label>
              <input type="text" name="city" class="form-control" id="form-city" aria-describedby="cityHelp" placeholder="City">
            </div>
            <div class="mb-3 mb-3 col-12 col-md-3">
              <label for="form-zip" class="form-label">Zip:</label>
              <input type="text" name="floor" class="form-control" id="form-zip" aria-describedby="Help" placeholder="123">
            </div>
            <div class="mb-3 mb-3 col-12 col-md-3">
              <label for="form-country" class="form-label">Country:</label>
              <select class="form-select" id="form-country" aria-label="- Select Country -" name="country">
                <option>- Select Country -</option>
                <option value="AF">Afghanistan</option>
                <option value="AX">Aland Islands</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                <option value="BA">Bosnia and Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos (Keeling) Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, Democratic Republic of the Congo</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Cote D'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CW">Curacao</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands (Malvinas)</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernsey</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard Island and Mcdonald Islands</option>
                <option value="VA">Holy See (Vatican City State)</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran, Islamic Republic of</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JE">Jersey</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KP">Korea, Democratic People's Republic of</option>
                <option value="KR">Korea, Republic of</option>
                <option value="XK">Kosovo</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Lao People's Democratic Republic</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libyan Arab Jamahiriya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia, Federated States of</option>
                <option value="MD">Moldova, Republic of</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PS">Palestinian Territory, Occupied</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">Reunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russian Federation</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint Barthelemy</option>
                <option value="SH">Saint Helena</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="MF">Saint Martin</option>
                <option value="PM">Saint Pierre and Miquelon</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome and Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="CS">Serbia and Montenegro</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SX">Sint Maarten</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="SS">South Sudan</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syrian Arab Republic</option>
                <option value="TW">Taiwan, Province of China</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania, United Republic of</option>
                <option value="TH">Thailand</option>
                <option value="TL">Timor-Leste</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TC">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UM">United States Minor Outlying Islands</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Viet Nam</option>
                <option value="VG">Virgin Islands, British</option>
                <option value="VI">Virgin Islands, U.s.</option>
                <option value="WF">Wallis and Futuna</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
              </select>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-secondary"> Step 2 </button>
          </div>
        </div>
        <div class="tab-pane fade py-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">


          <?php foreach (range(1, 4) as $question_k => $question) : ?>
            <h2 class="fw-blod fs-5 text-center">Question #<?=$question?>: Lorem ipsum dolor sit amet consectetur adipisicing elit?</h2>

            <div class="row">
              <div class="mb-3 col-12 col-md-6">
                <figure class="figure">
                  <img src="./img/1600x900.png" class="figure-img img-fluid rounded" alt="...">
                  <figcaption class="figure-caption">A caption for the figure image.</figcaption>
                </figure>
              </div>
              <div class="mb-3 col-12 col-md-6">
                <?php foreach (array_fill(0, 5, $question) as $key => $cell) : ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q<?=$question?>" value="<?=$key+1?>" id="q<?=$question?>r<?=$key+1?>" required>
                  <label class="form-check-label" for="q<?=$question?>r<?=$key+1?>">Answer for radio <?=$key+1?></label>
                </div>
                <?php endforeach ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="q<?=$question?>" value="6" id="q<?=$question?>r6" required>
                  <label class="form-check-label" for="q<?=$question?>r6">
                    <input type="text" class="form-control" name="q<?=$question?>r6">
                    <div class="form-text">If none of the answers above is appropriate for you please own answer in the input field.</div>
                  </label>
                </div>
              </div>
            </div>
            <?php if ($question !== 4) : ?>
              <hr>
            <?php endif; ?>

          <?php endforeach ?>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-secondary"> Step 3 </button>
          </div>
        </div>
        <div class="tab-pane fade py-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

          <?php foreach ([5, 6] as $question_k => $question) : ?>
            <div class="row">
              <div class="mb-3 col-12 col-md-6">
                <h2 class="fw-blod fs-5">Question #<?= $question ?>: Lorem ipsum dolor sit amet consectetur adipisicing elit?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vestibulum malesauda semper velit, id condimentum dui aliquet non.</p>
              </div>
              <div class="mb-3 col-12 col-md-6">
                <div class="mb-3 d-flex justify-content-between">
                  <?php foreach (array_fill(0, 5, $question) as $key => $cell) : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q<?= $question ?>" value="1" id="q<?= $question ?>r<?= $key + 1 ?>" required>
                      <label class="form-check-label" for="q<?= $question ?>r<?= $key + 1 ?>"><?= $key + 1 ?></label>
                    </div>
                  <?php endforeach ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="q<?= $question ?>" value="6" id="q<?= $question ?>r6" required>
                    <label class="form-check-label" for="q<?= $question ?>r6">n/a
                  </div>
                  </label>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" name="q<?= $question ?>-textarea" placeholder="Write a comment here..." id="q<?= $question ?>-textarea" style="height: 100px"></textarea>
                  <label for="q<?= $question ?>-textarea">Write a comment here...</label>
                </div>
              </div>
            </div>
            <hr>
          <?php endforeach ?>

          <?php foreach ([7, 8] as $question_k => $question) : ?>
            <div class="row">
              <div class="mb-3 col-12 col-md-6">
                <h2 class="fw-blod fs-5">Question #<?= $question ?>: Lorem ipsum dolor sit amet consectetur adipisicing elit?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vestibulum malesauda semper velit, id condimentum dui aliquet non.</p>
              </div>
              <div class="mb-3 col-12 col-md-6">
                <div class="btn-group d-flex mb-3">
                  <?php foreach (array_fill(0, 5, $question) as $key => $cell) : ?>
                    <input type="radio" class="btn-check" name="q<?= $question ?>" id="q<?= $question ?>r<?= $key + 1 ?>" autocomplete="off" />
                    <label class="btn btn-outline-secondary" for="q<?= $question ?>r<?= $key + 1 ?>"><?= $key + 1 ?></label>
                  <?php endforeach ?>

                  <input type="radio" class="btn-check" name="q<?= $question ?>" id="q<?= $question ?>r6" autocomplete="off" />
                  <label class="btn btn-outline-secondary" for="q<?= $question ?>r6">n/a</label>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" name="q<?= $question ?>-textarea" placeholder="Write a comment here..." id="q<?= $question ?>-textarea" style="height: 100px"></textarea>
                  <label for="q<?= $question ?>-textarea">Write a comment here...</label>
                </div>
              </div>
            </div>
            <hr>
          <?php endforeach ?>

          <?php foreach ([9, 10] as $question_k => $question) : ?>
            <div class="row">
              <div class="mb-3 col-12 col-md-6">
                <h2 class="fw-blod fs-5">Question #<?= $question ?>: Lorem ipsum dolor sit amet consectetur adipisicing elit?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vestibulum malesauda semper velit, id condimentum dui aliquet non.</p>
              </div>
              <div class="mb-3 col-12 col-md-6">
                <div class="mb-3 d-flex gap-3">
                  <label for="q<?= $question ?>r1" class="form-label">1</label>
                  <input type="range" class="form-range" min="1" max="5" step="1" id="q<?= $question ?>r1">
                  <label for="q<?= $question ?>r1" class="form-label">5</label>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" name="q<?= $question ?>-textarea" placeholder="Write a comment here..." id="q<?= $question ?>-textarea" style="height: 100px"></textarea>
                  <label for="q<?= $question ?>-textarea">Write a comment here...</label>
                </div>
              </div>
            </div>

            <?php if ($question !== 10) : ?>

              <hr>
            <?php endif; ?>

          <?php endforeach ?>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-secondary"> Submit </button>
          </div>
        </div>
      </div>
    </form>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>