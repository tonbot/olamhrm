<?php 
class Controller
{
  private  $pdo = null;
  private  $password="";
  private  $user="root"; 
  private  $fileExtension  = ["jpg", "jpeg", "pdf"];
 

   function __construct(){
    //making connection to the database
       try
           {
               $host="localhost";
               $dbname="ekirs_hrm";
               $this -> pdo = new PDO("mysql:host=$host; dbname=$dbname", $this -> user, $this -> password );
               $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
             
           } 
       catch(PDOException $e)
           {
               echo ($e->getMessage());
           }
   }
   
   function runApp($runData){
         switch ($runData->a){
            case 'addEmployee':
               return $this->addEmployee($runData); 
            case 'employeeLIst':
               return $this->getEmployee();
            case 'employeeDetails':
                return $this->employeeDetails($runData);
            case 'admin':
                return $this->performAdmin($runData);
            default :
            $resp = new stdClass();
            $resp->message = "Something is definitely not right!!!";
            $resp->status = "error";
            $resp->code = 400;
            return $resp;
         }
   }//end of run app



private function performAdmin($runData){ //only working for admin
    switch ($runData->k) {
        case 'jobTitle':
              return $this->addJobTitle($runData);
        case 'general':
                return $this->addGeneral($runData);
        case 'getJobTitle':
            $query ="SELECT * FROM hr_job_title";
            return $this->getData1($query);
        case 'getCategory':
            $query ="SELECT * FROM hr_job_category";
            return $this->getData1($query); 
        case 'getPayGrade':
            $query ="SELECT * FROM hr_pay_grade";
            return $this->getData1($query);
        case 'getSubUnit':
            $query ="SELECT * FROM hr_sub_unit";
            return $this->getData1($query);      
        case 'deleteJobTitle':
            $query ="DELETE FROM hr_job_title WHERE id=:id";
            return $this->deleteData2($runData,$query ); 
        case 'deleteCategory':
            $query ="DELETE FROM hr_job_category WHERE id=:id";
            return $this->deleteData2($runData,$query );  
        case 'deletePayGrade':
            $query ="DELETE FROM hr_pay_grade WHERE id=:id";
            return $this->deleteData2($runData,$query ); 
        case 'deleteSubUnit':
            $query ="DELETE FROM hr_sub_unit WHERE id=:id";
            return $this->deleteData2($runData,$query );    
        default:
            # code...
            break;
    }
}


   
   private function employeeDetails($runData){
    switch ($runData->k) {
        case 'employeePersonalDetails':
            return $this->updateEmployeePersonalDetails($runData);
        case 'employeeContactDetails':
            return $this->updateEmployeeContactDetails($runData);
        case 'employeeById':
            return $this->getEmployeeById($runData);
        case 'pAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'cAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'eAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'nokAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'dAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'jAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'sAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'rAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'qAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'mAttachment':
            return $this->uploadAttachment($runData,$runData->k);
        case 'emergencyContact':
             return $this->addEmergencyContact($runData);
        case 'nok':
                return $this->addnok($runData);
        case 'dependent':
            return $this->addDependent($runData);
        case 'job':
            return $this->addJob($runData);
        case 'salary':
            return $this->addSalary($runData);
        case 'reportTo':
            return $this->addReportTo($runData);
        case 'qualification':
                return $this->addQualification($runData);
        case 'membership':
                return $this->addMembership($runData);
        case 'getEmergencyContact':
            $query = "SELECT * FROM hr_emergency_contact WHERE emp_id =:id"; 
            return $this->getData($runData,$query);
        case 'getnok':
            $query = "SELECT * FROM hr_next_of_kin WHERE emp_id =:id"; 
             return $this->getData($runData,$query);
        case 'getDependent':
            $query = "SELECT * FROM hr_dependent WHERE emp_id =:id"; 
            return $this->getData($runData,$query);
        case 'getSalary':
            $query = "SELECT * FROM hr_salary WHERE emp_id =:id"; 
            return $this->getData($runData,$query);
        case 'getSupervisor':
            $query = "SELECT * FROM hr_report_to WHERE emp_id =:id AND type='Supervisor'"; 
            return $this->getData($runData,$query);
        case 'getSubordinate':
            $query = "SELECT * FROM hr_report_to WHERE emp_id =:id AND type='Subordinate'"; 
            return $this->getData($runData,$query);
        case 'getWorkExperience':
                $query = "SELECT * FROM hr_work_experience WHERE emp_id =:id"; 
                return $this->getData($runData,$query);
        case 'getSkill':
                $query = "SELECT * FROM hr_skill WHERE emp_id =:id"; 
                return $this->getData($runData,$query);
        case 'getEducation':
                $query = "SELECT * FROM hr_education WHERE emp_id =:id"; 
                return $this->getData($runData,$query);
        case 'getLanguage':
                $query = "SELECT * FROM hr_language WHERE emp_id =:id"; 
                return $this->getData($runData,$query);
        case 'getLicense':
                $query = "SELECT * FROM hr_license WHERE emp_id =:id"; 
                return $this->getData($runData,$query);
         case 'getMembership':
                $query = "SELECT * FROM hr_membership WHERE emp_id =:id"; 
                return $this->getData($runData,$query);
        case 'getJobTitles':
            $query = "SELECT * FROM hr_job_title"; 
            return $this->getData3($runData, $query, "getJobTitles");
        case 'getJobCategories':
            $query = "SELECT * FROM hr_job_category"; 
            return $this->getData3($runData, $query, 'getJobCategories');
        case 'getSubUnits':
            $query = "SELECT * FROM hr_sub_unit"; 
            return $this->getData3($runData, $query,'getSubUnits');
        case 'getLocations':
            $query = "SELECT * FROM hr_location"; 
            return $this->getData3($runData, $query,'getLocations'); 
        case 'deleteCheckBoxSelected':
            return $this->deleteData($runData);  
        default:
          return "oops Something went wrong";
            break;
    }
}




private function addJobTitle($runData){
    $query = "INSERT INTO hr_job_title(job_title, job_description) VALUES (:job_title, :job_description)";
    $statement = $this->pdo->prepare($query);
    $statement->execute
        ([
            ':job_title'             => $runData -> b,
            ':job_description'       => $runData -> c,
        ]);
            if ($statement->rowCount() > 0){
                  return "Record created Successfully"; 
                }  
            else
                {
                  return "Record Failed to save ";  
                }
}

private function addGeneral($runData){
     switch ($runData->z) {
        case 'category':
            $query = "INSERT INTO hr_job_category(category) VALUES (:name)";
            break;
        case 'payGrade':
            $query = "INSERT INTO hr_pay_grade(pay_grade) VALUES (:name)";
            break;
        case 'SubUnit':
            $query = "INSERT INTO hr_sub_unit(sub_unit) VALUES (:name)";
            break;
        
        default:
            # code...
            break;
     }
   
    $statement = $this->pdo->prepare($query);
    $statement->execute([ ':name' => $runData -> b, ]);
            if ($statement->rowCount() > 0){
                  return "Record created Successfully"; 
                }  
            else
                {
                  return "Record Failed to save ";  
                }
}

private function deleteData2($runData,$query){
            foreach($runData->b as $data){
                $statement = $this->pdo->prepare($query);
                $statement->execute([':id' => $data]);                       
            }
            if ($statement->rowCount() > 0){
                return "Record Deleted Successfully"; 
              }  
          else
              {
              return  "Record cannot be deleted!!!" ;  
              } 

}



/***********************************************DELETE DATA********************************************* */

private function deleteData($runData){
    switch ($runData->z) {
        case 'deleteReportTo': //this delete selected checkbox from either supervisor or subordinate
            foreach($runData->b as $data){

                $query     = "DELETE FROM hr_report_to WHERE emp_id=:emp_id AND id=:id AND type =:type";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        ':emp_id'              => $runData -> l,
                        ':id'                  => $data,
                        ':type'                => $runData -> c,
                    ]);
                        
            }
            if ($statement->rowCount() > 0){
                return $this->responseData("success", 200, "Record Deleted Successfully"); 
              }  
          else
              {
              return $this->responseData("error", 400, "Record cannot be deleted!!!" );  
              } 

