<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_MedicalHistory;
use DB;
use function GuzzleHttp\Psr7\copy_to_string;

class MH_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeMH(Request $request,$id)
    {
        $mh = new Patient_MedicalHistory();

        $custom = [
            'dateTaken.required' => 'Please input the date taken',
            'timeTaken.required' => 'Please input the time taken',
            'Allergy.required' => 'Please state the Allergy abnormalities of the subject',
            'Allergy_txt.required_if' => 'If Allergy field is abnormal, please give pertinent details',
            'EENT.required' => 'Please state the Eyes-Ears-Nose-Throat abnormalities of the subject',
            'EENT_txt.required_if' => 'If Eyes-Ears-Nose-Throat field is abnormal, please give pertinent details',
            'Respiratory.required' => 'Please state the Respiratory abnormalities of the subject',
            'Respiratory_txt.required_if' => 'If Respiratory field is abnormal, please give pertinent details',
            'Cardiovascular.required' => 'Please state the Cardiovascular abnormalities of the subject',
            'Cardiovascular_txt.required_if' => 'If Cardiovascular field is abnormal, please give pertinent details',
            'Gastrointestinal.required' => 'Please state the Gastrointestinal abnormalities of the subject',
            'Gastrointestinal_txt.required_if' => 'If Gastrointestinal field is abnormal, please give pertinent details',
            'Genitourinary.required' => 'Please state the Genitourinary abnormalities of the subject',
            'Genitourinary_txt.required_if' => 'If Genitourinary field is abnormal, please give pertinent details',
            'Neurological.required' => 'Please state the Neurological abnormalities of the subject',
            'Neurological_txt.required_if' => 'If Neurological field is abnormal, please give pertinent details',
            'HaematopoieticL.required' => 'Please state the Haematopoietic-Lymphatic abnormalities of the subject',
            'HaematopoieticL_txt.required_if' => 'If Haematopoietic-Lymphatic field is abnormal, please give pertinent details',
            'EndocrineM.required' => 'Please state the Endocrine-Metabolic abnormalities of the subject',
            'EndocrineM_txt.required_if' => 'If Endocrine-Metabolic field is abnormal, please give pertinent details',
            'Dermatological.required' => 'Please state the Dermatological abnormalities of the subject',
            'Dermatological_txt.required_if' => 'If Dermatological field is abnormal, please give pertinent details',
            'Musculoskeletal.required' => 'Please state the Musculoskeletal abnormalities of the subject',
            'Musculoskeletal_txt.required_if' => 'If Musculoskeletal field is abnormal, please give pertinent details',
            'Psychological.required' => 'Please state the Psychological abnormalities of the subject',
            'Psychological_txt.required_if' => 'If Psychological field is abnormal, please give pertinent details',
            'FamilyHistory.required' => 'Please state the Family History abnormalities of the subject',
            'FamilyHistory_txt.required_if' => 'If Family History field is abnormal, please give pertinent details',
            'SurgicalHistory.required' => 'Please state the Surgical History abnormalities of the subject',
            'SurgicalHistory_txt.required_if' => 'If Surgical History field is abnormal, please give pertinent details',
            'PrevHospitalization.required' => 'Please state the Previous Hospitalization abnormalities of the subject',
            'PrevHospitalization_txt.required_if' => 'If Previous Hospitalization field is abnormal, please give pertinent details',
            'Smoker.required' => 'Please state whether the subject are smoker',
            'RAI.required' => 'Please state whether the subject have regular alcohol intake',
            'RMS.required' => 'Please state whether the subject have regular medications or supplements',
            'RegularExercise.required' => 'Please state whether the subject have regular exercise',
            'BloodDonations.required' => 'Please state whether the subject have blood donations',
            'RegularPeriods.required' => 'Please state whether the subject have regular periods',
            'RegularPeriods_No_txt.required_if' => 'If the subject do not have regular periods, please describe the condition',
            'RegularPeriods_Yes_txt.required_if' => 'If the subject have regular periods, please state the last menstrual period',
            'ActiveSexAct.required' => 'Please state whether the subject have active sexual activities',
            'FertilityControl.required' => 'Please state whether the subject are in fertility control',
            'FertilityControl_No_txt.required_if' => 'If the subject do not have fertility control, please select whether counseling is given',
            'FertilityControl_Yes_txt.required_if' => 'If the subject have fertility control, please select which advice and counseling is given',
            'Breastfeeding.required' => 'Please state whether the subject are a breastfeeding female',
            'Conclusion.required' => 'Please select a conclusion for the the subject medical history',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'Allergy'  => 'required',
            'Allergy_txt' => 'required_if:Allergy,==,Abnormal',
            'EENT'  => 'required',
            'EENT_txt' => 'required_if:EENT,==,Abnormal',
            'Respiratory'  => 'required',
            'Respiratory_txt' => 'required_if:Respiratory,==,Abnormal',
            'Cardiovascular'  => 'required',
            'Cardiovascular_txt' => 'required_if:Cardiovascular,==,Abnormal',
            'Gastrointestinal'  => 'required',
            'Gastrointestinal_txt' => 'required_if:Gastrointestinal,==,Abnormal',
            'Genitourinary'  => 'required',
            'Genitourinary_txt' => 'required_if:Genitourinary,==,Abnormal',
            'Neurological'  => 'required',
            'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
            'HaematopoieticL'  => 'required',
            'HaematopoieticL_txt' => 'required_if:HaematopoieticL,==,Abnormal',
            'EndocrineM'  => 'required',
            'EndocrineM_txt' => 'required_if:EndocrineM,==,Abnormal',
            'Dermatological'  => 'required',
            'Dermatological_txt' => 'required_if:Dermatological,==,Abnormal',
            'Musculoskeletal'  => 'required',
            'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
            'Psychological'  => 'required',
            'Psychological_txt' => 'required_if:Psychological,==,Abnormal',
            'FamilyHistory'  => 'required',
            'FamilyHistory_txt' => 'required_if:FamilyHistory,==,Abnormal',
            'SurgicalHistory'  => 'required',
            'SurgicalHistory_txt' => 'required_if:SurgicalHistory,==,Abnormal',
            'PrevHospitalization'  => 'required',
            'PrevHospitalization_txt' => 'required_if:PrevHospitalization,==,Abnormal',
            'Smoker'  => 'required',
            'RAI'  => 'required',
            'RMS'  => 'required',
            'RegularExercise'  => 'required',
            'BloodDonations'  => 'required',
            'RegularPeriods'  => 'required',
            'RegularPeriods_No_txt' => 'required_if:RegularPeriods,==,No',
            'RegularPeriods_Yes_txt' => 'required_if:RegularPeriods,==,Yes',
            'ActiveSexAct'  => 'required',
            'FertilityControl'  => 'required',
            'FertilityControl_No_txt' => 'required_if:FertilityControl,==,No',
            'FertilityControl_Yes_txt' => 'required_if:FertilityControl,==,Yes',
            'Breastfeeding'  => 'required',
            'Conclusion' => 'required',
        ], $custom);

        $data =$request->except('_token','dateTaken','timeTaken');
        $mh->patient_id = $id;
        $mh->dateTaken=$request->dateTaken;
        $mh->timeTaken=$request->timeTaken;

        //some key does not have the text box, therefore, those keys needed be checked individually.
        foreach($data as $key=>$value)
        {
            if($value =="Abnormal")
            {
                $abnormal_txt= $key."_txt";
                 $mh->$key=$data[$abnormal_txt];
            }else if($value == "Normal")
            {
                $normal_txt = $key;
               $mh->$key=$data[$normal_txt];
            }else if($key == "RegularPeriods" and $value == "Yes")
            {
                $RP_Yes = $key."_Yes_txt";
                $mh->$key= $value;
                $mh->$RP_Yes=$data[$RP_Yes];
            }else if($key == "RegularPeriods" and $value == "No")
            {
                $RP_No= $key."_No_txt";
                $mh->$key= $value;
                $mh->$RP_No=$data[$RP_No];
            }else if($key == "RegularPeriods" and $value =="Not Applicable")
            {
                $mh->$key=$data[$key];
            }else if($key =="FertilityControl" and $value =="Yes")
            {
                    $FC_Yes = $key."_Yes_txt";
                    $mh->$key=$value;
                    $mh->$FC_Yes=$data[$FC_Yes];
            }else if($key =="FertilityControl" and $value=="No")
            {
                $FC_No = $key."_No_txt";
                $mh->$key=$value;
                $mh->$FC_No=$data[$FC_No];
            }else if($key =="FertilityControl" and $value == "Not Applicable")
            {
                $mh->$key=$data[$key];
            }
            else if($key == "ActiveSexAct")
            {
                $mh->$key=$data[$key];
            }
            else if($key == "Breastfeeding")
            {
                $mh->$key=$data[$key];
            }else if($key == "Conclusion")
            {
                $mh->$key=$data[$key];
            }
            else if($value == "Yes")
            {
                $yes_txt = $key."_txt";
                    $mh->$key=$data[$yes_txt];
            }else if($value == "No")
            {
                $no_txt = $key;
                $mh->$key=$data[$no_txt];
            }
        }

        $mh->save();
       return redirect(route('preScreeningForms.create',$id))->with('Messages','You have added the Medical History detail for the subject!');
    }
    public function updateMH(Request $request,$id)
    {
        $custom = [
            'dateTaken.required' => 'Please input the date taken',
            'timeTaken.required' => 'Please input the time taken',
            'Allergy.required' => 'Please state the Allergy abnormalities of the subject',
            'Allergy_txt.required_if' => 'If Allergy field is abnormal, please give pertinent details',
            'EENT.required' => 'Please state the Eyes-Ears-Nose-Throat abnormalities of the subject',
            'EENT_txt.required_if' => 'If Eyes-Ears-Nose-Throat field is abnormal, please give pertinent details',
            'Respiratory.required' => 'Please state the Respiratory abnormalities of the subject',
            'Respiratory_txt.required_if' => 'If Respiratory field is abnormal, please give pertinent details',
            'Cardiovascular.required' => 'Please state the Cardiovascular abnormalities of the subject',
            'Cardiovascular_txt.required_if' => 'If Cardiovascular field is abnormal, please give pertinent details',
            'Gastrointestinal.required' => 'Please state the Gastrointestinal abnormalities of the subject',
            'Gastrointestinal_txt.required_if' => 'If Gastrointestinal field is abnormal, please give pertinent details',
            'Genitourinary.required' => 'Please state the Genitourinary abnormalities of the subject',
            'Genitourinary_txt.required_if' => 'If Genitourinary field is abnormal, please give pertinent details',
            'Neurological.required' => 'Please state the Neurological abnormalities of the subject',
            'Neurological_txt.required_if' => 'If Neurological field is abnormal, please give pertinent details',
            'HaematopoieticL.required' => 'Please state the Haematopoietic-Lymphatic abnormalities of the subject',
            'HaematopoieticL_txt.required_if' => 'If Haematopoietic-Lymphatic field is abnormal, please give pertinent details',
            'EndocrineM.required' => 'Please state the Endocrine-Metabolic abnormalities of the subject',
            'EndocrineM_txt.required_if' => 'If Endocrine-Metabolic field is abnormal, please give pertinent details',
            'Dermatological.required' => 'Please state the Dermatological abnormalities of the subject',
            'Dermatological_txt.required_if' => 'If Dermatological field is abnormal, please give pertinent details',
            'Musculoskeletal.required' => 'Please state the Musculoskeletal abnormalities of the subject',
            'Musculoskeletal_txt.required_if' => 'If Musculoskeletal field is abnormal, please give pertinent details',
            'Psychological.required' => 'Please state the Psychological abnormalities of the subject',
            'Psychological_txt.required_if' => 'If Psychological field is abnormal, please give pertinent details',
            'FamilyHistory.required' => 'Please state the Family History abnormalities of the subject',
            'FamilyHistory_txt.required_if' => 'If Family History field is abnormal, please give pertinent details',
            'SurgicalHistory.required' => 'Please state the Surgical History abnormalities of the subject',
            'SurgicalHistory_txt.required_if' => 'If Surgical History field is abnormal, please give pertinent details',
            'PrevHospitalization.required' => 'Please state the Previous Hospitalization abnormalities of the subject',
            'PrevHospitalization_txt.required_if' => 'If Previous Hospitalization field is abnormal, please give pertinent details',
            'Smoker.required' => 'Please state whether the subject are smoker',
            'RAI.required' => 'Please state whether the subject have regular alcohol intake',
            'RMS.required' => 'Please state whether the subject have regular medications or supplements',
            'RegularExercise.required' => 'Please state whether the subject have regular exercise',
            'BloodDonations.required' => 'Please state whether the subject have blood donations',
            'RegularPeriods.required' => 'Please state whether the subject have regular periods',
            'RegularPeriods_No_txt.required_if' => 'If the subject do not have regular periods, please describe the condition',
            'RegularPeriods_Yes_txt.required_if' => 'If the subject have regular periods, please state the last menstrual period',
            'ActiveSexAct.required' => 'Please state whether the subject have active sexual activities',
            'FertilityControl.required' => 'Please state whether the subject are in fertility control',
            'FertilityControl_No_txt.required_if' => 'If the subject do not have fertility control, please select whether counseling is given',
            'FertilityControl_Yes_txt.required_if' => 'If the subject have fertility control, please select which advice and counseling is given',
            'Breastfeeding.required' => 'Please state whether the subject are a breastfeeding female',
            'Conclusion.required' => 'Please select a conclusion for the the subject medical history',
        ];

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'Allergy'  => 'required',
            'Allergy_txt' => 'required_if:Allergy,==,Abnormal',
            'EENT'  => 'required',
            'EENT_txt' => 'required_if:EENT,==,Abnormal',
            'Respiratory'  => 'required',
            'Respiratory_txt' => 'required_if:Respiratory,==,Abnormal',
            'Cardiovascular'  => 'required',
            'Cardiovascular_txt' => 'required_if:Cardiovascular,==,Abnormal',
            'Gastrointestinal'  => 'required',
            'Gastrointestinal_txt' => 'required_if:Gastrointestinal,==,Abnormal',
            'Genitourinary'  => 'required',
            'Genitourinary_txt' => 'required_if:Genitourinary,==,Abnormal',
            'Neurological'  => 'required',
            'Neurological_txt' => 'required_if:Neurological,==,Abnormal',
            'HaematopoieticL'  => 'required',
            'HaematopoieticL_txt' => 'required_if:HaematopoieticL,==,Abnormal',
            'EndocrineM'  => 'required',
            'EndocrineM_txt' => 'required_if:EndocrineM,==,Abnormal',
            'Dermatological'  => 'required',
            'Dermatological_txt' => 'required_if:Dermatological,==,Abnormal',
            'Musculoskeletal'  => 'required',
            'Musculoskeletal_txt' => 'required_if:Musculoskeletal,==,Abnormal',
            'Psychological'  => 'required',
            'Psychological_txt' => 'required_if:Psychological,==,Abnormal',
            'FamilyHistory'  => 'required',
            'FamilyHistory_txt' => 'required_if:FamilyHistory,==,Abnormal',
            'SurgicalHistory'  => 'required',
            'SurgicalHistory_txt' => 'required_if:SurgicalHistory,==,Abnormal',
            'PrevHospitalization'  => 'required',
            'PrevHospitalization_txt' => 'required_if:PrevHospitalization,==,Abnormal',
            'Smoker'  => 'required',
            'RAI'  => 'required',
            'RMS'  => 'required',
            'RegularExercise'  => 'required',
            'BloodDonations'  => 'required',
            'RegularPeriods'  => 'required',
            'RegularPeriods_No_txt' => 'required_if:RegularPeriods,==,No',
            'RegularPeriods_Yes_txt' => 'required_if:RegularPeriods,==,Yes',
            'ActiveSexAct'  => 'required',
            'FertilityControl'  => 'required',
            'FertilityControl_No_txt' => 'required_if:FertilityControl,==,No',
            'FertilityControl_Yes_txt' => 'required_if:FertilityControl,==,Yes',
            'Breastfeeding'  => 'required',
            'Conclusion' => 'required',
        ], $custom);
        
        DB::table('patient_medical_histories')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
        ]);

        $data =$request->except('_token','dateTaken','timeTaken');

        foreach($data as $key=>$value)
        {
            if($value =="Abnormal")
            {
                $abnormal_txt= $key."_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$abnormal_txt]
                ]);
            }else if($value == "Normal")
            {
                $normal_txt = $key;
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$normal_txt]
                ]);
            }else if($key == "regularPeriods" and $value == "Yes")
            {
                $RP_Yes = $key."_Yes_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key],
                    'RegularPeriods_Yes_txt'=>$data[$RP_Yes],
                    'RegularPeriods_No_txt'=>NULL
                ]);
            }else if($key == "regularPeriods" and $value == "No")
            {
                $RP_No= $key."_No_txt";
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key],
                    'RegularPeriods_No_txt'=>$data[$RP_No],
                    'RegularPeriods_Yes_txt'=>NULL
                ]);
            }else if($key == "regularPeriods" and $value =="Not Applicable")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key],
                    'RegularPeriods_Yes_txt'=>NULL,
                    'RegularPeriods_No_txt'=>NULL
                ]);
            }else if($key =="fertilityControl" and $value =="Yes")
            {
                    $FC_Yes = $key."_Yes_txt";
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key],
                    'FertilityControl_Yes_txt'=>$data[$FC_Yes],
                    'FertilityControl_No_txt'=>NULL
                ]);
            }else if($key =="fertilityControl" and $value=="No")
            {
                $FC_No = $key."_No_txt";
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key],
                    'FertilityControl_No_txt'=>$data[$FC_No],
                    'FertilityControl_Yes_txt'=>NULL
                ]);
            }else if($key =="fertilityControl" and $value == "Not Applicable")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }
            else if($key == "activeSexAct")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }
            else if($key == "breastfeeding")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }else if($key == "conclusion")
            {
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$key]
                ]);
            }
            else if($value == "Yes")
            {
                $yes_txt = $key."_txt";
                    DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$yes_txt]
                ]);
            }else if($value == "No")
            {
                $no_txt = $key;
                DB::table('patient_medical_histories')
                    ->where('patient_id',$id)
                    ->update([
                    $key=>$data[$no_txt]
                ]);
            }
        }

        return redirect(route('preScreeningForms.edit',$id))->with('Messages','You have updated the Medical History detail for the subject!');
    }
}
