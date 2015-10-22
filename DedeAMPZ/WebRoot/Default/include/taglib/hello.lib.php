<? 
function lib_hello(&$ctag,&$refObj) 
{ 
//$refObj->Fields['typename']="nnnnnnnn"; 
$name=$_GET['name']; 
echo "你好,".$ctag->GetAtt('aa').'<br/>'; 
echo "接到的参数是:".$name; 
} 
?> 