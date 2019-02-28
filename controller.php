<?php

include 'model.php';
Class Controller extends Models{
	public $email;
	public $password;
	public $section;
	public $topic;
	public $picture_name;
	public $picture_location;
	public $picture_type;
	public $picture_size;
	// public $video_name;
	// public $video_location;
	// public $video_type;
	// public $video_size;
	// public $audio_name;
	// public $audio_location;
	// public $audio_type;
	// public $audio_size;
	public $document_name;
	public $document_location;
	public $document_type;
	public $document_size;
	public $word;
	public $category;
	public $media;
	public $subtitle;
	public $idUpdate;

	public function validateLogin(){
		if (isset($_POST['submit'])){
			$this->email = htmlspecialchars($_POST['email']);
			$this->password = $_POST['password'];

			$error = array();

			if(empty($this->email) or !filter_var($this->email, FILTER_VALIDATE_EMAIL)){
				$error[0] = "<p class=''>Email is Empty of Incorrect</p>";
			}
			if(empty($this->password)){
				$error[1] = "<p class=''>Password field is Empty</p>";
			}


			if(!empty($error)){
				echo implode($error);		
			}
			else{
				$this->loginUser($this->email, $this->password);
			}
		}
	} 

	public function loginUser($email, $password)
	{
		$call = new Models;
		$result = $call->login($email, $password);

		echo $result;
	}

	public function insertsection(){
		if (isset($_POST['submit'])){
			$this->section = htmlspecialchars($_POST['section']);
			$error = array();
			if(empty($this->section)){
				$error[0] =  "Filed is empty";
			}

			if(!empty($error)){
				echo implode($error);
			}
			else{
				$this->callSection($this->section);
			}
		}		
	}

	public function callSection($name){
		$call = new Models;
		$result = $call->section($name);
		echo $result;
	}

	public function serviceSelect(){
		$call = new Models;
		$result = $call->selectSection();
		//var_dump($result);
		//$array = explode( ' ', $result);
		if(is_array($result)){
			foreach($result as $value){

				echo "<option value='".$value['Id']."'>". $value['Name'] . "</p>";
			}
		}
	}

	public function insertPost(){
		if (isset($_POST['upload'])){
			$this->topic = $_POST['name'];
			$this->category = $_POST['category'];
			$this->word = $_POST['word'];
			$this->subtitle = $_POST['section'];
			$this->media = $_POST['media'];
			// $this->audio_name = $_FILES['audio_file']['name'];
         	// $this->audio_location = $_FILES['audio_file']['tmp_name'];
         	// $this->audio_type = $_FILES['audio_file']['type'];
         	// $this->audio_size = $_FILES['audio_file']['size'];
         	$this->picture_name = $_FILES['picture_file']['name'];
         	$this->picture_location = $_FILES['picture_file']['tmp_name'];
         	$this->picture_type = $_FILES['picture_file']['type'];
         	$this->picture_size = $_FILES['picture_file']['size'];
         	$this->document_name = $_FILES['document_file']['name'];
         	$this->document_location = $_FILES['document_file']['tmp_name'];
         	$this->document_type = $_FILES['document_file']['type'];
         	$this->document_size = $_FILES['document_file']['size'];
         	

			$error = array();
			$success = array();

			if(empty($this->topic) or empty($this->category) or empty($this->word) or empty($this->subtitle)){
				$error[0] = "<p>Name, Category, Section and Word Field cant be empty</p>"; 
			}
			if(empty($this->picture_name)){
				$error[1] = "<p> Picture is Necessary for Each Upload</p>"; 
			}
			
			$check = getimagesize($this->picture_location);
			$imageFileType = strtolower(pathinfo(basename($this->picture_location),PATHINFO_EXTENSION));
			// var_dump($check);
    		if($check !== false) {
        		$success[0] = "<p> Picture uploaded is confirmed  to be an image " . $check["mime"] . ".</p>";
        		// var_dump($check);
    		}
    		if($check[0] <= 1000 or $check[1] <= 500){
    			$check[0] = 1000;
    			$check[1] = 500; 
    		} 
    		
    		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType && "jpeg"
			&& $imageFileType && "gif" ) {

    			$error[3] =  "<p class=''>Sorry, only JPG, JPEG, PNG & GIF Images are allowed.</p>";
    			
			}
		
   			$location_picture = 'picture/';
        	if (file_exists($location_picture.basename($this->picture_name))) {
    			$error[6] =  "<p>Sorry, picture already exists in the Database. Advised to rename the Picture</p>";
    		
			}
			else{
        		$success[3] = "<p>Picture uploaded successfully</p>";
    		}
        	$location_document = 'document/';
        	if(!empty($document_name) and file_exists($location_document.basename($this->document_name))){
        		$error[7] =  "<p>Sorry, Document already exists in the Database. Advised to rename the Document</p>";
        	}
        	else{
        		
    		}


    		if(!empty($error)){
			echo implode($error);
			}
		
			else{
				if (!empty($success)){
					echo implode($success);
					
				}

				$this->uploadPost($this->topic, $this->category, $this->word, $this->picture_name, $this->picture_location, $this->picture_type, $this->picture_size, $this->document_name,$this->document_location, $this->document_size, $this->document_type, $this->subtitle, $this->media);
			}	 
		}
		
	}

	

	public function uploadPost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type,$section, $media)
	{
		$call  = new Models;
		$result = $call->queryPost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $section, $media);
		echo $result;
	}

	public function favoriteSection(){
		if (isset($_POST['favoriteSection'])){
			$this->topic = $_POST['name'];
			$this->category = $_POST['category'];
			$this->word = $_POST['word'];
			$this->favorite_popular = $_POST['favorite_popular'];
			$this->audio_name = $_FILES['audio_file']['name'];
         	$this->audio_location = $_FILES['audio_file']['tmp_name'];
         	$this->audio_type = $_FILES['audio_file']['type'];
         	$this->audio_size = $_FILES['audio_file']['size'];
         	$this->picture_name = $_FILES['picture_file']['name'];
         	$this->picture_location = $_FILES['picture_file']['tmp_name'];
         	$this->picture_type = $_FILES['picture_file']['type'];
         	$this->picture_size = $_FILES['picture_file']['size'];
         	$this->document_name = $_FILES['document_file']['name'];
         	$this->document_location = $_FILES['document_file']['tmp_name'];
         	$this->document_type = $_FILES['document_file']['type'];
         	$this->document_size = $_FILES['document_file']['size'];
         	$this->video_name = $_FILES['video_file']['name'];
         	$this->video_location = $_FILES['video_file']['tmp_name'];
         	$this->video_type = $_FILES['video_file']['type'];
         	$this->video_size = $_FILES['video_file']['size'];

			$error = array();
			$success = array();

			if(empty($this->topic) or empty($this->category) or empty($this->word) or empty($this->favorite_popular)){
				$error[0] = "<p>Name, Category and Word Field cant be empty</p>"; 
			}
			if(empty($this->picture_name)){
				$error[1] = "<p> Picture is Necessary for Each Upload</p>"; 
			}
			//$upload_image = "picture/"
			$check = getimagesize($this->picture_location);
			$imageFileType = strtolower(pathinfo(basename($this->picture_location),PATHINFO_EXTENSION));
			//var_dump($check);
    		if($check !== false) {
        		$success[0] = "<p> Picture uploaded is confirmed  to be an image " . $check["mime"] . ".</p>";
        		
    		} 
    		else{
    			$error[2] = "<p> Picture uploaded is not an image </p>";
    		}
    		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType && "jpeg"
			&& $imageFileType && "gif" ) {

    			$error[3] =  "<p class=''>Sorry, only JPG, JPEG, PNG & GIF Images are allowed.</p>";
    			
			}


			$location_audio = 'audio/';
			if (!empty($audio_name) and file_exists($location_audio.basename($this->audio_name))) {
    			$error[4] =  "<p>Sorry, Audio already exists in the Database. Advised to rename the Audio</p>";
    		
			}
			else{
        		move_uploaded_file($this->audio_location,$location_audio.$this->audio_name);
        		$success[1] = "<p> Audio uploade Successfully </p>"; 
    		}
        	$location_video = 'video/';
        	if(!empty($video_name) and file_exists($location_video.basename($this->video_name))){
        		$error[5] =  "<p>Sorry, Audio already exists in the Database. Advised to rename the Audio</p>";
        	}
        	else{
        		move_uploaded_file($this->video_location,$location_video.$this->video_name);
        		$success[2] = "<p>Video uploaded successfully</p>";
    		}
        	$location_picture = 'picture/';
        	if (file_exists($location_picture.basename($this->picture_name))) {
    			$error[6] =  "<p>Sorry, picture already exists in the Database. Advised to rename the Picture</p>";
    		
			}
			else{
        		move_uploaded_file($this->picture_location,$location_picture.$this->picture_name);
        		$success[3] = "<p>Video uploaded successfully</p>";
    		}
        	$location_document = 'document/';
        	if(!empty($document_name) and file_exists($location_document.basename($this->document_name))){
        		$error[7] =  "<p>Sorry, Audio already exists in the Database. Advised to rename the Audio</p>";
        	}
        	else{
        		move_uploaded_file($this->document_location, $location_document.$this->document_name);
        		$success[4] = "<p>Document uploaded successfully</p>";
    		}	 

		}
		if(!empty($error)){
			echo implode($error);
		}
		
		else{
			if (!empty($success)){
				echo implode($success);
			}
			$this->favoriteSectionPost($this->topic, $this->category, $this->word, $this->picture_name, $this->picture_location, $this->picture_type, $this->picture_size, $this->document_name,$this->document_location, $this->document_size, $this->document_type, $this->audio_name, $this->audio_location, $this->audio_size, $this->audio_type, $this->video_name,   $this->video_location,   $this->video_size, $this->video_type, $this->favorite_popular);
		}
	}


	public function favoriteSectionPost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $audio_name, $audio_location, $audio_size, $audio_type, $video_name, $video_location, $video_size, $video_type, $fav)
	{
		$call  = new Models;
		$result = $call->queryFavoritePost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $audio_name, $audio_location, $audio_size, $audio_type, $video_name, $video_location, $video_size, $video_type, $fav);
		echo $result;
	}


	public function viewSection($key){
		$call = new Models;
		$result = $call->querySection($key);

		if(is_array($result)){
	
			foreach ($result as $value) {






				echo "<div class='col-md-4 col-sm-12'>";
				echo	"<div class='category-border-content'>";
				echo		"<div class='category-detail'>";
				echo			"<div class='category-img'>";
				echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
				echo				"<div class='category-overlay'></div>";
				echo			"</div>";
				echo			"<div class='category-text'>";
				echo				"<h4 class='art'>".$value['name'] . "</h4>";
				echo			"<h4 style='color:#D73434;'>" . $value['title'] . "</h4>";
				echo				"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 50;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

				echo				"<p>" . $word . "...</p>";
				echo				"<div class='category-link'><a href='single-posts.php?id=" . $value['id'] . "'>read more</a></div>";
				echo				"<div class='share-comment-section'>";
				echo					"<div class='comment'>";
				echo						"<i class='fa fa-heart-o'><input type='submit' name='like' value='like'><span>25</span></i>";
				echo		"<i class='fa fa-comment-o'><input type='submit' name='comment' value='comment'><span>19</span></i>";
				echo					"</div>";
				echo					"<div class='share text-center' >";
				echo					"</div></div></div></div></div></div>";    





				
			}

		}
		else{
			echo $result;
		}
	}

	public function serviceLink()
	{
		$call = new Models;
		$result = $call->selectSection();
		
		if(is_array($result)){
			foreach($result as $value){

				echo "<li><a href='category.php?id=". $value['Id'] .  "'>" . $value['Name'] . "</a></li>";
			
			}
		}
	}

	public function updateSection(){
		if(isset($_GET['submit'])){
			$name = $_GET['name'];
			$id = $_GET['id'];
			$error = array();
			if(empty($name)){
				echo "<p>Name of the New Edited Service must be included</p>";
			}
			else{
			
				$call = new Models;
				$result = $call->queryEachSection($id, $name);
				echo $result;
			}

		}

		
	}
	public function buttonSection(){
		$call = new Models;
		$result = $call->selectSection();
		if(is_array($result)){


			foreach($result as $value){
				echo "<tr>";
				echo "<td>" . $value['Id'] . "</td>";
				echo "<td><a class='btn' href='editCategory2.php?id=". $value['Id'] .  "'>" . $value['Name'] . "</a></td>";
			}	echo "</tr>";
		}
	}
	public function buttonPost(){
		if(isset($_GET['edit'])){
			$category = $_GET['category'];

			$call = new Models;
			$result = $call->querySection($category);
			if(is_array($result)){
	
				foreach ($result as $value) {
					
						echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
						echo	"<div class='category-border-content'>";
						echo		"<div class='category-detail'>";
						echo			"<div class='category-img'>";
						echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
						echo				"<div class='category-overlay'></div>";
						echo			"</div>";
						echo			"<div class='category-text'>";
						echo			"<h3 class='art'>". $value['name'] . "</h3>";
						echo			"<h4>" . $value['title'] . "</h4>";
						echo			"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 30;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

						echo				"<p>".$word."....</p>";
						echo				"<div class='category-link'><a href='single-posts.php?id=".$value['id']."'>read more</a></div><br>";
						echo 		"<div class=''><a class='btn btn-danger' href='editPost3.php?id=".$value['id']."'>Edit</a></div><br>";
						echo 		"<div ><form id='delete' method='post' action='' onsubmit='return post();'><button class='btn btn-warning' type='submit' id='form' name='id' value='".$value['id']."'>Delete</button></form></div>";
						echo				"<div class='share-comment-section'>";
						echo					"<div class='share text-center' >";
						
						echo					"</div></div></div></div></div></div>";    

				}

			}
			else{
				echo $result;
			}
		}
	}
	public function viewEachPost($id){
		$call = new Models;
		$result = $call->queryEachPost($id);
		//var_dump($result);
		if(is_array($result)){
			
				


		echo		"<div class='category-img'>";
		echo			"<img src='". $result['picture']. "' alt='". $result['picture_name']. "'>";
		echo			"<div class='category-overlay'>";
		echo			"</div>";
		echo			"</div>";
		echo         "<div class='category-text read-more clearfix'>";

		echo	"<a href='category.php?id=".$result['category_id']."' class='art'>".$result['name']."</a>";

		echo		"<h4 ><a href='' style='color:#D73434;' >". $result['title']. "</a></h4>";
		echo		"<span class='art'>".$result['date']."</span>";
		echo		"<div class='paragraph' style='text-align:justify;'>". $result['word'] . "</div>";
		
		echo        "<div class='read-more-more clearfix'>";
        echo             "<div class='share-comment-section floatright'>";
        echo                "<div class='share single-page'>";
        echo                    "<span>share:</span>";
        
        echo     "<div class='addthis_inline_share_toolbox'></div>";
		
		
        echo                              "</div>";
        echo                            "</div>";
                                								    
		echo						"</div>";
        echo                        "<div class='recent-post-content clearfix'>";
        echo                        "<h4 style='color:tomato;'>You May Also Like</h4>";
        $value = $result['title'];
		$this->viewRelatedPost($value);

		}
		else{
			echo $result;
		}		
	}
	public function updatePost(){
		if (isset($_POST['update'])){
			$this->idUpdate = $_POST['id'];
			$this->topic = $_POST['name'];
			$this->category = $_POST['category'];
			$this->word = $_POST['word'];
			$this->subtitle = $_POST['section'];
			$this->picture_name = $_FILES['picture_file']['name'];
         	$this->picture_location = $_FILES['picture_file']['tmp_name'];
         	$this->picture_type = $_FILES['picture_file']['type'];
         	$this->picture_size = $_FILES['picture_file']['size'];
         	$this->document_name = $_FILES['document_file']['name'];
         	$this->document_location = $_FILES['document_file']['tmp_name'];
         	$this->document_type = $_FILES['document_file']['type'];
         	$this->document_size = $_FILES['document_file']['size'];
         	$this->media = $_POST['media'];
			$error = array();
			$success = array();

			if(empty($this->topic) or empty($this->category) or empty($this->word) or empty($this->subtitle)){
				$error[0] = "<p>Name, Category, Section and Word Field cant be empty</p>"; 
			}
			if(empty($this->picture_name)){
				$error[1] = "<p> Picture is Necessary for Each Upload</p>"; 
			}
			
			$check = getimagesize($this->picture_location);
			$imageFileType = strtolower(pathinfo(basename($this->picture_location),PATHINFO_EXTENSION));
			//var_dump($check);
    		if($check !== false) {
        		$success[0] = "<p> Picture uploaded is confirmed  to be an image " . $check["mime"] . ".</p>";
        		
    		} 
    		else{
    			$error[2] = "<p> Picture uploaded is not an image </p>";
    		}
    		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType && "jpeg"
			&& $imageFileType && "gif" ) {

    			$error[3] =  "<p class=''>Sorry, only JPG, JPEG, PNG & GIF Images are allowed.</p>";
    			
			}

        	$location_picture = 'picture/';
        	if (file_exists($location_picture.basename($this->picture_name))) {
    			$error[6] =  "<p>Sorry, picture already exists in the Database. Advised to rename the Picture</p>";
    		
			}
			else{
        		$success[3] = "<p>Picture uploaded successfully</p>";
    		}
        	$location_document = 'document/';
        	if(!empty($document_name) and file_exists($location_document.basename($this->document_name))){
        		$error[7] =  "<p>Sorry, Document already exists in the Database. Advised to rename the Document</p>";
        	}
        	else{
        		
        		// $success[4] = "<p>Document uploaded successfully</p>";
    		}

    		if(!empty($error)){
				echo implode($error);
			}
		
			else{
				if (!empty($success)){
					echo implode($success);
					move_uploaded_file($this->picture_location,$location_picture.$this->picture_name);
					move_uploaded_file($this->document_location, $location_document.$this->document_name);

				}
				$call = new Models;
				$result = $call->updateIdPost($this->topic, $this->category, $this->word, $this->picture_name, $this->picture_location, $this->picture_type, $this->picture_size, $this->document_name,$this->document_location, $this->document_size, $this->document_type, $this->subtitle, $this->idUpdate, $this->media);
				//var_dump($result);
				echo $result;
			}	 
		}
	}

	public function viewFavoriteSection($id){
		$call = new Models;
		$result = $call->queryFavoriteSection($id);

		if(is_array($result)){
	
			foreach ($result as $value) {

				echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
				echo	"<div class='category-border-content'>";
				echo		"<div class='category-detail'>";
				echo			"<div class='category-img'>";
				echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
				echo				"<div class='category-overlay'></div>";
				echo			"</div>";
				echo			"<div class='category-text'>";
				echo			"<h3 class='art'>". $value['name'] . "</h3>";
				echo			"<h4 style='color:#D73434;'>" . $value['title'] . "</h4>";
				echo			"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 30;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

				echo				"<p>".$word."....</p>";
				echo				"<div class='category-link'><a href='single-posts.php?id=".$value['id']."'>read more</a></div>";
				echo				"<div class='share-comment-section'>";
				echo					"<div class='share text-center' >";
				echo					"</div></div>";
				echo "</div></div></div></div>";    

			}

		}
		else{
			echo $result;
		}
	}
	public function viewPopularSection($id)
	{
		$call = new Models;
		$result = $call->queryFavoriteSection($id);

		if(is_array($result)){
			//var_dump($result);
			foreach ($result as $value) {
				# code...



		
			echo 	"<div class='row'>";
			echo 	"<div class='col-md-12 col-sm-12'>";
			echo 	"<div class='popular-post-single top'>";
			echo 	"<div class='popular-post-single-img'><a href='single-posts.php?id=".$value['id']. "'><img src='".$value['picture'] . "' alt=''></a></div>";
			echo 	"<div class='popular-post-single-text'><span>" . $value['date'] . "</span>";
			echo 	"<p><a href='single-posts.php?id=".$value['id']."'>" . $value['title'] . "</p></a></div>";
			echo 	"</div></div></div>";

			}
		}
		else{

			echo $result;
		}
	}

	public function viewRecentPost()
	{
		$call = new Models;
		$result = $call->queryAllSectionForRecentPost();

		if(is_array($result)){

			foreach ($result as $value) {
				# code...

			echo	"<div class='recent-post-single'>";
			echo		"<div class='recent-post-img'>";
			echo			"<a href='single-posts.php?id=".$value['id']. "'><img src='".$value['picture']. "' alt=''></a>";
			echo		"</div>";
			echo		"<div class='recent-post-text'>";
			echo			"<span>". $value['date'] . "</span>";
			echo			"<a href='single-posts.php?id=".$value['id']. "'><p>".$value['title'] ."</p></a>";
			echo		"</div></div>";
			}
		}
	}

	public function viewRelatedPost($title){
		$call = new Models;
		$result = $call->queryRelatedPost($title);

		
		if(is_array($result)){

			foreach ($result as $value) {
				# code...

			echo 	"<div class='recent-post-single single-page'>";
            echo         "<div class='recent-post-img single-page'>";
            echo 	"<a href='single-posts.php?id=".$value['id'] ."'><img src='".$value['picture']."' alt='".$value['picture_name']."'></a>";
            echo "</div>";
            echo 	"<div class='recent-post-text single-page'>";
            echo    "<span>".$value['date']."</span>";
            echo 	"<a href='".$value['id']."'><p>".$value['title']."</p></a>";
            echo    "</div>";
            echo  	"</div>";
			}
		}
	}

	public function viewCarouselSection($id){
		$call = new Models;
		$result = $call->queryFavoriteSection($id);

		if(is_array($result)){

			foreach ($result as $value) {
				# code...

				$word = $value['word'];
			$your_desired_width = 30;
			if (strlen($word) > $your_desired_width){
    			$word = wordwrap($word, $your_desired_width);
    			 $word = substr($word, 0, strpos($word, "\n"));
			}
			echo "<div class='item'>";
            echo    "<div class='slider-content'>";
            echo 	"<img src='" . $value['picture'] ."' >";
            echo "<div class='col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12'>";
            echo    "<div class='slide-text-border-content carousel-caption'>";
            echo "<div class=''><div class='slide-text'>";
            echo   "<h2>". $value['title'] . "</h2>";
            echo   "<p>". $word . "</p>";
            echo   "<a href='single-posts.php?id=". $value['id'] . "'>read more</a>";
            echo   "</div></div></div></div></div> </div>"; 

			}

			
		}
	}

	public function viewAdvert(){

		if (isset($_POST['upload'])) {
			# code...
			$name = $_POST['name'];
			$section = $_POST['section'];
			$file_name = $_FILES['file']['name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$file_location = $_FILES['file']['tmp_name'];
			$error = array();
			$location = 'advert/';
			if(empty($file_name) or empty($section)){
				$error[0] = "<p>File and Section cant empty.</p>";
			}
			// $location_picture = 'picture/';
        	if (file_exists($location.basename($file_name))) {
    			$error[1] =  "<p>Sorry, file already exists in the Database. Advised to rename the file</p>";
    		
			}

			if(!empty($error)){
				echo implode($error);
			}
			else{

				move_uploaded_file($file_location, $location.$file_name);
				$this->insertAdvert($name, $section, $file_name, $file_type, $file_size);
			}
		}
	}

	public function insertAdvert($name, $section, $file_name, $file_type, $file_size){

		$call = new Models;
		$result = $call->queryAdvert($name, $section, $file_name, $file_type, $file_size);

		echo $result;
	}

	public function showAdvert1($section){
		$call = new Models;
		$result = $call->queryEachAdvert($section);

		if(is_array($result)){

			echo "<a href='http://www.". $result['name'] . "'><img src='". $result['file'] ."' alt=''></a>";

		}
	}
	public function viewallAdvert(){
		$call = new Models;
		$result = $call->queryAllAdvert();

		if (is_array($result)){

			foreach ($result as $value) {
				# code...
			
				
				echo "<div class='col-md-3 col-xs-12 col-sm-12'>";
				echo "<p>NAME or URL: ". $value['name'] . "</p>";
				echo "<p>TYPE: ". $value['file_type'] . "</p>";
				echo "<p>SIZE: ". $value['file_size'] . "</p>";
				echo "<p>BOARD: ". $value['section'] . "</p>";
				echo "<embed width='100%' height='200px' src='". $value['file']. "'>";
				echo "<div class='text-center'>";
				echo "<form method='post' action='advertisement.php'>";
				echo "<button type='submit' name='delete' value='".$value['section'] ."' class='btn btn-danger' >Delete</button></form>";
				// echo $value['section'];
				echo "</div></div>";
			}
		}
		else{
			echo $result;
		}
	}

	public function deleteAdvert(){
		if (isset($_POST['delete'])){
			$section = $_POST['delete'];
			$call = new Models;
			$result = $call->deleteAd($section);
			echo $result;
		}

	}

	public function viewEachAdvert($id){
		$call = new Models;
		$result = $call->queryEachAdvert($id);

		if (is_array($result)){
			echo "<div class='col-md-3 col-xs-12 col-sm-12'>";
				echo "<p>NAME or URL: ". $result['name'] . "</p>";
				echo "<p>TYPE: ". $result['file_type'] . "</p>";
				echo "<p>SIZE: ". $result['file_size'] . "</p>";
				echo "<p>BOARD: ". $result['section'] . "</p>";
				echo "<embed width='100%' height='200px' src='". $result['file']. "'>";
				echo "<div class='text-center'>";
				echo "<form method='post' action='deleteAdvert.php?id=$id'>";
				echo "<button type='submit' name='delete' value='". $result['section']."' class='btn btn-danger' >Delete</a>";
				// echo $value['section'];
				echo "</form></div></div>";

		}
	}

	public function viewSectionLimit2($id){
		$call = new Models;
		$result = $call->querySectionLimit2($id);

		if(is_array($result)){
			foreach ($result as $value) {
				# code...
				echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
				echo	"<div class='category-border-content'>";
				echo		"<div class='category-detail'>";
				echo			"<div class='category-img'>";
				echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
				echo				"<div class='category-overlay'></div>";
				echo			"</div>";
				echo			"<div class='category-text'>";
				echo			"<h3 class='art'>". $value['name'] . "</h3>";
				echo			"<h4 style='color:#D73434;'>" . $value['title'] . "</h4>";
				echo			"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 30;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

				echo				"<p>".$word."....</p>";
				echo				"<div class='category-link'><a href='single-posts.php?id=".$value['id']."'>read more</a></div>";
				echo				"<div class='share-comment-section'>";
				echo					"<div class='share text-center' >";
				echo					"</div></div></div></div></div></div>";    
			
			}

		}
	}

	public function viewSectionName($id)
	{
		$call = new Models;
		$result = $call->querySectionName($id);

		if (is_array($result)){

			echo "<h2 style='color:red;'>".$result['name'] ."</h2>";
		}
	}

	public function viewSectionLimit2Step2($id)
	{
		$call = new Models;
		$result = $call->querySectionLimit2Step2($id);

		if(is_array($result)){
			foreach ($result as $value) {
				# code...
				echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
				echo	"<div class='category-border-content'>";
				echo		"<div class='category-detail'>";
				echo			"<div class='category-img'>";
				echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
				echo				"<div class='category-overlay'></div>";
				echo			"</div>";
				echo			"<div class='category-text'>";
				echo			"<h3 class='art'>". $value['name'] . "</h3>";
				echo			"<h4 style='color:#D73434;'>" . $value['title'] . "</h4>";
				echo			"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 30;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

				echo				"<p>".$word."....</p>";
				echo				"<div class='category-link'><a href='single-posts.php?id=".$value['id']."'>read more</a></div>";
				echo				"<div class='share-comment-section'>";
				echo					"<div class='share text-center' >";
				echo					"</div></div></div></div></div></div>";    
			
			}

		}
	}

	public function viewSectionLimit2Step2Again($id)
	{
		$call = new Models;
		$result = $call->querySectionLimit2Step2Again($id);

		if(is_array($result)){
			foreach ($result as $value) {
				
				echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
				echo	"<div class='category-border-content'>";
				echo		"<div class='category-detail'>";
				echo			"<div class='category-img'>";
				echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
				echo				"<div class='category-overlay'></div>";
				echo			"</div>";
				echo			"<div class='category-text'>";
				echo			"<h3 class='art'>". $value['name'] . "</h3>";
				echo			"<h4 style='color:#D73434;'>" . $value['title'] . "</h4>";
				echo			"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 30;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

				echo				"<p>".$word."....</p>";
				echo				"<div class='category-link'><a href='single-posts.php?id=".$value['id']."'>read more</a></div>";
				echo				"<div class='share-comment-section'>";
				echo					"<div class='share text-center' >";
				echo					"</div></div></div></div></div></div>";    
			
			}

		}
	}


	public function viewSectionNoLimit($id)
	{
		$call = new Models;
		$result = $call->querySectionNoLimit($id);

		if(is_array($result)){
			foreach ($result as $value) {
			
				echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
				echo	"<div class='category-border-content'>";
				echo		"<div class='category-detail'>";
				echo			"<div class='category-img'>";
				echo				"<img src='". $value['picture'] . "' alt='". $value['picture_name'] . "'>";
				echo				"<div class='category-overlay'></div>";
				echo			"</div>";
				echo			"<div class='category-text'>";
				echo			"<h3 class='art'>". $value['name'] . "</h3>";
				echo			"<h4 style='color:#D73434;'>" . $value['title'] . "</h4>";
				echo			"<span class='art'>" . $value['date'] . "</span>";
				$word = $value['word'];
				$your_desired_width = 30;
				if (strlen($word) > $your_desired_width){
    				$word = wordwrap($word, $your_desired_width);
    			 	$word = substr($word, 0, strpos($word, "\n"));
				}

				echo				"<p>".$word."....</p>";
				echo				"<div class='category-link'><a href='single-posts.php?id=".$value['id']."'>read more</a></div>";
				echo				"<div class='share-comment-section'>";
				echo					"<div class='share text-center' >";
				echo					"</div></div></div></div></div></div>";    
			
			}

		}
	}

	public function sessionDestroy(){
		 
			# code...
		if (isset($_POST['session'])){
			unset($_SESSION['email']);
			session_destroy();
			echo "<script>window.location.href='admin.php'</script>";
	}
	
	}

	public function viewComment($id)
	{
		$call = new Models;
		$result = $call->queryComment($id);

		if(is_array($result)){
			foreach ($result as $value) {
				# code...
			echo	"<div class='single-user-comment clearfix'>";
            echo            "<div class='single-user-img'>";
            echo                "<a href=''><img src='img/single-user-1.jpg' alt=''></a>";
            echo             "</div>";
            echo     "<div class='single-user-comment-text'>";
            echo            "<h4><a href=''>". $value['name'] . "</a><span>". $value['date'] ."</span></h4>";
            echo           "<p>". $value['description'] ."</p>";
            echo            "</div></div>";
			}
		}
	}

	public function comment(){
			
			if (isset($_POST['name'])) {
				# code...
				$this->name = htmlspecialchars($_POST['name']);
			}

			if(isset($_POST['email'])){
				$this->email = htmlspecialchars($_POST['email']);
			}
			if(isset($_POST['website'])){
				$website = htmlspecialchars($_POST['website']);
			}
			if(isset($_POST['description'])){
				$description = htmlspecialchars($_POST['description']);
			}
			
			$error = array();
			if (empty($this->name) or empty($this->email)){
				$error[0] =  "<p class='error-comment'>* Name and Email field should not be Empty</p>";
			}
			if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
				$error[1] = "<p class='error-comment'>* Email should be Correct</p>";
			}
			if(empty($description)){
				$error[2] = "<p class='error-comment'>* Description field should not Empty</p>";
			}

			if (!empty($error)){
				echo implode($error);
			}
			else{
				//if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on');
				$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				echo $url;
				$call = new Models;
				$result = $call->insertComment($this->name, $this->email, $website, $description, $_GET['id'], $url);
				echo $result;
			}
	}

	public function deletePost(){
		if (isset($_POST['id'])) {
			# code...
			$id = htmlspecialchars($_POST['id']);
			$call = new Models;
			$result = $call->deleteIndividualPost($id);
			echo $result;
		}
	}
}
?>