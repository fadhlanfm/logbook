<?php
include_once('../Connection/conn.php');
date_default_timezone_set("Asia/Jakarta");
session_start();
// $grup=$_POST['grup'];

$survey_name=$_POST['surveyname'];
$username=$_POST['username'];
$unit_name=$_POST['unit'];
$group_name=$_POST['grup'];

$mydate=getdate(date("U"));
$jam = date('H:i:s a');
$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
$last = mysql_query("SELECT id_answer FROM survey_answer ORDER BY id_answer DESC LIMIT 1;");

$last_ = mysql_fetch_assoc($last);
$checks=mysql_num_rows($last);
if ($checks>0) {
	# code...
	$last_2=$last_['id_answer']+1;
	

} else {
	$last_=0;
	
}


if($_POST['submit']=='simpan')      { 
	if($_POST['grup']) {

		$survey_name=$_POST['surveyname'];
		$unit_name=$_POST['unit'];
		$id_2=$last_['id_answer']+1;
		

		// if ranking choice
		
		if (isset($_POST['rank1'])&&!empty($_POST['rank1'])) {

			$answer41=$_POST['rank1'];
			$question41=$_POST['question41'];
			$type41=$_POST['tipe41'];
			$id_41=$id_2++;
			$i=0;
			foreach($answer41 as $ans41){
				
				$result['x1']=$ans41;
				$x1=$result['x1'];
				echo $x1	;
				echo " <br/>";
				echo $question41;
				echo " <br/>";
				echo $type41;
				echo " <br/>";
				echo $id_41;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer ( username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question41', '$type41' ,'$x1', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
				
			}
			
		}
		if (isset($_POST['rank2']) && !empty(($_POST['rank2']))) {
			
			$answer42=$_POST['rank2'];
			$question42=$_POST['question42'];
			$type42=$_POST['tipe42'];
			$id_42=$id_2++;
			
			foreach($answer42 as $ans42){
				
				$result['x2']=$ans42;
				$x2=$result['x2'];
				echo $x2	;
				echo " <br/>";
				echo $question42;
				echo " <br/>";
				echo $type42;
				echo " <br/>";
				echo $id_42;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question42', '$type42' ,'$x2', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank3'])&&!empty($_POST['rank3'])) {

			$answer43=$_POST['rank3'];
			$question43=$_POST['question43'];
			$type43=$_POST['tipe43'];
			$id_43=$id_2++;
			$i=0;
			foreach($answer43 as $ans43){
				
				$result['x3']=$ans43;
				$x3=$result['x3'];
				echo $x3	;
				echo " <br/>";
				echo $question43;
				echo " <br/>";
				echo $type43;
				echo " <br/>";
				echo $id_43;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question43', '$type43' ,'$x3', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank4'])&&!empty($_POST['rank4'])) {

			$answer44=$_POST['rank4'];
			$question44=$_POST['question44'];
			$type44=$_POST['tipe44'];
			$id_44=$id_2++;
			$i=0;
			foreach($answer44 as $ans44){
				
				$result['x4']=$ans44;
				$x4=$result['x4'];
				echo $x4	;
				echo " <br/>";
				echo $question44;
				echo " <br/>";
				echo $type44;
				echo " <br/>";
				echo $id_44;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question44', '$type44' ,'$x4', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank5'])&&!empty($_POST['rank5'])) {

			$answer45=$_POST['rank5'];
			$question45=$_POST['question45'];
			$type45=$_POST['tipe45'];
			$id_45=$id_2++;
			$i=0;
			foreach($answer45 as $ans45){
				
				$result['x5']=$ans45;
				$x5=$result['x5'];
				echo $x5	;
				echo " <br/>";
				echo $question45;
				echo " <br/>";
				echo $type45;
				echo " <br/>";
				echo $id_45;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question45', '$type45' ,'$x5', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank6'])&&!empty($_POST['rank6'])) {

			$answer46=$_POST['rank6'];
			$question46=$_POST['question46'];
			$type46=$_POST['tipe46'];
			$id_46=$id_2++;
			$i=0;
			foreach($answer46 as $ans46){
				
				$result['x6']=$ans46;
				$x6=$result['x6'];
				echo $x6	;
				echo " <br/>";
				echo $question46;
				echo " <br/>";
				echo $type46;
				echo " <br/>";
				echo $id_46;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question46', '$type46' ,'$x6', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank7'])&&!empty($_POST['rank7'])) {

			$answer47=$_POST['rank7'];
			$question47=$_POST['question47'];
			$type47=$_POST['tipe47'];
			$id_47=$id_2++;
			$i=0;
			foreach($answer47 as $ans47){
				
				$result['x7']=$ans47;
				$x7=$result['x7'];
				echo $x7	;
				echo " <br/>";
				echo $question47;
				echo " <br/>";
				echo $type47;
				echo " <br/>";
				echo $id_47;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question47', '$type47' ,'$x7', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank8'])&&!empty($_POST['rank8'])) {

			$answer48=$_POST['rank8'];
			$question48=$_POST['question48'];
			$type48=$_POST['tipe48'];
			$id_48=$id_2++;
			$i=0;
			foreach($answer48 as $ans48){
				
				$result['x8']=$ans48;
				$x8=$result['x8'];
				echo $x8	;
				echo " <br/>";
				echo $question48;
				echo " <br/>";
				echo $type48;
				echo " <br/>";
				echo $id_48;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question48', '$type48' ,'$x8', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank9'])&&!empty($_POST['rank9'])) {

			$answer49=$_POST['rank9'];
			$question49=$_POST['question49'];
			$type49=$_POST['tipe49'];
			$id_49=$id_2++;
			$i=0;
			foreach($answer49 as $ans49){
				
				$result['x9']=$ans49;
				$x9=$result['x9'];
				echo $x9	;
				echo " <br/>";
				echo $question49;
				echo " <br/>";
				echo $type49;
				echo " <br/>";
				echo $id_49;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question49', '$type49' ,'$x9', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank10'])&&!empty($_POST['rank10'])) {

			$answer410=$_POST['rank10'];
			$question410=$_POST['question410'];
			$type410=$_POST['tipe410'];
			$id_410=$id_2++;
			$i=0;
			foreach($answer410 as $ans410){
				
				$result['x10']=$ans410;
				$x10=$result['x10'];
				echo $x10	;
				echo " <br/>";
				echo $question410;
				echo " <br/>";
				echo $type410;
				echo " <br/>";
				echo $id_410;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question410', '$type410' ,'$x10', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank11'])&&!empty($_POST['rank11'])) {

			$answer411=$_POST['rank11'];
			$question411=$_POST['question411'];
			$type411=$_POST['tipe411'];
			$id_411=$id_2++;
			$i=0;
			foreach($answer411 as $ans411){
				
				$result['x11']=$ans411;
				$x11=$result['x11'];
				echo $x11	;
				echo " <br/>";
				echo $question411;
				echo " <br/>";
				echo $type411;
				echo " <br/>";
				echo $id_411;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question411', '$type411' ,'$x11', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank12'])&&!empty($_POST['rank12'])) {

			$answer412=$_POST['rank12'];
			$question412=$_POST['question412'];
			$type412=$_POST['tipe412'];
			$id_412=$id_2++;
			$i=0;
			foreach($answer412 as $ans412){
				
				$result['x12']=$ans412;
				$x1=$result['x12'];
				echo $x12	;
				echo " <br/>";
				echo $question412;
				echo " <br/>";
				echo $type412;
				echo " <br/>";
				echo $id_412;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question412', '$type412' ,'$x12', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank13'])&&!empty($_POST['rank13'])) {

			$answer413=$_POST['rank13'];
			$question413=$_POST['question413'];
			$type413=$_POST['tipe413'];
			$id_413=$id_2++;
			$i=0;
			foreach($answer413 as $ans413){
				
				$result['x13']=$ans413;
				$x1=$result['x13'];
				echo $x13	;
				echo " <br/>";
				echo $question413;
				echo " <br/>";
				echo $type413;
				echo " <br/>";
				echo $id_413;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question413', '$type413' ,'$x13', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank14'])&&!empty($_POST['rank14'])) {

			$answer414=$_POST['rank14'];
			$question41=$_POST['question414'];
			$type414=$_POST['tipe414'];
			$id_414=$id_2++;
			$i=0;
			foreach($answer414 as $ans414){
				
				$result['x14']=$ans414;
				$x14=$result['x14'];
				echo $x14	;
				echo " <br/>";
				echo $question414;
				echo " <br/>";
				echo $type414;
				echo " <br/>";
				echo $id_414;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question414', '$type414' ,'$x14', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank15'])&&!empty($_POST['rank15'])) {

			$answer415=$_POST['rank15'];
			$question415=$_POST['question415'];
			$type415=$_POST['tipe415'];
			$id_415=$id_2++;
			$i=0;
			foreach($answer415 as $ans415){
				
				$result['x15']=$ans415;
				$x15=$result['x15'];
				echo $x15	;
				echo " <br/>";
				echo $question415;
				echo " <br/>";
				echo $type415;
				echo " <br/>";
				echo $id_415;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ( '$username', '$unit_name', '$survey_name', '$group_name', '$question415', '$type415' ,'$x15', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank16'])&&!empty($_POST['rank16'])) {

			$answer416=$_POST['rank16'];
			$question416=$_POST['question416'];
			$type416=$_POST['tipe416'];
			$id_416=$id_2++;
			$i=0;
			foreach($answer416 as $ans416){
				
				$result['x16']=$ans416;
				$x16=$result['x16'];
				echo $x16	;
				echo " <br/>";
				echo $question416;
				echo " <br/>";
				echo $type416;
				echo " <br/>";
				echo $id_416;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question416', '$type416' ,'$x16', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank17'])&&!empty($_POST['rank17'])) {

			$answer417=$_POST['rank17'];
			$question417=$_POST['question417'];
			$type417=$_POST['tipe417'];
			$id_417=$id_2++;
			$i=0;
			foreach($answer417 as $ans417){
				
				$result['x17']=$ans417;
				$x17=$result['x17'];
				echo $x17	;
				echo " <br/>";
				echo $question417;
				echo " <br/>";
				echo $type417;
				echo " <br/>";
				echo $id_417;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question417', '$type417' ,'$x17', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank18'])&&!empty($_POST['rank18'])) {

			$answer418=$_POST['rank18'];
			$question418=$_POST['question418'];
			$type418=$_POST['tipe418'];
			$id_418=$id_2++;
			$i=0;
			foreach($answer418 as $ans418){
				
				$result['x18']=$ans418;
				$x18=$result['x18'];
				echo $x18	;
				echo " <br/>";
				echo $question418;
				echo " <br/>";
				echo $type418;
				echo " <br/>";
				echo $id_418;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question418', '$type418' ,'$x18', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank19'])&&!empty($_POST['rank19'])) {

			$answer419=$_POST['rank19'];
			$question419=$_POST['question419'];
			$type419=$_POST['tipe419'];
			$id_419=$id_2++;
			$i=0;
			foreach($answer419 as $ans419){
				
				$result['x19']=$ans419;
				$x19=$result['x19'];
				echo $x19	;
				echo " <br/>";
				echo $question419;
				echo " <br/>";
				echo $type419;
				echo " <br/>";
				echo $id_419;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question419', '$type419' ,'$x19', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank20'])&&!empty($_POST['rank20'])) {

			$answer420=$_POST['rank20'];
			$question420=$_POST['question420'];
			$type420=$_POST['tipe420'];
			$id_420=$id_2++;
			$i=0;
			foreach($answer420 as $ans420){
				
				$result['x20']=$ans420;
				$x20=$result['x20'];
				echo $x20	;
				echo " <br/>";
				echo $question420;
				echo " <br/>";
				echo $type420;
				echo " <br/>";
				echo $id_420;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question420', '$type420' ,'$x20', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}

		if (isset($_POST['rank21'])&&!empty($_POST['rank21'])) {

			$answer421=$_POST['rank21'];
			$question421=$_POST['question421'];
			$type421=$_POST['tipe421'];
			$id_421=$id_2++;
			$i=0;
			foreach($answer421 as $ans421){
				
				$result['x21']=$ans421;
				$x21=$result['x21'];
				echo $x21	;
				echo " <br/>";
				echo $question421;
				echo " <br/>";
				echo $type421;
				echo " <br/>";
				echo $id_421;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question421', '$type421' ,'$x21', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank22'])&&!empty($_POST['rank22'])) {

			$answer422=$_POST['rank22'];
			$question422=$_POST['question422'];
			$type422=$_POST['tipe422'];
			$id_422=$id_2++;
			$i=0;
			foreach($answer422 as $ans422){
				
				$result['x22']=$ans422;
				$x22=$result['x22'];
				echo $x22	;
				echo " <br/>";
				echo $question422;
				echo " <br/>";
				echo $type422;
				echo " <br/>";
				echo $id_422;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question422', '$type422' ,'$x22', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank23'])&&!empty($_POST['rank23'])) {

			$answer423=$_POST['rank23'];
			$question423=$_POST['question423'];
			$type423=$_POST['tipe423'];
			$id_423=$id_2++;
			$i=0;
			foreach($answer423 as $ans423){
				
				$result['x23']=$ans423;
				$x23=$result['x23'];
				echo $x23	;
				echo " <br/>";
				echo $question423;
				echo " <br/>";
				echo $type423;
				echo " <br/>";
				echo $id_423;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question423', '$type423' ,'$x23', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank24'])&&!empty($_POST['rank24'])) {

			$answer424=$_POST['rank24'];
			$question424=$_POST['question424'];
			$type424=$_POST['tipe424'];
			$id_424=$id_2++;
			$i=0;
			foreach($answer424 as $ans424){
				
				$result['x24']=$ans424;
				$x24=$result['x24'];
				echo $x24	;
				echo " <br/>";
				echo $question424;
				echo " <br/>";
				echo $type424;
				echo " <br/>";
				echo $id_424;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question424', '$type424' ,'$x24', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank25'])&&!empty($_POST['rank25'])) {

			$answer425=$_POST['rank25'];
			$question425=$_POST['question425'];
			$type425=$_POST['tipe425'];
			$id_425=$id_2++;
			$i=0;
			foreach($answer425 as $ans425){
				
				$result['x25']=$ans425;
				$x25=$result['x25'];
				echo $x25	;
				echo " <br/>";
				echo $question425;
				echo " <br/>";
				echo $type425;
				echo " <br/>";
				echo $id_425;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question425', '$type425' ,'$x25', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank26'])&&!empty($_POST['rank26'])) {

			$answer426=$_POST['rank26'];
			$question426=$_POST['question426'];
			$type426=$_POST['tipe426'];
			$id_426=$id_2++;
			$i=0;
			foreach($answer426 as $ans426){
				
				$result['x26']=$ans426;
				$x26=$result['x26'];
				echo $x26	;
				echo " <br/>";
				echo $question426;
				echo " <br/>";
				echo $type426;
				echo " <br/>";
				echo $id_426;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question426', '$type426' ,'$x26', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank27'])&&!empty($_POST['rank27'])) {

			$answer427=$_POST['rank27'];
			$question427=$_POST['question427'];
			$type427=$_POST['tipe427'];
			$id_427=$id_2++;
			$i=0;
			foreach($answer427 as $ans427){
				
				$result['x27']=$ans427;
				$x27=$result['x27'];
				echo $x28	;
				echo " <br/>";
				echo $question428;
				echo " <br/>";
				echo $type428;
				echo " <br/>";
				echo $id_428;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question428', '$type428' ,'$x28', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank29'])&&!empty($_POST['rank29'])) {

			$answer429=$_POST['rank29'];
			$question429=$_POST['question429'];
			$type429=$_POST['tipe429'];
			$id_429=$id_2++;
			$i=0;
			foreach($answer429 as $ans429){
				
				$result['x29']=$ans429;
				$x29=$result['x29'];
				echo $x29	;
				echo " <br/>";
				echo $question429;
				echo " <br/>";
				echo $type429;
				echo " <br/>";
				echo $id_429;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question429', '$type429' ,'$x29', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}
		if (isset($_POST['rank30'])&&!empty($_POST['rank30'])) {

			$answer430=$_POST['rank30'];
			$question430=$_POST['question430'];
			$type430=$_POST['tipe430'];
			$id_430=$id_2++;
			$i=0;
			foreach($answer430 as $ans430){
				
				$result['x30']=$ans430;
				$x30=$result['x30'];
				echo $x30	;
				echo " <br/>";
				echo $question430;
				echo " <br/>";
				echo $type430;
				echo " <br/>";
				echo $id_430;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question430', '$type430' ,'$x30', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
			
		}


		

		// if multiple choice
		$p=0;		
		
		if (isset($_POST['multi-choice1'])&&!empty($_POST['multi-choice1'])){
			$answer31=$_POST['multi-choice1'];
			$question31=$_POST['question31'];
			$type31=$_POST['tipe31'];
			

			foreach ($answer31 as $ans31) {
				$result['31']=$ans31;
				$p31=$result['31'];
				$id_31=$id_2++;
				echo $p31;
				echo "<br/>";
				echo $question31;
				echo "<br/>";
				echo $type31;
				echo "<br/>";
				echo "$id_31";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username,  unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question31', '$type31' ,'$p31', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice2'])&&!empty($_POST['multi-choice2'])){
			$answer32=$_POST['multi-choice2'];
			$question32=$_POST['question32'];
			$type32=$_POST['tipe32'];
			
			foreach ($answer32 as $ans32) {
				$result['32']=$ans32;
				$p32=$result['32'];
				$id_32=$id_2++;
				echo $p32;
				echo "<br/>";
				echo $question32;
				echo "<br/>";
				echo $type32;
				echo "<br/>";
				echo "$id_32";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question32', '$type32' ,'$p32', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice3'])&&!empty($_POST['multi-choice3'])){
			$answer33=$_POST['multi-choice3'];
			$question33=$_POST['question33'];
			$type33=$_POST['tipe33'];
			
			foreach ($answer33 as $ans33) {
				$result['33']=$ans33;
				$p33=$result['33'];
				$id_33=$id_2++;
				echo $p33;
				echo "<br/>";
				echo $question33;
				echo "<br/>";
				echo $type33;
				echo "<br/>";
				echo "$id_33";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question33', '$type33' ,'$p33', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice4'])&&!empty($_POST['multi-choice4'])){
			$answer34=$_POST['multi-choice4'];
			$question34=$_POST['question34'];
			$type34=$_POST['tipe34'];
			
			foreach ($answer34 as $ans34) {
				$result['34']=$ans34;
				$p34=$result['34'];
				$id_34=$id_2++;
				echo $p34;
				echo "<br/>";
				echo $question34;
				echo "<br/>";
				echo $type34;
				echo "<br/>";
				echo "$id_34";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question34', '$type34' ,'$p34', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice5'])&&!empty($_POST['multi-choice5'])){
			$answer35=$_POST['multi-choice5'];
			$question35=$_POST['question35'];
			$type35=$_POST['tipe35'];
			
			foreach ($answer35 as $ans35) {
				$result['35']=$ans35;
				$p35=$result['35'];
				$id_35=$id_2++;
				echo $p35;
				echo "<br/>";
				echo $question35;
				echo "<br/>";
				echo $type35;
				echo "<br/>";
				echo "$id_35";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question35', '$type35' ,'$p35', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice6'])&&!empty($_POST['multi-choice6'])){
			$answer36=$_POST['multi-choice6'];
			$question36=$_POST['question36'];
			$type36=$_POST['tipe36'];
			
			foreach ($answer36 as $ans36) {
				$result['36']=$ans36;
				$p36=$result['36'];
				$id_36=$id_2++;
				echo $p36;
				echo "<br/>";
				echo $question36;
				echo "<br/>";
				echo $type36;
				echo "<br/>";
				echo "$id_36";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question36', '$type36' ,'$p36', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice7'])&&!empty($_POST['multi-choice7'])){
			$answer37=$_POST['multi-choice7'];
			$question37=$_POST['question37'];
			$type37=$_POST['tipe37'];
			
			foreach ($answer37 as $ans37) {
				$result['37']=$ans37;
				$p37=$result['37'];
				$id_37=$id_2++;
				echo $p37;
				echo "<br/>";
				echo $question37;
				echo "<br/>";
				echo $type37;
				echo "<br/>";
				echo "$id_37";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question37', '$type37' ,'$p37', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice8'])&&!empty($_POST['multi-choice8'])){
			$answer38=$_POST['multi-choice8'];
			$question38=$_POST['question38'];
			$type38=$_POST['tipe38'];
			
			foreach ($answer38 as $ans38) {
				$result['38']=$ans38;
				$p38=$result['38'];
				$id_38=$id_2++;
				echo $p38;
				echo "<br/>";
				echo $question38;
				echo "<br/>";
				echo $type38;
				echo "<br/>";
				echo "$id_38";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question38', '$type38' ,'$p38', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice9'])&&!empty($_POST['multi-choice9'])){
			$answer39=$_POST['multi-choice9'];
			$question39=$_POST['question39'];
			$type39=$_POST['tipe39'];
			
			foreach ($answer39 as $ans39) {
				$result['39']=$ans39;
				$p39=$result['39'];
				$id_39=$id_2++;
				echo $p39;
				echo "<br/>";
				echo $question39;
				echo "<br/>";
				echo $type39;
				echo "<br/>";
				echo "$id_39";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question39', '$type39' ,'$p39', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice10'])&&!empty($_POST['multi-choice10'])){
			$answer310=$_POST['multi-choice10'];
			$question310=$_POST['question310'];
			$type310=$_POST['tipe310'];
			
			foreach ($answer310 as $ans310) {
				$result['310']=$ans310;
				$p310=$result['310'];
				$id_310=$id_2++;
				echo $p310;
				echo "<br/>";
				echo $question310;
				echo "<br/>";
				echo $type310;
				echo "<br/>";
				echo "$id_310";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question310', '$type310' ,'$p310', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice11'])&&!empty($_POST['multi-choice11'])){
			$answer311=$_POST['multi-choice11'];
			$question311=$_POST['question311'];
			$type311=$_POST['tipe311'];
			
			foreach ($answer311 as $ans311) {
				$result['311']=$ans311;
				$p311=$result['311'];
				$id_311=$id_2++;
				echo $p311;
				echo "<br/>";
				echo $question311;
				echo "<br/>";
				echo $type311;
				echo "<br/>";
				echo "$id_311";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question311', '$type311' ,'$p311', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice12'])&&!empty($_POST['multi-choice12'])){
			$answer312=$_POST['multi-choice12'];
			$question312=$_POST['question312'];
			$type312=$_POST['tipe312'];
			
			foreach ($answer312 as $ans312) {
				$result['312']=$ans312;
				$p312=$result['312'];
				$id_312=$id_2++;
				echo $p312;
				echo "<br/>";
				echo $question312;
				echo "<br/>";
				echo $type312;
				echo "<br/>";
				echo "$id_312";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question312', '$type312' ,'$p312', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice13'])&&!empty($_POST['multi-choice13'])){
			$answer313=$_POST['multi-choice13'];
			$question313=$_POST['question313'];
			$type313=$_POST['tipe313'];
			
			foreach ($answer313 as $ans313) {
				$result['313']=$ans313;
				$p313=$result['313'];
				$id_313=$id_2++;
				echo $p313;
				echo "<br/>";
				echo $question313;
				echo "<br/>";
				echo $type313;
				echo "<br/>";
				echo "$id_313";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question313', '$type313' ,'$p313', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice14'])&&!empty($_POST['multi-choice14'])){
			$answer314=$_POST['multi-choice14'];
			$question314=$_POST['question314'];
			$type314=$_POST['tipe314'];
			
			foreach ($answer314 as $ans314) {
				$result['314']=$ans314;
				$p314=$result['314'];
				$id_314=$id_2++;
				echo $p314;
				echo "<br/>";
				echo $question314;
				echo "<br/>";
				echo $type314;
				echo "<br/>";
				echo "$id_314";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question314', '$type314' ,'$p314', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice15'])&&!empty($_POST['multi-choice15'])){
			$answer315=$_POST['multi-choice15'];
			$question315=$_POST['question315'];
			$type315=$_POST['tipe315'];
			
			foreach ($answer315 as $ans315) {
				$result['315']=$ans315;
				$p315=$result['315'];
				$id_315=$id_2++;
				echo $p315;
				echo "<br/>";
				echo $question315;
				echo "<br/>";
				echo $type315;
				echo "<br/>";
				echo "$id_315";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question315', '$type315' ,'$p315', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice16'])&&!empty($_POST['multi-choice16'])){
			$answer316=$_POST['multi-choice16'];
			$question316=$_POST['question316'];
			$type316=$_POST['tipe316'];
			
			foreach ($answer316 as $ans316) {
				$result['316']=$ans316;
				$p316=$result['316'];
				$id_316=$id_2++;
				echo $p316;
				echo "<br/>";
				echo $question316;
				echo "<br/>";
				echo $type316;
				echo "<br/>";
				echo "$id_316";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question316', '$type316' ,'$p316', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice17'])&&!empty($_POST['multi-choice17'])){
			$answer317=$_POST['multi-choice17'];
			$question317=$_POST['question317'];
			$type317=$_POST['tipe317'];
			
			foreach ($answer317 as $ans317) {
				$result['317']=$ans317;
				$p317=$result['317'];
				$id_317=$id_2++;
				echo $p317;
				echo "<br/>";
				echo $question317;
				echo "<br/>";
				echo $type317;
				echo "<br/>";
				echo "$id_317";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question317', '$type317' ,'$p317', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice18'])&&!empty($_POST['multi-choice18'])){
			$answer318=$_POST['multi-choice18'];
			$question318=$_POST['question318'];
			$type318=$_POST['tipe318'];
			
			foreach ($answer318 as $ans318) {
				$result['318']=$ans318;
				$p318=$result['318'];
				$id_318=$id_2++;
				echo $p318;
				echo "<br/>";
				echo $question318;
				echo "<br/>";
				echo $type318;
				echo "<br/>";
				echo "$id_318";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question318', '$type318' ,'$p318', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice19'])&&!empty($_POST['multi-choice19'])){
			$answer319=$_POST['multi-choice19'];
			$question319=$_POST['question319'];
			$type319=$_POST['tipe319'];
			
			foreach ($answer319 as $ans319) {
				$result['319']=$ans319;
				$p319=$result['319'];
				$id_319=$id_2++;
				echo $p319;
				echo "<br/>";
				echo $question319;
				echo "<br/>";
				echo $type319;
				echo "<br/>";
				echo "$id_319";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question319', '$type319' ,'$p319', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice20'])&&!empty($_POST['multi-choice20'])){
			$answer320=$_POST['multi-choice20'];
			$question320=$_POST['question320'];
			$type320=$_POST['tipe320'];
			
			foreach ($answer320 as $ans320) {
				$result['320']=$ans320;
				$p320=$result['320'];
				$id_320=$id_2++;
				echo $p320;
				echo "<br/>";
				echo $question320;
				echo "<br/>";
				echo $type320;
				echo "<br/>";
				echo "$id_320";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question320', '$type320' ,'$p320', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice21'])&&!empty($_POST['multi-choice21'])){
			$answer321=$_POST['multi-choice21'];
			$question321=$_POST['question321'];
			$type321=$_POST['tipe321'];
			
			foreach ($answer321 as $ans321) {
				$result['321']=$ans321;
				$p321=$result['321'];
				$id_321=$id_2++;
				echo $p321;
				echo "<br/>";
				echo $question321;
				echo "<br/>";
				echo $type321;
				echo "<br/>";
				echo "$id_321";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question321', '$type321' ,'$p321', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice22'])&&!empty($_POST['multi-choice22'])){
			$answer322=$_POST['multi-choice22'];
			$question322=$_POST['question322'];
			$type322=$_POST['tipe322'];
			
			foreach ($answer322 as $ans322) {
				$result['322']=$ans322;
				$p322=$result['322'];
				$id_322=$id_2++;
				echo $p322;
				echo "<br/>";
				echo $question322;
				echo "<br/>";
				echo $type322;
				echo "<br/>";
				echo "$id_322";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question322', '$type322' ,'$p322', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice23'])&&!empty($_POST['multi-choice23'])){
			$answer323=$_POST['multi-choice23'];
			$question323=$_POST['question323'];
			$type323=$_POST['tipe323'];
			
			foreach ($answer323 as $ans323) {
				$result['323']=$ans323;
				$p323=$result['323'];
				$id_323=$id_2++;
				echo $p323;
				echo "<br/>";
				echo $question323;
				echo "<br/>";
				echo $type323;
				echo "<br/>";
				echo "$id_323";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question323', '$type323' ,'$p323', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice24'])&&!empty($_POST['multi-choice24'])){
			$answer324=$_POST['multi-choice24'];
			$question324=$_POST['question324'];
			$type324=$_POST['tipe324'];
			
			foreach ($answer324 as $ans320) {
				$result['324']=$ans324;
				$p324=$result['324'];
				$id_324=$id_2++;
				echo $p324;
				echo "<br/>";
				echo $question324;
				echo "<br/>";
				echo $type324;
				echo "<br/>";
				echo "$id_324";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question324', '$type324' ,'$p324', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice25'])&&!empty($_POST['multi-choice25'])){
			$answer325=$_POST['multi-choice25'];
			$question325=$_POST['question325'];
			$type325=$_POST['tipe325'];
			
			foreach ($answer325 as $ans325) {
				$result['325']=$ans325;
				$p325=$result['325'];
				$id_325=$id_2++;
				echo $p325;
				echo "<br/>";
				echo $question325;
				echo "<br/>";
				echo $type325;
				echo "<br/>";
				echo "$id_325";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question325', '$type325' ,'$p325', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice26'])&&!empty($_POST['multi-choice26'])){
			$answer326=$_POST['multi-choice26'];
			$question326=$_POST['question326'];
			$type326=$_POST['tipe326'];
			
			foreach ($answer326 as $ans326) {
				$result['326']=$ans326;
				$p326=$result['326'];
				$id_326=$id_2++;
				echo $p326;
				echo "<br/>";
				echo $question326;
				echo "<br/>";
				echo $type326;
				echo "<br/>";
				echo "$id_326";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question326', '$type326' ,'$p326', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice27'])&&!empty($_POST['multi-choice27'])){
			$answer327=$_POST['multi-choice27'];
			$question327=$_POST['question327'];
			$type327=$_POST['tipe327'];
			
			foreach ($answer327 as $ans327) {
				$result['327']=$ans327;
				$p327=$result['327'];
				$id_327=$id_2++;
				echo $p327;
				echo "<br/>";
				echo $question327;
				echo "<br/>";
				echo $type327;
				echo "<br/>";
				echo "$id_327";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question327', '$type327' ,'$p327', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice28'])&&!empty($_POST['multi-choice28'])){
			$answer328=$_POST['multi-choice28'];
			$question328=$_POST['question328'];
			$type328=$_POST['tipe328'];
			
			foreach ($answer328 as $ans328) {
				$result['328']=$ans328;
				$p328=$result['328'];
				$id_328=$id_2++;
				echo $p328;
				echo "<br/>";
				echo $question328;
				echo "<br/>";
				echo $type328;
				echo "<br/>";
				echo "$id_328";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question328', '$type328' ,'$p328', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice29'])&&!empty($_POST['multi-choice29'])){
			$answer329=$_POST['multi-choice29'];
			$question329=$_POST['question329'];
			$type329=$_POST['tipe329'];
			
			foreach ($answer329 as $ans329) {
				$result['329']=$ans329;
				$p329=$result['329'];
				$id_329=$id_2++;
				echo $p329;
				echo "<br/>";
				echo $question329;
				echo "<br/>";
				echo $type329;
				echo "<br/>";
				echo "$id_329";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question329', '$type329' ,'$p329', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}
		if (isset($_POST['multi-choice30'])&&!empty($_POST['multi-choice30'])){
			$answer330=$_POST['multi-choice30'];
			$question330=$_POST['question330'];
			$type330=$_POST['tipe330'];
			
			foreach ($answer330 as $ans330) {
				$result['330']=$ans330;
				$p330=$result['330'];
				$id_330=$id_2++;
				echo $p330;
				echo "<br/>";
				echo $question330;
				echo "<br/>";
				echo $type330;
				echo "<br/>";
				echo "$id_330";
				echo "<br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question330', '$type330' ,'$p330', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}
		}


		// if multiple choice

		// if free text
		if (isset($_POST['free'])&&trim($_POST['free'][0])!="") {

			$answer1=$_POST['free'];
			$question1=$_POST['question1'];
			$type1=$_POST['tipe1'];
			
			$o=0;
			foreach($question1 as $quest1)
			{
				$result['a']=$quest1;
				$result['b']=$type1[$o];
				$result['c']=$answer1[$o];
				$a=$result['a'];
				$b=$result['b'];
				$c=$result['c'];
				$id_a=$id_2++;

				echo $a	;
				echo " <br/>";
				echo $b;
				echo " <br/>";
				echo $c;
				echo " <br/>";
				echo $id_a;
				echo " <br/>";
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$a', '$b' ,'$c', '$date' )");
				if (mysql_affected_rows()>0){
					
					echo "berhasil";
				}else{
					echo "gagal edit";
					
				}
			}	
		}
		
		// if free text


		// if single choice
		if (isset($_POST['iCheck1'])&&!empty($_POST['iCheck1'])){
			$answer21=$_POST['iCheck1'];
			$question21=$_POST['question21'];
			$type21=$_POST['tipe21'];
			$id_b=$id_2++;
			echo $answer21;echo " <br/>";
			echo $question21;echo " <br/>";
			echo $type21;echo " <br/>";
			echo $id_b;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question21', '$type21' ,'$answer21', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck2'])&&!empty($_POST['iCheck2'])){
			$answer22=$_POST['iCheck2'];
			$question22=$_POST['question22'];
			$type22=$_POST['tipe22'];
			$id_b2=$id_2++;
			echo $answer22;echo " <br/>";
			echo $question22;echo " <br/>";
			echo $type22;echo " <br/>";
			echo $id_b2;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question22', '$type22' ,'$answer22', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck3'])&&!empty($_POST['iCheck3'])){
			$answer23=$_POST['iCheck3'];
			$question23=$_POST['question23'];
			$type23=$_POST['tipe23'];
			$id_b3=$id_2++;
			echo $answer23;echo " <br/>";
			echo $question23;echo " <br/>";
			echo $type23;echo " <br/>";
			echo $id_b3;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question23', '$type23' ,'$answer23', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck4'])&&!empty($_POST['iCheck4'])){
			$answer24=$_POST['iCheck4'];
			$question24=$_POST['question24'];
			$type24=$_POST['tipe24'];
			$id_b4=$id_2++;
			echo $answer24;echo " <br/>";
			echo $question24;echo " <br/>";
			echo $type24;echo " <br/>";
			echo $id_b4;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question24', '$type24' ,'$answer24', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck5'])&&!empty($_POST['iCheck5'])){
			$answer25=$_POST['iCheck5'];
			$question25=$_POST['question25'];
			$type25=$_POST['tipe25'];
			$id_b5=$id_2++;
			echo $answer25;echo " <br/>";
			echo $question25;echo " <br/>";
			echo $type25;echo " <br/>";
			echo $id_b5;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question25', '$type25' ,'$answer25', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck6'])&&!empty($_POST['iCheck6'])){
			$answer26=$_POST['iCheck6'];
			$question26=$_POST['question26'];
			$type26=$_POST['tipe26'];
			$id_b6=$id_2++;
			echo $answer26;echo " <br/>";
			echo $question26;echo " <br/>";
			echo $type26;echo " <br/>";
			echo $id_b6;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question26', '$type26' ,'$answer26', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck7'])&&!empty($_POST['iCheck7'])){
			$answer27=$_POST['iCheck7'];
			$question27=$_POST['question27'];
			$type27=$_POST['tipe27'];
			$id_b7=$id_2++;
			echo $answer27;echo " <br/>";
			echo $question27;echo " <br/>";
			echo $type27;echo " <br/>";
			echo $id_b7;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question27', '$type27' ,'$answer27', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck8'])&&!empty($_POST['iCheck8'])){
			$answer28=$_POST['iCheck8'];
			$question28=$_POST['question28'];
			$type28=$_POST['tipe21'];
			$id_b8=$id_2++;
			echo $answer28;echo " <br/>";
			echo $question28;echo " <br/>";
			echo $type28;echo " <br/>";
			echo $id_b8;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question28', '$type28' ,'$answer28', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck9'])&&!empty($_POST['iCheck9'])){
			$answer29=$_POST['iCheck9'];
			$question29=$_POST['question29'];
			$type29=$_POST['tipe29'];
			$id_b9=$id_2++;
			echo $answer29;echo " <br/>";
			echo $question29;echo " <br/>";
			echo $type29;echo " <br/>";
			echo $id_b9;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question29', '$type29' ,'$answer29', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck10'])&&!empty($_POST['iCheck10'])){
			$answer210=$_POST['iCheck10'];
			$question210=$_POST['question210'];
			$type210=$_POST['tipe210'];
			$id_b10=$id_2++;
			echo $answer210;echo " <br/>";
			echo $question210;echo " <br/>";
			echo $type210;echo " <br/>";
			echo $id_b10;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question210', '$type210' ,'$answer210', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		if (isset($_POST['iCheck11'])&&!empty($_POST['iCheck11'])){
			$answer211=$_POST['iCheck11'];
			$question211=$_POST['question211'];
			$type211=$_POST['tipe211'];
			$id_b11=$id_2++;
			echo $answer211;echo " <br/>";
			echo $question211;echo " <br/>";
			echo $type211;echo " <br/>";
			echo $id_b;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question211', '$type211' ,'$answer211', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck12'])&&!empty($_POST['iCheck12'])){
			$answer212=$_POST['iCheck12'];
			$question212=$_POST['question212'];
			$type212=$_POST['tipe212'];
			$id_b12=$id_2++;
			echo $answer212;echo " <br/>";
			echo $question212;echo " <br/>";
			echo $type212;echo " <br/>";
			echo $id_b12;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question212', '$type212' ,'$answer212', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck13'])&&!empty($_POST['iCheck13'])){
			$answer213=$_POST['iCheck3'];
			$question213=$_POST['question213'];
			$type213=$_POST['tipe213'];
			$id_b13=$id_2++;
			echo $answer213;echo " <br/>";
			echo $question213;echo " <br/>";
			echo $type213;echo " <br/>";
			echo $id_b13;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question213', '$type213' ,'$answer213', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck14'])&&!empty($_POST['iCheck14'])){
			$answer214=$_POST['iCheck14'];
			$question214=$_POST['question214'];
			$type214=$_POST['tipe214'];
			$id_b14=$id_2++;
			echo $answer214;echo " <br/>";
			echo $question214;echo " <br/>";
			echo $type214;echo " <br/>";
			echo $id_b14;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question214', '$type214' ,'$answer214', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck15'])&&!empty($_POST['iCheck15'])){
			$answer215=$_POST['iCheck15'];
			$question215=$_POST['question215'];
			$type215=$_POST['tipe215'];
			$id_b15=$id_2++;
			echo $answer215;echo " <br/>";
			echo $question215;echo " <br/>";
			echo $type215;echo " <br/>";
			echo $id_b15;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question215', '$type215' ,'$answer215', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck16'])&&!empty($_POST['iCheck16'])){
			$answer216=$_POST['iCheck16'];
			$question216=$_POST['question216'];
			$type216=$_POST['tipe216'];
			$id_b16=$id_2++;
			echo $answer216;echo " <br/>";
			echo $question216;echo " <br/>";
			echo $type216;echo " <br/>";
			echo $id_b16;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question216', '$type216' ,'$answer216', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck17'])&&!empty($_POST['iCheck17'])){
			$answer217=$_POST['iCheck17'];
			$question217=$_POST['question217'];
			$type217=$_POST['tipe217'];
			$id_b17=$id_2++;
			echo $answer217;echo " <br/>";
			echo $question217;echo " <br/>";
			echo $type217;echo " <br/>";
			echo $id_b17;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question217', '$type217' ,'$answer217', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck18'])&&!empty($_POST['iCheck18'])){
			$answer218=$_POST['iCheck18'];
			$question218=$_POST['question218'];
			$type218=$_POST['tipe218'];
			$id_b18=$id_2++;
			echo $answer218;echo " <br/>";
			echo $question218;echo " <br/>";
			echo $type218;echo " <br/>";
			echo $id_b18;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question218', '$type218' ,'$answer218', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck19'])&&!empty($_POST['iCheck19'])){
			$answer219=$_POST['iCheck19'];
			$question219=$_POST['question219'];
			$type219=$_POST['tipe219'];
			$id_b19=$id_2++;
			echo $answer219;echo " <br/>";
			echo $question219;echo " <br/>";
			echo $type219;echo " <br/>";
			echo $id_b19;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question219', '$type219' ,'$answer219', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck20'])&&!empty($_POST['iCheck20'])){
			$answer220=$_POST['iCheck20'];
			$question220=$_POST['question220'];
			$type220=$_POST['tipe220'];
			$id_b20=$id_2++;
			echo $answer220;echo " <br/>";
			echo $question220;echo " <br/>";
			echo $type220;echo " <br/>";
			echo $id_b20;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question220', '$type220' ,'$answer220', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		if (isset($_POST['iCheck21'])&&!empty($_POST['iCheck21'])){
			$answer221=$_POST['iCheck21'];
			$question221=$_POST['question221'];
			$type221=$_POST['tipe221'];
			$id_b21=$id_2++;
			echo $answer221;echo " <br/>";
			echo $question221;echo " <br/>";
			echo $type221;echo " <br/>";
			echo $id_b21;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question221', '$type221' ,'$answer221', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck22'])&&!empty($_POST['iCheck22'])){
			$answer222=$_POST['iCheck22'];
			$question222=$_POST['question222'];
			$type222=$_POST['tipe222'];
			$id_b22=$id_2++;
			echo $answer222;echo " <br/>";
			echo $question222;echo " <br/>";
			echo $type222;echo " <br/>";
			echo $id_b22;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question222', '$type222' ,'$answer222', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck23'])&&!empty($_POST['iCheck23'])){
			$answer223=$_POST['iCheck23'];
			$question223=$_POST['question223'];
			$type223=$_POST['tipe223'];
			$id_b23=$id_2++;
			echo $answer223;echo " <br/>";
			echo $question223;echo " <br/>";
			echo $type223;echo " <br/>";
			echo $id_b23;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question223', '$type223' ,'$answer223', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck24'])&&!empty($_POST['iCheck24'])){
			$answer224=$_POST['iCheck24'];
			$question224=$_POST['question224'];
			$type224=$_POST['tipe24'];
			$id_b24=$id_2++;
			echo $answer224;echo " <br/>";
			echo $question224;echo " <br/>";
			echo $type224;echo " <br/>";
			echo $id_b24;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question224', '$type224' ,'$answer224', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck25'])&&!empty($_POST['iCheck25'])){
			$answer225=$_POST['iCheck25'];
			$question225=$_POST['question225'];
			$type225=$_POST['tipe225'];
			$id_b25=$id_2++;
			echo $answer225;echo " <br/>";
			echo $question225;echo " <br/>";
			echo $type225;echo " <br/>";
			echo $id_b25;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question225', '$type225' ,'$answer225', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck26'])&&!empty($_POST['iCheck26'])){
			$answer226=$_POST['iCheck26'];
			$question226=$_POST['question226'];
			$type226=$_POST['tipe226'];
			$id_b26=$id_2++;
			echo $answer226;echo " <br/>";
			echo $question226;echo " <br/>";
			echo $type226;echo " <br/>";
			echo $id_b26;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question226', '$type226' ,'$answer221', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck27'])&&!empty($_POST['iCheck27'])){
			$answer227=$_POST['iCheck27'];
			$question227=$_POST['question227'];
			$type227=$_POST['tipe227'];
			$id_b27=$id_2++;
			echo $answer227;echo " <br/>";
			echo $question227;echo " <br/>";
			echo $type227;echo " <br/>";
			echo $id_b27;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question227', '$type227' ,'$answer227', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck28'])&&!empty($_POST['iCheck28'])){
			$answer228=$_POST['iCheck28'];
			$question228=$_POST['question228'];
			$type228=$_POST['tipe228'];
			$id_b28=$id_2++;
			echo $answer228;echo " <br/>";
			echo $question228;echo " <br/>";
			echo $type228;echo " <br/>";
			echo $id_b28;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question228', '$type228' ,'$answer228', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck29'])&&!empty($_POST['iCheck29'])){
			$answer229=$_POST['iCheck29'];
			$question229=$_POST['question229'];
			$type229=$_POST['tipe229'];
			$id_b29=$id_2++;
			echo $answer229;echo " <br/>";
			echo $question229;echo " <br/>";
			echo $type229;echo " <br/>";
			echo $id_b29;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question229', '$type229' ,'$answer229', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		if (isset($_POST['iCheck30'])&&!empty($_POST['iCheck30'])){
			$answer230=$_POST['iCheck30'];
			$question230=$_POST['question230'];
			$type230=$_POST['tipe230'];
			$id_b30=$id_2++;
			echo $answer230;echo " <br/>";
			echo $question230;echo " <br/>";
			echo $type230;echo " <br/>";
			echo $id_b30;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question230', '$type230' ,'$answer230', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}

		// if single choice	

		// if likert scale
		
		if (isset($_POST['likert1'])&&!empty($_POST['likert1'])){
			$answer01=$_POST['likert1'];
			$question01=$_POST['question01'];
			$type01=$_POST['tipe01'];
			$id_c=$id_2++;
			echo $answer01;echo " <br/>";
			echo $question01;echo " <br/>";
			echo $type01;echo " <br/>";
			echo $id_c;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question01', '$type01' ,'$answer01', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert2'])&&!empty($_POST['likert2'])){
			$answer02=$_POST['likert2'];
			$question02=$_POST['question02'];
			$type02=$_POST['tipe02'];
			$id_c2=$id_2++;
			echo $answer02;echo " <br/>";
			echo $question02;echo " <br/>";
			echo $type02;echo " <br/>";
			echo $id_c2;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question02', '$type02' ,'$answer02', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert3'])&&!empty($_POST['likert3'])){
			$answer03=$_POST['likert3'];
			$question03=$_POST['question03'];
			$type03=$_POST['tipe03'];
			$id_c3=$id_2++;
			echo $answer03;echo " <br/>";
			echo $question03;echo " <br/>";
			echo $type03;echo " <br/>";
			echo $id_c3;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question03', '$type03' ,'$answer03', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert4'])&&!empty($_POST['likert4'])){
			$answer04=$_POST['likert4'];
			$question04=$_POST['question04'];
			$type04=$_POST['tipe04'];
			$id_c4=$id_2++;
			echo $answer04;echo " <br/>";
			echo $question04;echo " <br/>";
			echo $type04;echo " <br/>";
			echo $id_c4;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question04', '$type04' ,'$answer04', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert5'])&&!empty($_POST['likert5'])){
			$answer05=$_POST['likert5'];
			$question05=$_POST['question05'];
			$type05=$_POST['tipe05'];
			$id_c5=$id_2++;
			echo $answer05;echo " <br/>";
			echo $question05;echo " <br/>";
			echo $type05;echo " <br/>";
			echo $id_c5;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question05', '$type05' ,'$answer05', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert6'])&&!empty($_POST['likert6'])){
			$answer06=$_POST['likert6'];
			$question06=$_POST['question06'];
			$type06=$_POST['tipe06'];
			$id_c6=$id_2++;
			echo $answer06;echo " <br/>";
			echo $question06;echo " <br/>";
			echo $type06;echo " <br/>";
			echo $id_c6;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question06', '$type06' ,'$answer06', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert7'])&&!empty($_POST['likert7'])){
			$answer07=$_POST['likert7'];
			$question07=$_POST['question07'];
			$type07=$_POST['tipe07'];
			$id_c7=$id_2++;
			echo $answer07;echo " <br/>";
			echo $question07;echo " <br/>";
			echo $type07;echo " <br/>";
			echo $id_c7;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question07', '$type07' ,'$answer07', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert8'])&&!empty($_POST['likert8'])){
			$answer08=$_POST['likert8'];
			$question08=$_POST['question08'];
			$type08=$_POST['tipe08'];
			$id_c8=$id_2++;
			echo $answer08;echo " <br/>";
			echo $question08;echo " <br/>";
			echo $type08;echo " <br/>";
			echo $id_c8;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question08', '$type08' ,'$answer08', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert9'])&&!empty($_POST['likert9'])){
			$answer09=$_POST['likert9'];
			$question09=$_POST['question09'];
			$type09=$_POST['tipe09'];
			$id_c9=$id_2++;
			echo $answer09;echo " <br/>";
			echo $question09;echo " <br/>";
			echo $type09;echo " <br/>";
			echo $id_c9;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question09', '$type09' ,'$answer09', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert10'])&&!empty($_POST['likert10'])){
			$answer010=$_POST['likert10'];
			$question010=$_POST['question010'];
			$type010=$_POST['tipe010'];
			$id_c10=$id_2++;
			echo $answer010;echo " <br/>";
			echo $question010;echo " <br/>";
			echo $type010;echo " <br/>";
			echo $id_c10;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question010', '$type010' ,'$answer010', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert11'])&&!empty($_POST['likert11'])){
			$answer011=$_POST['likert11'];
			$question011=$_POST['question011'];
			$type011=$_POST['tipe011'];
			$id_c11=$id_2++;
			echo $answer011;echo " <br/>";
			echo $question011;echo " <br/>";
			echo $type011;echo " <br/>";
			echo $id_c11;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question011', '$type011' ,'$answer011', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert12'])&&!empty($_POST['likert12'])){
			$answer012=$_POST['likert12'];
			$question012=$_POST['question012'];
			$type012=$_POST['tipe012'];
			$id_c12=$id_2++;
			echo $answer012;echo " <br/>";
			echo $question012;echo " <br/>";
			echo $type012;echo " <br/>";
			echo $id_c12;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question012', '$type012' ,'$answer012', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert13'])&&!empty($_POST['likert13'])){
			$answer013=$_POST['likert13'];
			$question013=$_POST['question013'];
			$type013=$_POST['tipe013'];
			$id_c13=$id_2++;
			echo $answer013;echo " <br/>";
			echo $question013;echo " <br/>";
			echo $type013;echo " <br/>";
			echo $id_c13;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question013', '$type013' ,'$answer013', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert14'])&&!empty($_POST['likert14'])){
			$answer014=$_POST['likert14'];
			$question014=$_POST['question014'];
			$type014=$_POST['tipe014'];
			$id_c14=$id_2++;
			echo $answer014;echo " <br/>";
			echo $question014;echo " <br/>";
			echo $type014;echo " <br/>";
			echo $id_c14;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question014', '$type014' ,'$answer014', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert15'])&&!empty($_POST['likert15'])){
			$answer015=$_POST['likert15'];
			$question015=$_POST['question015'];
			$type015=$_POST['tipe015'];
			$id_c15=$id_2++;
			echo $answer015;echo " <br/>";
			echo $question015;echo " <br/>";
			echo $type015;echo " <br/>";
			echo $id_c15;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question015', '$type015' ,'$answer015', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert16'])&&!empty($_POST['likert16'])){
			$answer016=$_POST['likert16'];
			$question016=$_POST['question016'];
			$type016=$_POST['tipe016'];
			$id_c16=$id_2++;
			echo $answer016;echo " <br/>";
			echo $question016;echo " <br/>";
			echo $type016;echo " <br/>";
			echo $id_c16;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question016', '$type016' ,'$answer016', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert17'])&&!empty($_POST['likert17'])){
			$answer017=$_POST['likert17'];
			$question017=$_POST['question017'];
			$type017=$_POST['tipe017'];
			$id_c17=$id_2++;
			echo $answer017;echo " <br/>";
			echo $question017;echo " <br/>";
			echo $type017;echo " <br/>";
			echo $id_c17;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question017', '$type017' ,'$answer017', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert18'])&&!empty($_POST['likert18'])){
			$answer018=$_POST['likert18'];
			$question018=$_POST['question018'];
			$type018=$_POST['tipe018'];
			$id_c18=$id_2++;
			echo $answer018;echo " <br/>";
			echo $question018;echo " <br/>";
			echo $type018;echo " <br/>";
			echo $id_c18;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question018', '$type018' ,'$answer018', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert19'])&&!empty($_POST['likert19'])){
			$answer019=$_POST['likert19'];
			$question019=$_POST['question019'];
			$type019=$_POST['tipe019'];
			$id_c19=$id_2++;
			echo $answer019;echo " <br/>";
			echo $question019;echo " <br/>";
			echo $type019;echo " <br/>";
			echo $id_c19;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question019', '$type019' ,'$answer019', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert20'])&&!empty($_POST['likert20'])){
			$answer020=$_POST['likert20'];
			$question020=$_POST['question020'];
			$type020=$_POST['tipe020'];
			$id_c20=$id_2++;
			echo $answer020;echo " <br/>";
			echo $question020;echo " <br/>";
			echo $type020;echo " <br/>";
			echo $id_c20;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question020', '$type020' ,'$answer020', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		if (isset($_POST['likert21'])&&!empty($_POST['likert21'])){
			$answer021=$_POST['likert21'];
			$question021=$_POST['question021'];
			$type021=$_POST['tipe021'];
			$id_c21=$id_2++;
			echo $answer021;echo " <br/>";
			echo $question021;echo " <br/>";
			echo $type021;echo " <br/>";
			echo $id_c21;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question021', '$type021' ,'$answer021', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert22'])&&!empty($_POST['likert22'])){
			$answer022=$_POST['likert22'];
			$question022=$_POST['question022'];
			$type022=$_POST['tipe022'];
			$id_c22=$id_2++;
			echo $answer022;echo " <br/>";
			echo $question022;echo " <br/>";
			echo $type022;echo " <br/>";
			echo $id_c22;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question022', '$type022' ,'$answer022', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert23'])&&!empty($_POST['likert23'])){
			$answer023=$_POST['likert23'];
			$question023=$_POST['question023'];
			$type023=$_POST['tipe023'];
			$id_c23=$id_2++;
			echo $answer023;echo " <br/>";
			echo $question023;echo " <br/>";
			echo $type023;echo " <br/>";
			echo $id_c23;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question023', '$type023' ,'$answer023', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert24'])&&!empty($_POST['likert24'])){
			$answer024=$_POST['likert24'];
			$question024=$_POST['question04'];
			$type024=$_POST['tipe024'];
			$id_c24=$id_2++;
			echo $answer024;echo " <br/>";
			echo $question024;echo " <br/>";
			echo $type024;echo " <br/>";
			echo $id_c24;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question024', '$type024' ,'$answer024', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert25'])&&!empty($_POST['likert25'])){
			$answer025=$_POST['likert25'];
			$question025=$_POST['question025'];
			$type025=$_POST['tipe025'];
			$id_c25=$id_2++;
			echo $answer025;echo " <br/>";
			echo $question025;echo " <br/>";
			echo $type025;echo " <br/>";
			echo $id_c25;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question025', '$type025' ,'$answer025', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert26'])&&!empty($_POST['likert26'])){
			$answer026=$_POST['likert26'];
			$question026=$_POST['question026'];
			$type026=$_POST['tipe026'];
			$id_c26=$id_2++;
			echo $answer026;echo " <br/>";
			echo $question026;echo " <br/>";
			echo $type026;echo " <br/>";
			echo $id_c26;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question026', '$type026' ,'$answer026', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert27'])&&!empty($_POST['likert27'])){
			$answer027=$_POST['likert27'];
			$question027=$_POST['question027'];
			$type027=$_POST['tipe027'];
			$id_c27=$id_2++;
			echo $answer027;echo " <br/>";
			echo $question027;echo " <br/>";
			echo $type027;echo " <br/>";
			echo $id_c27;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question027', '$type027' ,'$answer027', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert28'])&&!empty($_POST['likert28'])){
			$answer028=$_POST['likert28'];
			$question028=$_POST['question028'];
			$type028=$_POST['tipe028'];
			$id_c28=$id_2++;
			echo $answer028;echo " <br/>";
			echo $question028;echo " <br/>";
			echo $type028;echo " <br/>";
			echo $id_c28;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question028', '$type028' ,'$answer028', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert29'])&&!empty($_POST['likert29'])){
			$answer029=$_POST['likert29'];
			$question029=$_POST['question029'];
			$type029=$_POST['tipe029'];
			$id_c29=$id_2++;
			echo $answer029;echo " <br/>";
			echo $question029;echo " <br/>";
			echo $type029;echo " <br/>";
			echo $id_c29;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question029', '$type029' ,'$answer029', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		if (isset($_POST['likert30'])&&!empty($_POST['likert30'])){
			$answer030=$_POST['likert30'];
			$question030=$_POST['question030'];
			$type030=$_POST['tipe030'];
			$id_c30=$id_2++;
			echo $answer030;echo " <br/>";
			echo $question030;echo " <br/>";
			echo $type030;echo " <br/>";
			echo $id_c30;echo " <br/>";
			$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$question030', '$type030' ,'$answer030', '$date' )");
			if (mysql_affected_rows()>0){

				echo "berhasil";
			}else{
				echo "gagal edit";

			}
		}
		
		// if likert scale

		// if forced choice
		if (isset($_POST['forced1'])){
			$answeri1=$_POST['forced1'];
			$questioni1=$_POST['questioni1'];
			$typei1=$_POST['tipei1'];
			
			$ansi1_=$answeri1;
			$ansj1_=5-$ansi1_;
			$ansi1= array($ansi1_ , $ansj1_ );
			
			$j=0;
			foreach($questioni1 as $questi1)
			{
				$result['i1']=$questi1;
				$result['j1']=$typei1[$j];
				$result['k1']=$ansi1[$j];
				

				$i1=$result['i1'];
				$j1=$result['j1'];
				$k1=$result['k1'];
				
				$id_i=$id_2++;

				echo $i1;
				echo " <br/>";
				echo $j1;
				echo " <br/>";
				echo $k1;
				echo "<br/>";
				
				echo $id_i;
				echo " <br/>";
				$j++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i1', '$j1' ,'$k1', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced2'])){
			$answeri2=$_POST['forced2'];
			$questioni2=$_POST['questioni2'];
			$typei2=$_POST['tipei2'];
			
			$ansi2_=$answeri2;
			$ansj2_=5-$ansi2_;
			$ansi2= array($ansi2_ , $ansj2_ );
			
			$j2=0;
			foreach($questioni2 as $questi2)
			{
				$result['i2']=$questi2;
				$result['j22']=$typei2[$j2];
				$result['k2']=$ansi2[$j2];
				
				$i2=$result['i2'];
				$j22=$result['j22'];
				$k2=$result['k2'];
				$id_i2=$id_2++;

				echo $i2;
				echo " <br/>";
				echo $j22;
				echo " <br/>";
				echo $k2;
				echo "<br/>";
				
				echo $id_i2;
				echo " <br/>";
				$j2++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i2', '$j22' ,'$k2', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}


			}
			
			
		}
		if (isset($_POST['forced3'])){
			$answeri3=$_POST['forced3'];
			$questioni3=$_POST['questioni3'];
			$typei3=$_POST['tipei3'];
			
			$ansi3_=$answeri3;
			$ansj3_=5-$ansi3_;
			$ansi3= array($ansi3_ , $ansj3_ );
			
			$j3=0;
			foreach($questioni3 as $questi3)
			{
				$result['i3']=$questi3;
				$result['j33']=$typei3[$j3];
				$result['k3']=$ansi3[$j3];
				
				$i3=$result['i3'];
				$j33=$result['j33'];
				$k3=$result['k3'];
				$id_i3=$id_2++;

				echo $i3;
				echo " <br/>";
				echo $j33;
				echo " <br/>";
				echo $k3;
				echo "<br/>";
				
				echo $id_i3;
				echo " <br/>";
				$j3++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i3', '$j33' ,'$k3', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced4'])){
			$answeri4=$_POST['forced4'];
			$questioni4=$_POST['questioni4'];
			$typei4=$_POST['tipei4'];
			
			$ansi4_=$answeri4;
			$ansj4_=5-$ansi4_;
			$ansi4= array($ansi4_ , $ansj4_ );
			

			$j4=0;
			foreach($questioni4 as $questi4)
			{
				$result['i4']=$questi4;
				$result['j44']=$typei4[$j4];
				$result['k4']=$ansi4[$j4];
				
				$i4=$result['i4'];
				$j44=$result['j44'];
				$k4=$result['k4'];
				$id_i4=$id_2++;

				echo $i4;
				echo " <br/>";
				echo $j44;
				echo " <br/>";
				echo $k4;
				echo "<br/>";
				
				echo $id_i4;
				echo " <br/>";
				$j4++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i4', '$j44' ,'$k4', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced5'])){
			$answeri5=$_POST['forced5'];
			$questioni5=$_POST['questioni5'];
			$typei5=$_POST['tipei5'];
			$ansi5_=$answeri5;
			$ansj5_=5-$ansi5_;
			$ansi5= array($ansi5_ , $ansj5_ );
			
			$j5=0;
			foreach($questioni5 as $questi5)
			{
				$result['i5']=$questi5;
				$result['j55']=$typei5[$j5];
				$result['k5']=$ansi5[$j5];

				$i5=$result['i5'];
				$j55=$result['j55'];
				$k5=$result['k5'];
				$id_i5=$id_2++;

				echo $i5;
				echo " <br/>";
				echo $j55;
				echo " <br/>";
				echo $k5;
				echo "<br/>";
				
				echo $id_i5;
				echo " <br/>";
				$j5++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i5', '$j55' ,'$k5', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced6'])){
			$answeri6=$_POST['forced6'];
			$questioni6=$_POST['questioni6'];
			$typei6=$_POST['tipei6'];
			
			$ansi6_=$answeri6;
			$ansj6_=5-$ansi6_;
			$ansi6= array($ansi6_ , $ansj6_ );
			
			$j6=0;
			foreach($questioni6 as $questi6)
			{
				$result['i6']=$questi6;
				$result['j66']=$typei6[$j6];
				$result['k6']=$ansi6[$j6];
				
				$i6=$result['i6'];
				$j66=$result['j66'];
				$k6=$result['k6'];
				$id_i6=$id_2++;

				echo $i6;
				echo " <br/>";
				echo $j66;
				echo " <br/>";
				echo $k6;
				echo "<br/>";
				
				echo $id_i6;
				echo " <br/>";
				$j6++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i6', '$j66' ,'$k6', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced7'])){
			$answeri7=$_POST['forced7'];
			$questioni7=$_POST['questioni7'];
			$typei7=$_POST['tipei7'];
			
			$ansi7_=$answeri7;
			$ansj7_=5-$ansi7_;
			$ansi7= array($ansi7_ , $ansj7_ );
			
			$j7=0;
			foreach($questioni7 as $questi7)
			{
				$result['i7']=$questi7;
				$result['j77']=$typei7[$j7];
				$result['k7']=$ansi7[$j7];
				
				$i7=$result['i7'];
				$j77=$result['j77'];
				$k7=$result['k7'];
				$id_i7=$id_2++;

				echo $i7;
				echo " <br/>";
				echo $j77;
				echo " <br/>";
				echo $k7;
				echo "<br/>";
				
				echo $id_i7;
				echo " <br/>";
				$j7++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i7', '$j77' ,'$k7', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced8'])){
			$answeri8=$_POST['forced8'];
			$questioni8=$_POST['questioni8'];
			$typei8=$_POST['tipei8'];
			
			$ansi8_=$answeri8;
			$ansj8_=5-$ansi8_;
			$ansi8= array($ansi8_ , $ansj8_ );
			
			$j8=0;
			foreach($questioni8 as $questi8)
			{
				$result['i8']=$questi8;
				$result['j88']=$typei8[$j8];
				$result['k8']=$ansi8[$j8];
				
				$i8=$result['i8'];
				$j88=$result['j88'];
				$k8=$result['k8'];
				$id_i8=$id_2++;

				echo $i8;
				echo " <br/>";
				echo $j88;
				echo " <br/>";
				echo $k8;
				echo "<br/>";
				
				echo $id_i8;
				echo " <br/>";
				$j8++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i8', '$j88' ,'$k8', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced9'])){
			$answeri9=$_POST['forced9'];
			$questioni9=$_POST['questioni9'];
			$typei9=$_POST['tipei9'];
			
			$ansi9_=$answeri9;
			$ansj9_=5-$ansi9_;
			$ansi9= array($ansi9_ , $ansj9_ );
			
			$j9=0;
			foreach($questioni9 as $questi9)
			{
				$result['i9']=$questi9;
				$result['j99']=$typei9[$j9];
				$result['k9']=$ansi9[$j9];
				
				$i9=$result['i9'];
				$j99=$result['j99'];
				$k9=$result['k9'];
				$id_i9=$id_2++;

				echo $i9;
				echo " <br/>";
				echo $j99;
				echo " <br/>";
				echo $k9;
				echo "<br/>";
				
				echo $id_i9;
				echo " <br/>";
				$j9++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i9', '$j99' ,'$k9', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced10'])){
			$answeri10=$_POST['forced10'];
			$questioni10=$_POST['questioni10'];
			$typei10=$_POST['tipei10'];
			
			$ansi10_=$answeri10;
			$ansj10_=5-$ansi10_;
			$ansi10= array($ansi10_ , $ansj10_ );
			
			$j10=0;
			foreach($questioni10 as $questi10)
			{
				$result['i10']=$questi10;
				$result['j100']=$typei10[$j10];
				$result['k10']=$ansi10[$j10];
				
				$i10=$result['i10'];
				$j10=$result['j100'];
				$k10=$result['k10'];
				$id_i10=$id_2++;

				echo $i10;
				echo " <br/>";
				echo $j100;
				echo " <br/>";
				echo $k10;
				echo "<br/>";
				
				echo $id_i0;
				echo " <br/>";
				$j10++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i10', '$j100' ,'$k10', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced11'])){
			$answeri11=$_POST['forced11'];
			$questioni11=$_POST['questioni11'];
			$typei11=$_POST['tipei11'];
			
			$ansi11_=$answeri11;
			$ansj11_=5-$ansi11_;
			$ansi11= array($ansi11_ , $ansj11_ );
			
			$j11=0;
			foreach($questioni11 as $questi11)
			{
				$result['i11']=$questi11;
				$result['j111']=$typei11[$j11];
				$result['k11']=$ansi11[$j11];
				
				$i11=$result['i11'];
				$j111=$result['j111'];
				$k11=$result['k11'];
				$id_i11=$id_2++;

				echo $i11;
				echo " <br/>";
				echo $j111;
				echo " <br/>";
				echo $k11;
				echo "<br/>";
				
				echo $id_i11;
				echo " <br/>";
				$j11++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i11', '$j111' ,'$k11', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced12'])){
			$answeri12=$_POST['forced12'];
			$questioni12=$_POST['questioni12'];
			$typei12=$_POST['tipei12'];
			
			$ansi12_=$answeri12;
			$ansj12_=5-$ansi12_;
			$ansi12= array($ansi12_ , $ansj12_ );
			
			$j12=0;
			foreach($questioni12 as $questi12)
			{
				$result['i12']=$questi12;
				$result['j122']=$typei12[$j12];
				$result['k12']=$ansi12[$j12];
				
				$i12=$result['i12'];
				$j122=$result['j122'];
				$k12=$result['k12'];
				$id_i12=$id_2++;

				echo $i12;
				echo " <br/>";
				echo $j122;
				echo " <br/>";
				echo $k12;
				echo "<br/>";
				
				echo $id_i12;
				echo " <br/>";
				$j++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i12', '$j122' ,'$k12', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced13'])){
			$answeri13=$_POST['forced13'];
			$questioni13=$_POST['questioni13'];
			$typei13=$_POST['tipei13'];
			
			$ansi13_=$answeri13;
			$ansj13_=5-$ansi13_;
			$ansi13= array($ansi13_ , $ansj13_ );
			
			$j13=0;
			foreach($questioni13 as $questi13)
			{
				$result['i13']=$questi13;
				$result['j133']=$typei13[$j13];
				$result['k13']=$ansi13[$j13];
				
				$i13=$result['i13'];
				$j133=$result['j133'];
				$k13=$result['k13'];
				$id_i13=$id_2++;

				echo $i13;
				echo " <br/>";
				echo $j133;
				echo " <br/>";
				echo $k13;
				echo "<br/>";
				
				echo $id_i13;
				echo " <br/>";
				$j13++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i13', '$j133' ,'$k13', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced14'])){
			$answeri14=$_POST['forced14'];
			$questioni14=$_POST['questioni14'];
			$typei14=$_POST['tipei14'];
			
			$ansi14_=$answeri14;
			$ansj14_=5-$ansi14_;
			$ansi14= array($ansi14_ , $ansj14_ );
			
			$j14=0;
			foreach($questioni14 as $questi14)
			{
				$result['i14']=$questi14;
				$result['j144']=$typei14[$j14];
				$result['k14']=$ansi14[$j14];
				
				$i14=$result['i14'];
				$j144=$result['j144'];
				$k14=$result['k14'];
				$id_i14=$id_2++;

				echo $i14;
				echo " <br/>";
				echo $j144;
				echo " <br/>";
				echo $k14;
				echo "<br/>";
				
				echo $id_i14;
				echo " <br/>";
				$j14++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i14', '$j144' ,'$k14', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced15'])){
			$answeri15=$_POST['forced15'];
			$questioni15=$_POST['questioni15'];
			$typei15=$_POST['tipei15'];
			
			$ansi15_=$answeri15;
			$ansj15_=5-$ansi15_;
			$ansi15= array($ansi15_ , $ansj15_ );
			
			$j15=0;
			foreach($questioni15 as $questi15)
			{
				$result['i15']=$questi15;
				$result['j155']=$typei15[$j15];
				$result['k15']=$ansi15[$j15];
				
				$i15=$result['i15'];
				$j155=$result['j155'];
				$k15=$result['k15'];
				$id_i15=$id_2++;

				echo $i15;
				echo " <br/>";
				echo $j155;
				echo " <br/>";
				echo $k15;
				echo "<br/>";
				
				echo $id_i15;
				echo " <br/>";
				$j15++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i15', '$j155' ,'$k15', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		
		if (isset($_POST['forced16'])){
			$answeri16=$_POST['forced16'];
			$questioni16=$_POST['questioni16'];
			$typei16=$_POST['tipei16'];
			
			$ansi16_=$answeri16;
			$ansj16_=5-$ansi16_;
			$ansi16= array($ansi16_ , $ansj16_ );
			
			$j16=0;
			foreach($questioni16 as $questi16)
			{
				$result['i16']=$questi16;
				$result['j166']=$typei16[$j16];
				$result['k16']=$ansi16[$j16];
				
				$i16=$result['i16'];
				$j166=$result['j166'];
				$k16=$result['k16'];
				$id_i16=$id_2++;

				echo $i16;
				echo " <br/>";
				echo $j166;
				echo " <br/>";
				echo $k16;
				echo "<br/>";
				
				echo $id_i16;
				echo " <br/>";
				$j16++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i16', '$j166' ,'$k16', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced17'])){
			$answeri17=$_POST['forced17'];
			$questioni17=$_POST['questioni17'];
			$typei17=$_POST['tipei17'];
			
			$ansi17_=$answeri17;
			$ansj17_=5-$ansi17_;
			$ansi17= array($ansi17_ , $ansj17_ );
			
			$j17=0;
			foreach($questioni17 as $questi17)
			{
				$result['i17']=$questi17;
				$result['j177']=$typei17[$j17];
				$result['k17']=$ansi17[$j17];
				
				$i17=$result['i17'];
				$j177=$result['j177'];
				$k17=$result['k17'];
				$id_i17=$id_2++;

				echo $i17;
				echo " <br/>";
				echo $j177;
				echo " <br/>";
				echo $k17;
				echo "<br/>";
				
				echo $id_i17;
				echo " <br/>";
				$j17++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i17', '$j177' ,'$k17', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced18'])){
			$answeri18=$_POST['forced18'];
			$questioni18=$_POST['questioni18'];
			$typei18=$_POST['tipei18'];
			
			$ansi18_=$answeri18;
			$ansj18_=5-$ansi18_;
			$ansi18= array($ansi18_ , $ansj18_ );
			
			$j18=0;
			foreach($questioni1 as $questi1)
			{
				$result['i18']=$questi18;
				$result['j188']=$typei18[$j18];
				$result['k18']=$ansi18[$j18];
				
				$i18=$result['i18'];
				$j188=$result['j188'];
				$k18=$result['k18'];
				$id_i18=$id_2++;

				echo $i18;
				echo " <br/>";
				echo $j188;
				echo " <br/>";
				echo $k18;
				echo "<br/>";
				
				echo $id_i18;
				echo " <br/>";
				$j18++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i18', '$j188' ,'$k18', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced19'])){
			$answeri19=$_POST['forced19'];
			$questioni19=$_POST['questioni19'];
			$typei19=$_POST['tipei19'];
			
			$ansi19_=$answeri19;
			$ansj19_=5-$ansi19_;
			$ansi19= array($ansi19_ , $ansj19_ );
			
			$j=0;
			foreach($questioni19 as $questi19)
			{
				$result['i19']=$questi19;
				$result['j199']=$typei19[$j19];
				$result['k19']=$ansi19[$j19];
				
				$i19=$result['i19'];
				$j199=$result['j199'];
				$k19=$result['k19'];
				$id_i19=$id_2++;

				echo $i19;
				echo " <br/>";
				echo $j199;
				echo " <br/>";
				echo $k19;
				echo "<br/>";
				
				echo $id_i19;
				echo " <br/>";
				$j19++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i19', '$j199' ,'$k19', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced20'])){
			$answeri20=$_POST['forced20'];
			$questioni20=$_POST['questioni20'];
			$typei20=$_POST['tipei20'];
			
			$ansi20_=$answeri20;
			$ansj20_=5-$ansi20_;
			$ansi20= array($ansi20_ , $ansj20_ );
			
			$j20=0;
			foreach($questioni20 as $questi20)
			{
				$result['i20']=$questi20;
				$result['j200']=$typei20[$j20];
				$result['k20']=$ansi20[$j20];
				
				$i20=$result['i20'];
				$j200=$result['j200'];
				$k20=$result['k20'];
				$id_i20=$id_2++;

				echo $i20;
				echo " <br/>";
				echo $j200;
				echo " <br/>";
				echo $k20;
				echo "<br/>";
				echo $l20;
				echo "<br/>";
				echo $id_i20;
				echo " <br/>";
				$j20++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i20', '$j200' ,'$k20', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced21'])){
			$answeri21=$_POST['forced21'];
			$questioni21=$_POST['questioni21'];
			$typei21=$_POST['tipei21'];
			
			$ansi21_=$answeri21;
			$ansj21_=5-$ansi21_;
			$ansi21= array($ansi21_ , $ansj21_ );
			
			$j21=0;
			foreach($questioni21 as $questi21)
			{
				$result['i21']=$questi21;
				$result['j211']=$typei21[$j21];
				$result['k21']=$ansi21[$j21];
				
				$i1=$result['i21'];
				$j1=$result['j211'];
				$k1=$result['k11'];
				
				$id_i21=$id_2++;

				echo $i21;
				echo " <br/>";
				echo $j21;
				echo " <br/>";
				echo $k21;
				echo "<br/>";
				
				echo $id_i21;
				echo " <br/>";
				$j21++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i21', '$j211' ,'$k21', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced22'])){
			$answeri22=$_POST['forced22'];
			$questioni22=$_POST['questioni22'];
			$typei22=$_POST['tipei22'];
			
			$ansi22_=$answeri22;
			$ansj22_=5-$ansi22_;
			$ansi22= array($ansi22_ , $ansj22_ );
			
			$j22=0;
			foreach($questioni22 as $questi22)
			{
				$result['i22']=$questi22;
				$result['j222']=$typei22[$j22];
				$result['k22']=$ansi22[$j22];
				
				$i2=$result['i22'];
				$j22=$result['j222'];
				$k2=$result['k22'];
				$id_i22=$id_2++;

				echo $i22;
				echo " <br/>";
				echo $j222;
				echo " <br/>";
				echo $k22;
				echo "<br/>";
				
				echo $id_i22;
				echo " <br/>";
				$j22++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i22', '$j222' ,'$k22', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}


			}
			
			
		}
		if (isset($_POST['forced23'])){
			$answeri23=$_POST['forced23'];
			$questioni23=$_POST['questioni23'];
			$typei23=$_POST['tipei23'];
			
			$ansi23_=$answeri23;
			$ansj23_=5-$ansi23_;
			$ansi23= array($ansi23_ , $ansj23_ );
			
			$j23=0;
			foreach($questioni23 as $questi23)
			{
				$result['i23']=$questi23;
				$result['j233']=$typei23[$j23];
				$result['k23']=$ansi23[$j23];
				
				$i23=$result['i23'];
				$j233=$result['j233'];
				$k23=$result['k23'];
				$id_i23=$id_2++;

				echo $i23;
				echo " <br/>";
				echo $j233;
				echo " <br/>";
				echo $k23;
				echo "<br/>";
				
				echo $id_i23;
				echo " <br/>";
				$j23++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i23', '$j233' ,'$k23', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced24'])){
			$answeri24=$_POST['forced24'];
			$questioni24=$_POST['questioni24'];
			$typei24=$_POST['tipei24'];
			
			$ansi24_=$answeri24;
			$ansj24_=5-$ansi24_;
			$ansi24= array($ansi24_ , $ansj24_ );
			

			$j24=0;
			foreach($questioni24 as $questi24)
			{
				$result['i24']=$questi24;
				$result['j244']=$typei24[$j24];
				$result['k24']=$ansi24[$j24];
				
				$i24=$result['i24'];
				$j244=$result['j244'];
				$k24=$result['k24'];
				$id_i24=$id_2++;

				echo $i24;
				echo " <br/>";
				echo $j244;
				echo " <br/>";
				echo $k24;
				echo "<br/>";
				
				echo $id_i24;
				echo " <br/>";
				$j24++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i24', '$j244' ,'$k24', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced25'])){
			$answeri25=$_POST['forced25'];
			$questioni25=$_POST['questioni25'];
			$typei25=$_POST['tipei25'];
			
			$ansi25_=$answeri25;
			$ansj25_=5-$ansi25_;
			$ansi25= array($ansi25_ , $ansj25_ );
			
			$j25=0;
			foreach($questioni25 as $questi25)
			{
				$result['i25']=$questi25;
				$result['j255']=$typei25[$j25];
				$result['k25']=$ansi25[$j25];
				
				$i25=$result['i25'];
				$j255=$result['j255'];
				$k25=$result['k25'];
				$id_i25=$id_2++;

				echo $i25;
				echo " <br/>";
				echo $j255;
				echo " <br/>";
				echo $k25;
				echo "<br/>";
				
				echo $id_i25;
				echo " <br/>";
				$j25++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i25', '$j255' ,'$k25', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced26'])){
			$answeri26=$_POST['forced26'];
			$questioni26=$_POST['questioni26'];
			$typei26=$_POST['tipei26'];
			
			$ansi26_=$answeri26;
			$ansj26_=5-$ansi26_;
			$ansi26= array($ansi26_ , $ansj26_ );
			
			$j26=0;
			foreach($questioni26 as $questi26)
			{
				$result['i26']=$questi26;
				$result['j266']=$typei26[$j26];
				$result['k26']=$ansi26[$j6];
				
				$i26=$result['i26'];
				$j266=$result['j266'];
				$k26=$result['k26'];
				$id_i26=$id_2++;

				echo $i26;
				echo " <br/>";
				echo $j266;
				echo " <br/>";
				echo $k26;
				echo "<br/>";
				
				echo $id_i26;
				echo " <br/>";
				$j26++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i26', '$j266' ,'$k26', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced27'])){
			$answeri27=$_POST['forced27'];
			$questioni27=$_POST['questioni27'];
			$typei27=$_POST['tipei27'];
			
			$ansi27_=$answeri27;
			$ansj27_=5-$ansi27_;
			$ansi27= array($ansi27_ , $ansj27_ );
			
			$j27=0;
			foreach($questioni27 as $questi27)
			{
				$result['i27']=$questi27;
				$result['j277']=$typei27[$j27];
				$result['k27']=$ansi27[$j27];
				
				$i27=$result['i27'];
				$j277=$result['j277'];
				$k27=$result['k27'];
				$id_i27=$id_2++;

				echo $i27;
				echo " <br/>";
				echo $j277;
				echo " <br/>";
				echo $k27;
				echo "<br/>";
				
				echo $id_i27;
				echo " <br/>";
				$j27++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i27', '$j277' ,'$k27', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced28'])){
			$answeri28=$_POST['forced28'];
			$questioni28=$_POST['questioni28'];
			$typei28=$_POST['tipei28'];
			
			$ansi28_=$answeri28;
			$ansj28_=5-$ansi28_;
			$ansi28= array($ansi28_ , $ansj28_ );
			
			$j28=0;
			foreach($questioni28 as $questi28)
			{
				$result['i28']=$questi28;
				$result['j288']=$typei28[$j28];
				$result['k28']=$ansi28[$j28];
				
				$i28=$result['i28'];
				$j288=$result['j288'];
				$k28=$result['k28'];
				$id_i28=$id_2++;

				echo $i28;
				echo " <br/>";
				echo $j288;
				echo " <br/>";
				echo $k28;
				echo "<br/>";
				
				echo $id_i28;
				echo " <br/>";
				$j28++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i28', '$j288' ,'$k28', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced29'])){
			$answeri29=$_POST['forced29'];
			$questioni29=$_POST['questioni29'];
			$typei29=$_POST['tipei29'];
			
			$ansi29_=$answeri29;
			$ansj29_=5-$ansi29_;
			$ansi29= array($ansi29_ , $ansj29_ );
			
			$j29=0;
			foreach($questioni29 as $questi29)
			{
				$result['i29']=$questi29;
				$result['j299']=$typei29[$j29];
				$result['k29']=$ansi29[$j29];
				
				$i29=$result['i29'];
				$j299=$result['j299'];
				$k29=$result['k29'];
				$id_i29=$id_2++;

				echo $i29;
				echo " <br/>";
				echo $j299;
				echo " <br/>";
				echo $k29;
				echo "<br/>";
				
				echo $id_i29;
				echo " <br/>";
				$j29++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i29', '$j299' ,'$k29', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		if (isset($_POST['forced30'])){
			$answeri30=$_POST['forced30'];
			$questioni30=$_POST['questioni30'];
			$typei30=$_POST['tipei30'];
			
			$ansi30_=$answeri30;
			$ansj30_=5-$ansi30_;
			$ansi30= array($ansi30_ , $ansj30_ );
			
			$j30=0;
			foreach($questioni30 as $questi30)
			{
				$result['i30']=$questi30;
				$result['j300']=$typei30[$j30];
				$result['k30']=$ansi30[$j30];
				
				$i30=$result['i30'];
				$j30=$result['j300'];
				$k30=$result['k30'];
				$id_i30=$id_2++;

				echo $i30;
				echo " <br/>";
				echo $j300;
				echo " <br/>";
				echo $k30;
				echo "<br/>";
				
				echo $id_30;
				echo " <br/>";
				$j30++;
				$query=mysql_query("INSERT INTO survey_answer (username, unit_name, survey_name, group_name, question_name, question_type,  question_answer, last_modified) VALUES ('$username', '$unit_name', '$survey_name', '$group_name', '$i30', '$j300' ,'$k30', '$date' )");
				if (mysql_affected_rows()>0){

					echo "berhasil";
				}else{
					echo "gagal edit";

				}

			}
			
			
		}
		// if forced choice

		header('Location: survey.php');
	}
	else {
		echo 'no data';
	}
}
else if($_POST['submit']=='batal') {
	header('location: survey.php');
	
}

?>