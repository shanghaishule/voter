<?php
class ContentsAction extends CommonAction{


	public function add_form()
	{
        if(!$this->is_bind()){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }

        $type = $this->_get('type');

        $vid = $this->get_volun_id();
        $v_res = $this->get_volun_info($vid);
        
        if($v_res['type'] == 1 && $type == 1){
        	$this->error('注册志愿者无法发布监督信息', '__APP__/Index/personal', 3);
            exit;
        }

        $this->assign('type', $type);
		$this->display();
	}

	public function add_data()
	{

        $data['pic'] = $this->_post('pic_url');

		//1-监督信息 2-好人好事
		$data['type'] = $this->_post('type');
		$data['title'] = $this->_post('title');
		$data['contents'] = $_POST['contents'];
        $data['add_time'] = date('Y-m-d H:i:s');
        $data['v_id'] = $this->get_volun_id();
        
        if($data['v_id'] == '' && $_SESSION['temp'] == 1){
            $this->error('请先提交个人信息', '__APP__/Index/personal', 3);
            exit;
        }

        if($data['type'] != '1' && $data['type'] != '2'){
            $this->error('系统错误', '', 3);
            exit;
        }

        $obj = new Model('t_contents');
        $res = $obj->add($data);

        if($res){
            $this->success('提交成功', '__URL__/add_form?type='.$data['type'], 3);
        }else{
            $this->error('提交失败', '', 3);
        }
	}

	//显示卫生信息，监督志愿者发布的信息
	public function article_list()
	{
		$type = $this->_get('type');

        if($type != '1' && $type != '2'){
            $this->error('系统错误', '', 3);
            exit;
        }

        $where = 'type=' . $type;
		$obj = new Model('t_contents');
        //按照写入时间排序
		$res = $obj->where($where)->order('add_time DESC')->select();

        $this->assign('type', $type);
		$this->assign('res', $res);
		$this->display();
	}

    //文章列表
    public function article_detail()
    {
        $c_id = $this->_get('c_id');

        $obj = new Model('t_contents');

        $res = $obj->where('c_id=' . $c_id)->find();

        $this->assign('res', $res);

        $this->display();
    }

    //项目简介
    public function item_desc()
    {
        $where = 'type=3 AND status=1';
        $obj = new Model('t_contents');
        $res = $obj->where($where)->find();
        
        $this->assign('res', $res);
        $this->display();
    }

}