<?php  
#Conducting System Decryption 
$file_contents = file_get_contents('product.guide.pxy'); 
$set = json_decode(base64_decode($file_contents),true);
$key = $set['hash']; 
$algo = $set['cipher']; 
$iv = substr(hash("sha256",$key), 0 , 16);
$string = file_get_contents('product.crumbs.pxy'); 
$decode = openssl_decrypt($string,$algo,$key,0,$iv);

echo $decode; 
exit(); 
#Create Or Recieve Product Data 
$product = array(); 
for ($i=0; $i < 5000 ; $i++) { 
    $section = [
        "id"=>hash("md5",$i),
        "PRODUCT"=>"PRODUCT SHIRT",
        "IMG"=>"PATH_TO_IMAGE",
        "IG"=>"PATH_TO_IMAGE",
    ]; 
    $product[] = $section;  
}

$product_data = json_encode($product,JSON_PRETTY_PRINT); 
$product_hash = hash("sha256",$product_data); 

$proc_flag = False; 
while ($proc_flag == false) {
    try {
        //code...
        $key = $product_hash;
        $cipher_methods = openssl_get_cipher_methods(); 
        $selected_cipher = $cipher_methods[rand(0,count($cipher_methods))]; 
        $iv = substr(hash("sha256",$key), 0 , 16); 
        $enc_data = openssl_encrypt($product_data,$selected_cipher,$key,0,$iv); 
        $guidance_key = ["cipher"=>$selected_cipher,"hash"=>$key];
        $guidance_val = base64_encode(json_encode($guidance_key));  
        file_put_contents('product.guide.pxy',$guidance_val); 
        file_put_contents('product.crumbs.pxy',$enc_data); 
        $proc_flag = TRUE; 
    } catch (\Throwable $th) {
        continue; 
    }
}



exit(hash("sha256",$product_data)); 

#206c08a6950e8c41 cfac3c8d125f35efb88 a1bbfcd56dd62d 7dfa198cf53f6e5
#206c08a6950e8c41 cfac3c8d125f35efb88 a1bbfcd56dd62d 7dfa198cf53f6e5
#5b32a525a5b1f942 bc019c49a2a63c8550e c75671938b1bee 3eba9c6f043202e

$re = openssl_get_cipher_methods(); 
$r = $re[rand(0,count($re))]; 
$key = hash("sha256",file_get_contents($file));
$iv = substr(hash('sha256', $key), 0, 16);
$state = openssl_encrypt(file_get_contents($file),$r,$key,0,$iv);
file_put_contents("STAT.PTA",$state);  
#echo $state; 


print_r($product); 

/*
$file = dirname(dirname(__FILE__))."/control-panel/fingerprint.pxy";
$file_size = (filesize($file)/1024)/1024; #In MB  

echo ($file_size." -- ".((filesize("STAT.PTA")/1024)/1024)); 
exit(); 

$last_modification = filemtime($file); 
$file_type = filetype($file); 
$last_access = fileatime($file); 

#Conduct Last Access On File 
#print_r(date("d-m-Y",$last_access)); 

#Conduct Modification Checks 
#print_r(date("d-m-Y",$last_modification)); 


#Conducting The Block ENC 
$re = openssl_get_cipher_methods(); 
$r = $re[rand(0,count($re))]; 
$key = hash("sha256",file_get_contents($file));
$iv = substr(hash('sha256', $key), 0, 16);
$state = openssl_encrypt(file_get_contents($file),$r,$key,0,$iv);
file_put_contents("STAT.PTA",$state);  
#echo $state; 
#print_r($file_type); 

#echo $file_size; 
*/
?>