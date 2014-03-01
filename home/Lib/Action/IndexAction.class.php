<?php
class IndexAction extends CommonAction {

    public function index()
    {
        // $route = array(
        //     '1_1' => 'Active/active_form',
        //     '1_2' => 'Active/active_jianbao',
        //     '1_3' => 'Contents/item_desc',
        //     '1_4' => 'Index/personal',
        //     '2_1' => 'Contents/add_form?type=1',
        //     '2_2' => 'Contents/article_list?type=1',
        //     '3_1' => 'Contents/add_form?type=2',
        //     '3_2' => 'Contents/article_list?type=2',
        // );

        // $key = $this->_get('key');
        // $key = !empty($key) ? $key : '1_4';

        // $this->redirect('__APP__/' . $route[$key]);
        // exit;
        $this->display();
    }

    public function register_form()
    {
        $this->display();
    }

    public function login_form()
    {
        $this->display();
    }

    public function login()
    {
        $condition['weixin_id'] = $this->_post('weixin_id');
        $condition['pwd'] = $this->_post('pwds');

        $obj = new Model('t_volunteer');

        $res = $obj->where($condition)->find();

        if($res){
            $_SESSION['v_id'] = $res['volunteer_id'];
            $_SESSION['temp'] = 0;//表示正常账号
            $this->success('登录成功', '__URL__/personal', 3);
        }else{
            $this->success('登录失败', '', 3);
        }
    }

    //个人信息完善
    public function personal()
    {
        if(!$this->is_bind()){
            $vid = $this->create_vid();
        }else{
            $vid = $this->get_volun_id();
        }
        
        $obj = new Model('t_volunteer');

        $res = $obj->where('volunteer_id=\'' . $vid . '\'')->find();
        if(empty($res)){
            $this->assign('vid', $vid);
        }else{
            $this->assign('vid', $res['volunteer_id']);
            $res['type_content'] = ($res['type'] == 1) ? '注册志愿者' : '监督志愿者';
            $this->assign('res', $res);
        }
        
        //我参加过的活动
        // $obj = new Model('t_volun_group');
        // $my_act = $obj->where('volun_join_id=\'' . $vid . '\'')->select();

        // foreach ($my_act as &$v) {
        //     $v['title'] = $this->get_title_by_id($v['c_id']);
        //     if($v['join'] == 1){
        //         $v['join'] = '同意';
        //     }else{
        //         $v['join'] = '取消';
        //     }
        // }

        // $this->assign('my_act', $my_act);

        $this->display('Index:personal');
    }

    public function personal_insert()
    {
        $id = $this->_post('id');
        $data['volunteer_id'] = $this->_post('volunteer_id');
        $data['weixin_id'] = $this->_post('weixin_id');
        $data['pwd'] = '123456';
        $data['name'] = $this->_post('name');
        $data['sex'] = $this->_post('sex');
        $data['work'] = $this->_post('work');
        $data['phone'] = $this->_post('phone');
        $data['love'] = $this->_post('love');
        $data['pwd'] = $this->_post('pwds');

        $obj = new Model('t_volunteer');

        $res_weixin_id = $obj->where('weixin_id=\'' . $data['weixin_id'] . '\'')->find();
        if(!empty($res_weixin_id)){
            $this->error('微信账号已存在！', '', 3);
            exit;
        }

        if($id == ''){
            $res = $obj->add($data);
        }else{
            $res = $obj->where('id=' . $id)->save($data);
        }
        
        if($res){
            $_SESSION['v_id'] = $data['volunteer_id'];
            $_SESSION['temp'] = 0;//表示正常账号
            $this->success('提交成功', '__URL__/personal', 3);
        }else{
            $this->error('提交失败', '', 3);
        }
    }

    public function logout()
    {
        $_SESSION['v_id'] = '';
        $_SESSION['temp'] = 1;//表示正常账号

        $this->success('退出成功', '__URL__/login_form', 3);
    }

}