<?php
class PicAction extends Action{
	
	public function upload_image()
	{
        if($_FILES['pic']['size'] != ''){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

            $path1 = './Public/Uploads/';
            $path2 = date('Ymd') . '/';
            if(!is_dir($path1)){
                mkdir($path1, 0777);
            }

            $upload->savePath = $path1 . $path2;// 设置附件上传目录
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
                exit;
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
                $data['pic'] = $path2 . $info['0']['savename'];
            }
        }else{
            $data['pic'] = '';
        }

        echo $data['pic'];
	}

}