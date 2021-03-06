{!! Form::open(['route' => ['sp_Pharmocokinetic.store',$study->study_id]]) !!}
@csrf
{{-- Pharmacokinetic Blood Sampling --}}
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasAnyRoles(['Admin','superAdmin']))
            <div class="row">
                <div class="col-md-2">
                    <h4>{!! Form::label('SubjectName', 'Subject: ') !!}</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('Admin view of name', 'Subject: ') !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('patient_id',$newName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <h4> {!! Form::label('studyPeriod', 'Study Period: ') !!}</h4>
            </div>
            <div class="col-md-3">
                <h4>{!! Form::select('studyPeriod',$studyPeriod,null,['class'=>'form-control']) !!}</h4>
            </div>
        </div>
    </div>
</div>
<h3>Pharmacokinetic Blood Sampling</h3>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::date('Day1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class="col-md-1">
        <p class="text-center">to</p>
    </div>
    <div class="col-md-2">
        {!! Form::date('Day3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>
<hr>
<div class="row col">
    <p><strong>Tube Type and Volume Required:</strong> Heparin, 3mL</p>
</div>
<div class="row col">
    <p><strong>Processing and Storage Instructions:</strong> Centrifuge at 4˚C for 10 minutes at 3000 rpm within 45
        minutes, store below
        -20˚C.</p>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
        </th>
        <th scope="col">
            <p>Last Food Intake</p>
        </th>
        <th scope="col">
            <p>Last Water Intake</p>
        </th>
        <th scope="col">
            <p>Study Drug Dosing</p>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Date</th>
        <td>
            {!! Form::date('LastFoodDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::date('LastWaterDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::date('StudyDrugDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row">
            <p>Time</p>
            <p>(24-hour clock)</p>
        </th>
        <td>
            {!! Form::time('LastFoodTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('LastWaterTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('StudyDrugTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
    </tr>
    </tbody>
</table>
<br>
<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" class="text-center">
            <p>Date</p>
            <p>(yyyy/mm/dd)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Sample Code</p>
        </th>
        <th scope="col" class="text-center">
            <p>Time Post Dose</p>
            <p>(hour)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Scheduled Sampling Time</p>
            <p>(24-hour clock)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Actual Sampling Time</p>
            <p>(24-hour clock)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Collected by</p>
        </th>
        <th scope="col" class="text-center">
            <p>Checked by</p>
        </th>
        <th scope="col" class="text-center">
            <p>Comments</p>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_PD', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">PD</td>
        <td class="text-center">______</td>
        <td class="text-center">______</td>
        <td>
            {!! Form::time('pk_PD_AST', old('pk_PD_AST'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_PD_Collected', old('pk_PD_Collected'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_PD_Checked',old('pk_PD_Checked'),['class'=>'form-control']) !!}
        </td>
        <td class="col-md-3">
            {!! Form::text('pk_PD_Comments', old('pk_PD_Comments'),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">S1</td>
        <td class="text-center">0.50</td>
        <td>
            {!! Form::time('pk_S1_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S1_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S1_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S1_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S1_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>S2</p>
        </td>
        <td class="text-center">
            <p>1</p>
        </td>
        <td>
            {!! Form::time('pk_S2_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S2_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S2_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S2_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S2_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S3
        </td>
        <td class="text-center">
            1.5
        </td>
        <td>
            {!! Form::time('pk_S3_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S3_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S3_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S3_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S3_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S4', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S4
        </td>
        <td class="text-center">
            2
        </td>
        <td>
            {!! Form::time('pk_S4_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S4_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S4_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S4_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S4_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S5', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S5
        </td>
        <td class="text-center">
            2.5
        </td>
        <td>
            {!! Form::time('pk_S5_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S5_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S5_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S5_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S5_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class="col-sm-2">
            {!! Form::date('pk_Date_Day_S6', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S6
        </td>
        <td class="text-center">
            3
        </td>
        <td>
            {!! Form::time('pk_S6_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S6_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S6_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S6_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S6_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S7', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S7
        </td>
        <td class="text-center">
            3.5
        </td>
        <td>
            {!! Form::time('pk_S7_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S7_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S7_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S7_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S7_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S8', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S8
        </td>
        <td class="text-center">
            4
        </td>
        <td>
            {!! Form::time('pk_S8_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S8_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S8_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S8_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S8_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S9', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S9
        </td>
        <td class="text-center">
            4.5
        </td>
        <td>
            {!! Form::time('pk_S9_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S9_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S9_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S9_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S9_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S10', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S10
        </td>
        <td class="text-center">
            5
        </td>
        <td>
            {!! Form::time('pk_S10_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S10_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S10_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S10_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S10_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S11', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S11
        </td>
        <td class="text-center">
            6
        </td>
        <td>
            {!! Form::time('pk_S11_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S11_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S11_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S11_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S11_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S12', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>S12</p>
        </td>
        <td class="text-center">
            <p>7</p>
        </td>
        <td>
            {!! Form::time('pk_S12_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S12_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S12_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S12_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S12_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S13', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S13
        </td>
        <td class="text-center">
            8
        </td>
        <td>
            {!! Form::time('pk_S13_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S13_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S13_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S13_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S13_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S14', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S14
        </td>
        <td class="text-center">
            10
        </td>
        <td>
            {!! Form::time('pk_S14_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S14_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S14_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S14_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S14_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S15', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S15
        </td>
        <td class="text-center">
            12
        </td>
        <td>
            {!! Form::time('pk_S15_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S15_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S15_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S15_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S15_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S16', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S16
        </td>
        <td class="text-center">
            14
        </td>
        <td>
            {!! Form::time('pk_S16_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S16_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S16_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S16_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S16_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S17', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S17
        </td>
        <td class="text-center">
            16
        </td>
        <td>
            {!! Form::time('pk_S17_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S17_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S17_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S17_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S17_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S18', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S18
        </td>
        <td class="text-center">
            18
        </td>
        <td>
            {!! Form::time('pk_S18_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S18_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S18_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S18_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S18_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S19', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S19
        </td>
        <td class="text-center">
            24
        </td>
        <td>
            {!! Form::time('pk_S19_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S19_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S19_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S19_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S19_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S20', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">S20</td>
        <td class="text-center">36</td>
        <td>
            {!! Form::time('pk_S20_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S20_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S20_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S20_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S20_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S21', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">S21</td>
        <td class="text-center">48</td>
        <td>
            {!! Form::time('pk_S21_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S21_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S21_Collected', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S21_Checked', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S21_Comments', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3">
        <p>NS = Not statistically significant</p>
    </div>
    <div class="col-md-3">
        <p>NA = Not available (state reason)</p>
    </div>
</div>
<div class="row col">
    <p>Reasons for significant time deviation and / or sample not available:</p>
</div>
<div class="row col">
    <ul>
        <li>1- Problematic blood sampling</li>
        <li>2- No blood collected due to no venous access</li>
        <li>3- Early/late sampling</li>
        <li>4- Sample tube breakage</li>
        <li>5- Re-cannulation</li>
        <li>6- Other (specify)</li>
    </ul>
</div>

{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