           case 'deleteEmployee': //this delete selected checkbox employee
                foreach($runData->b as $data){

                    $query     = "DELETE FROM hr_employee WHERE id=:id ";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':id'                  => $data,
                        ]);
                            
                }
                if ($statement->rowCount() > 0){
                    return $this->responseData("success", 200, "Record Deleted Successfully"); 
                }  
            else
                {
                return $this->responseData("error", 400, "Record cannot be deleted!!!" );  
                } 
            
        default:
            return "error";
            break;
    }
}

/***********************************************DELETE ENDS DATA********************************************* */


/*********************************************ADD MEMBERSHIP******************************************************** */

private function addMembership($runData)
{       
                    $query = "INSERT INTO hr_membership(emp_id, membership, sub_pay_by, sub_amount, currency, sub_comm_date, sub_renewal_date ) VALUES (:emp_id,:membership,:sub_pay_by, :sub_amount,:currency, :sub_comm_date, :sub_renewal_date)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'             => $runData -> l,
                            ':membership'         => $runData -> b,
                            ':sub_pay_by'         => $runData -> c,
                            ':sub_amount'         => $runData -> d,
                            ':currency'           => $runData -> e,
                            ':sub_comm_date'      => $runData -> f,
                            ':sub_renewal_date'   => $runData -> g,
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                                }
    
             
            
}
/*********************************************ADD MEMBERSHIP******************************************************** */

