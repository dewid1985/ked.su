<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2015-10-15 21:44:08                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoWaitingRegistration extends IdentifiableObject
	{
		protected $email = null;
		protected $password = null;
		protected $confirm = null;
		protected $registrationAt = null;
		protected $confirmationAt = null;
		protected $token = null;
		protected $queueEmail = null;
		
		public function getEmail()
		{
			return $this->email;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setEmail($email)
		{
			$this->email = $email;
			
			return $this;
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setPassword($password)
		{
			$this->password = $password;
			
			return $this;
		}
		
		public function getConfirm()
		{
			return $this->confirm;
		}
		
		public function isConfirm()
		{
			return $this->confirm;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setConfirm($confirm = null)
		{
			Assert::isTernaryBase($confirm);
			
			$this->confirm = $confirm;
			
			return $this;
		}
		
		/**
		 * @return TimestampTZ
		**/
		public function getRegistrationAt()
		{
			return $this->registrationAt;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setRegistrationAt(TimestampTZ $registrationAt)
		{
			$this->registrationAt = $registrationAt;
			
			return $this;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function dropRegistrationAt()
		{
			$this->registrationAt = null;
			
			return $this;
		}
		
		/**
		 * @return TimestampTZ
		**/
		public function getConfirmationAt()
		{
			return $this->confirmationAt;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setConfirmationAt(TimestampTZ $confirmationAt = null)
		{
			$this->confirmationAt = $confirmationAt;
			
			return $this;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function dropConfirmationAt()
		{
			$this->confirmationAt = null;
			
			return $this;
		}
		
		public function getToken()
		{
			return $this->token;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setToken($token)
		{
			$this->token = $token;
			
			return $this;
		}
		
		public function getQueueEmail()
		{
			return $this->queueEmail;
		}
		
		public function isQueueEmail()
		{
			return $this->queueEmail;
		}
		
		/**
		 * @return WaitingRegistration
		**/
		public function setQueueEmail($queueEmail = null)
		{
			Assert::isTernaryBase($queueEmail);
			
			$this->queueEmail = $queueEmail;
			
			return $this;
		}
	}
?>