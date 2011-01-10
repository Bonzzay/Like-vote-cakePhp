<?php
class Like extends LikesAppModel {

	var $name = 'Like';
	var $validate = array(
		'model' => array('notempty'),
		'foreign_key' => array('numeric'),
		'creator_id' => array('numeric'),
		'modifier_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Creator' => array('className' => 'Profile',
								'foreignKey' => 'creator_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Modifier' => array('className' => 'Profile',
								'foreignKey' => 'modifier_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	function afterSave(){
	        $foreign_key = $this->data['Like']['foreign_key'];
	        $model = $this->data['Like']['model'];
	        
	        //TODO: class register con el $model
	        ClassRegistry::init($model);
	        $this->ModelObject = Classregistry::init($model);
	        //App::import('Model',$model);
	        $item = $this->ModelObject->read(null,$foreign_key);
	        return true;
	    }
}
