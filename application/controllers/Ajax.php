	public function update_education_post($jobseeker_id)
    {
    	//echo "yghjfhghfhgfhfghgfhgfhgfhgfhfghgf";exit;
        if (!empty($jobseeker_id) && $jobseeker_id > 0)
        {
        	
        	if (empty($this->app_request->check()))
			{
			//$data = $this->input->post('group-a');
			$data = $this->input->post();
			}
			else
			{
			$data = $this->input->post();
			}
			//echo "<pre>";print_r($this->input->post());exit;
              //$data = $this->input->post('group-a');
				//print_r($data);exit;
				
                //$this->Jobseeker_model->delete_education($jobseeker_id);
                if(!empty($data)){
                	if(isset($data['index'])){
                		//echo "gffgfgfdgfhfff";
                		$num=$data['index'];
                		$array = array(                    
						"education_details.".$num.".university"=>$data['university'],
						"education_details.".$num.".specialization"=>$data['specialization'],
						"education_details.".$num.".status"=>$data['status'],
						"education_details.".$num.".qualification"=>$data['qualification'],
						"education_details.".$num.".completion_year"=>$data['completion_year'],
						"education_details.".$num.".sub_specialization"=>$data['sub_specialization']
						);
                		//echo "<pre>";print_r($arr);exit;
						$result=$this->Jobseeker_model->edit_education($array,$jobseeker_id);

						if($result==1){
						if (empty($this->app_request->check()))
						{
						$this->response(array('status'=>'success','message'=>"Update"));
						}
						else
						{
						$this->response(array('status'=>'success','message'=>"Update"));
						}


						}else{
						if (empty($this->app_request->check()))
						{
						$this->response(array('status'=>'error','message'=>"ERROR"));
						}
						else
						{
						$this->response(array('status'=>'error','message'=>"ERROR"));
						}

						}

                	}else{
                		//echo "2222222222222222222";
                		//print_r($jobseeker_id);exit;
                		//echo "<pre>";print_r($this->input->post());exit;
						$array= array(
						//'jobseeker_id'      =>  $jobseeker_id,
						'university'      =>  $data['university'],
						//'percentage'      =>  $data[$i]['percentage'],
						//'additional_info'   =>  $data[$i]['additional_info'],
						'qualification'          =>  $data['qualification'],
						'specialization'    =>  $data['specialization'],
						'sub_specialization'    =>  $data['sub_specialization'],
						'status'    =>  $data['status'],
						'completion_year'    =>  $data['completion_year'],
						);
						$result=$this->Jobseeker_model->add_education($array,$jobseeker_id);

						if($result==1){
						if (empty($this->app_request->check()))
						{
						$this->response(array('status'=>'success','message'=>"Saved"));
						}
						else
						{
						$this->response(array('status'=>'success','message'=>"Saved"));
						}


						}else{
						if (empty($this->app_request->check()))
						{
						$this->response(array('status'=>'error','message'=>"ERROR"));
						}
						else
						{
						$this->response(array('status'=>'error','message'=>"ERROR"));
						}

						}



                	}
	               
					
				}else{
					 if (empty($this->app_request->check()))
							{
								$this->response(array('status'=>'error','message'=>"ERROR"));
							}
							else
							{
								$this->response(array('status'=>'error','message'=>"ERROR"));
							}

						}
				}else{

					if (empty($this->app_request->check()))
							{
								$this->response(array('status'=>'error','message'=>"ERROR"));
							}
							else
							{
								$this->response(array('status'=>'error','message'=>"ERROR"));
							}

						}
		}
