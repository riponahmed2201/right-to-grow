@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center en" style="display: none;">Budget Monitoring &amp; Expenditure Tracking (BMET)</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Annual Budget of Union Parishad</h3>
                            <h4 class="text-center"><u>UP Form-Ka</u></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br> <br>

        <div class="row">
            <div class="col-md-12">
                <form action="#" id="kaform" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Division:</label>
                                <select name="division_code" id="division" class="form-select">
                                    <option value="">----Select Division----</option>
                                    <option value="10">Barisal</option>
                                    <option value="40">Khulna</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">District:</label>
                                <select name="district_code" id="district" class="form-select">
                                    <option value="">----Select District----</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Upazila:</label>
                                <select name="upazila_code" id="upazila" class="form-select">
                                    <option value="">----Select Upazila----</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" >Union:</label>
                                <select name="union_code" id="union" class="form-select">
                                    <option value="">----Select Union----</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Financial Year:</label>
                                <select name="financial_year_id" id="financial_year_id" class="form-select">
                                    <option value="">----Select Financial Year----</option>
                                    <option value="1">2020-2021</option>
                                    <option value="2">2021-2022</option>
                                    <option value="2">2022-2023</option>
                                    <option value="2">2023-2023</option>
                                    <option value="2">2022-2023</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <div class="text-center en">Received</div>
                                </th>
                                <th>
                                    <div class="text-center en">Actual Budget of previous Year<br><span class="previous_year_en"></span></div>
                                    </div>
                                </th>
                                <th>
                                    <div class="text-center en" style="display: none;">Current Year/ Revised Budget<br><span class="current_year_en"></span></div>
                                    <div class="text-center bn">চলতি বছরের / সংশোধিত বাজেট <br><span class="current_year_bn"></span></div>
                                </th>
                                <th>
                                    <div class="text-center en" style="display: none;">Next Year’s Budget<br><span class="next_year_en"></span></div>
                                    <div class="text-center bn">পরবর্তী বছরের বাজেট <br><span class="next_year_bn"></span></div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">BF</label>
                                        <label class="qus bn">জের</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="1">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">1. Ka) Own source (Union Tax, Rate abd Fees)</label>
                                        <label class="qus bn">ক) নিজস্ব উৎস (ইউনিয়ন কর, রেইট ও ফিস )</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="2">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Kha) Arrears tax based on Annual value of house</label>
                                        <label class="qus bn">খ) বসত বাড়ির বাৎসরিক মূল্যের উপর বকেয়া কর</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="3">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">2. Taxes on business, occupation, and livelihood</label>
                                        <label class="qus bn">২। ব্যবসা পেশা ও জীবিকার উপর কর </label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="4">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">3. Amusement Tax</label>
                                        <label class="qus bn">৩। বিনোদন কর</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(ka) Taxes on cinema</label>
                                                <label class="qus bn">(ক)	সিনেমার উপর কর </label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="6">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Kha) Taxes on travel, drama and other amusement</label>
                                                <label class="qus bn">(খ)	যাত্রা, নাটক ও অন্যান্য বিনোদন অনুষ্ঠানের উপর কর </label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="7">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">4. License and permit fees issued by the council</label>
                                        <label class="qus bn">৪। পরিষদ কর্তৃক ইস্যুকৃত লাইসেন্স ও পারমিট ফিস </label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="8">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">5. Receipt for lease</label>
                                        <label class="qus bn">৫। ইজারা বাবদ প্রাপ্তিঃ </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(ka) Receipt for hat bazar</label>
                                                <label class="qus bn">(ক) হাটবাজার ইজারা বাবদ প্রাপ্তি </label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="10">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Kha) Receipt for lease of ferry ghat</label>
                                                <label class="qus bn">(খ) ফেরীঘাট ইজারা বাবদ প্রাপ্তি</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="11">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Ga) Receipt for lease of water bodies</label>
                                                <label class="qus bn">(গ) জলমহাল ইজারা বাবদ প্রাপ্তি</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="12">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">6. License fees on vehicles other than motor vehicles</label>
                                        <label class="qus bn">৬। মোটরযান ব্যতীত অন্যান্য যানবাহনের উপর লাইসেন্স ফিস</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="13">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">7. Others</label>
                                        <label class="qus bn">৭। অন্যান্য</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">ka) Cattle pound</label>
                                                <label class="qus bn">ক) খোয়াড়</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="15">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Kha) Birth & Death Certificate</label>
                                                <label class="qus bn">খ) জন্ম-মৃত্যু সার্টিফিকেট</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="16">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Ga) Village court fee</label>
                                                <label class="qus bn">গ) গ্রাম আদালত ফি</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="17">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Gha) Grant of NGO or non-govt. Development organizations</label>
                                                <label class="qus bn">ঘ) এনজিও বা বেসরকারি উন্নয়ন সংস্থার অনুদান</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="18">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Umo) Public participation or supportive contributions</label>
                                                <label class="qus bn">ঙ) জনগণের অংশীদারিত্ব বা সহায়ক চাঁদা</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="19">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Cha) Selling street trees</label>
                                                <label class="qus bn">চ) রাস্তার গাছ বিক্রি</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="20">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Kha) Grants from government sources</label>
                                        <label class="qus bn">খ) সরকারি সূত্রে অনুদান</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="21">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                        <label class="qus">1. Development sector</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Ka) Agriculture</label>
                                                <label class="qus bn">(ক) কৃষি</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="23">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Kha) Health & Sewarage</label>
                                                <label class="qus bn">(খ) স্বাস্থ্য ও পয়ঃপ্রণালী </label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="24">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Ga) Road Construction/Maintenance</label>
                                                <label class="qus bn">(গ) রাস্তা নির্মাণ/মেরামত </label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="25">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Gha) House constrution/Repair</label>
                                                <label class="qus bn">(ঘ) গৃহ নির্মাণ/মেরামত </label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="26">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">Umo) Other bulk / extended bulk allocation</label>
                                                <label class="qus bn">(ঙ) অন্যান্য থোক/বর্ধিত থোক বরাদ্দ :</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="27">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li>
                                                    <div class="form-group">
                                                        <label class="qus en" style="display: none;">- Skills and Activity Award</label>
                                                        <label class="qus bn">- দক্ষতা ও কর্মতৎপরতা পুরস্কার</label>
                                                        <input type="hidden" name="ka_receive_name_id[]" value="28">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">2. Establishment</label>
                                        <label class="qus bn">২। সংস্থাপন</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(ka) Allowances for Chairman and members</label>
                                                <label class="qus bn">(ক) চেয়ারম্যান ও সদস্যবৃন্দের ভাতা</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="30">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Kha) Salary and allowances of secretaries and other employees</label>
                                                <label class="qus bn">(খ) সেক্রেটারি ও অন্যান্য কর্মচারীদের বেতন ও  ভাতা</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="31">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">3. Others</label>
                                        <label class="qus bn">৩। অন্যান্য</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="32">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(ka) Land transfer tax</label>
                                                <label class="qus bn">(ক) ভূমি হস্তান্তর কর</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="33">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Kha) LGSP-2</label>
                                                <label class="qus bn">(খ) এলজিএসপি-২</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="34">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Ga) LIC</label>
                                                <label class="qus bn">(গ) এলআইসি</label>
                                                <input type="hidden" name="ka_receive_name_id[]" value="35">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Ga) According to local government sources</label>
                                        <label class="qus bn">গ) স্থানীয় সরকার সূত্রে</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="36">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">1. Money given by Upazila Parishad</label>
                                        <label class="qus bn">(১) উপজেলা পরিষদ কর্তৃক প্রদত্ত টাকা</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="37">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">2. Money given by Zila Parishad</label>
                                        <label class="qus bn">(২) জেলা পরিষদ কর্তৃক প্রদত্ত টাকা</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="38">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">3. Others</label>
                                        <label class="qus bn">(৩) অন্যান্য</label>
                                        <input type="hidden" name="ka_receive_name_id[]" value="39">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group text-right">
                                        <label class="qus en" style="display: none;">Grand Total = </label>
                                        <label class="qus bn">সর্বমোট = </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <div class="text-center en" style="display: none;">Expenditure</div>
                                    <div class="text-center bn">ব্যয়</div>
                                </th>
                                <th>
                                    <div class="text-center en" style="display: none;">Actual Budget of previous Year<br><span class="previous_year_en"></span></div>
                                    <div class="text-center bn">পূর্ববর্তী বছরের প্রকৃত <br><span class="previous_year_bn"></span>
                                    </div>
                                </th>
                                <th>
                                    <div class="text-center en" style="display: none;">Current Year/ Revised Budget<br><span class="current_year_en"></span></div>
                                    <div class="text-center bn">চলতি বছরের / সংশোধিত বাজেট <br><span class="current_year_bn"></span></div>
                                </th>
                                <th>
                                    <div class="text-center en" style="display: none;">Next Year’s Budget<br><span class="next_year_en"></span></div>
                                    <div class="text-center bn">পরবর্তী বছরের বাজেট <br><span class="next_year_bn"></span></div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Revenue</label>
                                        <label class="qus bn">রাজস্ব</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="1">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Establishment cost</label>
                                        <label class="qus bn">সংস্থাপন ব্যয়</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="2">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(ka) Allowances for Chairman and members</label>
                                        <label class="qus bn">(ক) চেয়ারম্যান ও সদস্যদের সম্মানী</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="3">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Kha) Salary and allowances of secretaries and other employees</label>
                                        <label class="qus bn">(খ) কর্মকর্তা/কর্মচারীদের বেতন ও ভাতা</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="4">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Ga) Establishment cost for collection of Tax</label>
                                        <label class="qus bn">(গ) ট্যাক্স আদায় সংস্থাপন ব্যয়</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Gha) Miscelleneous)</label>
                                        <label class="qus bn">(ঘ) আনুসঙ্গিক</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="6">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(1) Stationaries</label>
                                                <label class="qus bn">(১) স্টেশনারি</label>
                                                <input type="hidden" name="ka_expenditure_name_id[]" value="7">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(2) Miscellaneous</label>
                                                <label class="qus bn">(২) বিবিধ</label>
                                                <input type="hidden" name="ka_expenditure_name_id[]" value="8">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Kha) Development</label>
                                        <label class="qus bn">খ) উন্নয়ন</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="9">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Construction work</label>
                                        <label class="qus bn">পূর্ত কাজ</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="10">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Ka) Agriculture projrct</label>
                                        <label class="qus bn">(ক) কৃষি প্রকল্প</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="11">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Kha) Health and Sewarage System (Arsenic test of drinking water)</label>
                                        <label class="qus bn">(খ) স্বাস্থ্য ও পয়ঃপ্রণালী ব্যবস্থা (পানীয় জলের আর্সেনিক পরিক্ষা)</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="12">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Ga) Road construction/repair)</label>
                                        <label class="qus bn">(গ) রাস্তা নির্মাণ/মেরামত</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="13">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Gha) Housing/ repair</label>
                                        <label class="qus bn">(ঘ) গৃহ নির্মাণ/মেরামত</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="14">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Umo) Education (award for best students)</label>
                                        <label class="qus bn">(ঙ) শিক্ষা (কৃতি শিক্ষার্থীদের পুরস্কার)</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="15">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">(Cha) Others</label>
                                        <label class="qus bn">(চ) অন্যান্য</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="qus en" style="display: none;">Ga) Others</label>
                                        <label class="qus bn">গ) অন্যান্য</label>
                                        <input type="hidden" name="ka_expenditure_name_id[]" value="17">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Ka) Audit expense</label>
                                                <label class="qus bn">(ক) নিরীক্ষা ব্যয়</label>
                                                <input type="hidden" name="ka_expenditure_name_id[]" value="18">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <div class="form-group">
                                                <label class="qus en" style="display: none;">(Kha) Others</label>
                                                <label class="qus bn">(খ) অন্যান্য</label>
                                                <input type="hidden" name="ka_expenditure_name_id[]" value="18">
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_previous_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_current_budget[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="ex_next_budget[]" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group text-right">
                                        <label class="qus en" style="display: none;">Grand Total = </label>
                                        <label class="qus bn">সর্বমোট = </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="mb-3">
                                <label for="submited_by" class="form-label qus en" style="display: none;">Name of the person
                                    filled-up this
                                    form:</label>
                                <label for="submited_by" class="form-label qus bn">এই ফর্মটি পূরণকারী ব্যক্তির নাম:</label>
                                <input type="text" name="submited_by" class="form-control" id="submited_by" placeholder="Name of the person filled-up this form">
                            </div>
                            <div class="mb-3">
                                <label for="designation" class="form-label qus en" style="display: none;">Designation:</label>
                                <label for="submited_by" class="form-label qus bn">পদবী</label>
                                <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label qus en" style="display: none;">Mobile Number:</label>
                                <label for="submited_by" class="form-label qus bn">মোবাইল নম্বর</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile Number">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label qus en" style="display: none;">E-mail address:</label>
                                <label for="submited_by" class="form-label qus bn">ইমেইল</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="E-mail-address">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label qus en" style="display: none;">Photo Upload</label>
                                <label for="img" class="form-label qus bn">ছবি আপলোড করুন</label>
                                <input type="file" name="img" id="img" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="submit" class="btn btn-primary">Save as draft</button>
                    </div>

                </form>	</div>
        </div>
@endsection
