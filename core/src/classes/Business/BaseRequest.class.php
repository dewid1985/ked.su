<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2015-10-12 19:03:49                    *
 *   This file will never be generated again - feel free to edit.            *
 *****************************************************************************/

	class BaseRequest extends AutoBaseRequest implements Prototyped
	{
		/**
		 * @return BaseRequest
		**/
		public static function create()
		{
			return new self;
		}
		
		
		/**
		 * @return ProtoBaseRequest
		**/
		public static function proto()
		{
			return Singleton::getInstance('ProtoBaseRequest');
		}
		
		// your brilliant stuff goes here
	}
?>