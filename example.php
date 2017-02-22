<?php
require_once("test.php");


interface data_crypt_interface{
	public function enc_html($something) : String;
	public function dec_html($something) : String;
	public function enc_url($something) : String;
	public function dec_url($something) : String;
}
class data_crypt_class implements data_crypt_interface{
	public function enc_html($something) : String{
		return htmlspecialchars($something, ENT_QUOTES, 'UTF-8');
		return htmlentities($something, ENT_QUOTES, 'UTF-8');
	}
	public function dec_html($something) : String{
		return htmlspecialchars_decode($something);
		return html_entity_decode($something);
	}
	public function enc_url($something) : String{
		return rawurlencode($something);
		return urlencode($something);
	}
	public function dec_url($something) : String{
		return rawurldecode($something);
		return urldecode($something);
	}
	public function enc_json($something) : String{
		return json_encode($something);
	}
	public function dec_json($something) : String{
		return json_decode($something);
	}
}
$crypt = new data_crypt_class();



test('$GLOBALS["crypt"]->enc_html',
	 'http://a.com/\\ceva\'alt"ceva<test/>',
	 '32--\'"<zzz>');
test('$GLOBALS["crypt"]->enc_html',
	 'http://a.com/\\ceva\'alt"ceva<test/>',
	 'http://a.com/\\ceva\'alt"ceva<test/>');
test('$GLOBALS["crypt"]->enc_html',
	 'http://a.com/\ceva&#039;alt&quot;ceva&lt;test/&gt;',
	 'http://a.com/\\ceva\'alt"ceva<test/>');

test('$GLOBALS["crypt"]->enc_html',
	 '32--&#039;&quot;&lt;zzz&gt;',
	 '32--\'"<zzz>');

test('$GLOBALS["crypt"]->enc_html',
	 '32--&#039;&quot;&lt;zzz&gt;',
	 '["32--\'\"<zzz>","aaa"]');

test('$GLOBALS["crypt"]->enc_html',
	 '{&quot;0&quot; : &quot;32--&#039;\&quot;&quot;,&quot;1&quot; : &quot;aaa&quot;}',
	 '{"0" : "32--\'\"","1" : "aaa"}');

test('$GLOBALS["crypt"]->enc_html',
	 '32--&#039;&quot;&lt;zzz&gt;',
	 <<<'QUOTE'
32--'"<zzz>
QUOTE
	);

test('$GLOBALS["crypt"]->enc_html',
	 '{&quot;0&quot; : &quot;32--&#039;\&quot;&quot;,&quot;1&quot; : &quot;aaa&quot;}',
	 <<<'QUOTE'
{"0" : "32--'\"","1" : "aaa"}
QUOTE
	);