/*********************************************ADD QUALIFICATION******************************************************** */

private function addQualification($runData)
{       
               switch ($runData->g) {
                case 'workExperience': //work experience
                    $query = "INSERT INTO hr_work_experience(emp_id, company, job_title, fromD, toD, comment) VALUES (:emp_id,:company,:job_title, :from,:to, :comment)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'      => $runData -> l,
                            ':company'     => $runData -> b,
                            ':job_title'   => $runData -> c,
                            ':from'        => $runData -> d,
                            ':to'          => $runData -> e,
                            ':comment'     => $runData -> f,
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                                }
    
                 case 'education': //education
    
                    $query = "INSERT INTO hr_education(emp_id, level, institute, major, year, score, start_date,end_date ) VALUES (:emp_id,:level,:institute, :major, :year, :score, :startDate, :endDate)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'      => $runData -> l,
                            ':level'     => $runData -> b,
                            ':institute'   => $runData -> c,
                            ':major'        => $runData -> d,
                            ':year'        => $runData -> e,
                            ':score'          => $runData -> f,
                            ':startDate'     => $runData -> h,
                            ':endDate'     => $runData -> i,
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                                }
                 case 'skill': //skill
                    $query = "INSERT INTO hr_skill(emp_id, skill, year_of_experience, comment) VALUES (:emp_id,:skill,:year_of_experience, :comment)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'      => $runData -> l,
                            ':skill'     => $runData -> b,
                            ':year_of_experience'   => $runData -> c,
                            ':comment'        => $runData -> d,
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                                }
                 case 'language': //language
                    $query = "INSERT INTO hr_language(emp_id, language, fluency, competency, comment) VALUES (:emp_id,:language,:fluency, :competency,:comment)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'      => $runData -> l,
                            ':language'     => $runData -> b,
                            ':fluency'   => $runData -> c,
                            ':competency'        => $runData -> d,
                            ':comment'        => $runData -> e,
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                                }
                 case 'license': //license
                    $query = "INSERT INTO hr_license(emp_id, license_type, license_number, issued_date, expiry_date) VALUES (:emp_id,:license_type,:license_number, :issued_date,:expiry_date)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'      => $runData -> l,
                            ':license_type'     => $runData -> b,
                            ':license_number'   => $runData -> c,
                            ':issued_date'        => $runData -> d,
                            ':expiry_date'        => $runData -> e,
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                                }

                default:
               return "failed";
                    break;
               }
            
}
/*********************************************ADD QUALIFICATION******************************************************** */

/*********************************************ADD REPORT TO******************************************************** */

