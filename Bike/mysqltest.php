<?
$userName="root"; //�b��

$password="test";  //�K�X

$hostName="localHost"; //�D��(Server)�W��



//�إ߸�Ƴs��

if (!(@ $link=mysql_connect($hostName, $userName, $password)))

{
printf("<Br> �s���D�� %s �o�Ϳ��~ <br>", $hostName);

exit();


}

else
{

printf("<Br> �s���D�� %s ���\ <br>", $hostName);

exit();


}
?>