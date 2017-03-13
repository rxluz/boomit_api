<?php


Validator::extend('exists_in_array', function ($attribute, $value, $parameters, $validator) {
  if(!is_array($value)){
    return false;
  }

  $and=isset($parameters[2]) && isset($parameters[3])
    ?  " AND ".$parameters[2]." = '".$parameters[3]. "'"
    : "";

  foreach($value as $val){
     $exists_db = DB::select('select * from '.$parameters[0].' where '.$parameters[1].' = "'.$val.'"'.$and);

     if(!$exists_db){
       return false;
     }
  }
  return true;
});

Validator::extend('days_name', function ($attribute, $value, $parameters, $validator) {
  $days_name_list=array("sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "holiday");
  return in_array($value, $days_name_list);
});

Validator::extend('google_type_names', function ($attribute, $value, $parameters, $validator) {
  $google_type_names=array("administrative_area_level_1", "administrative_area_level_2", "administrative_area_level_3", "administrative_area_level_4", "administrative_area_level_5", "colloquial_area", "country", "geocode", "intersection", "locality", "natural_feature", "neighborhood", "political", "point_of_interest", "post_box", "postal_code",

  "postal_code_prefix", "postal_code_suffix", "postal_town", "premise",  "route", "street_address",


   "sublocality", "sublocality_level_4", "sublocality_level_5", "sublocality_level_3", "sublocality_level_2", "sublocality_level_1",

  "subpremise", "transit_station"
);
  return in_array($value, $google_type_names);
});


Validator::extend('hour_greater_than', function ($attribute, $value, $parameters, $validator) {
  $days_name_list=array("sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "holiday");
  return in_array($value, $days_name_list);
});


Validator::extend('hour_greater_than', function ($attribute, $value, $parameters, $validator) {
  $thisTime=$value;
  $smallerTime=$validator->getData()[$parameters[0]];
  if(strtotime($smallerTime) > strtotime($thisTime)){
    $validator->errors()->add('hour_greater_than', 'hour_greater_than('.$attribute.'):'.$parameters[0].'('.$smallerTime.')');
    return false;
  }

  return true;

});

Validator::extend('hour_smaller_than', function ($attribute, $value, $parameters, $validator) {
  $thisTime=$value;
  $biggerTime=$validator->getData()[$parameters[0]];
  if(strtotime($biggerTime) < strtotime($thisTime)){
    $validator->errors()->add('hour_smaller_than', 'hour_smaller_than('.$attribute.'):'.$parameters[0].'('.$biggerTime.')');
    return false;
  }

  return true;
});



Validator::extend('cnpj', function ($attribute, $value, $parameters, $validator) {
  $cnpj = preg_replace('/[^0-9]/', '', (string) $value);
  // Valida tamanho
  if (strlen($cnpj) != 14)
    return false;
  // Valida primeiro dígito verificador
  for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
  {
    $soma += $cnpj{$i} * $j;
    $j = ($j == 2) ? 9 : $j - 1;
  }
  $resto = $soma % 11;
  if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
    return false;
  // Valida segundo dígito verificador
  for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
  {
    $soma += $cnpj{$i} * $j;
    $j = ($j == 2) ? 9 : $j - 1;
  }
  $resto = $soma % 11;
  return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
});


Validator::extend('array_different', function ($attribute, $value, $parameters, $validator) {
  if(!is_array($value)){
    return false;
  }

  $x=0;
  $ret=true;

  foreach($value as $val){
    $y=0;
    foreach($value as $valcomp){
      if($valcomp==$val && $x!=$y){
        $validator->errors()->add('array_different', 'array_different:'.$attribute.'['.$x.']');
        $ret=false;
      }
      $y++;
    }
    $x++;
  }

  return $ret;
});

Validator::extend('unique_with', function ($attribute, $value, $parameters, $validator) {

  $and="";
  $and_info="with:";
  $x=3;
  $stop=false;

  $table=false;
  $tablefield=false;
  $fieldvalue=$value;

  $update_id=false;


  foreach($parameters as $param){
    $and_info.=$param.",";
    if(substr($param, 0, strlen("table@")) === "table@"){
      $table=str_replace("table@", "", $param);
    }

    if(substr($param, 0, strlen("tablefield@")) === "tablefield@"){
      $tablefield=str_replace("tablefield@", "", $param);
    }

    if(substr($param, 0, strlen("field@")) === "field@"){
      $tablefield=str_replace("field@", "", $param);
    }

    if(substr($param, 0, strlen("update@")) === "update@"){
      $param=str_replace("update@", "", $param);
      $update_id=Route::current()->getParameter($param);
    }

    if(substr($param, 0, strlen("request@")) === "request@"){
      $param=str_replace("request@", "", $param);
      $and.=" AND $param = '".$validator->getData()[$param]."'";
    }

    if(substr($param, 0, strlen("param@")) === "param@"){
      $param=str_replace("param@", "", $param);
      $and.=" AND $param = '".Route::current()->getParameter($param)."'";
    }
  }


  $exists_db = DB::select('select * from '.$table.' where '.$tablefield.' = "'.$fieldvalue.'" '.$and);

  //$update_id=$parameters[0] != "none" ? Route::current()->getParameter($parameters[0]) : 0;


  if($exists_db && $update_id!=$exists_db[0]->id){
    $validator->errors()->add('unique_with', 'unique:'.$attribute.'('.$and_info.')');
    return false;
  }

  return true;
});


Validator::extend('unique_w', function ($attribute, $value, $parameters, $validator) {

  $errors="";
  foreach($parameters as $param){
    $errors=$errors.$param.",";
    if(substr($param, 0, strlen("table=")) === "table="){
      $param=str_replace("table=", "", $param);
      $table=$param;
    }

    if(substr($param, 0, strlen("field=")) === "field="){
      $param=str_replace("field=", "", $param);
      $field=$param;
    }

    if(substr($param, 0, strlen("value=")) === "value="){
      $param=str_replace("value=", "", $param);
      $value=$param;
    }

    if(substr($param, 0, strlen("and=")) === "and="){
      $param=str_replace("and=", "", $param);
      $and=$param;
    }

    if(substr($param, 0, strlen("and_value=")) === "and_value="){
      $param=str_replace("and_value=", "", $param);
      $and_value=$param;
    }

    if(substr($param, 0, strlen("except=")) === "except="){
      $param=str_replace("except=", "", $param);
      $except=$param;
    }


  }


  if(isset($and_value)){
    if(substr($and_value, 0, strlen("const@")) === "const@"){
      $and_value=str_replace("const@", "", $and_value);
      $and_value=defined($and_value) ? constant($and_value) : undefined;
    }

    if(substr($and_value, 0, strlen("param@")) === "param@"){
      $and_value=str_replace("param@", "", $and_value);
      $and_value=Route::current()->getParameter($and_value);

    }

    if(substr($and_value, 0, strlen("request@")) === "request@"){
      $and_value=str_replace("request@", "", $and_value);
      $and_value=$validator->getData()[$and_value];
    }

  }

  if(isset($except)){
    if(substr($except, 0, strlen("const@")) === "const@"){
      $except=str_replace("const@", "", $except);
      $except=defined($except) ? constant($except) : undefined;
    }

    if(substr($except, 0, strlen("param@")) === "param@"){
      $except=str_replace("param@", "", $except);
      $except=Route::current()->getParameter($except);
    }

    if(substr($except, 0, strlen("request@")) === "request@"){
      $except=str_replace("request@", "", $except);
      $except=$validator->getData()[$except];
    }
  }

  if(substr($value, 0, strlen("const@")) === "const@"){
    $value=str_replace("const@", "", $value);
    $value=defined($value) ? constant($value) : undefined;
  }


  if(substr($value, 0, strlen("param@")) === "param@"){
    $value=str_replace("param@", "", $value);
    $value=Route::current()->getParameter($value);
  }

  if(substr($value, 0, strlen("request@")) === "request@"){
    $value=str_replace("request@", "", $value);
    $value=$validator->getData()[$value];
  }



  $valid=isset($table) && isset($field) && isset($value);

  $and_query=
    isset($and) && isset($and_value)
    ? ' AND '.$and.' = "'.$and_value.'"'
    : "";

  $except=$except ?? false;


  if($valid){
    $exists_db = DB::select('select * from '.$table.' where '.$field.' = "'.$value.'" '.$and_query);

    if($exists_db && $except!=$exists_db[0]->id){
      $validator->errors()->add('unique_with', 'unique:'.$attribute.'('.$errors.')');
      return false;
    }
  }



  return true;
});



/* NOT TESTED */
Validator::extend('exists_with', function ($attribute, $value, $parameters, $validator) {

  $and="";
  $and_info="with:";
  $x=3;
  $stop=false;

  $table=false;
  $tablefield=false;
  $fieldvalue=$value;

  $update_id=false;


  foreach($parameters as $param){
    $and_info.=$param.",";
    if(substr($param, 0, strlen("table@")) === "table@"){
      $table=str_replace("table@", "", $param);
    }

    if(substr($param, 0, strlen("tablefield@")) === "tablefield@"){
      $tablefield=str_replace("tablefield@", "", $param);
    }

    if(substr($param, 0, strlen("update@")) === "update@"){
      $param=str_replace("update@", "", $param);
      $update_id=Route::current()->getParameter($param);
    }

    if(substr($param, 0, strlen("request@")) === "request@"){
      $param=str_replace("request@", "", $param);
      $and.=" AND $param = '".$validator->getData()[$param]."'";
    }

    if(substr($param, 0, strlen("param@")) === "param@"){
      $param=str_replace("param@", "", $param);
      $and.=" AND $param = '".Route::current()->getParameter($param)."'";
    }
  }


  $exists_db = DB::select('select * from '.$table.' where '.$tablefield.' = "'.$fieldvalue.'" '.$and);

  //$update_id=$parameters[0] != "none" ? Route::current()->getParameter($parameters[0]) : 0;


  if($exists_db && $update_id!=$exists_db[0]->id){

    return true;
  }

  $validator->errors()->add('exists_with', 'unique:'.$attribute.'('.$and_info.')');
  return false;
});



Validator::extend('array_between', function ($attribute, $value, $parameters, $validator) {
  if(!is_array($value)){
    return false;
  }


  $ret=true;
  $x=0;
  foreach($value as $val){
    if($val<$parameters[0] || $val>$parameters[1]){
      $validator->errors()->add('array_between', 'array_between:'.$attribute.'['.$x.'](min:'.$parameters[0].'|max:'.$parameters[1].')');
      $ret=false;
    }
    $x++;
  }
  return $ret;
});

Validator::extend('allowed_if_super_admin', function ($attribute, $value, $parameters, $validator) {
  $analyse=ADMIN_MODE==TRUE && USER_PETSHOP ==FALSE ? true : false;
  if(
    ADMIN_MODE==TRUE
    && USER_PETSHOP == TRUE
    &&
    (
      $value == $parameters[0]
      || $value==""
      || $value=="null"
    )
  ){
    $analyse=true;
  }
  if(!$analyse){
    header(true, true, 403);
    exit;
  }
  return true;
});

Validator::extend('not_allowed_if', function ($attribute, $value, $parameters, $validator) {
  $value_check=$validator->getData()[$parameters[0]];
  return $value_check == $parameters[1] && $value!==null && $value!="" && $value!="null" ? false : true;
});


Validator::extend('google_address', function ($attribute, $value, $parameters, $validator) {
  return true;
});


Validator::extend('base64', function ($attribute, $value, $parameters, $validator) {
    return preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $value) ? true : false;
});

Validator::extend('base64_image', function ($attribute, $value, $parameters, $validator) {
  return true;
});
