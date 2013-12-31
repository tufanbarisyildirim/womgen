<?php
	namespace Womgen;

	class Womgen
	{
		public $wsdl;

		public function __construct($wsdl)
		{
			$this->wsdl = $wsdl;      
		}

		public function GenerateModels($folder = null,$namespace = 'WebService\Geo')
		{
			if($folder === null)
				$folder = dirname(__FILE__);

			/** 
			*@var \Womgen\Wsdl\File
			*/
			$wsdl = simplexml_load_file($this->wsdl,'\Womgen\Wsdl\File');
			ob_start();
			$xml_array = $wsdl->ToArray();
			$portType = $xml_array['children']['wsdl:porttype'][0];

			$wsNamespace = $portType['attributes']['name'];

			// create sub folder.
			$folder = $folder . '/' . $wsNamespace;

			if(!is_dir($folder))
				mkdir($folder,0755,true);


			$clientClassName = $portType['attributes']['name'] ."Client";

			//    var_dump($portType);
			echo "<?php\r\n";
			echo "namespace {$wsNamespace};\r\n";
			echo 'class '.$clientClassName." extends SoapClient\r\n";
			echo "{\r\n";
			echo "\tpublic function __construct(){   }\r\n";
			foreach($portType['children']['wsdl:operation'] as $operation)
			{
				echo "\r\n\t/*\r\n";
				echo "\t*" . $operation['children']['wsdl:documentation'][0]['text'] . "\r\n";
				echo "\t*/\r\n";
				echo "\tpublic function " . $operation['attributes']['name'] ."(\\{$namespace}\\{$operation['children']['wsdl:input'][0]['attributes']['message']} \$in)\r\n";
				echo "\t{\r\n";
				echo "\t\treturn \$this->_call('{$operation['attributes']['name']}',\$in);\r\n";
				echo "\r\n\t}\r\n";
			}   
			echo "}";
			$code  = ob_get_clean();
			file_put_contents($folder . '/' . $clientClassName . '.php',$code);
			highlight_string($code);
		}
}