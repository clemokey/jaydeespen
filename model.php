<?php
session_start();
include 'connection.php';

Class Models extends Connection{

	public $conn;

	public function __construct(){

		$this->conn = (new Connection)->connect();
	}

	public function login($email, $password){
		$sql = "SELECT * from user where email = '$email' and password = '$password'";

		$result = $this->conn->query($sql) or die("Could not connect". $this->conn->error);

		if($result->num_rows == 1){
			$_SESSION['email'] = $email;
			// var_dump($email);
		// echo	"<script>window.location.href='index.php'";
			header("Location:dashboard.php");
		}
		else{
			return "<p class=''>Register with the Admin</p>";
		}
	}

	public function section($value){
		$sql = "INSERT into section(name)values ('$value')";
		$result = $this->conn->query($sql);
		if($result == true){
			return "<p class=''>New Category Addedd Successfully</p>";
		}
		else{
			return "<p class = ''>Process was Unsuccessful</p>";
		}
	}

	public function selectSection(){
		$sql = "SELECT * from section";
		$result = $this->conn->query($sql);

		if ($result->num_rows >= 1){
			$i = 0;
			while ($row = $result->fetch_array()){
				$id = $row['id'];
				$name = $row['name'];
				$details_array[$i] = array("Name"=>$name, "Id"=>$id);
				
				$i++;
			}
			return is_array($details_array) ? $details_array : false;
			//return $arr;
		}
		else{
			return "<p>No Category Included yet</p>";
		}
	}

	public function queryPost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $section, $media){


		//$target_dir = "uploads/";
		//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

		$word = $this->conn->real_escape_string($word);
		$topic = $this->conn->real_escape_string($topic);
		$media = $this->conn->real_escape_string($media);
		


		
		$sql = "INSERT into post(topic, category_id, word, picture_name, picture_size, document_name, document_size,`date`, subtitle, media) VALUES('$topic', '$category', '$word', '$picture_name','$picture_size', '$document_name', '$document_size', now(), '$section', '$media')";
		// var_dump($sql);
		$result = $this->conn->query($sql);
		if ($result == true){
			$location_picture = 'picture/';
			$location_document = 'document/';
			move_uploaded_file($document_location, $location_document.$document_name);
			move_uploaded_file($picture_location,$location_picture.$picture_name);
			
			return "<p class=''>Operation Successful</p>";
			
		}
		else{
			return "<p class=''>Operation not Successfull</p>";
		}
	}

	public function queryHeadPost1($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $audio_name, $audio_location, $audio_size, $audio_type, $video_name, $video_location, $video_size, $video_type){


		//$target_dir = "uploads/";
		//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


		


		
		$sql = "INSERT into generalpost1(topic, category_id, word, picture_name, picture_size, document_name, document_size, audio_name, audio_size, video_name, video_size, `date`) VALUES('$topic', '$category', '$word', '$picture_name','$picture_size', '$document_name', '$document_size', '$audio_name', '$audio_size', '$video_name', '$video_size', now())";

		$result = $this->conn->query($sql);
		if ($result == true){
			return "<p class=''>Operation Successful</p>";
		}
		else{
			return "<p class=''>Operation not Successfull</p>";
		}
	}

	public function queryHeadPost2($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $audio_name, $audio_location, $audio_size, $audio_type, $video_name, $video_location, $video_size, $video_type){


		//$target_dir = "uploads/";
		//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


		


		
		$sql = "INSERT into generalpost2(topic, category_id, word, picture_name, picture_size, document_name, document_size, audio_name, audio_size, video_name, video_size, `date`) VALUES('$topic', '$category', '$word', '$picture_name','$picture_size', '$document_name', '$document_size', '$audio_name', '$audio_size', '$video_name', '$video_size', now())";

		$result = $this->conn->query($sql);
		if ($result == true){
			return "<p class=''>Operation Successful</p>";
		}
		else{
			return "<p class=''>Operation not Successfull</p>";
		}
	}



	public function queryFavoritePost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $audio_name, $audio_location, $audio_size, $audio_type, $video_name, $video_location, $video_size, $video_type, $fav){


		//$target_dir = "uploads/";
		//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


		


		
		$sql = "INSERT into favorite(topic, category_id, word, picture_name, picture_size, document_name, document_size, audio_name, audio_size, video_name, video_size, `date`, category) VALUES('$topic', '$category', '$word', '$picture_name','$picture_size', '$document_name', '$document_size', '$audio_name', '$audio_size', '$video_name', '$video_size', now(), '$fav')";

		$result = $this->conn->query($sql);
		if ($result == true){
			return "<p class=''>Operation Successful</p>";
		}
		else{
			return "<p class=''>Operation not Successfull</p>";
		}
	}


	public function querySection($id)
	{
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name,  p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.category_id = '$id'";
		// $sql = "SELECT * from post where category_id = '$value'";
		$result = $this->conn->query($sql);
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$category_id = $row['category_id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'document/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('name'=>$category, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name,'category_id'=>$category_id, 'media'=>$media);
				$i++;

			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}

	}
	public function queryEachPost($id)
	{
		// $sql = "SELECT * from post where id = '$id'";
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name, p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.id = '$id'";
		$result = $this->conn->query($sql);
		if($result->num_rows == 1){
			
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$category_id = $row['category_id'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'document/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array = array('name'=>$category, 'category_id'=>$category_id, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name, 'media'=>$media);
			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}

	}


	public function queryFavoriteSection($id)
	{	
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name, p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.subtitle = '$id'";
		// $sql = "SELECT * from post where subtitle = '$id'";
		$result = $this->conn->query($sql);
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$category_id = $row['category_id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'document/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('name'=>$category, 'category_id'=>$category_id, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name, 'media'=>$media);
				$i++;

			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}

	}


	public function updateIdPost($topic, $category, $word, $picture_name, $picture_location, $picture_type, $picture_size, $document_name, $document_location, $document_size, $document_type, $section, $id, $media)
	{

		
		$word = $this->conn->real_escape_string($word);
		$topic = $this->conn->real_escape_string($topic);
		$media = $this->conn->real_escape_string($media);

		$sql = "UPDATE post SET topic='$topic', category_id = '$category', word='$word', picture_name = '$picture_name', picture_size= '$picture_size', document_name = '$document_name', document_size = '$document_size', subtitle = '$section', media = '$media' where id = '$id'"; 
		$result = $this->conn->query($sql);
		if ($result == true){
			$sql2 = "UPDATE post SET updated_date = now() where id = '$id'";
			$result2 = $this->conn->query($sql2);
			if ($result2 == true){


			return "<p>Update Successfull. </p>";
			}
		}
		else{
			return "<p>Update was not Successfull. </p>";
		}

	}
	public function queryEachSection($id, $name){
		$sql = "SELECT * from post where id = '$id'";
		$result = $this->conn->query($sql);
		if($result == true){
			$sql2 = "UPDATE section SET name = '$name' where id = '$id'";
			$result2 = $this->conn->query($sql2);
			if($result2 == true){
				return "<p>Update was Successful</p>";
			}
			else{
				return "<p>Update Unsuccessful</p>";
			}
		}
	}

	public function queryAllSectionForRecentPost()
	{
		$sql = "SELECT * from post ORDER BY id DESC LIMIT 4";
		$result = $this->conn->query($sql);
		if ($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$category_id = $row['category_id'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'audio/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'media'=>$media, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name,'category_id'=>$category_id);
				$i++;
			}
			return is_array($details_array) ? $details_array : false;
		}
	}
	public function queryRelatedPost($title){
		$value = substr($title, 3);
		$value = $this->conn->real_escape_string($value);
		$sql = "SELECT * from post where topic like '%$value%' LIMIT 3";
		$result = $this->conn->query($sql);
		
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$category_id = $row['category_id'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				$media = $row['media'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'audio/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				
				$details_array[$i] = array('id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name,  'document_name'=>$document_name,'category_id'=>$category_id, 'media'=>$media);
				$i++;
			}
			return is_array($details_array) ? $details_array : false;

		}
	}
	public function queryAdvert($name, $section, $file_name, $file_type, $file_size){
		$sql1 = "SELECT * from advert where section = '$section'";
		$result1 = $this->conn->query($sql1);
		if ($result1->num_rows == 1){
			return "<p>Advert has been placed in this category already </p>";
		}
		else{

			$name = $this->conn->real_escape_string($name);
			$sql = "INSERT into advert (name, section, file_name, file_type, file_size) VALUES('$name', '$section', '$file_name', '$file_type', '$file_size')";


			$result = $this->conn->query($sql);

			if($result == true){
				return "<p>Upload was successfull</p>";
			}
			else{
				return "<p>Upload was not Successfull</p>";
			}
		}
	}

	public function queryEachAdvert($section){
		$sql = "SELECT * from advert where section = '$section'";
		$result = $this->conn->query($sql);
		if($result->num_rows == 1){
			while($row = $result->fetch_assoc()){

				$name = $row['name'];
				$section = $row['section'];
				$file_name = $row['file_name'];
				$file_type = $row['file_type'];
				$file_size = $row['file_size'];
				$file = "advert/". $file_name;
				$details_array = array('name'=>$name, 'section'=>$section, 'file_name'=>$file_name, 'file_type'=>$file_type, 'file_size'=>$file_size, 'file'=>$file);

			}
			return is_array($details_array) ? $details_array : false;


		}
		else{
			// return "<p>No file Uploaded for this Section</p>";
		}
	}

	public function queryAllAdvert(){
		$sql = "SELECT * from advert";
		$result = $this->conn->query($sql);

		if($result->num_rows >= 1){
			$i = 0;
			while ($row = $result->fetch_assoc()){

				$name = $row['name'];
				$section = $row['section'];
				$file_name = $row['file_name'];
				$file_type = $row['file_type'];
				$file_size = $row['file_size'];
				$file = "advert/". $file_name;
				$details_array[$i] = array('name'=>$name, 'section'=>$section, 'file_name'=>$file_name, 'file_type'=>$file_type, 'file_size'=>$file_size, 'file'=>$file);
				$i++;
			}
		return is_array($details_array) ? $details_array : false;

		}
		else{
			return "<p> No Advert Has been Placed Yet </p>";
		}
	}

	// public function queryEach
	public function deleteAd($section){
		
		$sql2 = "SELECT * from advert where section = '$section'";
		$result2 = $this->conn->query($sql2);

		if($result2->num_rows == 1){
			while ($row = $result2->fetch_assoc()){
				$name = $row['file_name'];
			}
			$dir = 'advert/'.$name;
			unlink($dir);
			// closedir($dirHandle);
		}
		$sql = "DELETE FROM advert where section = '$section'";
		$result = $this->conn->query($sql);

		if ($result == true){

		return "<p>Operation Successfull </p>";
		}
		
		else{
			return "<p>Operation Not Successfull </p>";
		}

	}

	public function querySectionLimit2($id)
	{
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name, p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.category_id = '$id' LIMIT 2";
		// $sql = "SELECT * from post where category_id = '$value'";
		$result = $this->conn->query($sql);
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$category_id = $row['category_id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'audio/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('name'=>$category, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name,'category_id'=>$category_id,'media'=>$media);
				$i++;

			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}	
	}
	public function querySectionName($id)
	{
		$sql = "SELECT * from section where id = '$id'";
		$result = $this->conn->query($sql);

		if ($result->num_rows == 1){
			while ($row = $result->fetch_assoc()){
				$name = $row['name'];
				$id = $row['id'];

				$details_array = array('name'=>$name, 'id'=>$id);
			}
			return is_array($details_array) ? $details_array : false;
		}
	}
	public function querySectionLimit2Step2($id)
	{
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name, p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.category_id = '$id' LIMIT 2, 2";
		// $sql = "SELECT * from post where category_id = '$value'";
		$result = $this->conn->query($sql);
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$category_id = $row['category_id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'audio/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('name'=>$category, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name,'category_id'=>$category_id, 'media'=>$media);
				$i++;


			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}	
	}


	public function querySectionLimit2Step2Again($id)
	{
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name, p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.category_id = '$id' LIMIT 4, 2";
		// $sql = "SELECT * from post where category_id = '$value'";
		$result = $this->conn->query($sql);
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$category_id = $row['category_id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$media = $row['media'];
				// $audio_name = $row['audio_name'];
				$picture_name = $row['picture_name'];
				// $video_name = $row['video_name'];
				$document_name = $row['document_name'];
				$document = 'audio/'.$document_name;
				// $video = 'video/'. $video_name;
				// $audio = 'audio/'.$audio_name;
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('name'=>$category, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name,'category_id'=>$category_id, 'media'=>$media);
				$i++;

			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}	
	}

	public function querySectionNoLimit($id)
	{
		$sql = "SELECT p.id, p.topic, p.word, p.date, p.category_id, p.picture_name, p.document_name, p.media, s.name from post as p inner join section as s on p.category_id = s.id where p.category_id = '$id' LIMIT 4, 0";
		// $sql = "SELECT * from post where category_id = '$value'";
		$result = $this->conn->query($sql);
		if($result->num_rows >= 1){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$category = $row['name'];
				$category_id = $row['category_id'];
				$title = $row['topic'];
				$word = $row['word'];
				$date = $row['date'];
				$media = $row['media'];
				
				$picture_name = $row['picture_name'];
				
				$document_name = $row['document_name'];
				$document = 'audio/'.$document_name;
				
				$picture = 'picture/'. $picture_name;
				$details_array[$i] = array('name'=>$category, 'id'=> $id, 'title'=>$title, 'word'=>$word, 'date'=>$date, 'document'=>$document, 'picture'=>$picture, 'picture_name'=>$picture_name, 'document_name'=>$document_name,'category_id'=>$category_id, 'media'=>$media);
				$i++;
			}
			return is_array($details_array) ? $details_array : false;
		}
		else{
			// return "<p class=''>No post made yet in this category</p>";
		}	
	}
	public function insertComment($name, $email, $website, $description, $id, $url)
	{
		$url = $url;
		$name = $this->conn->real_escape_string($name);
		$email = $this->conn->real_escape_string($email);
		$website = $this->conn->real_escape_string($website);
		$description = $this->conn->real_escape_string($description);
		$sql = "INSERT into comment(name, email, website, description, post_id, `date`) VALUES('$name', '$email', '$website', '$description', '$id', now())";
		$result = $this->conn->query($sql);

		if($result == true){

			$from="From: $name<$email>\r\nReturn-path: $email";
          	$subject="Comment";
			$description = .'\n$url';
          	mail("admin@jaydeespen.com", $subject, $description, $from);
			return "<p>Comment posted Successfully</p>";
			
		}
		else{
			return "<p>Comment not posted Successfully, Pls try again</p>";
		}
	}
	public function queryComment($id){
		$sql = "SELECT * from comment where post_id = '$id'";
		$result = $this->conn->query($sql);

		if ($result->num_rows >= 1){
			$i = 0;
			while ($row = $result->fetch_assoc()){
				$id = $row['id'];
				$post_id = $row['post_id'];
				$name = $row['name'];
				$email = $row['email'];
				$website = $row['website'];
				$description = $row['description'];
				$date = $row['date'];
				$details_array[$i] = array('id'=>$id, 'post_id'=>$post_id, 'name'=>$name, 'email'=>$email, 'website'=>$website, 'description'=>$description, 'date'=>$date);
				$i++;
			}
			return is_array($details_array) ? $details_array : false;
		}
	}

	public function deleteIndividualPost($id){
		$sql = "SELECT * from post where id = '$id'";
		$result = $this->conn->query($sql);
		if($result->num_rows == 1){
			while ($row = $result->fetch_assoc()) {
				# code...
				$file = $row['picture_name'];
				
			}
			$dir = 'picture/'.$file;
			unlink($dir);
		}
		$sql1 = "DELETE FROM post where id = '$id'";
		$result1 = $this->conn->query($sql1);

		if ($result1 == true){

			return "<p class='error-comment'>Operation Successfull </p>";
		}
		
		else{
			return "<p class='error-comment'>Operation Not Successfull </p>";
		}
	}

}
