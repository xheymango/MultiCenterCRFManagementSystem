{!! Form::open(['route' => ['sp1_AQuestionnaire.store',$study->study_id]]) !!}
<div class="form-group row">
    <div id="Admission" class="tab-pane fade in active">
        <div class="col">
            @if(Auth::check() && Auth::user()->hasRole('Admin'))
                <div>
                    {!! Form::label('SubjectName', 'Subject') !!}
                    {!! Form::select('patient_id',$oriPatientName,null) !!}
                </div>
            @else
                <div>
                    {!! Form::label('Admin view of name', 'Subject') !!}
                    {!! Form::select('patient_id',$newName,null) !!}
                </div>
            @endif
        </div>
    </div>
</div>
<h3>Admission Questionnaire</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('AQuestionnaireDateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('AQuestionnaireDateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('AQuestionnaireTimeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('AQuestionnaireTimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-6">
    </div>
    <div class="col-md-1">
        <p class="font-weight-bold">Yes</p>
    </div>
    <div class="col-md-1">
        <p class="font-weight-bold">No</p>
    </div>
</div>
<hr>

{{-- Admission Question 1 --}}
<div class="row">
    <div class="col-md-6">
        <p>1. Has the subject had any medical problems within the last 7 days before dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('MedicalProblem', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('MedicalProblem', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next question.</p>
        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the medical problem significantly increase the subject’s risk if enrolled in the study?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0101', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0101', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the medical problem potentially influence the pharmacokinetic profile of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0102', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0102', 'No') !!}</p>
    </div>
</div>
<hr>

{{-- Admission Question 2 --}}
<div class="row">
    <div class="col-sm-6">
        <p>2. Has the subject taken any medication (including herbal remedies, with the exception of birth control
            medications) within 7 days before dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Medication', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Medication', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next question.</p>
        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the use of medication significantly increase the subject’s risk if enrolled in the study?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0201', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0201', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the use of medication potentially influence the pharmacokinetic profile of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0202', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0202', 'No') !!}</p>
    </div>
</div>
<hr>

{{-- Admission Question 3 --}}
<div class="row">
    <div class="col-sm-6">
        <p>3. Has the subject been hospitalized within 4 weeks before dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Hospitalized', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Hospitalized', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next question.</p>
        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the hospitalization significantly increase the subject’s risk if enrolled in the study?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0301', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0301', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the hospitalization potentially influence the pharmacokinetic profile of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0302', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0302', 'No') !!}</p>
    </div>
</div>
<hr>

{{-- Admission Question 4 --}}
<div class="row">
    <div class="col-md-6">
        <p>4. Has the subject consumed any alcohol or xanthine-containing food or beverage within 24 hours before
            dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('AlcoholXanthine', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('AlcoholXanthine', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “No”, proceed to next question.</p>
        <p>If “Yes”, specify amount and time taken: </p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('AlcoholXanthine_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the use of alcohol or xanthine potentially influence the pharmacokinetic profile of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0401', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0401', 'No') !!}</p>
    </div>
</div>
<hr>


{{-- Admission Question 5 --}}
<div class="row">
    <div class="col-sm-6">
        <p>5. Has the subject consumed any food or beverage containing poppy seeds within 48 hours before drugs of abuse
            test? </p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('PoppySeeds', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('PoppySeeds', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>If “No”, proceed to next question.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>If “Yes”, specify amount and time taken</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('PoppySeeds_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the use of poppy seeds potentially influence the pharmacokinetic profile of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0501', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0501', 'No') !!}</p>
    </div>
</div>
<hr>


{{-- Admission Question 6 --}}
<div class="row">
    <div class="col-sm-6">
        <p>6. Has the subject consumed any food or beverage containing grapefruit (including marmalade) and pomelo
            within 7 days before dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('GrapefruitPomelo', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('GrapefruitPomelo', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next question.</p>
        <p>If “Yes”, specify amount and time taken</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('GrapefruitPomelo_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the use of grapefruit (including marmalade) or pomelo potentially influence the pharmacokinetic profile
            of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0601', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0601', 'No') !!}</p>
    </div>
</div>
<hr>


{{-- Admission Question 7 --}}
<div class="row">
    <div class="col-sm-6">
        <p>7. Has the subject participated in other experimental drug studies within 4 weeks before dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('OtherDrugStudies', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('OtherDrugStudies', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next question.</p>
        <p>If “Yes”, provide details</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('OtherDrugStudies_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the participation significantly increase the subject’s risk if enrolled in the study</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0701', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0701', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the participation potentially influence the pharmacokinetic profile of the study drug?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0702', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0702', 'No') !!}</p>
    </div>
</div>
<hr>


{{-- Admission Question 8 --}}
<div class="row">
    <div class="col-sm-6">
        <p>8. Has the subject participated in donation of (excluding the volume of whole blood that will be drawn during
            the screening procedures of this study):</p>
        <ul>
            <li>Plasma (500 mL) within the last 14 days, or</li>
            <li>50 mL to 300 mL of whole blood within the last 28 days, or</li>
            <li>301 mL to 500 mL of whole blood within the last 42 days, or</li>
            <li>more than 500 mL of whole blood within 84 days before dosing?</li>
        </ul>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('BloodDono', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('BloodDono', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next section.</p>
        <p>If “Yes”, provide details</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('BloodDono_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the donation potentially increase the subject’s risk if enrolled in the study?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0801', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0801', 'No') !!}</p>
    </div>
</div>
<hr>


{{-- Admission Question 9 --}}
<div class="row">
    <div class="col-sm-6">
        <p>9. Has the subject use of non-acceptable methods of contraception within 14 days before dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Contraception', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Contraception', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “No”, proceed to next section.</p>
        <p>If “Yes”, provide details</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Contraception_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Can the use of this method potentially increase the subject’s risk if enrolled in the study?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0901', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Admission0901', 'No') !!}</p>
    </div>
</div>
<hr>


<div class="row">
    <div class="col-md-2">
        {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('PhysicianInitial','',['class'=>'form-control']) !!}
    </div>
</div>
<div class="row col">
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}
<br>

