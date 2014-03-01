<?php
class CommonAction extends Action{

    protected function _initialize()
    {
        header("Content-Type:text/html;charset=utf-8");

        if(!$this->is_bind()){
            $vid = $this->create_vid();
        }else{
            $vid = $this->get_volun_id();
        }

        $this->assign('vvv_id', $vid);
    }
    
    //创建志愿者号
    protected function create_vid()
    {
        if( $this->get_volun_id() == ''){
            $create_id = $this->get_id();
            $_SESSION['v_id'] = 'ZYBS'. date('Y') . $create_id;
            $_SESSION['temp'] = 1;//1表示临时帐号，0表示注册帐号
        }
        return $this->get_volun_id();
    }

    //创建编号
    protected function get_id()
    {
        $tempObj = new Model('t_temp');
        $res = $tempObj->lock(true)->find();
        
        if($res == null){
            $temp = 0;
            $data['v_id'] = '1';
            $tempObj->add($data);
        }else{
            $condition['t_id'] = $res['t_id'];
            $data['v_id'] = (int)$res['v_id'] + 1;
            $tempObj->where($condition)->save($data);
            $temp = (int)$res['v_id'];
        }
        
        $t = (int)$temp + 1;

        if($t < 10) return '000' . $t;
        elseif( ($t >= 0) && ($t < 100) ) return '00' . $t;
        elseif( ($t >= 100) && ($t < 1000) ) return '0' . $t;
        elseif( ($t >= 1000) ) return $t;
    }

    protected function get_volun_id()
    {
        return isset($_SESSION['v_id']) ? $_SESSION['v_id'] : '';
    }

    protected function get_title_by_id($a_id)
    {
        $obj = new Model('t_active');

        $res = $obj->where('a_id=' . $a_id)->find();

        return $res['title'];
    }

    protected function get_volun_info($v_id)
    {
        $obj = new Model('t_volunteer');

        $res = $obj->where('volunteer_id=\'' . $v_id . '\'')->find();

        return $res;
    }

    //是否绑定微信号
    protected function is_bind()
    {
        //dump($this->get_volun_id());
        //dump($_SESSION['temp']);
        //没有注册或者是临时账号
        if( ($this->get_volun_id() == '') && ($_SESSION['temp'] == 1) ){
            //dump('a');
            return false;
        }elseif( ($this->get_volun_id() != '') && ($_SESSION['temp'] == 1) ){
            //dump('b');
            return false;
        }elseif( ($this->get_volun_id() != '') && ($_SESSION['temp'] == 0) ){
            //dump('c');
            //已经登录
            return true;
        }else{
            return false;
        }
    }

    //是否是志愿者组织
    protected function is_group()
    {
        //$this->get_volun_id()
        if(!$this->is_bind()){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }
        $vid = $this->get_volun_id();

        $obj = new Model('t_group');
        
        $res = $obj->where('resp=\'' . $vid . '\'')->find();
        
        if(!empty($res)){
            return true;
        }else{
            return false;
        }
    }

    // protected function upload_file()
    // {
    //     if($_FILES['pic']['size'] != ''){
    //         import('ORG.Net.UploadFile');
    //         $upload = new UploadFile();// 实例化上传类
    //         $upload->maxSize  = 3145728 ;// 设置附件上传大小
    //         $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

    //         $path1 = './Public/Uploads/';
    //         $path2 = date('Ymd') . '/';
    //         if(!is_dir($path1)){
    //             mkdir($path1, 0777);
    //         }

    //         $upload->savePath = $path1 . $path2;// 设置附件上传目录
    //         if(!$upload->upload()) {// 上传错误提示错误信息
    //             $this->error($upload->getErrorMsg());
    //             exit;
    //         }else{// 上传成功 获取上传文件信息
    //             $info =  $upload->getUploadFileInfo();
    //             $data['pic'] = $path2 . $info['0']['savename'];
    //         }
    //     }else{
    //         $data['pic'] = '';
    //     }
    // }
}