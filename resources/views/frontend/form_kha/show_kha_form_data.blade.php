@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">Budget Monitoring &amp; Expenditure Tracking (BMET)</h2>
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
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <form action="#" id="myform" class=""
                              enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <tr>
                                <td>Financial Year</td>
                                <td>2021-2022</td>
                            </tr>
                            <tr>
                                <td>division</td>
                                <td>Khulna</td>
                            </tr>
                            <tr>
                                <td>district</td>
                                <td>Satkhira</td>
                            </tr>
                            <tr>
                                <td>upazila</td>
                                <td>Debhata</td>
                            </tr>
                            <tr>
                                <td>union</td>
                                <td>Sakhipur</td>
                            </tr>
                            <tr>
                                <td>Submited By</td>
                                <td>MD GOLAM RABBANI</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>UP SECRETARY</td>
                            </tr>
                            <tr>
                                <td>phone</td>
                                <td>01714633307</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>
                                    <img src="../assets/images/person/20220606_141552.jpg" width="100" height="100"
                                         alt="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td width="40%">Received</td>
                                            <td width="20%">Actual Budget of previous Year</td>
                                            <td width="20%">Current Year/ Revised Budget</td>
                                            <td width="20%">Next Year’s Budget</td>
                                        </tr>
                                        <tr>
                                            <td>BF</td>
                                            <td>1567162.00</td>
                                            <td>45002.00</td>
                                            <td>49502.00</td>
                                        </tr>
                                        <tr>
                                            <td>1. Ka) Own source (Union Tax, Rate abd Fees)</td>
                                            <td>379770.00</td>
                                            <td>600000.00</td>
                                            <td>600000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Kha) Arrears tax based on Annual value of house</td>
                                            <td>0.00</td>
                                            <td>145000.00</td>
                                            <td>100000.00</td>
                                        </tr>
                                        <tr>
                                            <td>2. Taxes on business, occupation, and livelihood</td>
                                            <td>169400.00</td>
                                            <td>200000.00</td>
                                            <td>200000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(ka) Taxes on cinema</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Kha) Taxes on travel, drama and other amusement</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>4. License and permit fees issued by the council</td>
                                            <td>66600.00</td>
                                            <td>100000.00</td>
                                            <td>100000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(ka) Receipt for hat bazar</td>
                                            <td>0.00</td>
                                            <td>50000.00</td>
                                            <td>60000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Kha) Receipt for lease of ferry ghat</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ga) Receipt for lease of water bodies</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>6. License fees on vehicles other than motor vehicles</td>
                                            <td>0.00</td>
                                            <td>15000.00</td>
                                            <td>15000.00</td>
                                        </tr>
                                        <tr>
                                            <td>ka) Cattle pound</td>
                                            <td>500.00</td>
                                            <td>5000.00</td>
                                            <td>5000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Kha) Birth & Death Certificate</td>
                                            <td>57080.00</td>
                                            <td>60000.00</td>
                                            <td>70000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Ga) Village court fee</td>
                                            <td>3000.00</td>
                                            <td>5000.00</td>
                                            <td>5000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Gha) Grant of NGO or non-govt. Development organizations</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Umo) Public participation or supportive contributions</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Cha) Selling street trees</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Kha) Grants from government sources</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Ka) Agriculture</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Kha) Health & Sewarage</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ga) Road Construction/Maintenance</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Gha) House constrution/Repair</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Umo) Other bulk / extended bulk allocation</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>- Skills and Activity Award</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(ka) Allowances for Chairman and members</td>
                                            <td>429300.00</td>
                                            <td>572400.00</td>
                                            <td>572400.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Kha) Salary and allowances of secretaries and other employees</td>
                                            <td>1515492.00</td>
                                            <td>1339560.00</td>
                                            <td>1566520.00</td>
                                        </tr>
                                        <tr>
                                            <td>3. Others</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(ka) Land transfer tax</td>
                                            <td>370000.00</td>
                                            <td>300000.00</td>
                                            <td>300000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Kha) LGSP-2</td>
                                            <td>2138588.00</td>
                                            <td>2200000.00</td>
                                            <td>1000000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ga) LIC</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Ga) According to local government sources</td>
                                            <td>0.00</td>
                                            <td>6698000.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>1. Money given by Upazila Parishad</td>
                                            <td>8615628.00</td>
                                            <td>0.00</td>
                                            <td>4000000.00</td>
                                        </tr>
                                        <tr>
                                            <td>2. Money given by Zila Parishad</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>3. Others</td>
                                            <td>10349645.00</td>
                                            <td>11110000.00</td>
                                            <td>8505000.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td width="40%">Expenditure</td>
                                            <td width="20%">Actual Budget of previous Year</td>
                                            <td width="20%">Current Year/ Revised Budget</td>
                                            <td width="20%">Next Year’s Budget</td>
                                        </tr>
                                        <tr>
                                            <td>Revenue</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Establishment cost</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(ka) Allowances for Chairman and members</td>
                                            <td>737300.00</td>
                                            <td>1372000.00</td>
                                            <td>1272000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Kha) Salary and allowances of secretaries and other employees</td>
                                            <td>1515492.00</td>
                                            <td>1339560.00</td>
                                            <td>1566520.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Gha) Miscelleneous)</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(1) Stationaries</td>
                                            <td>58589.00</td>
                                            <td>111500.00</td>
                                            <td>105000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(2) Miscellaneous</td>
                                            <td>11000.00</td>
                                            <td>12000.00</td>
                                            <td>12000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Kha) Development</td>
                                            <td>36680.00</td>
                                            <td>30000.00</td>
                                            <td>30000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Construction work</td>
                                            <td>240088.00</td>
                                            <td>290400.00</td>
                                            <td>373400.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ka) Agriculture projrct</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Kha) Health and Sewarage System (Arsenic test of drinking water)</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ga) Road construction/repair)</td>
                                            <td>1149690.00</td>
                                            <td>1200000.00</td>
                                            <td>900000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Gha) Housing/ repair</td>
                                            <td>767387.00</td>
                                            <td>850000.00</td>
                                            <td>800000.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Umo) Education (award for best students)</td>
                                            <td>8031379.00</td>
                                            <td>4940000.00</td>
                                            <td>1885000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Ga) Others</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ka) Audit expense</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>(Ka) Audit expense</td>
                                            <td>307413.00</td>
                                            <td>550000.00</td>
                                            <td>340000.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="text-center">

                                    </div>
                                </td>
                            </tr>

                        </form>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
