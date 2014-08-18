<?php
/**
 * Զ�̻�ȡ���ݣ�POSTģʽ
 * ע�⣺
 * 1.ʹ��Crul��Ҫ�޸ķ�������php.ini�ļ������ã��ҵ�php_curl.dllȥ��ǰ���";"������
 * 2.�ļ�����cacert.pem��SSL֤���뱣֤��·����Ч��ĿǰĬ��·���ǣ�getcwd().'\\cacert.pem'
 * @param $url ָ��URL����·����ַ
 * @param $cacert_url ָ����ǰ����Ŀ¼����·��
 * @param $para ���������
 * @param $input_charset �����ʽ��Ĭ��ֵ����ֵ
 * return Զ�����������
 */
function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '') {

	if (trim($input_charset) != '') {
		$url = $url."_input_charset=".$input_charset;
	}
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL֤����֤
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//�ϸ���֤
	curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//֤���ַ
	curl_setopt($curl, CURLOPT_HEADER, 0 ); // ����HTTPͷ
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// ��ʾ������
	curl_setopt($curl,CURLOPT_POST,true); // post��������
	curl_setopt($curl,CURLOPT_POSTFIELDS,$para);// post��������
	$responseText = curl_exec($curl);
	//var_dump( curl_error($curl) );//���ִ��curl�����г����쳣���ɴ򿪴˿��أ��Ա�鿴�쳣����
	curl_close($curl);
	
	return $responseText;
}

/**
 * Զ�̻�ȡ���ݣ�GETģʽ
 * ע�⣺
 * 1.ʹ��Crul��Ҫ�޸ķ�������php.ini�ļ������ã��ҵ�php_curl.dllȥ��ǰ���";"������
 * 2.�ļ�����cacert.pem��SSL֤���뱣֤��·����Ч��ĿǰĬ��·���ǣ�getcwd().'\\cacert.pem'
 * @param $url ָ��URL����·����ַ
 * @param $cacert_url ָ����ǰ����Ŀ¼����·��
 * return Զ�����������
 */
function getHttpResponseGET($url,$cacert_url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, 0 ); // ����HTTPͷ
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// ��ʾ������
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL֤����֤
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//�ϸ���֤
	curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//֤���ַ
	$responseText = curl_exec($curl);
	//var_dump( curl_error($curl) );//���ִ��curl�����г����쳣���ɴ򿪴˿��أ��Ա�鿴�쳣����
	curl_close($curl);
	
	return $responseText;
}

