<?php
session_start();
include('Function/function.php');
chat($bdd);
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <script src="js/jquery.min.js"></script>
          <title>MoneyLord</title>
      </head>
      <body>

        <header>
          <div class="menu">
          <?php include('menu.php'); ?>
          </div>
          <div class="logoheader">
            <center>
            <a href="home.php">
            <img src="Images/logo.png" class="imglogoheader" alt="Logo" />
            </a>
          </center>
          </div>
          <div class="account">

            <?php

            include('Function/function.php');
            displayBalance($bdd);
            
            ?>

            <a href="account.php">MON COMPTE</a>
            <a href="Index.php">DECONNEXION</a>
          </div>
        </header>

        <div class="content">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis lectus vitae ornare fringilla. Nullam semper faucibus est vitae facilisis. Phasellus sodales velit tortor, vitae elementum mi maximus a. Nam suscipit, eros vitae porta consequat, mauris lectus aliquam elit, quis consequat lorem odio vitae lorem. Nullam at auctor neque. Sed fermentum molestie leo non imperdiet. Morbi at iaculis dolor. Vestibulum vitae metus non magna venenatis mollis. Phasellus nec tincidunt eros, vel vulputate est. Donec finibus iaculis felis at lacinia. Phasellus pellentesque imperdiet est, eu mollis tortor pretium in. Nam leo metus, pharetra ut cursus ac, mattis a ipsum. Cras imperdiet dictum gravida.

          Proin est dolor, posuere sed ligula quis, commodo tincidunt ex. Mauris faucibus et diam at cursus. Proin scelerisque ut urna eget faucibus. Duis tortor ipsum, euismod eget justo non, ultricies aliquam turpis. Sed eget libero molestie, ornare lectus eu, suscipit mauris. Phasellus maximus elit eget egestas pharetra. Nunc at justo quis tellus fringilla convallis.

          Proin aliquam nisi metus, quis molestie lectus dapibus in. Aliquam nec ligula eros. Pellentesque dignissim dolor nec tristique finibus. Vivamus eget pulvinar libero. Aenean porta facilisis est, ac sodales erat volutpat vel. Suspendisse non nisi ut urna sollicitudin fermentum. Vestibulum arcu tellus, sollicitudin vitae risus at, rhoncus commodo sem. Nunc in varius diam. Cras eget erat molestie, gravida nisl a, commodo nibh.

          Fusce eu quam sit amet quam facilisis iaculis a nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla vestibulum, odio quis porttitor tincidunt, enim velit finibus massa, sit amet sagittis massa dolor at mauris. Nunc imperdiet lacus id posuere mattis. Sed vestibulum purus ac urna iaculis, vitae blandit turpis egestas. Suspendisse ornare nunc ut quam congue varius. In cursus nulla quis nulla vehicula porta. Maecenas faucibus a mauris sed dignissim. Pellentesque egestas, leo sed rhoncus laoreet, dui lorem congue est, eu porttitor augue est et leo. Maecenas in eros non mi varius efficitur. Aliquam ante lacus, euismod sed porttitor a, suscipit eu urna. Maecenas sit amet interdum ligula. Duis ac ante molestie, venenatis purus nec, molestie sapien. Sed non diam vel orci porttitor scelerisque id sit amet odio.

          In vestibulum, mi ut placerat maximus, libero odio tristique ipsum, id accumsan massa sem et quam. Vestibulum pharetra mi ac turpis dictum, nec vestibulum lacus pulvinar. Cras pharetra porta neque, eget malesuada nulla malesuada eget. Proin maximus, felis ut gravida pretium, enim est feugiat nisi, sit amet pharetra urna risus a nisl. Donec congue at augue in sodales. Donec lacinia purus vel nibh fermentum sagittis eget vitae dui. Quisque pharetra sapien vel ornare aliquet. Curabitur orci erat, ultricies nec pulvinar sollicitudin, congue vel eros. Vivamus pretium lorem a risus imperdiet, varius blandit felis rhoncus. Vivamus sollicitudin justo nulla, non mattis turpis gravida eu. Ut feugiat massa ante, suscipit bibendum ex lacinia vitae. In hac habitasse platea dictumst. Proin ac consectetur augue. Vestibulum cursus rhoncus tellus, quis pellentesque dolor volutpat at. Mauris gravida mollis facilisis. Nunc convallis ut ligula at sodales.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis lectus vitae ornare fringilla. Nullam semper faucibus est vitae facilisis. Phasellus sodales velit tortor, vitae elementum mi maximus a. Nam suscipit, eros vitae porta consequat, mauris lectus aliquam elit, quis consequat lorem odio vitae lorem. Nullam at auctor neque. Sed fermentum molestie leo non imperdiet. Morbi at iaculis dolor. Vestibulum vitae metus non magna venenatis mollis. Phasellus nec tincidunt eros, vel vulputate est. Donec finibus iaculis felis at lacinia. Phasellus pellentesque imperdiet est, eu mollis tortor pretium in. Nam leo metus, pharetra ut cursus ac, mattis a ipsum. Cras imperdiet dictum gravida.

          Proin est dolor, posuere sed ligula quis, commodo tincidunt ex. Mauris faucibus et diam at cursus. Proin scelerisque ut urna eget faucibus. Duis tortor ipsum, euismod eget justo non, ultricies aliquam turpis. Sed eget libero molestie, ornare lectus eu, suscipit mauris. Phasellus maximus elit eget egestas pharetra. Nunc at justo quis tellus fringilla convallis.

          Proin aliquam nisi metus, quis molestie lectus dapibus in. Aliquam nec ligula eros. Pellentesque dignissim dolor nec tristique finibus. Vivamus eget pulvinar libero. Aenean porta facilisis est, ac sodales erat volutpat vel. Suspendisse non nisi ut urna sollicitudin fermentum. Vestibulum arcu tellus, sollicitudin vitae risus at, rhoncus commodo sem. Nunc in varius diam. Cras eget erat molestie, gravida nisl a, commodo nibh.

          Fusce eu quam sit amet quam facilisis iaculis a nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla vestibulum, odio quis porttitor tincidunt, enim velit finibus massa, sit amet sagittis massa dolor at mauris. Nunc imperdiet lacus id posuere mattis. Sed vestibulum purus ac urna iaculis, vitae blandit turpis egestas. Suspendisse ornare nunc ut quam congue varius. In cursus nulla quis nulla vehicula porta. Maecenas faucibus a mauris sed dignissim. Pellentesque egestas, leo sed rhoncus laoreet, dui lorem congue est, eu porttitor augue est et leo. Maecenas in eros non mi varius efficitur. Aliquam ante lacus, euismod sed porttitor a, suscipit eu urna. Maecenas sit amet interdum ligula. Duis ac ante molestie, venenatis purus nec, molestie sapien. Sed non diam vel orci porttitor scelerisque id sit amet odio.

          In vestibulum, mi ut placerat maximus, libero odio tristique ipsum, id accumsan massa sem et quam. Vestibulum pharetra mi ac turpis dictum, nec vestibulum lacus pulvinar. Cras pharetra porta neque, eget malesuada nulla malesuada eget. Proin maximus, felis ut gravida pretium, enim est feugiat nisi, sit amet pharetra urna risus a nisl. Donec congue at augue in sodales. Donec lacinia purus vel nibh fermentum sagittis eget vitae dui. Quisque pharetra sapien vel ornare aliquet. Curabitur orci erat, ultricies nec pulvinar sollicitudin, congue vel eros. Vivamus pretium lorem a risus imperdiet, varius blandit felis rhoncus. Vivamus sollicitudin justo nulla, non mattis turpis gravida eu. Ut feugiat massa ante, suscipit bibendum ex lacinia vitae. In hac habitasse platea dictumst. Proin ac consectetur augue. Vestibulum cursus rhoncus tellus, quis pellentesque dolor volutpat at. Mauris gravida mollis facilisis. Nunc convallis ut ligula at sodales.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis lectus vitae ornare fringilla. Nullam semper faucibus est vitae facilisis. Phasellus sodales velit tortor, vitae elementum mi maximus a. Nam suscipit, eros vitae porta consequat, mauris lectus aliquam elit, quis consequat lorem odio vitae lorem. Nullam at auctor neque. Sed fermentum molestie leo non imperdiet. Morbi at iaculis dolor. Vestibulum vitae metus non magna venenatis mollis. Phasellus nec tincidunt eros, vel vulputate est. Donec finibus iaculis felis at lacinia. Phasellus pellentesque imperdiet est, eu mollis tortor pretium in. Nam leo metus, pharetra ut cursus ac, mattis a ipsum. Cras imperdiet dictum gravida.

          Proin est dolor, posuere sed ligula quis, commodo tincidunt ex. Mauris faucibus et diam at cursus. Proin scelerisque ut urna eget faucibus. Duis tortor ipsum, euismod eget justo non, ultricies aliquam turpis. Sed eget libero molestie, ornare lectus eu, suscipit mauris. Phasellus maximus elit eget egestas pharetra. Nunc at justo quis tellus fringilla convallis.

          Proin aliquam nisi metus, quis molestie lectus dapibus in. Aliquam nec ligula eros. Pellentesque dignissim dolor nec tristique finibus. Vivamus eget pulvinar libero. Aenean porta facilisis est, ac sodales erat volutpat vel. Suspendisse non nisi ut urna sollicitudin fermentum. Vestibulum arcu tellus, sollicitudin vitae risus at, rhoncus commodo sem. Nunc in varius diam. Cras eget erat molestie, gravida nisl a, commodo nibh.

          Fusce eu quam sit amet quam facilisis iaculis a nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla vestibulum, odio quis porttitor tincidunt, enim velit finibus massa, sit amet sagittis massa dolor at mauris. Nunc imperdiet lacus id posuere mattis. Sed vestibulum purus ac urna iaculis, vitae blandit turpis egestas. Suspendisse ornare nunc ut quam congue varius. In cursus nulla quis nulla vehicula porta. Maecenas faucibus a mauris sed dignissim. Pellentesque egestas, leo sed rhoncus laoreet, dui lorem congue est, eu porttitor augue est et leo. Maecenas in eros non mi varius efficitur. Aliquam ante lacus, euismod sed porttitor a, suscipit eu urna. Maecenas sit amet interdum ligula. Duis ac ante molestie, venenatis purus nec, molestie sapien. Sed non diam vel orci porttitor scelerisque id sit amet odio.

          In vestibulum, mi ut placerat maximus, libero odio tristique ipsum, id accumsan massa sem et quam. Vestibulum pharetra mi ac turpis dictum, nec vestibulum lacus pulvinar. Cras pharetra porta neque, eget malesuada nulla malesuada eget. Proin maximus, felis ut gravida pretium, enim est feugiat nisi, sit amet pharetra urna risus a nisl. Donec congue at augue in sodales. Donec lacinia purus vel nibh fermentum sagittis eget vitae dui. Quisque pharetra sapien vel ornare aliquet. Curabitur orci erat, ultricies nec pulvinar sollicitudin, congue vel eros. Vivamus pretium lorem a risus imperdiet, varius blandit felis rhoncus. Vivamus sollicitudin justo nulla, non mattis turpis gravida eu. Ut feugiat massa ante, suscipit bibendum ex lacinia vitae. In hac habitasse platea dictumst. Proin ac consectetur augue. Vestibulum cursus rhoncus tellus, quis pellentesque dolor volutpat at. Mauris gravida mollis facilisis. Nunc convallis ut ligula at sodales.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis lectus vitae ornare fringilla. Nullam semper faucibus est vitae facilisis. Phasellus sodales velit tortor, vitae elementum mi maximus a. Nam suscipit, eros vitae porta consequat, mauris lectus aliquam elit, quis consequat lorem odio vitae lorem. Nullam at auctor neque. Sed fermentum molestie leo non imperdiet. Morbi at iaculis dolor. Vestibulum vitae metus non magna venenatis mollis. Phasellus nec tincidunt eros, vel vulputate est. Donec finibus iaculis felis at lacinia. Phasellus pellentesque imperdiet est, eu mollis tortor pretium in. Nam leo metus, pharetra ut cursus ac, mattis a ipsum. Cras imperdiet dictum gravida.

          Proin est dolor, posuere sed ligula quis, commodo tincidunt ex. Mauris faucibus et diam at cursus. Proin scelerisque ut urna eget faucibus. Duis tortor ipsum, euismod eget justo non, ultricies aliquam turpis. Sed eget libero molestie, ornare lectus eu, suscipit mauris. Phasellus maximus elit eget egestas pharetra. Nunc at justo quis tellus fringilla convallis.

          Proin aliquam nisi metus, quis molestie lectus dapibus in. Aliquam nec ligula eros. Pellentesque dignissim dolor nec tristique finibus. Vivamus eget pulvinar libero. Aenean porta facilisis est, ac sodales erat volutpat vel. Suspendisse non nisi ut urna sollicitudin fermentum. Vestibulum arcu tellus, sollicitudin vitae risus at, rhoncus commodo sem. Nunc in varius diam. Cras eget erat molestie, gravida nisl a, commodo nibh.

          Fusce eu quam sit amet quam facilisis iaculis a nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla vestibulum, odio quis porttitor tincidunt, enim velit finibus massa, sit amet sagittis massa dolor at mauris. Nunc imperdiet lacus id posuere mattis. Sed vestibulum purus ac urna iaculis, vitae blandit turpis egestas. Suspendisse ornare nunc ut quam congue varius. In cursus nulla quis nulla vehicula porta. Maecenas faucibus a mauris sed dignissim. Pellentesque egestas, leo sed rhoncus laoreet, dui lorem congue est, eu porttitor augue est et leo. Maecenas in eros non mi varius efficitur. Aliquam ante lacus, euismod sed porttitor a, suscipit eu urna. Maecenas sit amet interdum ligula. Duis ac ante molestie, venenatis purus nec, molestie sapien. Sed non diam vel orci porttitor scelerisque id sit amet odio.

          In vestibulum, mi ut placerat maximus, libero odio tristique ipsum, id accumsan massa sem et quam. Vestibulum pharetra mi ac turpis dictum, nec vestibulum lacus pulvinar. Cras pharetra porta neque, eget malesuada nulla malesuada eget. Proin maximus, felis ut gravida pretium, enim est feugiat nisi, sit amet pharetra urna risus a nisl. Donec congue at augue in sodales. Donec lacinia purus vel nibh fermentum sagittis eget vitae dui. Quisque pharetra sapien vel ornare aliquet. Curabitur orci erat, ultricies nec pulvinar sollicitudin, congue vel eros. Vivamus pretium lorem a risus imperdiet, varius blandit felis rhoncus. Vivamus sollicitudin justo nulla, non mattis turpis gravida eu. Ut feugiat massa ante, suscipit bibendum ex lacinia vitae. In hac habitasse platea dictumst. Proin ac consectetur augue. Vestibulum cursus rhoncus tellus, quis pellentesque dolor volutpat at. Mauris gravida mollis facilisis. Nunc convallis ut ligula at sodales.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis lectus vitae ornare fringilla. Nullam semper faucibus est vitae facilisis. Phasellus sodales velit tortor, vitae elementum mi maximus a. Nam suscipit, eros vitae porta consequat, mauris lectus aliquam elit, quis consequat lorem odio vitae lorem. Nullam at auctor neque. Sed fermentum molestie leo non imperdiet. Morbi at iaculis dolor. Vestibulum vitae metus non magna venenatis mollis. Phasellus nec tincidunt eros, vel vulputate est. Donec finibus iaculis felis at lacinia. Phasellus pellentesque imperdiet est, eu mollis tortor pretium in. Nam leo metus, pharetra ut cursus ac, mattis a ipsum. Cras imperdiet dictum gravida.

          Proin est dolor, posuere sed ligula quis, commodo tincidunt ex. Mauris faucibus et diam at cursus. Proin scelerisque ut urna eget faucibus. Duis tortor ipsum, euismod eget justo non, ultricies aliquam turpis. Sed eget libero molestie, ornare lectus eu, suscipit mauris. Phasellus maximus elit eget egestas pharetra. Nunc at justo quis tellus fringilla convallis.

          Proin aliquam nisi metus, quis molestie lectus dapibus in. Aliquam nec ligula eros. Pellentesque dignissim dolor nec tristique finibus. Vivamus eget pulvinar libero. Aenean porta facilisis est, ac sodales erat volutpat vel. Suspendisse non nisi ut urna sollicitudin fermentum. Vestibulum arcu tellus, sollicitudin vitae risus at, rhoncus commodo sem. Nunc in varius diam. Cras eget erat molestie, gravida nisl a, commodo nibh.

          Fusce eu quam sit amet quam facilisis iaculis a nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla vestibulum, odio quis porttitor tincidunt, enim velit finibus massa, sit amet sagittis massa dolor at mauris. Nunc imperdiet lacus id posuere mattis. Sed vestibulum purus ac urna iaculis, vitae blandit turpis egestas. Suspendisse ornare nunc ut quam congue varius. In cursus nulla quis nulla vehicula porta. Maecenas faucibus a mauris sed dignissim. Pellentesque egestas, leo sed rhoncus laoreet, dui lorem congue est, eu porttitor augue est et leo. Maecenas in eros non mi varius efficitur. Aliquam ante lacus, euismod sed porttitor a, suscipit eu urna. Maecenas sit amet interdum ligula. Duis ac ante molestie, venenatis purus nec, molestie sapien. Sed non diam vel orci porttitor scelerisque id sit amet odio.

          In vestibulum, mi ut placerat maximus, libero odio tristique ipsum, id accumsan massa sem et quam. Vestibulum pharetra mi ac turpis dictum, nec vestibulum lacus pulvinar. Cras pharetra porta neque, eget malesuada nulla malesuada eget. Proin maximus, felis ut gravida pretium, enim est feugiat nisi, sit amet pharetra urna risus a nisl. Donec congue at augue in sodales. Donec lacinia purus vel nibh fermentum sagittis eget vitae dui. Quisque pharetra sapien vel ornare aliquet. Curabitur orci erat, ultricies nec pulvinar sollicitudin, congue vel eros. Vivamus pretium lorem a risus imperdiet, varius blandit felis rhoncus. Vivamus sollicitudin justo nulla, non mattis turpis gravida eu. Ut feugiat massa ante, suscipit bibendum ex lacinia vitae. In hac habitasse platea dictumst. Proin ac consectetur augue. Vestibulum cursus rhoncus tellus, quis pellentesque dolor volutpat at. Mauris gravida mollis facilisis. Nunc convallis ut ligula at sodales.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis lectus vitae ornare fringilla. Nullam semper faucibus est vitae facilisis. Phasellus sodales velit tortor, vitae elementum mi maximus a. Nam suscipit, eros vitae porta consequat, mauris lectus aliquam elit, quis consequat lorem odio vitae lorem. Nullam at auctor neque. Sed fermentum molestie leo non imperdiet. Morbi at iaculis dolor. Vestibulum vitae metus non magna venenatis mollis. Phasellus nec tincidunt eros, vel vulputate est. Donec finibus iaculis felis at lacinia. Phasellus pellentesque imperdiet est, eu mollis tortor pretium in. Nam leo metus, pharetra ut cursus ac, mattis a ipsum. Cras imperdiet dictum gravida.

          Proin est dolor, posuere sed ligula quis, commodo tincidunt ex. Mauris faucibus et diam at cursus. Proin scelerisque ut urna eget faucibus. Duis tortor ipsum, euismod eget justo non, ultricies aliquam turpis. Sed eget libero molestie, ornare lectus eu, suscipit mauris. Phasellus maximus elit eget egestas pharetra. Nunc at justo quis tellus fringilla convallis.

          Proin aliquam nisi metus, quis molestie lectus dapibus in. Aliquam nec ligula eros. Pellentesque dignissim dolor nec tristique finibus. Vivamus eget pulvinar libero. Aenean porta facilisis est, ac sodales erat volutpat vel. Suspendisse non nisi ut urna sollicitudin fermentum. Vestibulum arcu tellus, sollicitudin vitae risus at, rhoncus commodo sem. Nunc in varius diam. Cras eget erat molestie, gravida nisl a, commodo nibh.

          Fusce eu quam sit amet quam facilisis iaculis a nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla vestibulum, odio quis porttitor tincidunt, enim velit finibus massa, sit amet sagittis massa dolor at mauris. Nunc imperdiet lacus id posuere mattis. Sed vestibulum purus ac urna iaculis, vitae blandit turpis egestas. Suspendisse ornare nunc ut quam congue varius. In cursus nulla quis nulla vehicula porta. Maecenas faucibus a mauris sed dignissim. Pellentesque egestas, leo sed rhoncus laoreet, dui lorem congue est, eu porttitor augue est et leo. Maecenas in eros non mi varius efficitur. Aliquam ante lacus, euismod sed porttitor a, suscipit eu urna. Maecenas sit amet interdum ligula. Duis ac ante molestie, venenatis purus nec, molestie sapien. Sed non diam vel orci porttitor scelerisque id sit amet odio.

          In vestibulum, mi ut placerat maximus, libero odio tristique ipsum, id accumsan massa sem et quam. Vestibulum pharetra mi ac turpis dictum, nec vestibulum lacus pulvinar. Cras pharetra porta neque, eget malesuada nulla malesuada eget. Proin maximus, felis ut gravida pretium, enim est feugiat nisi, sit amet pharetra urna risus a nisl. Donec congue at augue in sodales. Donec lacinia purus vel nibh fermentum sagittis eget vitae dui. Quisque pharetra sapien vel ornare aliquet. Curabitur orci erat, ultricies nec pulvinar sollicitudin, congue vel eros. Vivamus pretium lorem a risus imperdiet, varius blandit felis rhoncus. Vivamus sollicitudin justo nulla, non mattis turpis gravida eu. Ut feugiat massa ante, suscipit bibendum ex lacinia vitae. In hac habitasse platea dictumst. Proin ac consectetur augue. Vestibulum cursus rhoncus tellus, quis pellentesque dolor volutpat at. Mauris gravida mollis facilisis. Nunc convallis ut ligula at sodales.
        </div>

        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
