<?php
class BaseAction extends Action{
	protected function _initialize(){
		define('RES', THEME_PATH.'common');
		define('STATICS',TMPL_PATH.'static');
		$this->assign('action',$this->getActionName());
	}

	//添加所有内容,包含关键词
	protected function all_insert($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->add();
			if($id){
				$m_arr=array('Img','Text','Voiceresponse','Ordering','Lottery','Host','Product','Selfform','Panorama','Wedding','Vote','Estate','Reservation','Greeting_card');
				if(in_array($name,$m_arr)){
					//isset($_POST['precisions']) ? $precisions = 1: $precisions = 0 ;
					$this->handleKeyword($id,$name,$_POST['keyword'],intval($_POST['precisions']));

				}

				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	//单一信息添加
	protected function insert($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->add();
			if($id==true){
				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	//单子信息修改
	protected function save($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->save();
			if($id==true){
				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	//修改所有内容,包含关键词
	protected function all_save($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->save();
			if($id){
				$m_arr=array(
				'Img',
				'Text',
				'Voiceresponse',
				'Ordering','Lottery',
				'Host','Product',
				'Selfform',
				'Panorama',
				'Wedding',
				'Vote',
				'Estate',
				'Reservation',
				'Carowner','Carset'
				);
				if(in_array($name,$m_arr)){
					$this->handleKeyword(intval($_POST['id']),$name,$_POST['keyword'],intval($_POST['precisions']));

				}
				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	protected function del_id($name='',$jump=''){
		$name=$name?$name:MODULE_NAME;
		$jump=empty($name)?MODULE_NAME.'/index':$jump;
		$db=D($name);
		$where['id']=$this->_get('id','intval');
		$where['token']=session('token');
		if($db->where($where)->delete()){
			$this->success('操作成功',U($jump));
		}else{
			$this->error('操作失败',U(MODULE_NAME.'/index'));
		}
	}
	protected function all_del($id,$name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->delete($id)){
			$this->ajaxReturn('操作成功',U(MODULE_NAME.$back));
		}else{
			$this->ajaxReturn('操作失败',U(MODULE_NAME.$back));
		}
	}

	//通用添加关键词 支持逗号和空格分隔关键词
	public function handleKeyword($id,$module,$keyword='',$precisions=0,$delete=0){
		$db=M('Keyword');
		$token = session('token');
		$db->where(array('pid'=>$id,'token'=>$token,'module'=>$module))->delete();
		$keyword = trim(trim($keyword),',');

		if (!$delete){

			$data['pid']=$id;
			$data['module']=$module;
			$data['token']=$token;

			$flag1 = strpos($keyword,',');
			$flag2 = strpos($keyword,' ');

			if( $flag1 === false &&  $flag2 === false ){
				$pk = explode('|',$keyword);
				if(count($pk) == 2){
					$data['precisions'] = $pk[1];
					$data['keyword'] = $pk[0];
				}else{
					$data['precisions'] = $precisions;
					$data['keyword'] = $keyword;
				}

				$db->add($data);

			}else{
				//关键词 关键|1 关键词|0
				if($flag1 === false){
					$keyword = explode(' ', $keyword);
					foreach ($keyword as $k => $v){
						$pk = explode('|',$v);
						if(count($pk) == 2){
							$data['precisions'] = $pk[1];
							$data['keyword'] = $pk[0];
						}else{
							$data['precisions'] = $precisions;
							$data['keyword'] = $v;
						}
						$db->add($data);
					}


				}else{

					$keyword = explode(',', $keyword);
					foreach ($keyword as $k => $v){
						$pk = explode('|',$v);
						if(count($pk) == 2){
							$data['precisions'] = $pk[1];
							$data['keyword'] = $pk[0];
						}else{
							$data['precisions'] = $precisions;
							$data['keyword'] = $v;
						}
						$db->add($data);
					}
				}
			}
		}
	}
	
}

