<?php
    define('API_KEY','1562842022:AAGMur3LtgC9Q4QRr91xjnCo3iQ024753eo');

    $admin = "865037235"; // admin idsi
    $adminuser = "Ilhomjon"; // admin user

    function del($nomi){
        array_map('unlink', glob("step/$nomi.*"));
    }
    function put($fayl, $nima){
        file_put_contents("$fayl", "$nima");
    }

    function pstep($cid,$zn){
        file_put_contents("step/$cid.step",$zn);
    }

    function step($cid){
        $step = file_get_contents("step/$cid.step");
        $step += 1;
        file_put_contents("step/$cid.step",$step);
    }

    function nextTx($cid,$txt){
        $step = file_get_contents("step/$cid.txt");
        file_put_contents("step/$cid.txt","$step\n$txt");
    }

    function ty($ch){
        return bot('sendChatAction', [
            'chat_id' => $ch,
            'action' => 'typing',
        ]);
    }

    function ACL($callbackQueryId, $text = null, $showAlert = false)
    {
        return bot('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => $showAlert,
        ]);
    }

    function bot($method,$datas=[]){
        $url = "https://api.telegram.org/bot".API_KEY."/".$method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }else{
            return json_decode($res);
        }
    }
    // function before ($this, $inthat)
    // {
    //     return substr($inthat, 0, strpos($inthat, $this));
    // };
    // function after ($this, $inthat)
    // {
    //   if (!is_bool(strpos($inthat, $this)))
    //       return substr($inthat, strpos($inthat,$this)+strlen($this));
    // };
    $update = json_decode(file_get_contents('php://input'));
    $from_id = $message->from->id;
    $message = $update->message;
    $cid = $message->chat->id;
    $cidtyp = $message->chat->type;
    $miid = $message->message_id;
    $name = $message->chat->first_name;
    $user = $message->from->username;
    $tx = $message->text;
    $callback = $update->callback_query;
    $mmid = $callback->inline_message_id;
    $mes = $callback->message;
    $mid = $mes->message_id;
    $cmtx = $mes->text;
    $mmid = $callback->inline_message_id;
    $idd = $callback->message->chat->id;
    $cbid = $callback->from->id;
    $cbuser = $callback->from->username;
    $data = $callback->data;
    $ida = $callback->id;
    $cqid = $update->callback_query->id;
    $cbins = $callback->chat_instance;
    $cbchtyp = $callback->message->chat->type;
    $file_id = $message->document->file_id;
    $file_type = $message->document;
    $caption = $message->caption;
    $step = file_get_contents("step/$cid.step");
    $menu = file_get_contents("step/$cid.menu");
    $stepe = file_get_contents("step/$cbid.step");
    $menue = file_get_contents("step/$cbid.menu");


    //
    // // mkdir("step");
    // $users1 = [];
    // $otex = "🏠Bosh sahifa";
    // $mysql = new mysqli('localhost','u0869717_ilkhom','8T7n9M6t','u0869717_ilkhomjon');
    // $res = $mysql->query("SELECT * FROM bot_users WHERE chat_id = '$cid' ");
    // $users = mysqli_fetch_assoc($res);
    // $baza = $mysql->query("SELECT * FROM bot_users");
    // $num = mysqli_num_rows($baza);
    // $users1 = mysqli_fetch_all($baza,MYSQLI_ASSOC);
    // // test answers
    // $sql_users = $mysql->query("SELECT * FROM test_users");
    // $test_users_chatid = mysqli_fetch_assoc($sql_users);
    // // sql matem
    // $sql1 = $mysql->query("SELECT * FROM test_matem");
    // $test_t = mysqli_fetch_all($sql1);
    // $test_time = $test_t[0][3];
    //
    // $photo_file_id = $message->photo[0]->file_id;
    // $file_type_photo = $message->photo;
    //
    //
    // if (!empty($file_type_photo)) {
    //     bot('sendPhoto', [
    //         'chat_id' => $cid,
    //         'photo' => $photo_file_id,
    //         'caption' => "$caption \n $file_type_photo",
    //         'parse_mode' => 'markdown',
    //         'reply_markup' => $keys,
    //     ]);
    //   }
    //
    // $keys = json_encode([
    //     'resize_keyboard'=>true,
    //     'keyboard' => [
    //         [['text' => "🎓 Kurslar"],['text' => "📍 Manzil"]],
    //         [['text' => "ℹ️ Biz haqimizda"],['text' => "📞 Aloqa"],],
    //         [['text' => "📝 Online test"]],
    //     ]
    // ]);
    // $keys_admin = json_encode([
    //     'resize_keyboard'=>true,
    //     'keyboard' => [
    //         [['text' => "📤Hammaga xabar yuborish"],['text' => "👥Foydalnuvchilar"]],
    //         [['text' => "🏠Bosh sahifaga qaytish"],['text' => "👤1 ta Userga xabar yuborish"]],
    //         [['text' => "➕Test qo'shish"]],
    //     ]
    // ]);
    // $online_tests = json_encode([
    //     'resize_keyboard'=>true,
    //     'keyboard' => [
    //         [['text' => "🧮 Matematika"],['text' => "🔬 Fizika"]],
    //         [['text' => "🏴󠁧󠁢󠁥󠁮󠁧󠁿 English"],['text' => "$otex"]],
    //     ]
    // ]);
    // $maths = json_encode([
    //       'resize_keyboard'=>true,
    //       'keyboard' => [
    //     [['text' => "🖊 Testni boshlash"],['text' => "🧾 Test natijalari"]],
    //     [['text' => "$otex"]],
    //     ]
    // ]);
    // $matem_javob = json_encode([
    //     'resize_keyboard'=>true,
    //     'keyboard' => [
    //     [['text' => "🖍Javobni belgilash"],['text' => "$otex"]],
    //     ]
    // ]);
    // $fizika = json_encode(
    //     ['inline_keyboard' => [
    //     [['callback_data' => "Testni boshlash fizika", 'text' => "🖊 Testni boshlash"]],
    //     ]
    // ]);
    // $english = json_encode(
    //     ['inline_keyboard' => [
    //     [['callback_data' => "Testni boshlash english", 'text' => "🖊 Testni boshlash"]],
    //     ]
    // ]);
    // $otmen = json_encode([
    //     'resize_keyboard'=>true,
    //     'keyboard'=>[
    //         [['text'=>"$otex"],],
    //     ]
    // ]);
    //
    // $manzil = json_encode(
    //     ['inline_keyboard' => [
    //     [['callback_data' => "😊 A'zoman", 'text' => "😊 A'zoman"],['callback_data' => "☹️ A'zo emasman", 'text' => "☹️ A'zo emasman"],],
    //     ]
    // ]);
    // $send_message = json_encode([
    //         'resize_keyboard' => true,
    //         'keyboard' => [
    //                 [
    //                     ['text' => "✍️ Xabar yuboring"],['text' => "⬅️ Orqaga"]
    //                 ],
    //             ]
    //     ]
    //     ,true);
    //
    // $kurs = json_encode([
    //     'resize_keyboard' => true,
    //     'keyboard' => [
    //         [['text' => "🏴󠁧󠁢󠁥󠁮󠁧󠁿 Ingiliz tili"], ['text' => "🇷🇺 Rus Tili"],],
    //         [['text' => "🇸🇦 Arab tili"], ['text' => "🧑‍💻 Web Dasturlash"],],
    //         [['text' => "📈 Grafik dizayn"], ['text' => "🌐 SMM"],],
    //         [['text' => "🔙 Ortga qaytish"], ['text' => "®️ Ro`yhatdan o`tish"],],
    //     ]
    // ]);
    //
    // $tasdiq = json_encode(
    //     ['inline_keyboard' => [
    //         [['callback_data' => "ok", 'text' => "Ha 👍"],['callback_data' => "clear", 'text' => "Yo'q 👎"],],
    //     ]
    // ]);
    //
    // if(isset($tx)){
    //     ty($cid);
    // }
    //
    // $res = $mysql->query("SELECT * FROM user WHERE chat_id = '$chat_id' ");
    // $users = mysqli_fetch_assoc($res);

    if($tx == "/start"){
      if($cid != $users['chat_id']){
        $mysql -> query("INSERT INTO `bot_users`(`chat_id`, `name`, `username`) VALUES ('$cid','$name','$user')");
      }
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Assalomu alaykum,* Iltimos to'liq ism sharfngizni kirinting!!!\n‼️ISMINGIZNI LOTIN HARFLARIDA KIRITING.",
            'parse_mode' => 'markdown',
        ]);
        pstep($cid,"50");
    }
  //   if (isset($tx) and $step == '50') {
  //         $sql = $mysql -> query("UPDATE `bot_users` SET `name`= '$tx' WHERE chat_id = $cid");
  //         if (isset($sql)) {
  //         bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "*IM Academy* botiga *Xush kelibsiz* aziz foydalanuvchilar sizga qanday yordam ber olaman?",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //
  //     }
  //           unlink("step/$cid.step");
  //   }
  //   if ($tx == "ℹ️ Biz haqimizda") {
  //       bot('sendPhoto', [
  //           'chat_id' => $cid,
  //           'photo' => 'https://im.lazerg.ru/bot/img/logos.jpg',
  //           'caption' => "<code>ℹ️ Biz haqimizda</code>\n<b>🔷 Bizning online kurslar orqali siz zamonaviy kasblar egasi va Xorijiy tillarni mukammal kurslar orqali o'rganishingiz mumkin!</b>\n🗃 <b>Bizning kurslar:</b><i> 🏴󠁧󠁢󠁥󠁮󠁧󠁿 Ingiliz tili, 🇷🇺 Rus Tili, 🇸🇦 Arab tili, 🧑‍💻Web Dasturlash, 📈 Grafik dizayn, 🌐 SMM.</i>\n📊 Bu kurslarni tajribali va o'z ishing ustalari dars berishadi.\n🧔🏻 <b>Bizing markaz asoschisi:</b> Ilhomjon Musayev",
  //           'parse_mode' => 'html',
  //           'reply_markup' => $keys,
  //       ]);
  //   }
  //   if ($tx == "⬅️ Orqaga") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Sizga qanday yordam bera olaman!",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //   }
  //   if ($tx == "✍️ Xabar yuboring") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "*✍️ Xabar yuboring*\nXabarni kiriting!",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $otmen,
  //       ]);
  //       pstep($cid,"77");
  //       put("step/$cid.menu","register");
  //   }
  //
  //   if (isset($tx) and $step == '77') {
  //       bot('sendMessage', [
  //           'chat_id' => $admin,
  //           'text' => "<b><code>📧Sizda yangi xabar(1):</code></b>\n<b>Chat id:</b><code>$cid</code>\n<b>Ismi: </b>$name,\n<b>Username:</b> @$user\n<b>Xabar yuboruvchi</b>: <a href='tg://user?id=$cid'><i>Profili</i></a>\n<b>Xabar:</b> $tx",
  //           'parse_mode' => 'html',
  //       ]);
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "✅ Sizning xabar muvaffaqiyatli yuborildi, tez orada siz bilan bog'lanamiz",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //       unlink("step/$cid.step");
  //       unlink("step/$cid.menu");
  //   }
  //   if ($tx == "📞 Aloqa") {
  //     bot('sendMessage', [
  //         'chat_id' => $cid,
  //         'text' => "<code>Biz bilan aloqa:</code> \n<b>📞Telefon raqam:</b> +99890 005 30 06.\n<b>🔵 Telegram support:</b> @ilkhomjonmusayev.\n<b>📧Email: </b>ilhommusayev2001@gmail.com\n❓Ariza va takliflar bo'lsa <b>✍️ Xabar yuboring</b> bo'limiga o'ting!
  //         ",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $send_message,
  //     ]);
  //   }
  //
  //   if ($tx == "📍 Manzil") {
  //       bot('sendLocation', [
  //           'chat_id' => $cid,
  //           'latitude' => 43.03092,
  //           'longitude' => 58.49509,
  //           'reply_markup' => $keys,
  //       ]);
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "📍Qoraqalpog'iston Respublikasi Qo'ng'irot tumani 'G'aretsilik' ko'chasi 32-uy",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //   }
  //
  //
  //   // Kurs haqida ma'lumot
  //   if ($tx == "🎓 Kurslar") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "*Aynan qaysi yo'nalishdagi kursimiz haqida ma'lumot kerak ?*",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $kurs,
  //       ]);
  //   }
  //
  //   if ($tx == "🏴󠁧󠁢󠁥󠁮󠁧󠁿 Ingiliz tili") {
  //       bot('sendPhoto', [
  //           'chat_id' => $cid,
  //           'photo' =>'AgACAgIAAxkBAAIGPFGB-fj1wz6qJyNZ98PTqAzaRqAAJsrzEbyqAxSntFds6hPEqP4StEmC4AAwEAAwIAA20AA3S8AwABHgQ',
  //           'caption' => "<code>🏴󠁧󠁢󠁥󠁮󠁧󠁿 Ingiliz tili</code>\n‼️  <b>📞Aloqa</b> bo'limidan bizga murojat qiling!!!\n<b>📚 Bu kurs da siz ingliz tilini bosqichma bosqich o'rganasiz, bosqichlar quydagicha:</b><i>\n1️⃣ Beginer\n2️⃣ Elementary\n3️⃣ Pre-Intermediate\n4️⃣Intermediate\n#️⃣ Speaking club</i>\nShu bosqichlar bo'yicha kurs o'tiladi!!!\n<b>✨Kurs davomida o’quvchilar quydagi bilimlarga ega bo'lib olishi mumkin</b>
  //           -Listening
  //           -Reading
  //           -Writing
  //           -Speaking
  //           -Vocabulary
  //           -Grammar ko’nikmalarini oshirib boradilar.\n📅 Kurslar narxlarni va qancha muddat bo'lishi kurs qo'yilgndan keyin olishingiz mumkin!",
  //           'parse_mode' => 'html',
  //           'reply_markup' => $kurs,
  //       ]);
  //   }
  //
  //   if ($tx == "🇷🇺 Rus Tili") {
  //     bot('sendPhoto', [
  //         'chat_id' => $cid,
  //         'photo' => 'https://im.lazerg.ru/bot/img/Rustili.jpg',
  //         'caption' => "<code>🇷🇺 Rus Tili</code>\n‼️ Hali bizda kurslar mavjud emas biz bilan hamkorlik uchun <b>📞Aloqa</b> bo'limidan bizga murojat qiling!!!",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $kurs,
  //     ]);
  //   }
  //
  //   if ($tx == "🇸🇦 Arab tili") {
  //     bot('sendPhoto', [
  //         'chat_id' => $cid,
  //         'photo' => 'https://im.lazerg.ru/bot/img/arabic.jpg',
  //         'caption' => "<code>🇸🇦 Arab tili</code>\n‼️ Hali bizda kurslar mavjud emas biz bilan hamkorlik uchun <b>📞Aloqa</b> bo'limidan bizga murojat qiling!!!",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $kurs,
  //     ]);
  //   }
  //
  //   if ($tx == "🧑‍💻 Web Dasturlash") {
  //     bot('sendPhoto', [
  //         'chat_id' => $cid,
  //         'photo' => 'https://im.lazerg.ru/bot/img/Web.jpg',
  //         'caption' => "<code>🧑‍💻 Web Dasturlash</code>\n‼️ Hali bizda kurslar mavjud emas biz bilan hamkorlik uchun <b>📞Aloqa</b> bo'limidan bizga murojat qiling!!!\n📂 Bu kursda siz web dasturlash bo'yicha quydagilar bilan tanishib chiqishingiz mumkin:\n<b>🖥 Frontend:\n</b><i>HTML\nCSS\nBootstrap\nJavaScript\nJQuery</i>\n<b>💾 Backend:</b>\n<i>PHP\nNodeJS\nPython</i>\n‼️ Backend yo'nalishida siz dasturlash tilini tanlash imkoniyatida ega bo'lasiz ",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $kurs,
  //     ]);
  //   }
  //
  //   if ($tx == "📈 Grafik dizayn") {
  //     bot('sendPhoto', [
  //         'chat_id' => $cid,
  //         'photo' => 'https://im.lazerg.ru/bot/img/disegn.jpg',
  //         'caption' => "<code>📈 Grafik dizayn</code>\n‼️ Hali bizda kurslar mavjud emas biz bilan hamkorlik uchun <b>📞Aloqa</b> bo'limidan bizga murojat qiling!!!",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $kurs,
  //     ]);
  //   }
  //
  //   if ($tx == "🌐 SMM") {
  //     bot('sendPhoto', [
  //         'chat_id' => $cid,
  //         'photo' => 'https://im.lazerg.ru/bot/img/SMM.png',
  //         'caption' => "<code>🌐 SMM</code>\n‼️ Hali bizda kurslar mavjud emas biz bilan hamkorlik uchun <b>📞Aloqa</b> bo'limidan bizga murojat qiling!!!",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $kurs,
  //     ]);
  //   }
  //   // Onlinr test
  //
  //   if ($tx == "📝 Online test") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "❔ Qanday fandan test yechishni xoxlaysiz?",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $online_tests,
  //       ]);
  //   }
  //
  //   $sql_test = $mysql->query("SELECT * FROM test_users ORDER BY Answers DESC");
  //   $row1 = mysqli_fetch_all($sql_test);
  //   $test_answers  = "N#                FIO                |  To'plagan ball";
  //
  //   for ($i=0; $i < 10; $i++) {
  //     $d = $i+1;
  //     $t= '';
  //     if ($d == 1) {
  //      $t.= '🏆';
  //     }
  //     if ($d == 2) {
  //       $t.= '🥈';
  //     }
  //     if ($d == 3) {
  //       $t.= '🥉';
  //     }
  //     $h++;
  //     $test_user_name = $row1[$i][2];
  //     $test_user_ball = $row1[$i][3];
  //     $test_answers .= "\n$d. $t  $test_user_name            |  $test_user_ball";      $t.= '';
  //   }
  //   if ($tx == "🧾 Test natijalari") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "*Top 10 eng yaxshi natijalar:*\n $test_answers\n\n 🔗 Shu link orqali o'tib umumiy natijadagi o'rningizni bilib olishingiz mumkin:\n https://im.lazerg.ru/bot/mus.php",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $otmen,
  //       ]);
  //   }
  //    if (isset($test_t[0][1])) {
  //      $about_test = "*Test soat $test_time:00 da boshlanadi*";
  //    }
  //   if ($tx == "🧮 Matematika") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Matematika fanidan o'z bilimingizni sinab ko'ring va boshqa do'stlaringiz bilan natijalaringizni solishtiring \n$about_test",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $maths,
  //       ]);
  //   }
  //
  //   if ($tx == "🔬 Fizika") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Test hali yo'q",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $fizika,
  //       ]);
  //   }
  //   //Matem
  //   if ($tx == "🏴󠁧󠁢󠁥󠁮󠁧󠁿 English") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Test hali yo'q",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $english,
  //       ]);
  //   }
  //   // test posix_times
  //   // bot users:
  //
  //     $sql_user = $mysql->query("SELECT * FROM bot_users WHERE chat_id = '$cid'");
  //     if($tx == '🖊 Testni boshlash' and date("H")+2 >= $test_time  and $cid != $test_users_chatid['chatid']){
  //       $sql_test_user = $mysql->query("SELECT * FROM test_users WHERE chatid = '$cid'");
  //       $test_user_names = mysqli_fetch_assoc($sql_test_user);
  //       // ismni ni userlarda olish
  //       $user_names = mysqli_fetch_all($sql_user);
  //       $user_name = $user_names[0][2];
  //       // ismni test_userga qo'shish
  //
  //       if ($cid != $test_user_names['chatid']) {
  //         $mysql -> query("INSERT INTO `test_users`(`chatid`, `Name`) VALUES ('$cid', '$user_name')");
  //       }
  //       $test_time1 = $test_time + 1;
  //       bot('sendDocument',[
  //           'chat_id'=>$cid,
  //           'document'=>$test_t[0][1],
  //           'caption' => "Agar testni yechib bo'lsangiz \n*🖍Javobni belgilash* bo'limiga o'ting!\n\n‼️Eslatma: Test soat {$test_time1}:30 da tugaydi, javoblar vaqt tugagandan keyin qabul qilinmaydi",
  //           'parse_mode'=>'markdown',
  //           'reply_markup'=>$matem_javob,
  //       ]);
  //         pstep($cid,"answer");
  //   }
  //   if($tx == '🖊 Testni boshlash' and date("H")+2 >= $test_time and $test_t[0][1] == ''){
  //     bot('sendMessage',[
  //         'chat_id'=>$cid,
  //         'text'=>"Test mavjud emas!",
  //         'parse_mode'=>'html',
  //         'reply_markup'=>$maths,
  //     ]);
  //
  //   }
  //   if ($tx == '🖊 Testni boshlash' and $cid == $test_users_chatid['chatid']) {
  //     bot('sendMessage',[
  //         'chat_id'=>$cid,
  //         'text'=>"Siz javobni topshirib bo'lgansiz <i>Umumniy natijalar jadvalini</i><b> 📝 Online test -> 🧮 Matematika -> 🧾 Test natijalari</b><i> bo'limidan olsishingiz mumkin !!!</i>",
  //         'parse_mode'=>'html',
  //         'reply_markup'=>$maths,
  //     ]);
  //   }
  //
  //   if ($tx == '🖍Javobni belgilash' and $step == 'answer') {
  //     bot('sendMessage',[
  //         'chat_id'=>$cid,
  //         'text'=>"<b>Javoblarini shuday ko'rinishda jo'nating:</b>\n \n<code>J:AAAAABBBBBCCCCCAAAAABBBBBCCCCC</code>",
  //         'parse_mode'=>'html',
  //         'reply_markup'=>$otmen,
  //     ]);
  //     unlink("step/$cid.step");
  //     pstep($cid,"check_answer");
  //   }
  //       $s = 0;
  //   if (isset($tx) and $step == 'check_answer' and substr($tx, 0, 2) == 'J:') {
  //     $test_answer = $test_t[0][2]; //tO'G'RI  JAVOB
  //     for ($i=0; $i < 30; $i++) {
  //       if ($test_answer[$i] == ($tx[$i+2])) {
  //         $s = $s + 1;
  //       }
  //     }
  //     $l = '';
  //     if ($s == 30) {
  //       $l .= '💯 Barakalla sizni 100% natija bilan tabriklaymiz';
  //     }
  //     $n =  30- $s;//not answer
  //     $save_answers = $mysql -> query("UPDATE `test_users` SET `Answers`='$s' WHERE chatid = '$cid'");
  //     $user_names1 = mysqli_fetch_all($sql_user);
  //     $user_name = json_encode($user_names1[0][2]);
  //     if ($save_answers) {}
  //     bot('sendMessage',[
  //         'chat_id'=>$cid,
  //         'text'=>"👤Ism: $user_name.\n<b>📘Fan:</b> 🧮 Matematika.\n<b>✅To'g'ri javoblar soni:</b> $s.\n<b>❌Not'g'ri javoblar soni:</b> $n.\n\n<i>Umumniy natijalar jadvalini</i><b> 📝 Online test -> 🧮 Matematika -> 🧾 Test natijalari</b><i> bo'limidan olsishingiz mumkin !!!</i>\n\n<b>$l</b>",
  //         'parse_mode'=>'html',
  //         'reply_markup'=>$otmen,
  //     ]);
  //     unlink("step/$cid.step");
  //   }
  //   $l .='';
  //   if ($tx == '🖊 Testni boshlash' and date("H")+2 < $test_time ) {
  //     bot('sendMessage',[
  //         'chat_id'=>$cid,
  //         'text'=>"Hali test boshlanmadi!!\n<code>Test soat $test_time da boshlanadi!</code>",
  //         'parse_mode'=>'html',
  //         'reply_markup'=>$maths,
  //     ]);
  //   }
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //   if ($tx == "🔙 Ortga qaytish") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Sizga qanday yordam bera olishim mumkin?",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //   }
  //
  //   // register uchun
  //   if($tx == "®️ Ro`yhatdan o`tish"){
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Ismingiz?\n(<b>Masalan :</b> <i>Jamshid Husanov</i>)",
  //           'parse_mode' => 'html',
  //           'reply_markup' => $otmen,
  //       ]);
  //       pstep($cid,"0");
  //       put("step/$cid.menu","register");
  //   }
  //   if($step == "0" and $menu == "register"){
  //       if($tx == $otex){}else{
  //           bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Yoshingiz\n(Masalan : 20)",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $otmen,
  //           ]);
  //       nextTx($cid, "🎓 Ism: ". $tx);
  //
  //       if ($sql) {
  //         echo "update name";
  //       }
  //       step($cid);
  //       }
  //   }
  //   if($step == "1" and $menu == "register"){
  //       if($tx == $otex){}else{
  //           bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Qaysi kurs bo'yicha tahsil olmoqchisiz?\n(*Masalan : *English, Rus tili...)",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $otmen,
  //           ]);
  //       nextTx($cid, "📅 Yosh: ".$tx);
  //       step($cid);
  //       }
  //   }
  //   if($step == "2" and $menu == "register"){
  //       if($tx == $otex){}else{
  //           bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Tanlagan yo'nalishingiz bo'yicha bilim darajangiz qanday?\n(*Masalan :* Umuman yo'q, Beginer, Elementary...)",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $cancel,
  //           ]);
  //           nextTx($cid, "📚 Kurs nomi: ".$tx);
  //           step($cid);
  //       }
  //   }
  //   if($step == "3" and $menu == "register"){
  //       bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Emailingizni kiriting?\n(*Masalan :* Example@gmail.com)",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $cancel,
  //           ]);
  //       nextTx($cid, "👨🏻‍💻 Daraja: ".$tx);
  //       step($cid);
  //   }
  //   if($step == "4" and $menu == "register"){
  //       bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Telefon raqamingizni kiriting?\n(*Masalan :* +99890 1234567)",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $cancel,
  //           ]);
  //       nextTx($cid, "📨 Email: ".$tx);
  //       step($cid);
  //   }
  //   if($step == "5" and $menu == "register"){
  //       if($tx == $otex){}else{
  //           if(mb_stripos($tx,"9989")!==false){
  //           bot('sendMessage', [
  //                   'chat_id'=>$cid,
  //                   'text'=>"*Bizning ijtomiy tarmoqlarda azomisiz?*",
  //                   'parse_mode'=>'markdown',
  //                   'reply_markup' => $manzil,
  //               ]);
  //               nextTx($cid, "📞 Aloqa uchun: ".$tx);
  //               step($cid);
  //           }else{
  //               bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Telefon raqamingizni kiriting?\n(*Masalan :* 99897 1234567)",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $cancel,
  //           ]);
  //           }
  //       }
  //   }
  //   if(isset($data) and $stepe == "6" and $menue == "register"){
  //       ACL($ida);
  //       $baza = file_get_contents("step/$cbid.txt");
  //       bot('sendMessage',[
  //           'chat_id'=>$cbid,
  //           'text'=>"<b>Sizning Anketa tayyor bo'ldi, barchasi ma'lumotlaringiz tasdiqlaysizmi?</b>
  //           $baza\n🌐 Itimoiy tarmoqlarda : $data",
  //           'parse_mode'=>'html',
  //           'reply_markup'=>$tasdiq,
  //       ]);
  //       nextTx($cbid, "🌐 Ijtomiy tarmoqlarda:".$data);
  //       step($cbid);
  //   }
  //   if($data == "ok" and $stepe == "7" and $menue == "register"){
  //       ACL($ida);
  //       $baza = file_get_contents("step/$cbid.txt");
  //       bot('sendMessage',[
  //           'chat_id'=>$admin,
  //           'text'=>"<b>Yangi o'quvchi!</b>
  //           Username: @$cbuser
  //           <a href='tg://user?id=$cbid'>Zaxira profili</a><code>$baza</code>",
  //           'parse_mode'=>'html',
  //       ]);
  //       bot('sendMessage',[
  //           'chat_id'=>$cbid,
  //           'text'=>"✅ Sizning Anketangiz xodimlarimizga muvaffaqiyatli jo'natildi, qisqa fursatlarda sizga aloqaga chiqamiz! E'tiboringiz uchun rahmat",
  //           'parse_mode'=>'html',
  //           'reply_markup'=>$keys,
  //       ]);
  //       del($cbid);
  //   }
  //   if($tx == $otex or $data == "clear"){
  //     ACL($ida);
  //     del($cbid);
  //     del($cid);
  //     if(isset($tx)) $url = "$cid";
  //     if(isset($data)) $url = "$cbid";
  //     unlink("step/$cid.step");
  //     unlink("step/$cid.menu");
  //     bot('sendMessage', [
  //     'chat_id'=>$cid,
  //     'text'=>"BEKOR QILINDI!",
  //     'reply_markup'=>$keys,
  //     ]);
  //   }
  // // Hammaga xabar jo'natish
  // if($tx == "/admin"){
  //     bot('sendMessage', [
  //         'chat_id' => $cid,
  //         'text' => "Salom admin panelga kirish uchun kalit so'zni kiriting:",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $otmen,
  //     ]);
  //     pstep($cid,"100");
  //     put("step/$cid.menu","register");
  // }
  //   if ($tx == "ilhom098" and $step == '100') {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Assalomu aleykum Admin sizga qanday yordam bera olaman",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys_admin,
  //       ]);
  //       unlink("step/$cid.step");
  //       unlink("step/$cid.menu");
  //   }
  //
  //   else if ($step == '100' and $tx != "ilhom098") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Parol noto'g'ri, Boshqatdan urinib ko'ring!!!",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //   }
  //
  //   if ($tx == "➕Test qo'shish") {
  //     $mysql->query("DELETE FROM `test_matem`");
  //       bot('sendVideo', [
  //           'chat_id' => $cid,
  //           'video' => 'https://im.lazerg.ru/bot/img/videoanswer.mp4',
  //           'caption' => "Testni shunday ko'rinishda yuboring!!!\nTestni pdf faylda yuborib tagiga ketma ketlikda javoblar yuborilsin",
  //           'reply_markup' => $otmen,
  //       ]);
  //       pstep($cid,"addtest");
  //   }
  //
  //   $users2 = mysqli_fetch_assoc($sql1);
  //   $test_nums = mysqli_num_rows($users2);
  //   if (!empty($file_type) and $step == 'addtest') {
  //     $mysql -> query("INSERT INTO `test_matem`(`file_id`, `answer`) VALUES ('$file_id', '$caption')");
  //     bot('sendMessage', [
  //         'chat_id' => $cid,
  //         'text' => "Test qachon boshlanishini yozing!!!\n<b>Masalan:</b><code>21</code> <i>faqat soat kiritilsin</i> $caption",
  //         'parse_mode' => 'html',
  //         'reply_markup' => $otmen
  //     ]);
  //
  //     unlink("step/$cid.step");
  //           pstep($cid,"testtime");
  //   }
  //   if ($step == 'testtime' and isset($tx)) {
  //     $mysql -> query("UPDATE `test_matem` SET `start_time`= $tx");
  //     $mysql->query("DELETE FROM `test_users`");
  //     bot('sendMessage', [
  //         'chat_id' => $cid,
  //         'text' => "✅ Test yuborildi...",
  //         'parse_mode' => 'markdown',
  //         'reply_markup' => $keys_admin
  //     ]);
  //           unlink("step/$cid.step");
  //   }
  //   elseif (!empty($file_type) and $step == 'addtest' and $users2['file_id'] == $file_id) {
  //           bot('sendMessage', [
  //               'chat_id' => $cid,
  //               'text' => "Bunday test bazada mavjud!!!",
  //               'parse_mode' => 'markdown',
  //               'reply_markup' => $otmen
  //           ]);
  //           unlink("step/$cid.step");
  //   }
  //
  //
  //
  //
  //   if ($tx == "🏠Bosh sahifaga qaytish") {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Sizga qanday yordam bera olishim mumkin?",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys,
  //       ]);
  //       unlink("step/$cid.step");
  //       unlink("step/$cid.menu");
  //   }
  //   if ($tx == "📤Hammaga xabar yuborish" and $cid == '865037235') {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Xabarni kiriting!!!",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $otmen,
  //       ]);
  //       unlink("step/$cid.step");
  //       unlink("step/$cid.menu");
  //       pstep($cid,"999");
  //       put("step/$cid.menu","register");
  //   }
  //
  //   if (isset($tx) and $step == '999' and $cid == '865037235') {
  //     for ($i=0; $i < $num; $i++) {
  //         $one_user = $users1[$i]['chat_id'];
  //     bot('sendMessage', [
  //         'chat_id' => $one_user,
  //         'text' => "$tx",
  //         'parse_mode' => 'markdown',
  //     ]);}
  //     bot('sendMessage', [
  //         'chat_id' => $cid,
  //         'text' => "✅ Xabar muvaffaqiyatli yuborildi!!!",
  //         'parse_mode' => 'markdown',
  //         'reply_markup' => $keys_admins,
  //     ]);
  //
  //     unlink("step/$cid.step");
  //     unlink("step/$cid.menu");
  //   }
  //   $users_aboute = '';
  //   for ($i=0; $i < $num; $i++) {
  //     $k = $i+1;
  //     $name = $users1[$i]['name'];
  //     $chat_ids = $users1[$i]['chat_id'];
  //     $usernames = $users1[$i]['username'];
  //     $users_aboute .="$k. Name:$name Chat id:<code>$chat_ids</code> Username: @$usernames\n";
  //   }
  //   if ($tx == "👥Foydalnuvchilar" and $cid == '865037235') {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "$users_aboute",
  //           'parse_mode' => 'html',
  //           'reply_markup' => $keys_admin,
  //       ]);
  //   }
  //   if ($tx == "👤1 ta Userga xabar yuborish" and $cid == '865037235') {
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "Shunday turda xabar yo'llang\nX:Chat_id;Xabar yozing\n<b>Masalan:</b>X:1234567:salom do'stim!!!",
  //           'parse_mode' => 'html',
  //           'reply_markup' => $keys_admin,
  //       ]);
  //   }
  //
  //   $sendM = substr($tx, 0, 1);
  //   $test1 = substr($tx, 0, strpos($tx, ';'));
  //   $userchid = substr($test1, strpos($test1,':')+strlen(':'));;
  //   $xabar = substr($tx, strpos($tx,';')+strlen(";"));
  //   if ($sendM == "X") {
  //       bot('sendMessage', [
  //           'chat_id' => $userchid,
  //           'text' => "$xabar",
  //           'parse_mode' => 'markdown',
  //       ]);
  //       bot('sendMessage', [
  //           'chat_id' => $cid,
  //           'text' => "✅ Xabar muvaffaqiyatli yuborildi!!!",
  //           'parse_mode' => 'markdown',
  //           'reply_markup' => $keys_admin,
  //       ]);
  //   }
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //
  //


?>
