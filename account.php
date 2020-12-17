<?php

class Account{
	
	private $id, $email, $fname, $lname, $phoneNumber, $birthday, $password;

	public function __construct($id, $email, $fname, $lname, $phoneNumber, $birthday, $password) {

		$this->id = $id;
		$this->email = $email;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->phoneNumber = $phoneNumber;
		$this->birthday = $birthday;
		$this->password = $password;

	}

	public function getId(){

		 return $this->id;
	}

	public function setId(){

		 $this->id = $id;
	}




	public function getEmail(){

		 return $this->email;
	}

	public function setEmail(){

		 $this->email = $email;
	}




	public function getFname(){

		 return $this->fname;
	}

	public function setFname(){

		 $this->fname = $fname;
	}




	public function getLname(){

		 return $this->lname;
	}

	public function setLname(){

		 $this->lname = $lname;
	}




	public function getPhoneNumber(){

		 return $this->phoneNumber;
	}

	public function setPhoneNumber(){

		 $this->phoneNumber = $phoneNumber;
	}





	public function getBirthday(){

		 return $this->birthday;
	}

	public function setBirthday(){

		 $this->birthday = $birthday;
	}





	public function getPassword(){

		 return $this->password;
	}

	public function setPassword(){

		 $this->password = $password;
	}






}







?>