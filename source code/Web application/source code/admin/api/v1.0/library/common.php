<?php
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the common files used in the application
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
	class Common extends Application{
		function renderHtml($data,$mode='add',$value='',$class='',$id='',$extra=''){
			$type="";
			$name="";
			$placeholder="";
			$required="";
			$current_values="";
			if(isset($data['type'])) $type=$data['type'];
			if(isset($data['form_field_name'])) $name=$data['form_field_name'];
			if(isset($data['placeholder'])) $placeholder=$data['placeholder'];
			if(isset($data['required'])) $required=$data['required'];
			if(isset($data['eum_values'])) $current_values=$data['eum_values'];
			$html="";
			$required_filed="";
			if($required=="1"){
				$required_filed="required";
			}
			if($type=='text' || $type=='hidden' || $type=='email' || $type=='number' || $type=='password'){
				$html='<input id="'.$name.'" class="'.$class.'" type="'.$type.'" name="'.$name.'" value="'.$value.'"   '.$required_filed.' '.$extra.'/>';
                if($type!='hidden') $html.='<label for="'.$name.'">'.$placeholder.'</label>';
			}else if($type=='textarea'){
                $html='<textarea id="'.$name.'" class="materialize-textarea" name="'.$name.'">'.$value.'</textarea>';
                $html.='<label for="'.$name.'">'.$placeholder.'</label>';
            }else if($type=='enum'){
				
				$current_values=rtrim($current_values,",");
				$enum=explode(";",$current_values);
				$html='<select name="'.$name.'">';
                $html.='<option value="" >'.$placeholder.'</option>';
				for($v=0;$v<count($enum);$v++){
					$selected='';
					if($enum[$v]==$value) $selected='selected';
					$html.='<option value="'.$enum[$v].'" '.$selected.'>'.$enum[$v].'</option>';
				}
				$html.='</select>';
			}else if($type=="select"){
                $html='<select name="'.$name.'" class="'.$name.'">';
                $html.='<option value="">'.$placeholder.'</option>';
                foreach($value as $val){
                    $selected="";
                    if($val['selected']=='true') $selected='selected';
                    $html.='<option value="'.$val['foreign_primary'].'" '.$selected.'>'.$val['display_val'].'</option>';
                }
                $html.='</select>';
                $html.='<label>'.$placeholder.'</label>';
            }else if($type=="file"){
                $html='<div class="file-field input-field">';
                $html.='<div class="btn">
										<span>File</span>
										<input type="file">';
                $html.='<input type="file" name="'.$name.'[]" multiple="multiple"/>';
                $html.='</div>';
                $html.='<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									  </div>
									</div>';
            }else if($type=="submit" || $type=='reset'){
                $html='<button class="btn waves-effect waves-light '.$class.'" type="'.$type.'">'.$placeholder.'</button>';
            }else if($type=="date"){ // DATEPICKER
                $html='<input id="'.$name.'" class="datepicker" type="'.$type.'" name="'.$name.'" value="'.$value.'"   '.$required_filed.' '.$extra.'/>';
                $html.='<label for="'.$name.'">'.$placeholder.'</label>';
            }else if($type=="radio"){ // RADIO BUTTON
                $html="<div>$placeholder</div>";
                $radios=explode(";",$current_values);
                for($i=0;$i<count($radios);$i++){
                    $selected="";
                    $radio_val=explode(":",$radios[$i]);
                    if($radio_val[1]==$value) $selected='checked';
                    
                    $html.='<input id="radio'.$i.'" type="'.$type.'" class="with-gap" name="'.$name.'" value="'.$radio_val[1].'"   '.$required_filed.' '.$extra.' '.$selected.'/>';
                    $html.='<label for="radio'.$i.'">'.$radio_val[0].'</label>';
                }
                
                
            }else if($type=='image'){

                $html='<div class="">';
                if($value!=""){
                    $html.='<img src="'.UPLOAD_IMAGE_URL.$value.'" width="100px;"/><br/>';
                }
                $html.=$placeholder."<br/>";
$width=10;
$height=10;
                foreach($extra as $ex){
                    $width=$ex->width;
                    $height=$ex->height;
                }
                $html.="Best Image size, width : ".$width." - Height : ".$height."<br/>";
                $html.='<div ng-controller="ImageCropperCtrl as ctrl">
    <input type="file" img-cropper-fileread image="cropper.sourceImage" />
    <div>
      <canvas width="500" height="300" id="canvas" image-cropper image="cropper.sourceImage" cropped-image="cropper.croppedImage" crop-width="'.$width.'" crop-height="'.$height.'" min-width="100" min-height="50" keep-aspect="true" crop-area-bounds="bounds"></canvas>
    </div>
      <input type="hidden" value="{{cropper.croppedImage}}" name="'.$name.'"/>
  </div>';
                $html.="</div>";
            }else{
                $html='<input id="'.$name.'" class="'.$class.'" type="'.$type.'" name="'.$name.'" value="'.$value.'"  placeholder="" '.$required_filed.' '.$extra.'/>';
                $html.='<label for="'.$name.'">'.$placeholder.'</label>';
            }
			return $html;
		}

		function getFields($table,$where=array()){
            $result=array();
            $from=array(SMARTY_TABLE."fields fld",SMARTY_TABLE."tables tbl");

            $where['tbl.table_name =']=$table;
			$where['tbl.table_id =']="`fld`.`table_id`";

            $select=array("tbl.table_name","fld.*");

           $sql=$this->prepareSearch($from,$where,$select,array('ASC'=>'priority'));
            $fields_list=$this->executeQuery($sql);
            foreach($fields_list as $field){
               $result[$field['form_field_name']]=$field;
            }

            return $result;
		}





        function getDate($date,$format="Y-m-d"){
            return date($format,strtotime($date));
        }

		function getData($from,$where=array(),$select=array(),$order=array(),$page=0,$limit=0){
			$sql=$this->prepareSearch($from,$where,$select,$order,$page,$limit);
//echo $sql;
			return $this->executeQuery($sql);
		}

        // UPLOAD FILES
        function uploadFilesOld($file,$fieldName,$destination)
        {
            $filenames="";
            if(($file[$fieldName]['name'][0])!="")
            {

                $filenames.="[";
                if(count($file[$fieldName]['size']>1))
                {
                    for($j=0;$j<count($file[$fieldName]['name']);$j++)
                    {
                        $RandomNumber = time().rand(0,99);
                        $target_file = basename($_FILES[$fieldName]['name'][$j]);
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        $filename_extension = $RandomNumber.".".$imageFileType;
                        $path="documents/";
                        $document_type="image";
                        $result = move_uploaded_file($_FILES[$fieldName]['tmp_name'][$j], $destination . "$filename_extension");
                        $filenames.='{"filename":"'.$filename_extension.'","extension":"'.$imageFileType.'","path":"'.$path.'","document_type":"'.$document_type.'"},';
                    }
                }
             //
            }
            $filenames=rtrim($filenames,",")."]";

            return json_decode($filenames,true);
        }
        
        
        
        function fileUpload($file,$fieldName,$destination)
        {
            $filenames="";
            if(($file[$fieldName]['name'][0])!="")
            {
                if(count($file[$fieldName]['size']>1))
                {
                    for($j=0;$j<count($file[$fieldName]['name']);$j++)
                    {
                        $RandomNumber = time().rand(0,99);
                        $target_file = basename($_FILES[$fieldName]['name'][$j]);
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        $filename_extension = $RandomNumber.".".$imageFileType;
                        
                        $result = move_uploaded_file($_FILES[$fieldName]['tmp_name'][$j], $destination . "$filename_extension");
                        $filenames.=$filename_extension.';';
                    }
                }
             //
            }
            $filenames=rtrim($filenames,";");

            return $filenames;
        }
        
        

        function imageUpload($img,$destination,$extension="png"){
            
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file_name=date('mdhiYs').rand(9,99).'.png';
                $file = $destination.$file_name;
                $success = file_put_contents($file, $data);
                if($success){
                    return $file_name;
                }else{
                    return false;
                }
            
        }

        

        function getViewDocument($foreign_key,$foreign_value,$show="small",$class=""){
            $html = "";
            $where=array();
            $where['foreign_key']=$foreign_key;
            $where['foreign_value']=$foreign_value;
            $document=$this->getData('sm_documents',$where);
            if($document!=0) {
                foreach ($document as $doc) {
                        $html .= '<a href="' . BASE_URL . $doc['path'] . $doc['file_name'] . '">Document</a>';

                }
            }
            return $html;
        }
        function displayObj($field){
            $display=false;
            if($field['display_list']==1){
                if($field['primary_key']!=1){
                    $display=true;
                }
            }
            return $display;
        }

        function checkPermission(){
            $permission=false;
            if(isset($_SESSION['ADMIN_USER_SESSION']) && !empty($_SESSION['ADMIN_USER_SESSION'])){
                $permission=true;
            }
            return $permission;
        }

        function cleanInput($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function validate($data,$type,$required,$minLength=0,$maxLength=0){
            $result=false;
            switch($type){
                case 'text': $pattern = "/^[a-zA-Z0-9\_]{2,20}/"; break;
                case 'number': $pattern = "/^[0-9\_]/"; break;
                case 'email': $pattern = '/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/'; break;
                default: $pattern="";
            }
            $match=preg_match($pattern,$data);

            if($required=='no'){
                if($match){
                    $result=true;
                }
            }else{
                if(!empty($data)){
                    if($match){
                        $result=true;
                    }
                }
            }
            return $result;
        }

		function clean($string) {
           $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
           return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }

	}
?>