<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2015-10-15 21:44:08                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoProtoUser extends AbstractProtoClass
	{
		protected function makePropertyList()
		{
			return array(
				'id' => LightMetaProperty::fill(new LightMetaProperty(), 'id', null, 'integerIdentifier', 'User', 8, true, true, false, null, null),
				'email' => LightMetaProperty::fill(new LightMetaProperty(), 'email', null, 'string', null, 128, true, true, false, null, null),
				'password' => LightMetaProperty::fill(new LightMetaProperty(), 'password', null, 'string', null, 256, true, true, false, null, null)
			);
		}
	}
?>