<?php
class ActiveAction extends CommonAction{

    //活动项目
    public function active_form()
    {
        if(!$this->is_bind()){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }
        // if(!$this->is_group()){
        //     $this->error('请先注册组织信息', '__APP__/Group/group', 3);
        //     exit;
        // }

        $this->display(); 
    }

    public function add_active()
    {
        $data['pic'] = $this->_post('pic_url');
        $data['v_id'] = $this->get_volun_id();
        $data['title'] = $this->_post('title');
        $data['date_time_start'] = $this->_post('date_time_start') . ' ' . $this->_post('hour1') . ':' . $this->_post('minit1') . ':00';
        $data['date_time_end'] = $this->_post('date_time_end') . ' ' . $this->_post('hour2') . ':' . $this->_post('minit2') . ':00';
        $data['place'] = $this->_post('place');
        $data['contents'] = $this->_post('contents');
        $data['num'] = $this->_post('num');
        
        $obj = new Model('t_active');

        $res = $obj->add($data);

        if($res){
            $this->success('发布成功', '__URL__/active_form', 3);
        }else{
            $this->error('发布失败', '', 3);
        }        
    }

    //最新活动，默认是5条
    public function newest_active()
    {
        $obj = new Model('t_active');
        $my_content = $obj->order('date_time_start DESC')->limit(5)->select();
        
        $this->assign('my_content', $my_content);

        $this->display();
    }

    //活动信息包含正在招募的活动和已经结束的活动
    //这些活动信息有些是正在招募的，有些是已经结束的，不分类，只按照发布时间排序。
    //活动简报
    public function active_info()
    {
        $v_id = $this->get_volun_id();
        $obj = new Model('t_active');

        if (empty($v_id)) {
            $other_content = $obj->select();
            $this->assign('other_content', $other_content);
        }else{
            //列出自己发布的项目
            $where = 'v_id=\'' . $v_id . '\'';
            $my_content = $obj->where($where)->select();
            $this->assign('my_content', $my_content);

            $v_g = new Model('t_volun_group');
            $act = $v_g->where('volun_join_id=\'' . $v_id . '\'')->field('a_id')->select();
            $arr = array();
            foreach ($act as $v) {
                $arr[] = $v['a_id'];
            }
            $str2 = implode(',', $arr);

            //我参与的活动
            $where = 'a_id in (' . $str2 . ')';
            $my_join_content = $obj->where($where)->select();
            $this->assign('my_join_content', $my_join_content);

            //列出不是自己发布的项目
            $where = 'v_id<>\'' . $v_id . '\'';
            $other_content = $obj->where($where)->select();
            $this->assign('other_content', $other_content);
        }

        $this->display(); 
    }

    //活动简报详情
    public function active_detail()
    {
        $a_id = $this->_get('a_id');

        $obj = new Model('t_active');
        $res = $obj->where('a_id=' . $a_id)->find();

        if(empty($res)){
            $this->error('活动不存在', '', 3);
            exit;
        }

        $obj2 = new Model('t_volun_group');
        
        //判断活动是否报名
        $condition['a_id'] = $a_id;
        $condition['volun_id'] = $res['v_id'];
        $condition['volun_join_id'] = $this->get_volun_id();

        //判断活动是不是登陆者发布
        if($res['v_id'] == $this->get_volun_id()){
            $res['is_admin'] = '1';
            $volun_res = $obj2->where('a_id=' . $a_id . " AND volun_id='" . $res['v_id'] . "'")->select();
            $this->assign('volun_res', $volun_res);
        }else{
            $res['is_admin'] = '0';
        }

        $res2 = $obj2->where($condition)->find();

        //活动是否结束，小于0表示结束
        $res_time = strtotime($res['date_time_end']) - strtotime($res['date_time_start']);
        if($res_time <= 0 || strtotime($res['date_time_start']) <= time()){
            //上传图片
            $res['flag'] = '-1';
        }elseif(empty($res2)){
            //未报名->【我要报名】
            $res['flag'] = '0';
        }else{
            //已经报名，1-同意，2-取消
            $res['flag'] = $res2['join'];
            if($res2['join'] == '1'){
                $obj3 = new Model('t_notice');
                $notice = $obj3->where('a_id=' . $a_id . ' AND v_id=\'' . $res['v_id'] . '\'')->find();
                $this->assign('notice', $notice['notice']);
            }
        }

        //获取报名人数
        $num_baoming = $obj2->where('a_id=' . $a_id)->count();
        $res['num_baoming'] = $num_baoming;
        $this->assign('res', $res);

        //获取活动对应的图片
        $obj3 = new Model('t_active_images');
        $img = $obj3->where('a_id=' . $a_id)->order('add_time DESC')->select();
        $this->assign('img', $img);

        $this->display();
    }

