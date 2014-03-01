<?php
    //字符串截取
    function cutstr($string, $length=40,$charset="utf-8",$dot="...")
    {//字符，截取长度，字符集，结尾符 
        if(strlen($string) <= $length) { 
                return $string; 
        } 
        $pre = chr(1); 
        $end = chr(1); 
        //保护特殊字符串 
        $string = str_replace(array('&', '"', '<', '>'), array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), $string); 
        $strcut = ''; 
        if(strtolower($charset) == 'utf-8') { 
                $n = $tn = $noc = 0; 
                while($n < strlen($string)) { 
            $t = ord($string[$n]); 
            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) { 
                        $tn = 1; $n++; $noc++; 
            } elseif(194 <= $t && $t <= 223) { 
                        $tn = 2; $n += 2; $noc += 2; 
            } elseif(224 <= $t && $t <= 239) { 
                        $tn = 3; $n += 3; $noc += 2; 
            } elseif(240 <= $t && $t <= 247) { 
                        $tn = 4; $n += 4; $noc += 2; 
            } elseif(248 <= $t && $t <= 251) { 
                        $tn = 5; $n += 5; $noc += 2; 
            } elseif($t == 252 || $t == 253) { 
                        $tn = 6; $n += 6; $noc += 2; 
            } else { 
                        $n++; 
            } 
            if($noc >= $length) { 
                        break; 
            } 
                } 
                if($noc > $length) { 
            $n -= $tn; 
                } 
                $strcut = substr($string, 0, $n); 
        } else { 
                for($i = 0; $i < $length; $i++) { 
            $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i]; 
                } 
        } 
            //还原特殊字符串 
        $strcut = str_replace(array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), array('&', '"', '<', '>'), $strcut); 
        //修复出现特殊字符串截段的问题 
        $pos = strrpos($strcut, chr(1)); 
        if($pos !== false) { 
                $strcut = substr($s,0,$pos); 
        } 
        return $strcut.$dot; 
    } 

    function is_weixin(){ 
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
        }   
        return false;
    }

    // //倒计时 = 截止时间 - 现在
    // function daojishi($enddate, $startdate = '')
    // {
    //     $startdate = ($startdate == '') ? date('Y-m-d H:i:s') : $startdate;

    //     $date = floor( (strtotime($enddate) - strtotime($startdate) ) / 86400);
    //     $hour = floor( (strtotime($enddate) - strtotime($startdate) ) % 86400 / 3600);
    //     $minute = floor( (strtotime($enddate) - strtotime($startdate) ) % 86400 / 60);
    //     $second = floor( (strtotime($enddate) - strtotime($startdate) ) % 86400 % 60);

    //     $date = ($date < 0) ? '0' : $date;
    //     $hour = ($hour < 0) ? '0' : $hour;
    //     $minute = ($minute < 0) ? '0' : $minute;
    //     $second = ($second < 0) ? '0' : $second;

    //     return $date . '天' . $hour . '小时' . $minute . '分钟' . $second . '秒';
    // }

    function pic_path($path, $picname)
    {
        return empty($picname)?'../Public/images/default.jpg' : '__PUBLIC__/Uploads/' . $picname;
    }