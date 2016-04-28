<?php

namespace Zendvn\Time;

class Time{

    public function time_ago($time, $date_format = 'd-m-Y'){
        $diff = time() - (int)$time;
        if ($diff == 0){
            return 'Mới đây';
        }

        $intervals = array(
            1 => array('năm', 31556926),
            $diff < 31556926 => array('tháng', 2628000),
            $diff < 2629744 => array('tuần', 604800),
            $diff < 604800 => array('ngày', 86400),
            $diff < 86400 => array('giờ', 3600),
            $diff < 3600 => array('phút', 60),
            $diff < 60 => array('giây', 1)
        );

        $value = floor($diff/$intervals[1][1]);
        $ago = $value.' '.$intervals[1][0];
        $days = array('Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy');
        $day = $days[date('w', $time)];

        if ($ago == '1 ngày'){
            return 'Hôm qua vào lúc '.date('H:i', $time);
        }elseif ($ago == '2 ngày' || $ago == '3 ngày' || $ago == '4 ngày' || $ago == '5 ngày' || $ago == '6 ngày' || $ago == '7 ngày') {
            return $day.' lúc '.date('H:i', $time);
        }elseif ($value <= 59 && $intervals[1][0] == 'giây' && $value > 0 ||  $intervals[1][0] == 'phút' ||  $intervals[1][0] == 'giờ') {
            return $ago.' trước';
        }else{
            return 'cách đây ' .$ago;
        }
    }
}