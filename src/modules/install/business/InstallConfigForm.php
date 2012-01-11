<?php

class InstallConfigForm extends CFormModel
{
	public $ptUserName;
	public $ptPassword;
	public $adminUserName;
	public $adminEmail;
	public $adminFirstName;
	public $adminLastName;
	public $adminPassword;
	public $adminPasswordConfirm;
	public $requirementsInfo;

	public function rules()
	{
		return array(
			array('ptUserName, ptPassword, adminUserName, adminEmail, adminFirstName, adminLastName, adminPassword, adminPasswordConfirm', 'required'),
			array('adminPassword', 'compare', 'compareAttribute' => 'adminPasswordConfirm'),
			array('adminEmail', 'email'),
			// can't use these two because the schema hasn't been installed yet.
			//array('adminEmail', 'unique', 'allowEmpty' => false, 'className' => 'Users', 'attributeName' => 'email', 'caseSensitive' => false),
			//array('adminUserName', 'unique', 'allowEmpty' => false, 'className' => 'Users', 'attributeName' => 'username', 'caseSensitive' => false),
		);
	}

	public function checkRequirements()
	{
		$requirementsInfo = new RequirementsChecker();
		$requirementsInfo->run();
		$this->requirementsInfo = $requirementsInfo;
	}

	public function attributeLabels()
	{
		return array(
			'ptUserName'            => 'P&T User Name',
			'ptPassword'            => 'P&T Password',
			'adminUserName'         => 'User Name',
			'adminEmail'            => 'Email',
			'adminFirstName'        => 'First Name',
			'adminLastName'         => 'Last Name',
			'adminPassword'         => 'Password',
			'adminPasswordConfirm'  => 'Confirm Password',
		);
	}
}
