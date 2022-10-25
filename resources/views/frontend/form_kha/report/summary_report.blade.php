@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">বাজেট ফরম ’ক’</h2>
                <h4 class="page-title text-center">[বিধি ৩ (২) দ্রষ্টব্য]</h4>
            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">অর্থ বছর: ২০২২-২০২৩</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <td colspan="5"> <strong>বাজেট সার-সংক্ষেপ</strong> </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">বিবরণ</th>
                                        <th>পূর্ববর্তী বৎসরের প্রকৃত (২০২০-২০২১)</th>
                                        <th>চলতি বৎসরের বাজেট বা চলতি বৎসরের সংশোধিত বাজেট (২০২১-২০২২)</th>
                                        <th>পরবর্তী বৎসরের বাজেট (২০২২-২০২৩)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- part one income -->
                                    <tr>
                                        <td rowspan="6">অংশ-১</td>
                                        <td style="background-color: #c0c0c0">রাজস্ব হিসাব প্রাপ্তি</td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                    </tr>
                                    <tr>
                                        <td>রাজস্ব</td>
                                        <td class="text-end"> 12568904</td>
                                        <td class="text-end"> 14925903</td>
                                        <td class="text-end">16890099</td>
                                    </tr>
                                    <tr>
                                        <td>অনদুান</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end">0</td>
                                    </tr>
                                    <tr>
                                        <td> <strong>মোট প্রাপ্তি</strong> </td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end">0</td>
                                    </tr>
                                    <tr>
                                        <td>বাদ রাজস্ব ব্যয়</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end">0</td>
                                    </tr>
                                    <tr>
                                        <td> <strong>রাজস্ব উদ্বৃত্ত/ঘাটতি (ক)</strong> </td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end">0</td>
                                    </tr>

                                    <!-- part two development -->
                                    <tr>
                                        <td rowspan="8">অংশ-২</td>
                                        <td style="background-color: #c0c0c0">উন্নয়ন অনদুান</td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                    </tr>
                                    <tr>
                                        <td>অন্যান্য অনুদান ও চাঁদা</td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                    </tr>
                                    <tr>
                                        <td>মোট (খ)</td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                    </tr>
                                    <tr>
                                        <td> <strong>মোট প্রাপ্ত সম্পদ (ক+খ)</strong> </td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                    </tr>
                                    <tr>
                                        <td>বাদ উন্নয়ন ব্যয়</td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                    </tr>
                                    <tr>
                                        <td>সার্বিক বাজেট উদ্বৃত্ত/ঘাটতি</td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>যোগ প্রারম্ভিক জের (১ জুলাই)</td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #c0c0c0">সমাপ্তি জের</td>
                                        <td style="background-color: #c0c0c0" class="text-right"></td>
                                        <td style="background-color: #c0c0c0" class="text-right"></td>
                                        <td style="background-color: #c0c0c0" class="text-right"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