    //活动报名
    public function join()
    {
        if(!$this->is_bind()){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }
        
    	$data['a_id'] = $this->_get('a_id');
    	$data['volun_id'] = $this->_get('v_id');
    	$data['volun_join_id'] = $this->get_volun_id();

        if($data['a_id'] == '' || $data['volun_id'] == ''){
            $this->error('系统错误或者活动不存在', '', 3);
            exit;   
        }

        if($data['volun_join_id'] == '' && $_SESSION['temp'] == 1){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }

    	$obj = new Model('t_volun_group');

        //判断报名人数是否已满
        $obj2 = new Model('t_active');
        $res2 = $obj2->where('a_id=' . $data['a_id'])->find();
        //获取报名人数
        $num_baoming = $obj->where('a_id=' . $data['a_id'])->count();
        if($num_baoming >= $res2['num']){
            $this->error('活动报名人数已满', '', 3);
            exit;
        }

        $res1 = $obj->where($data)->find();
		if($res1){
			$this->error('您已经报过名', '', 3);
			exit;
		}

    	$res = $obj->add($data);

        if($res){
            $this->success('报名成功', '', 3);
        }else{
            $this->error('报名失败', '', 3);
        }
    }

    //取消报名
    public function unjoin()
    {
        if(!$this->is_bind()){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }
        
        $data['a_id'] = $this->_get('a_id');
        $data['volun_id'] = $this->_get('v_id');
        $data['volun_join_id'] = $this->get_volun_id();

        if($data['a_id'] == '' || $data['volun_id'] == ''){
            $this->error('系统错误或者活动不存在', '', 3);
            exit;   
        }

        if($data['volun_join_id'] == '' && $_SESSION['temp'] == 1){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }

        $obj = new Model('t_volun_group');

        $res1 = $obj->where($data)->delete();
        if($res1){
            $this->success('取消报名成功', '', 3);
        }else{
            $this->error('取消报名失败', '', 3);
        }
    }

    //添加图片
    public function upload_file()
    {
        $data['pic'] = $path2 . $this->_post('pic_url');
        $data['a_id'] = $this->_post('a_id');
        $data['add_time'] = date('Y-m-d H:i:s');

        $obj = new Model('t_active_images');
        $res = $obj->add($data);
        if($res){
            $this->success('图片上传成功', '', 3);
        }else{
            $this->error('图片上传失败', '', 3);
        }
    }

    //添加通知
    public function add_notice()
    {
        $data['v_id'] = $this->get_volun_id();;
        $data['a_id'] = $this->_post('a_id');
        $data['notice'] = $this->_post('notice');

        $obj = new Model('t_notice');

        $r = $obj->where('a_id=' . $data['a_id'] . ' AND v_id=\'' . $data['v_id'] . '\'')->find();
        if($r){
            $this->error('已经添加', '', 3);
            exit;
        }

        $res = $obj->add($data);
        if($res){
            $this->success('添加成功', '', 3);
        }else{
            $this->error('添加失败', '', 3);
        }
    }

    //报名人数链接
    // public function num_baoming()
    // {
    // 	//当前登录id
    // 	$a_id = $this->_get('a_id');
    // 	$v_id = $this->get_volun_id();

    // 	$obj = new Model('t_volun_group');

    // 	$res = $obj->where('a_id=' . $a_id . ' AND volun_id=\'' .$v_id . '\'')->select();
		
    //     $aree_num = 0;
    // 	foreach ($res as &$v) {
    // 		$v['title'] = $this->get_title_by_id($v['a_id']);

    //         if($v['join'] == 1){
    //             $aree_num ++;
    //         }
    // 	}
    //     $count = count($res);

    //     $this->assign('count', $count);
    //     $this->assign('aree_num', $aree_num);
    // 	$this->assign('res', $res);
    // 	$this->display();
    // }

    //同意、取消加入
    public function agree_join()
    {
    	$vg_id = $this->_get('vg_id');

    	$obj = new Model('t_volun_group');

    	$res_data = $obj->where('vg_id=' . $vg_id)->find();

    	if($res_data['join'] == 1){
    		$data['join'] = 2;
    	}elseif($res_data['join'] == 2){
    		$data['join'] = 1;
    	}else{
    		$this->error('操作错误', '', 3);
    	}

		$res = $obj->where('vg_id=' . $vg_id)->save($data);

        if($res != false){
            $this->success('操作成功', '', 3);
        }else{
            $this->error('操作失败', '', 3);
        }
    }

    public function end_active()
    {
        $a_id = $this->_get('a_id');

        if(empty($a_id)){
            $this->error('活动不存在！', '', 3);
            exit;
        }

        $obj = new Model('t_active');

        $data['date_time_end'] = date('Y-m-d H:i:s');
        $res = $obj->where('a_id=' . $a_id)->save($data);

        if($res != false){
            $this->success('操作成功！', '', 3);
        }else{
            $this->error('操作失败！', '', 3);
        }
    }

}