private function addReportTo($runData)
{

                $query     = "INSERT INTO hr_report_to(emp_id, name, reporting_method, type) VALUES (:emp_id,:name, :reporting_method, :type)";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        ':emp_id'              => $runData -> l,
                        ':name'                => $runData -> b,
                        ':reporting_method'    => $runData -> c,
                        ':type'                => $runData -> d,
                    ]);
                        if ($statement->rowCount() > 0){
                              return $this->responseData("success", 200, "Record created Successfully"); 
                            }  
                        else
                            {
                            return $this->responseData("error", 400, "Something wrong, Record cannot be created!!!" );  
                            }

           
}
/*********************************************ADD REPORT TO******************************************************** */



/*********************************************ADD SALARY******************************************************** */

   private function addSalary($runData)
    {
            switch ($runData->b) {
                case 'true':
                    $query     = "INSERT INTO hr_salary(emp_id, salary_component, salary_period, currency,amount,comment,account_number,account_type,routing_number,direct_amount) VALUES (:emp_id,:salary_component, :salary_period, :currency,:amount,:comment,:account_number,:account_type,:routing_number,:direct_amount)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'              => $runData -> l,
                            ':salary_component'    => $runData -> c,
                            ':salary_period'       => $runData -> d,
                            ':currency'            => $runData -> e,
                            ':amount'              => $runData -> f,
                            ':comment'             => $runData -> g,
                            ':account_number'      => $runData -> h,
                            ':account_type'        => $runData -> i,
                            ':routing_number'      => $runData -> j,
                            ':direct_amount'       => $runData -> m
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Salary Record created Successfully"); 
                                }  
                            else
                                {
                                return $this->responseData("error", 400, "Something wrong, Salary Record cannot be created!!!" );  
                                }
                break;
                case 'false':

                    $query     = "INSERT INTO hr_salary(emp_id, salary_component, salary_period, currency,amount,comment) VALUES (:emp_id, :salary_component, :salary_period, :currency,:amount,:comment)";
                    $statement = $this->pdo->prepare($query);
                    $statement->execute
                        ([
                            ':emp_id'              => $runData -> l,
                            ':salary_component'    => $runData -> c,
                            ':salary_period'       => $runData -> d,
                            ':currency'            => $runData -> e,
                            ':amount'              => $runData -> f,
                            ':comment'             => $runData -> g
                        ]);
                            if ($statement->rowCount() > 0){
                                  return $this->responseData("success", 200, "Salary Record created Successfully"); 
                                }  
                
                                return $this->responseData("error", 400, "Something wrong, Salary Record cannot be created!!!" );  
                default:
                    return $this->responseData("error", 405, "Something wrong"); 
                  
            }


               
    }
/*********************************************ADD SALARY******************************************************** */


/*********************************************THESE USE TO GET DATA FROM DATABASE******************************************************** */

private function getData3($runData, $query, $module) {  
    $respData= new stdClass(); 
    $result = $this->pdo->prepare($query);
    $result->execute([]);
    if ($result -> rowCount() > 0)
    {
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $result -> fetchall();
        $respData->module =  $module ;
        $respData->message =  $result ;
        $respData->code = "200";
        return $respData;
    }
    return $respData->code = "204";;
}

    
 private function getData($runData, $query) {   
    $result = $this->pdo->prepare($query);
    $result->execute([":id" => $runData->l ]);
    if ($result -> rowCount() > 0)
    {
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $result -> fetchall();
        $response = $result;
        return $response;
    }
    return "";
}

private function getData1($query) {   
    $result = $this->pdo->prepare($query);
    $result->execute([]);
    if ($result -> rowCount() > 0)
    {
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $result -> fetchall();
        $response = $result;
        return $response;
    }
    return "";
}

function getData2($runData, $query) {   
    $result = $this->pdo->prepare($query);
    $result->execute([":id" => $runData->l ]);
    if ($result -> rowCount() > 0)
    {
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $result -> fetchall();
        $response = $result;
        return $response;
    }
    return "";
}
/********************************************* GET DATA ENDS HERE******************************************************** */

/*********************************************Add Job******************************************************** */

