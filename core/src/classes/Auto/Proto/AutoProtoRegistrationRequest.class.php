<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.1.master at 2015-10-15 21:44:08                    *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoProtoRegistrationRequest extends ProtoSignInRequest
	{
		protected function makePropertyList()
		{
			return
				array_merge(
					parent::makePropertyList(),
					array(
						'passwordConfirm' => LightMetaProperty::fill(new LightMetaProperty(), 'passwordConfirm', 'password_confirm', 'string', null, 64, true, true, false, null, null)
					)
				);
		}
	}
?>