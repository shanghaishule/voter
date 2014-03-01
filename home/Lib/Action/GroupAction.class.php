<?php
class GroupAction extends CommonAction{

	public function group()
	{
        if(!$this->is_bind()){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }
        $vid = $this->get_volun_id();

		$obj = new Model('t_group');
		$res = $obj->where('resp=\'' . $vid . '\'')->find();

		$this->assign('res', $res);
        $this->assign('vid', $vid);
		$this->display();
	}

	public function group_insert()
	{
		$data['name'] = $this->_post('name');
		$data['mem_num'] = $this->_post('mem_num');
		$data['resp'] = $this->_post('resp');
		$data['phone'] = $this->_post('phone');

        $vid = $this->get_volun_id();
		$obj = new Model('t_group');
		$res = $obj->where('resp=\'' . $vid . '\'')->find();
		
		if(!empty($res)){
			//更新
			$g_id = $this->_post('g_id');
			$res2 = $obj->where('g_id=' . $g_id)->save($data);
		}else{
			$res2 = $obj->add($data);
		}

        if($res2){
            $this->success('组织注册成功', '__APP__/Group/group', 3);
        }else{
            $this->error('组织注册失败', '', 3);
        } 
	}
}