private function addJob($runData){
    //before adding job check if job details already exist for this current id 

    $employee_id = strval($runData -> l);
    $query  = "SELECT emp_id FROM hr_job WHERE emp_id ='$employee_id'";
    $respEntry = $this->checkEntry($query);
    switch ($respEntry->is_entry) {
        case 'true': // entry already exist then UPDATE the entry 
            $query  = "UPDATE hr_job AS emp SET job_title=?,job_category=?,sub_unit=?,location=?,employment_startDate=?,employment_endDate=?,joined_date=? WHERE emp.emp_id=?"; 
            $response=$this->pdo->prepare($query)->execute([$runData->b,$runData->c,$runData->d,$runData->e,$runData->f,$runData->g,$runData->h,$runData->l]);
            return $response;
        case 'false': // entry does not exist then INSERT the entry 
            $query     = "INSERT INTO hr_job(emp_id,job_title,job_category,sub_unit,location,joined_date,employment_startDate,employment_endDate) VALUES (:emp_id, :job_title, :job_category,:sub_unit,:location,:joined_date,:employment_startDate,:employment_endDate)";
            $statement = $this->pdo->prepare($query);
            $statement->execute
                ([
                    ':emp_id'                => $runData-> l,
                    ':job_title'             => $runData -> b,   
                    ':job_category'          => $runData -> c,
                    ':sub_unit'              => $runData -> d,
                    ':location'              => $runData -> e,
                    ':joined_date'           => $runData -> h,
                    ':employment_startDate'  => $runData -> f,
                    ':employment_endDate'    => $runData -> g,
                ]);
                if ($statement -> rowCount() > 0){
                    return "Job Details Added Successfully";
                } else{
                    return "Job Details failed to save";
                } 
                    
        }
        

   }
/*********************************************ADD JOB ENDS HERE******************************************************** */

/*********************************************DEPENDENT******************************************************** */
   private function addDependent($runData){
    $query     = "INSERT INTO hr_dependent(emp_id,name,relationship,birthdate) VALUES (:emp_id, :name, :relationship,:birthdate)";
    $statement = $this->pdo->prepare($query);
    $statement->execute
        ([
            ':emp_id'          => $runData-> l,
            ':name'            => $runData -> b,
            ':relationship'    => $runData -> c,
            ':birthdate'        => $runData -> d,
        ]);
        if ($statement -> rowCount() > 0){
            return "Dependent Added Successfully";
        }   
            return "Dependent failed to save";
}

/*********************************************DEPENDENTS******************************************************** */

/*********************************************NEXT OF KIN******************************************************** */
   //Emergency Contacts
   private function addnok($runData){
    $query     = "INSERT INTO hr_next_of_kin(emp_id,name,relationship,home_tel,mobile,work_tel) VALUES (:emp_id, :name, :relationship,:home_tel, :mobile, :work_tel)";
    $statement = $this->pdo->prepare($query);
    $statement->execute
        ([
            ':emp_id'          => $runData-> l,
            ':name'            => $runData -> b,
            ':relationship'    => $runData -> c,
            ':home_tel'        => $runData -> d,
            ':mobile'          => $runData -> e,
            ':work_tel'        => $runData -> f,
        ]);
        if ($statement -> rowCount() > 0){
            return "Next of Kin Added Successfully";
        }   
            return "Next of Kin failed to save";
}

/*********************************************NEXT OF KIN******************************************************** */


/*********************************************EMERGENCY MODULE******************************************************** */
   //Emergency Contacts
    private function addEmergencyContact($runData){
        $query     = "INSERT INTO hr_emergency_contact(emp_id,name,relationship,home_tel,mobile,work_tel) VALUES (:emp_id, :name, :relationship,:home_tel, :mobile, :work_tel)";
        $statement = $this->pdo->prepare($query);
        $statement->execute
            ([
                ':emp_id'          => $runData-> l,
                ':name'            => $runData -> b,
                ':relationship'    => $runData -> c,
                ':home_tel'        => $runData -> d,
                ':mobile'          => $runData -> e,
                ':work_tel'        => $runData -> f,
            ]);
            if ($statement -> rowCount() > 0){
                return "Contact Added Successfully";
            }   
                return "Contact failed to save";
    }

/*********************************************EMERGENCY MODULE******************************************************** */

