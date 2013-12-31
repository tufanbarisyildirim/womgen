<?php
	namespace Womgen\Wsdl;

	class File extends \SimpleXMLElement
	{
		private $_array = null;

		public function ToArray()
		{
			return \Womgen\Helper::Xml2Array($this);
		}

		public function GetComplexTypes(){}
		public function GetMethods(){}
		public function GetEndPoints(){}

		/**
		* extract port types from wsdl
		*/
		public function GetPortTypes()
		{

		}

		public function GetMessages()
		{
			$elements = $this->ToArray();

		}

}