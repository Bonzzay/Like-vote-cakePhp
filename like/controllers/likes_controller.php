<?php
class LikesController extends LikesAppController {

	var $name = 'Likes';
	var $helpers = array('Html', 'Form', 'Ajax', 'Time');
	var $components = array('RequestHandler');

	function beforeFilter() {
		parent::beforeFilter();
		//this->Auth->allow('index', 'add','view');
		$this->Auth->allow('view','add');
	}
	function view($model, $id) {
			$num = $this->Like->find('count', array('conditions' => array('Like.model' => $model,'Like.foreign_key'=>$id)));
			$usernum = $this->Like->find('count', array('conditions' => array('Like.model' => $model,'Like.foreign_key'=>$id,'Like.creator_id'=>$this->Auth->user('id'))));
			if($usernum != 0){
				$this->set('vote', 1 );
			}else{
				$this->set('vote', 0 );
			}
			$this->set('num', $num);
			$this->set('_model', $model);
			$this->set('_foreignKey', $id);
		}
	function add($model = null, $id = null){
		$this->data['Like']['creator_id'] = $this->Auth->user('id');
		$this->data['Like']['model']=$model;
		$this->data['Like']['foreign_key']=$id;
		$this->Like->create();
		if ($this->Like->save($this->data)) {
			
			$this->data = array();
			$this->set('successful', true);
		} else {
			//$this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true));
			
		}
		$num = $this->Like->find('count', array('conditions' => array('Like.model' => $model,'Like.foreign_key'=>$id)));
		$usernum = $this->Like->find('count', array('conditions' => array('Like.model' => $model,'Like.foreign_key'=>$id,'Like.creator_id'=>$this->Auth->user('id'))));
		if($usernum != 0){
			$this->set('vote', 1 );
		}else{
			$this->set('vote', 0 );
		}
		$this->set('num', $num);
		$this->set('_model', $model);
		$this->set('_foreignKey', $id);
		$this->render('view');
		
	
	}
}
?>