/*********************************************UPLOAD ATTACHMENT******************************************************** */
    //uploadAttachment
    private function uploadAttachment($runData, $folderPath){
      $path = realpath(dirname(__FILE__));
      $attachmentFolder = $path.'//attachment//'.$folderPath."//";
      $extension = pathinfo($runData->b["name"], PATHINFO_EXTENSION);
      $attachmentName = "empId-".$runData->c.'.'.$extension ;
          //check if file1 is an image
               if(in_array(strtolower($extension),$this->fileExtension)){
                  if(move_uploaded_file($runData->b['tmp_name'],  $attachmentFolder.$attachmentName )){
                   $res=$this->savedAttachment($attachmentName, $runData);
                    return $res;     
                  } else{   
                     return "failed";
                 }
               }else {
                return "Wrong File Selected. Only accept JPG, JPEG, PDF";
               }
    }
    //insert into attachment table
   private function savedAttachment($attachment_name,$runData)
    {
        // check entry
        $query  = "SELECT * FROM hr_attachment WHERE emp_id=:emp_id AND attachment_name=:attachment_name AND from_page=:from_page";
        $statement = $this->pdo->prepare($query);
        $statement->execute
        ([":emp_id" => $runData->c,
           ":attachment_name" => $attachment_name,
           ":from_page"=> $runData -> k
        ]);
        if($statement->rowCount() > 0){
            return "File Updated successfully";
        };

        // insert to hr attachment
        $query     = "INSERT INTO hr_attachment(emp_id,attachment_name,from_page,comment) VALUES (:emp_id, :attachment_name, :from_page,:comment)";
        $statement = $this->pdo->prepare($query);
        $statement->execute
            ([
                ':emp_id'            => $runData->c,
                ':attachment_name'   => $attachment_name,
                ':from_page'         => $runData -> k,
                ':comment'           => $runData -> d,
            ]);
            return "File Uploded successfully";;
    }

/*********************************************UPLOAD ATTACHMENT******************************************************** */
 

 //getEmployeeLastId
 function getEmployeeLastId() {   
    $query  = "SELECT MAX(id) FROM hr_employee"; 
    $result = $this->pdo->prepare($query);
    $result->execute([]);
    if ($result -> rowCount() > 0)
    {
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $result -> fetchall();
        $response = $result;
        return $response;
    }
 else
    {
        return "0";
    }
}


