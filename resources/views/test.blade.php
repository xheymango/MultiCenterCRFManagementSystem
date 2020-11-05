<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>
</head>
<style>
    .page-break
    {
        page-break-after: always;
    }
</style>
<body>
    <h3>{{$patient->name}} {{$study->study_name}}'s study specific details</h3>
    <h3>Admission</h3>
    <hr>
    <div class="row">
        <div class="col-2">
            {!! Form::label('AdmissionDateTaken', 'Date Taken: ') !!}
            {!! Form::label('AdmissionDateTaken', $Admission->AdmissionDateTaken,['readonly'])!!}
        </div>

        <div class="col-4">
                {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
                {!! Form::label('AdmissionTimeTaken', old('AdmissionTimeTaken',$Admission->AdmissionTimeTaken)) !!}
        </div>
    </div>
    {{-- consent --}}
    <h3>Study-Specific Consent Taken</h3>
    <hr>
    <div class="form-group row">
            {!! Form::label('ConsentDateTaken', 'Date Taken: ') !!}
            {!! Form::label('ConsentDateTaken',old('ConsentDateTaken',$Admission->ConsentDateTaken),['class'=>'form-control']) !!}

    </div>
    <div>
        {!! Form::label('ConsentTimeTaken', 'Time Taken: ') !!}
        {!! Form::label('ConsentTimeTaken',old('ConsentTimeTaken',$Admission->ConsentTimeTaken),['class'=>'form-control']) !!}
    </div>
    <div class="page-break">
    <div>
        <h3>Body Measurements and Vital Signs</h3>
        <hr>
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::label('dateTaken',old('dateTaken',$BMVS->dateTaken),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                {!! Form::label('timeTaken', old('timeTaken',$BMVS->timeTaken),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('weight', 'Weight: ') !!}
                {!! Form::label('weight',old('weight',$BMVS->weight.' KG'), ['class'=>'form-control','placeholder'=>'kg']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('height', 'Height: ') !!}
                {!! Form::label('height', old('height',$BMVS->height.' CM'), ['class'=> 'form-control','placeholder'=>'cm']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('bmi', 'Body Mass Index: ') !!}
                {!! Form::label('bmi', old('bmi',$BMVS->bmi.' KG/m^2'),['class'=>'form-control','placeholder'=>'kg/m2','readonly'],false) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('temperature', 'Temperature: ') !!}
                {!! Form::label('temperature', old('temperature',$BMVS->temperature.' &deg;C'),['class'=>'form-control','placeholder'=>'°C'],false) !!}
            </div>
        </div>

        {{-- Body measurement ends here--}}

        <h4>Vital Signs</h4>
        <hr>
        <table border="1">
            <thead>
            <tr>
                <th scope="col">Position</th>
                <th scope="col">Reading Time (24-hour clock)</th>
                <th scope="col">Blood Pressure (systolic/diastolic) (mmHg)</th>
                <th scope="col">Heart Rate (beats per min)</th>
                <th scope="col">Respiratory Rate (breaths per min)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
                <td>{!! Form::label('Supine_ReadingTime', old('Supine_ReadingTime',$BMVS->Supine_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_BP', old('Supine_BP',$BMVS->Supine_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_HR', old('Supine_HR',$BMVS->Supine_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_RespiratoryRate', old('Supine_RespiratoryRate',$BMVS->Supine_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                <td>{!! Form::label('Sitting_ReadingTime',old('Sitting_ReadingTime',$BMVS->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_BP', old('Sitting_BP',$BMVS->Sitting_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_HR', old('Sitting_HR',$BMVS->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$BMVS->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>

                @if($BMVS->Sitting_BP_Repeat1 == NULL)
                    <th scope="row">
                    {!! Form::label('SittingRepeat1','Sitting Repeated Not Applicable')!!}
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    </th>
                @else
                    <th scope="row">
                    {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
                    </th>
                    <td>{!! Form::label('Sitting_ReadingTime_Repeat1',old('Sitting_ReadingTime_Repeat1',$BMVS->Sitting_ReadingTime_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_BP_Repeat1', old('Sitting_BP_Repeat1',$BMVS->Sitting_BP_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_HR_Repeat1', old('Sitting_HR_Repeat1',$BMVS->Sitting_HR_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_RespiratoryRate_Repeat1', old('Sitting_RespiratoryRate_Repeat1',$BMVS->Sitting_RespiratoryRate_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                @endif
            </tr>
            <tr>
                @if($BMVS->Sitting_BP_Repeat2 == NULL)
                <th scope="row">
                    {!! Form::label('SittingRepeat2', 'Sitting Repeated Not Applicable') !!}
                </th>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                @else
                <th scope="row">{!! Form::label('SittingRepeat2', 'Sitting Repeated') !!}</th>
                <td>{!! Form::label('Sitting_ReadingTime_Repeat2',old('Sitting_ReadingTime_Repeat2',$BMVS->Sitting_ReadingTime_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_BP_Repeat2', old('Sitting_BP_Repeat2',$BMVS->Sitting_BP_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_HR_Repeat2', old('Sitting_HR_Repeat2',$BMVS->Sitting_HR_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_RespiratoryRate_Repeat2', old('Sitting_RespiratoryRate_Repeat2',$BMVS->Sitting_RespiratoryRate_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                @endif
            </tr>
            <tr>
                <th scope="row" colspan="4"
                    class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                <td>{!! Form::label('Initial', old('Initial',$BMVS->Initial),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            </tbody>
        </table>
        <p>
            {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
        </p>
    </div>
    </div>
    {{--BREATH ALCOHOL TEST STARTS HERE--}}
    <h3>Breath Alcohol Test</h3>
    <p>(Transcribed from Breath Alcohol Test Logbook)</p>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::label('dateTaken',old('dateTaken',$BAT->dateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
            {!! Form::label('timeTaken', old('timeTaken',$BAT->timeTaken),['class'=>'form-control']) !!}
        </div>
    </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('Laboratory', 'Laboratory:') !!}
                {!! Form::label('Laboratory', old('Laboratory',$BAT->laboratory)) !!}
            </div>
        </div>
    <br>
    <table border="1">
        <thead>
        <tr>
            <th scope="col">Test</th>
            <th scope="col">%BAC</th>
            <th scope="col">Result</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{!! Form::label('breathalcohol', 'Breath Alcohol: ') !!}</th>
            <td>{!! Form::label('breathalcohol', old('breathalcohol',$BAT->breathalcohol),['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
            <td>
                {!! Form::label('breathalcoholResult', 'Negative',(old('breathalcoholResult',$BAT->breathalcoholResult)=='Negative')? 'checked' : '',['id'=>'Negative']) !!}
            </td>
        <tr>
            <th scope="row" colspan="2" class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
            <td>{!! Form::label('Usertranscribed', old('Usertranscribed',$BAT->Usertranscribed),['class'=>'form-control']) !!}</td>
        </tr>
        </tbody>
    </table>
    {{--Admission Questionnaire starts here--}}

    <h3>Admission Questionnaire</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('AQuestionnaireDateTaken', 'Date Taken: ') !!}
            {!! Form::label('AQuestionnaireDateTaken',old('AQuestionnaireDateTaken',$AQuestionnaire->AQuestionnaireDateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('AQuestionnaireTimeTaken', 'Time Taken: ') !!}
            {!! Form::label('AQuestionnaireTimeTaken',old('AQuestionnaireTimeTaken',$AQuestionnaire->AQuestionnaireTimeTaken),['class'=>'form-control']) !!}
        </div>
    </div>
    <hr>
    {{-- Admission Question 1 --}}
    <div class="row">
        <div class="col-md-6">
            <p>1. Has the subject had any medical problems within the last 7 days before dosing?</p>
            <p>{!! Form::label('MedicalProblem', ($AQuestionnaire->MedicalProblem)) !!}</p>
        </div>
    </div>
    @if($AQuestionnaire->MedicalProblem == "Yes")
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem significantly increase the subject’s risk if enrolled in the study?</p>
                <p>{!! Form::label('MP_IncreaseRisk', ($AQuestionnaire->MP_IncreaseRisk)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem potentially influence the pharmacokinetic profile of the study drug?</p>
            <p>{!! Form::label('MP_InfluencePKinetic',($AQuestionnaire->MP_InfluencePKinetic)) !!}</p>
        </div>
    </div>
    @endif
    <hr>
    {{-- Admission Question 2 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>2. Has the subject taken any medication (including herbal remedies, with the exception of birth control
                medications) within 7 days before dosing?</p>
            <p>{!! Form::label('Medication', ($AQuestionnaire->Medication)) !!}</p>
        </div>
    </div>
    @if ($AQuestionnaire->Medication == "Yes")
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication significantly increase the subject’s risk if enrolled in the study?</p>
            <p>{!! Form::label('Medi_IncreaseRisk',($AQuestionnaire->Medi_IncreaseRisk)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication potentially influence the pharmacokinetic profile of the study drug?</p>
            <p>{!! Form::label('Medi_InfluencePKinetic', ($AQuestionnaire->Medi_InfluencePKinetic)) !!}</p>
        </div>
    </div>
    @endif
    <hr>

    {{-- Admission Question 3 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>3. Has the subject been hospitalized within 4 weeks before dosing?</p>
            <p>{!! Form::label('Hospitalized',($AQuestionnaire->Hospitalized)) !!}</p>
        </div>
    </div>
    @if($AQuestionnaire->Hospitalized == "Yes")
    <div class="row">
        <div class="col-sm-6">
            <p>Can the hospitalization significantly increase the subject’s risk if enrolled in the study?</p>
            <p>{!! Form::label('H_IncreaseRisk', ($AQuestionnaire->H_IncreaseRisk)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the hospitalization potentially influence the pharmacokinetic profile of the study drug?</p>
            <p>{!! Form::label('H_InfluencePKinetic', ($AQuestionnaire->H_InfluencePKinetic)) !!}</p>
        </div>
    </div>
    @endif
    <hr>

    {{-- Admission Question 4 --}}
    <div class="row">
        <div class="col-md-6">
            <p>4. Has the subject consumed any alcohol or xanthine-containing food or beverage within 24 hours before
                dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('alcoholXanthine', 'Yes',(old('alcoholXanthine',$AQuestionnaire->AlcoholXanthine)!='No' && ($AQuestionnaire->AlcoholXanthine!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('alcoholXanthine', 'No',(old('alcoholXanthine',$AQuestionnaire->AlcoholXanthine)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('alcoholXanthine_Yes',(old('alcoholXanthine',$AQuestionnaire->AlcoholXanthine)!='No' && ($AQuestionnaire->AlcoholXanthine!=NULL))? $AQuestionnaire->AlcoholXanthine :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of alcohol or xanthine potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('AX_InfluencePKinetic', 'Yes',(($AQuestionnaire->AX_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('AX_InfluencePKinetic', 'No',(($AQuestionnaire->AX_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
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
            <p>{!! Form::radio('poppySeeds', 'Yes',(old('poppySeeds',$AQuestionnaire->PoppySeeds)!='No' && ($AQuestionnaire->PoppySeeds!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('poppySeeds', 'No',(old('poppySeeds',$AQuestionnaire->PoppySeeds)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('poppySeeds_Yes',(old('poppySeeds',$AQuestionnaire->PoppySeeds)!='No' && ($AQuestionnaire->PoppySeeds!=NULL))? $AQuestionnaire->PoppySeeds :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of poppy seeds potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('PS_InfluencePKinetic', 'Yes',(($AQuestionnaire->PS_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('PS_InfluencePKinetic', 'No',(($AQuestionnaire->PS_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
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
            <p>{!! Form::radio('grapefruitPomelo', 'Yes',(old('grapefruitPomelo',$AQuestionnaire->GrapefruitPomelo)!='No' && ($AQuestionnaire->GrapefruitPomelo!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('grapefruitPomelo', 'No',(old('grapefruitPomelo',$AQuestionnaire->GrapefruitPomelo)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('grapefruitPomelo_Yes',(old('grapefruitPomelo',$AQuestionnaire->GrapefruitPomelo)!='No' && ($AQuestionnaire->GrapefruitPomelo!=NULL))? $AQuestionnaire->GrapefruitPomelo :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of grapefruit (including marmalade) or pomelo potentially influence the pharmacokinetic profile
                of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Grapefruit_InfluencePKinetic', 'Yes',(($AQuestionnaire->Grapefruit_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Grapefruit_InfluencePKinetic', 'No',(($AQuestionnaire->Grapefruit_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 7 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>7. Has the subject participated in other experimental drug studies within 4 weeks before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('otherDrugStudies', 'Yes',(old('otherDrugStudies',$AQuestionnaire->OtherDrugStudies)!='No' && ($AQuestionnaire->OtherDrugStudies!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('otherDrugStudies', 'No',(old('otherDrugStudies',$AQuestionnaire->OtherDrugStudies)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('otherDrugStudies_Yes',(old('otherDrugStudies',$AQuestionnaire->OtherDrugStudies)!='No' && ($AQuestionnaire->OtherDrugStudies!=NULL))? $AQuestionnaire->OtherDrugStudies :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the participation significantly increase the subject’s risk if enrolled in the study</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_IncreaseRisk', 'Yes',(($AQuestionnaire->Other_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_IncreaseRisk', 'No',(($AQuestionnaire->Other_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the participation potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_InfluencePKinetic', 'Yes',(($AQuestionnaire->Other_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_InfluencePKinetic', 'No',(($AQuestionnaire->Other_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
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
            <p>{!! Form::radio('bloodDono', 'Yes',(old('bloodDono',$AQuestionnaire->BloodDono)!='No' && ($AQuestionnaire->BloodDono!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('bloodDono', 'No',(old('bloodDono',$AQuestionnaire->BloodDono)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('bloodDono_Yes',(old('bloodDono',$AQuestionnaire->BloodDono)!='No' && ($AQuestionnaire->BloodDono!=NULL))? $AQuestionnaire->BloodDono :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the donation potentially increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Blood_IncreaseRisk', 'Yes',(($AQuestionnaire->Blood_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Blood_IncreaseRisk', 'No',(($AQuestionnaire->Blood_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 9 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>9. Has the subject use of non-acceptable methods of contraception within 14 days before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('contraception', 'Yes',(old('contraception',$AQuestionnaire->Contraception)!='No' && ($AQuestionnaire->Contraception!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('contraception', 'No',(old('contraception',$AQuestionnaire->Contraception)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('contraception_Yes',(old('contraception',$AQuestionnaire->Contraception)!='No' && ($AQuestionnaire->Contraception!=NULL))? $AQuestionnaire->Contraception :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of this method potentially increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Contraception_IncreaseRisk', 'Yes',(($AQuestionnaire->Contraception_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Contraception_IncreaseRisk', 'No',(($AQuestionnaire->Contraception_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('PhysicianInitial',old('PhysicianInitial',$AQuestionnaire->PhysicianInitial),['class'=>'form-control']) !!}
        </div>
    </div>
    <br>
</body>



