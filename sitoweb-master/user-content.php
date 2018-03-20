<!DOCTYPE html>
<?php
	class Content{
		private $content =array();
		
		public function addContent($newContent){
			
		array_push($this->content,$ newContent);
		
		}	
	}
	

	class ContentPost{

		private $title;
		private $description;
		private $code;
		private $arraycommenti =array();
		
		public function __construct veicoliManager($Title,$Description,$Code) { 
        this ->$title; 
        this ->$description;
		this ->$code;
		}
		   public function __setTitle($new_title) {
        $this->$title=$new_title;
		}
		
		public function __getTitle($title) {
			return $title;
		}
		
		public function __setDescription($new_description) {
        $this->$description=$new_description;
		}
		public function __getDescription($new_description) {
			return $description;
		}
		
		public function __setCode($new_code) {
        $this->$code=$new_code;
		}
		
		public function __getCode($code) {
			return $code;
		}
	}
	?>