//update Employee personal details
   private function updateEmployeePersonalDetails($runData){
     $query  = "UPDATE hr_employee AS emp SET emp_lastname=?,emp_firstname=?,emp_middle_name=?,emp_birthday=?,emp_gender=?,emp_other_id=?,emp_dri_lice_num=?,emp_dri_lice_exp_date=?,emp_country=? WHERE emp.id=?"; 
     $response=$this->pdo->prepare($query)->execute([$runData->d,$runData->b,$runData->c,$runData->i,$runData->j,$runData->e,$runData->f,$runData->g,$runData->h,$runData->l]);
     return $response;
   }
   //update employee contact details
   private function updateEmployeeContactDetails($runData){
    $query  = "UPDATE hr_employee AS emp SET emp_street1=?,emp_street2=?,city_code=?,provin_code=?,emp_zipcode=?,emp_hm_telephone=?,emp_mobile=?,emp_work_telephone=?,emp_work_email=?,emp_oth_email=? WHERE emp.id=?"; 
    $response=$this->pdo->prepare($query)->execute([$runData->b,$runData->c,$runData->d,$runData->e,$runData->f,$runData->g,$runData->h,$runData->i,$runData->j,$runData->m,$runData->l]);
   return $response;
   }

    //get all employee
    private function getEmployeeById($runData) {   
        $query  = "SELECT * FROM hr_employee AS e WHERE e.id = :id"; 
        $result = $this->pdo->prepare($query);
        $result->execute([":id" => $runData->b ]);
        if ($result -> rowCount() > 0)
        {
            $result -> setFetchMode(PDO::FETCH_ASSOC);
            $result = $result -> fetchall();
            $response = $result;
            return $response;
        }
     else
        {
            return "0";
        }
    }


     //get all employee
    private function getEmployee() {   
        $query  = "SELECT * FROM hr_employee ORDER BY id DESC"; 
        $result = $this->pdo->prepare($query);
        $result->execute([]);
        if ($result -> rowCount() > 0)
        {
            $result -> setFetchMode(PDO::FETCH_ASSOC);
            $result = $result -> fetchall();
            $response = $result;
            return $response;
        }
     else
        {
            return "";
        }
    }

   //add emplyee
   private function addEmployee($runData)
    {
        $response = new stdClass();

        //check entry for create user login
        if(($runData -> b) === "true"){
            $username = strval($runData -> g);
            $query  = "SELECT username FROM hr_user WHERE username ='$username'";
            $respEntry = $this->checkEntry($query);
            if($respEntry -> is_entry === "true"){
                return $this -> responseData("error", 400, "Username already taken");  
            }
        }

        //check entry for employee
        $employee_id = strval($runData -> f);
        $query  = "SELECT employee_id FROM hr_employee WHERE employee_id ='$employee_id' ";
        $respEntry = $this->checkEntry($query);
        switch ($respEntry->is_entry) {
            case 'false':
                /** create new entry */
                $query     = "INSERT INTO hr_employee(employee_id, emp_lastname, emp_firstname, emp_middle_name) VALUES (:employee_id, :emp_lastname, :emp_firstname, :emp_middle_name
                )";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        ':employee_id'     => $runData -> f,
                        ':emp_lastname'    => $runData -> d,
                        ':emp_firstname'   => $runData -> c,
                        ':emp_middle_name' => $runData -> e
                    ]);
                        if ((($statement->rowCount()) > 0) && (($runData -> b) === "true")){
                             //FETCH THE ID OF THE JUST INSERTED EMPLOYEE
                             $query  = "SELECT id FROM hr_employee WHERE employee_id ='$employee_id' ";
                             $respEntry = $this->checkEntry($query);
                            //create user login
                            $respCreateUserlogin = $this->createUserLogin($runData);
                                if ($respCreateUserlogin == "true"){  
                                    return $this->responseData("success", $respEntry->resultData, "employee added successfully and User login is created!!!");  
                                }else{
                                    return $this->responseData("success", $respEntry->resultData, "employee added successfully but error in creating user login");  
                                }
                            }
                        if ((($statement->rowCount()) > 0) && (($runData -> b) === "false")){
                            $query  = "SELECT id FROM hr_employee WHERE employee_id ='$employee_id' ";
                            $respEntry = $this->checkEntry($query);
                            return $this->responseData("success", $respEntry->resultData, "employee added successfully, User login not created!!!" );
                            }  
                        else
                            {
                            return $this->responseData("error", 400, "Something wrong, employee cannot be added!!!" );  
                            }
                break;
            case 'true':
                return $this->responseData("error", 400, "Employee already exist");  
            default:
            return $this->responseData("error", 400, "Something wrong, response entry cannot be determined!!!" );  
            }

    }//end of add employee





    private function createUserLogin($runData){
    $query     = "INSERT INTO hr_user(username, password, role_id, status) VALUES (:username, :password, :role_id, :status)";
    $statement = $this->pdo->prepare($query);
    $statement->execute
        ([
            ':username'   => $runData -> g,
            ':password'   => $runData -> h,
            ':role_id'    => 4, //employee
            ':status'     => $runData -> i, 
        ]);
        if (($statement->rowCount()) > 0){
            return "true";
        }
        return "false";
}





/** check duplicte entry */
private function checkEntry($query){
    $result = $this->pdo->prepare($query);
    $result->execute([]);
    return $this->validateResponse($result);
}



/** validate database response */
private function validateResponse($result){
    $respValidate= new stdClass();
    if ($result -> rowCount() > 0)
        {
            $result -> setFetchMode(PDO::FETCH_ASSOC);
            $result = $result -> fetchall();
            $respValidate->resultData = $result;
            $respValidate->is_entry = "true";
            return $respValidate;
        }
     else
        {
            $respValidate->is_entry = "false";
            return $respValidate;
        }

}

//response Data
private function responseData($status, $code, $message){
    $respData= new stdClass();
    $respData->message = $message;
    $respData->status = $status;
    $respData->code = $code;
    return $respData;
}



}




?>