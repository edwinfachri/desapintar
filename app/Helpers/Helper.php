<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;


class Helper
{
	public static function generateArray($tbl,$id="",$value="",$crit="1=1"){
        	$ret=array();
        	$sql="select * from $tbl where $crit";
        	$retu=DB::select($sql);
		$ret[]="-";
		foreach($retu as $v){
			$ret[trim($v->$id)]=trim($v->$value);
		}
		return $ret;
	}
	
	public static function generateReftext($refidx="",$refno=""){
		$retu=DB::table('ref')->where('refidx',$refidx)->where('refno',$refno)->value('reftext');
		if ($retu == "") {
			return "-";
		}
		return $retu;
	}
}
