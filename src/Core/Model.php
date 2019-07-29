<?php
namespace AHT\Core;

    class Model
    {
    	protected $created_at;
    	protected $updated_at;

    	public function getProperties($model){
            return get_object_vars($model);
        }

        public function setCreatedAt($created_at)
        {
        	$this->created_at = $created_at;
        }

        public function getCreatedAt()
        {
        	return $this->created_at;
        }

        public function setUpdatedAt($updated_at)
        {
        	$this->updated_at = $updated_at;
        }

        public function getUpdatedAt()
        {
        	return $this->updated_at;
        }

    }
