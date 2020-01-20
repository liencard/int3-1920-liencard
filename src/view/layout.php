<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/hkm4jaz.css">
    <title>HUMO - <?php echo $title;?></title>
    <?php echo $css;?>
  </head>

  <body>
    <header class="<?php if ($_GET['page'] === 'longread'){ echo ' hidden'; }?>">
      <div class="container">
        <nav class="secondary-nav" role="navigation">
            <ul class="tertiary-nav" id="nav-login">
                <li class="tertiary-nav__item"><a href="/nu-in-humo" class="tertiary-nav__link">Nu in HUMO</a></li>
                <li class="tertiary-nav__item" id="nav-item-login"><a href="javascript:callOidcLogin();void(null);" class="tertiary-nav__link" data-gtm="header/profile-login/text">Login</a></li>
                <li class="tertiary-nav__item" id="nav-item-register"><a href="javascript:callOidcRegister();void(null);" class="tertiary-nav__link" data-gtm="header/profile-register/text">Registreer</a></li>
            </ul>
            <ul class="secondary-nav__list">
                <li class="secondary-nav__list-item highlight3"><a href="/video" data-gtm="header-nav/video/text" target="_blank" class="secondary-nav__link highlight3">Video</a></li>
                <li class="secondary-nav__list-item"><a href="/tv-gids" data-gtm="header-nav/tv-gids/text" class="secondary-nav__link">TV-Gids</a></li>
                <li class="secondary-nav__list-item"><a href="/zoekertjes" data-gtm="header-nav/zoekertjes/text" class="secondary-nav__link">Zoekertjes</a></li>
                <li class="secondary-nav__list-item"><a href="https://abonnement.humo.be/?otag=DKhkLG&utm_source=humo&utm_medium=website&utm_campaign=colofon" data-gtm="header-nav/abonnement/text" class="secondary-nav__link" target="_blank">Abonnement nemen</a></li>
            </ul>
          </nav>
        </div>

        <nav class="primary-nav" role="navigation">
          <div class="container">
              <ul class="primary-nav__list">
                  <li class="primary-nav__list-item"> <a href="/" data-gtm="main-nav/homepage/text" class="primary-nav__link">Home</a> </li>
                  <li class="primary-nav__list-item"> <a href="/actua" data-gtm="main-nav/actua/text" class="primary-nav__link">Actua</a> </li>
                  <li class="primary-nav__list-item"> <a href="/humor" data-gtm="main-nav/humor/text" class="primary-nav__link">Humor</a> </li>
                  <li class="identity">
                      <a href="/" class="identity__link" data-gtm="header/logo/image">
                          <div class="identity__logo mainsite_logo">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 70">
                                  <path fill="#EE090C" d="M-.5 0h211v69.5H-.5z" />
                                  <path fill="#FFF" d="M51.6 13.6H38.5v16H28.4v-16H15.2v43.2h13.1V40h10.1v16.8h13.1V13.6zm42.1 0H83.4v26.5c0 2 .2 4.3-1.5 5.8-1.1 1-3 1.4-4.5 1.4-1.7 0-3.7-.6-4.7-1.9-.8-1.3-.8-3.3-.8-4.7v-27H58.5v28.5c0 5.2.8 9.2 5.4 12.3 3.3 2.2 8.4 3.1 12.4 3.1 4.5 0 9-.7 12.7-3.7 4.1-3.4 4.7-7.4 4.7-12.4V13.6zm54.6 0H131l-5.9 22.9h-.1l-6.1-22.9h-17.2v43.2h9.9V26h.1l8.1 30.9h8.3L136 26h.1v30.9h12.3l-.1-43.3zm27-.6c-13.1 0-20.5 9.5-20.5 22.4 0 12.3 7.5 22.1 20.5 22.1s20.5-9.8 20.5-22.1c0-12.9-7.5-22.4-20.5-22.4zm0 9.8c5.8 0 6.4 8.4 6.4 12.7 0 4.2-.5 12.2-6.4 12.2-6 0-6.4-8-6.4-12.2-.1-4.3.5-12.7 6.4-12.7z" />
                              </svg>
                          </div>
                      </a>
                  </li>
                  <li class="primary-nav__list-item"> <a href="/tv-en-film" data-gtm="main-nav/tvfilm/text" class="primary-nav__link">Tv/Film</a> </li>
                  <li class="primary-nav__list-item"> <a href="/muziek" data-gtm="main-nav/muziek/text" class="primary-nav__link">Muziek</a> </li>
                  <li class="primary-nav__list-item"> <a href="index.php" data-gtm="main-nav/muziek/text" class="primary-nav__link active">Shop</a> </li>
                  <li class="cart-icon">
                    <a class="" href="index.php?page=cart" ><?php echo $numItems;?><img srcset="./assets/img/cart-black.svg" sizes="16px" src="./assets/img/cart-black.svg" alt="cart vector"></a>
                  </li>
              </ul>
            </div>
          </nav>

          <nav class="hamburger-nav" role="navigation">
            <img class="nav__burger" srcset="./assets/img/hamburger-icon.svg" sizes="5px" src="./assets/img/hamburger-icon.svg" alt="Logo HUMO navigatie">
            <a class="" href="index.php" ><img class="nav__logo" srcset="./assets/img/humo-logo.svg" sizes="30px" src="./assets/img/humo-logo.svg" alt="Logo HUMO navigatie"></a>
            <a class="nav__cart--link" href="index.php?page=cart" ><?php echo $numItems;?><img class="nav__cart" srcset="./assets/img/cart-black.svg" sizes="16px" src="./assets/img/cart-black.svg" alt="cart vector"></a>
        </nav>
      </header>

      <main>
        <?php
          if(!empty($_SESSION['error'])) {
            echo '<div class="error box">' . $_SESSION['error'] . '</div>';
          }
          if(!empty($_SESSION['info'])) {
            echo '<div class="info box">' . $_SESSION['info'] . '</div>';
          }
        ?>
        <div class="<?php if ($_GET['page'] != 'longread'){ echo 'container'; }?>">
          <?php echo $content;?>
        </div>
      </main>

      <footer class="mod-footer footer-big">
        <nav class="container" role="navigation">
            <ul class="mod-grid mod-footer-top">
                <li class="grid-item grid-item-5">
                    <h5><a href="/actua" class="noTextTransform">Actua</a></h5>
                    <ul>
                        <li><a href="/deze-week">Nu in Humo</a></li>
                        <li><a href="/columns">De Columns</a></li>
                        <li><a href="/dossiers">Dossiers</a></li>
                        <li><a href="/politiek">Politiek</a></li>
                        <li><a href="/sport">Sport</a></li>
                        <li><a href="/onze-man-vrouw">Onze Man/Vrouw</a></li>
                        <li><a href="/humo-archief">Eerder in Humo</a></li>
                        <li><a href="/de-eindejaarsvragen">De eindejaarsvragen</a></li>
                    </ul>
                </li>
                <li class="grid-item grid-item-5">
                    <h5><a href="/humor" class="noTextTransform">Humor</a></h5>
                    <ul>
                        <li><a href="/fotospecials">Fotospecials</a></li>
                        <li><a href="/cartoons">Cartoons</a></li>
                        <li><a href="/uitlaat">Uitlaat</a></li>
                        <li><a href="/de-beste-grap-volgens">(bulderlacht)</a></li>
                        <li><a href="/zelf-iets-opladen">Doe het zelf</a></li>
                        <li><a href="/comedycup">Humo's Comedy Cup</a></li>
                    </ul>
                </li>
                <li class="grid-item grid-item-5">
                    <h5><a href="/tv-en-film" class="noTextTransform">Tv/Film</a></h5>
                    <ul>
                        <li><a href="/tv-gids">Tv-gids</a></li>
                        <li><a href="/tv-tips">Tv-tips</a></li>
                        <li><a href="/tv-reviews">Tv-reviews</a></li>
                        <li><a href="/filmreviews">Filmreviews</a></li>
                        <li><a href="/honderd-films">De 100 beste films volgens (es)</a></li>
                    </ul>
                </li>
                <li class="grid-item grid-item-5">
                    <h5><a href="/muziek" class="noTextTransform">Muziek</a></h5>
                    <ul>
                        <!-- TODO: <li><a href="#">Muzieknieuws</a></li> -->
                        <li><a href="/concert-reviews">Concertreviews</a></li>
                        <li><a href="/cd-reviews">Cd-reviews</a></li>
                        <!-- <li><a href="/arriba">Arriba!</a></li> -->
                        <li><a href="/rock-rally">Humo's Rock Rally</a></li>
                        <li><a href="/festivalitis">Festivalitis</a></li>
                    </ul>
                </li>
                <li class="grid-item grid-item-5">
                    <h5><a href="/boeken" class="noTextTransform">Boeken</a></h5>
                    <ul>
                        <li><a href="/boekreviews">Reviews</a></li>
                        <li><a href="/boeken-fictie">Fictie</a></li>
                        <li><a href="/boeken-non-fictie">Non-fictie</a></li>
                        <li><a href="/het-lezen-zoals-het-is">Het lezen zoals het is</a></li>
                        <li><a href="/dossiers/637/de-grootste-schrijvers-van-deze-tijd">De grootste schrijvers van deze tijd</a></li>
                    </ul>
                    <h5 style="margin-top:25px;">Ga naar</h5>
                    <ul>
                        <li><a href="/video">Video</a></li>
                        <li><a href="/fotospecials">Foto's</a></li>
                        <li><a href="/wedstrijden">Wedstrijden</a></li>
                        <li><a href="/zoekertjes">Zoekertjes</a></li>
                        <li><a href="/app">Apps</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
      </footer>

      <footer class="mod-footer footer-small">
        <div id="footer_abo_line">
            <p><a href="index.php?page=detail&id=15" class="btn">Neem een abonnement</a></p>
        </div>
        <nav>
          <ul class="footer-small-items">
            <li><a href="javascript:switchToDesktopSite();void(null);">Naar de volledige website</a></li>
            <li><a href="/home/57723/colofon">Colofon</a></li>
            <li><a href="/home/57721/contact">Contact</a></li>
            <li><a href="javascript:changePrivacyWall();void(null);">Cookie instellingen</a></li>
          </ul>
        </nav>
      </footer>

      <?php echo $js; ?>
  </body>
</html>
