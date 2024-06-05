<!-- Pagina principale
Davide Maccarrone 23/24 -->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMFixIt</title>
    <link rel="icon" href="img/stars.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/mhw3.css">
    <script src="js/mhw3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDede7tLDw2KuUO3d1TWqtEL_LykWkNleE"></script>
    <script src="https://www.youtube.com/iframe_api"></script>

    
</head>
<body>
    <header>





        <nav class="navbar">
            <div class="logo">
                <img src="img/stars.png" /> 
                <div class="logo">
                    <a href="./index.php">DMFixAll</a>
                    </div>
            </div>
            
            <ul class="nav-links">
        
                <li>
                    <a href="./php/navbar/categorie.php" class="nav-element">Categorie</a>
                </li>
                <li>
                    <a href="./php/navbar/blog.php" class="nav-element">Blog</a>
                </li>

                <li>
                
                <?php
// Includi il file di configurazione
include 'php/config_admin.php';

if (isset($_SESSION["email"])) { ?>
    <li>
        <a href="./php/logout.php" class="nav-element">Logout</a>
    </li>
    <li>
        <?php if (in_array($_SESSION['email'], $admin_emails)) { ?>
            <a href="./php/admin.php" class="nav-element">P.Admin</a>
        <?php } else { ?>
            <a href="./php/client.php" class="nav-element">I miei ordini</a>
        <?php } ?>
    </li>
<?php } else { ?>
    <li>
        <a href="./php/login.php" class="nav-element">Accedi</a>
    </li>
    <li>
        <a href="./php/signup.php" class="nav-element">Iscriviti</a>
    </li>
<?php } ?>


                </li>
     
            </ul>
        </nav>

    </header>

    <main>

        <section class="hero">
            <div class="row">

                <div class="col">

                    <div>
                        <h1 class="title-hero">Ripara e migliora i tuoi dispositivi <br>da personale competente</h1>
                        <div class="container-bar">
                            <div class="search-bar">
                                <input type="text" placeholder="La barra di ricerca al momento non è disponibile" class="search-input">
                                <button type="submit" class="search-button">Cerca</button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col" style="margin-top: 50px;">
                    <img src="img/hero-image-l.webp" class="img" alt="">
                </div>
            </div>
        </section>

        <section class="categories-section">
            <div class="categories-header">
                <h2>Scopri i servizi</h2>
                <a class="view-all" onclick="showhideCategories()">Vedi tutte</a>
                
            </div>
            <div class="categories-container" id="hide-container">
                <div class="category">
                    <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="24" height="24" src="https://img.icons8.com/?size=100&id=WovKWSCrsTFO&format=png&color=000000" alt=xiaomi></div>
                        <div class="name">Xiaomi</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"> <img width="48" height="48" src="https://www.cdnlogo.com/logos/o/82/oppo-2019.svg"></div>
                        <div class="name">Oppo</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://www.cdnlogo.com/logos/a/6/acer.svg"></div>
                        <div class="name">Acer</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/color/48/samsung.png" alt="samsung"/></div>
                        <div class="name">Samsung</div>
                    </a>
                </div>
            </div>
        
            <div class="categories-container hidden" id="show-container">
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/ios-glyphs/48/mac-os.png" alt="mac-os"/>

</div>
                        <div class="name">Apple</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/external-others-inmotus-design/48/external-Motorola-identity-of-brands-others-inmotus-design.png" alt="Motorola"/>

</div>
                        <div class="name">Motorola</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/external-others-inmotus-design/48/external-Nokia-browser-others-inmotus-design.png" alt="external-Nokia"/>

</div>
                        <div class="name">Nokia</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/external-others-inmotus-design/48/external-Huawei-identity-of-brands-others-inmotus-design.png" alt="external-Huawei-identity-of-brands-others-inmotus-design"/></div>
                        <div class="name">Huawei</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img img width="48" height="48" src="https://www.cdnlogo.com/logos/s/7/sony.svg"></div>
                        <div class="name">Sony</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img img img width="48" height="48" src="https://www.cdnlogo.com/logos/o/81/oneplus.svg"></div>
                        <div class="name">Oneplus</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="60" height="60" src="https://www.cdnlogo.com/logos/r/39/realme-realme-box-rgb-01-with-out-back-ground.svg"></div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://www.cdnlogo.com/logos/v/9/vivo-2019.svg"></div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/nolan/48/asus--v1.png" alt="asus--v1"/></div>
                        <div class="name">Asus</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/windows/48/google-logo.png" alt="google-logo"/>

</div>
                        <div class="name">Google</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img width="48" height="48" src="https://img.icons8.com/ios-filled/48/hp--v1.png" alt="hp--v1"/></div>
                        <div class="name">HP</div>
                    </a>
                </div>
                <div class="category">
                <a class="category-button" href="./php/maintenance.php">
                        <div class="icon"><img img width="48" height="48" src="https://www.cdnlogo.com/logos/w/20/wiko.svg"></div>
                    </a>
                </div>
            </div>
        </section>
        
        <section class="start-now-section">
            <div class="start-now-container">
                <h2>Problemi al dispositivo?</h2>

                <a href="./php/calendar.php">
                <button class="start-now-button" >Prenota subito una chiamata</button></a>

                <a href="./php/client.php">
                <button class="start-now-button" >Inviaci la tua riparazione</button>
                </a>
            </div>
        </section>



        <section class="text-section">

            <h5>Riparazioni per qualsiasi dispositivo</h5>
            <div class="container-text">
                <h1>Da noi è la qualità conta</h1>
            </div>

        </section>
        <section class="image-text-section">


            <div id="arrow-right" style="margin-right: 10px;">
                <button class="arrow"><</button>
            </div>
            <img id="displayed-img" src="img/IMG_1.PNG"class="image-text-image">

            <div id="arrow-left" style="margin-left: 10px;">
                <button class="arrow">></button>
            </div>

        </section>


        <section class="image-text-section1">
           
            <div id="player"></div>

        </section>

        <section class="final-container">
            <div>
                <div class="text-general">
                    <h1 class="title-final">Il cliente prima di tutto</h1>
                    <p class="text-final">
                        Il cliente è la nostra priorità assoluta. 
                        Ci impegniamo a fornire il miglior servizio e supporto, soddisfacendo ogni richiesta con professionalità e dedizione.
                    </p>
                    <a href="./php/footer/cosafacciamo.php" class="btn-final">Cosa facciamo</a>
                </div>
            </div>
        </section>

        <section class="reviews">
            <h2 style="padding-bottom: 40px;">Recensioni Recenti</h2>
            <div class="review-container">
                <article class="review">
                    <h3>Mario Rossi</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Servizio rapido e professionale. Il mio tablet è come nuovo!"</p>
                </article>
                
                <article class="review">
                    <h3>Giulia Verdi</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Ottimo servizio clienti e prezzi competitivi. Il mio portatile funziona perfettamente."</p>
                </article>
                <article class="review">
                    <h3>Alessia Ferrari</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Professionalità e competenza. Il mio smartphone non ha più problemi."</p>
                </article>
                <article class="review">
                    <h3>Giorgio Romano</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Riparazioni veloci e affidabili. Hanno salvato il mio portatile!"</p>
                </article>
                <article class="review">
                    <h3>Sara Esposito</h3>
                    <p> ★ ★ ★ ★</p>
                    <p>"Servizio clienti eccellente e riparazioni di qualità. Il mio tablet funziona meglio di prima."</p>
                </article>
                <article class="review">
                    <h3>Valerio Gallo</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Hanno riparato il mio smartphone in un giorno. Ottimo servizio!"</p>
                </article>
            </div>
            
            <div class="review-container">
                
                
                <article class="review">
                    <h3>Simona De Luca</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Servizio clienti molto disponibile e riparazione perfetta del tablet."</p>
                </article>
                <article class="review">
                    <h3>Luca Vitale</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Riparazione rapida e prezzi onesti. Consigliatissimo per il portatile."</p>
                </article>
                <article class="review">
                    <h3>Martina Greco</h3>
                    <p> ★ ★ ★ ★</p>
                    <p>"Ottima esperienza, smartphone riparato perfettamente."</p>
                </article>
                <article class="review">
                    <h3>Federico Moretti</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Personale competente e servizio veloce. Il mio tablet è come nuovo."</p>
                </article>
                <article class="review">
                    <h3>Veronica Rizzo</h3>
                    <p> ★ ★ ★ ★ ★</p>
                    <p>"Riparazione del portatile rapida e senza intoppi. Molto soddisfatta."</p>
                </article>
                <article class="review">
                    <h3>Alessandro Puglisi</h3>
                    <p> ★ ★ ★ ★</p>
                    <p>"Servizio clienti ottimo e riparazione dello smartphone eccellente."</p>
                </article>
            </div>
                        
        </section>



    </main>

    <footer>
        <div class="footer-top">
            <div class="footer-logo"> <img src="img/stars.png" /> DMFixAll </div>
        </div>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Chi siamo</h3>
                <ul class="no-bullets">
                    <li>
                        <a href="./php/footer/chisiamo.php">Chi siamo</a>
                    </li>
                    <li>
                        <a href="./php/footer/lavoraconnoi.php">Lavora con noi</a>
                    </li>
                    <li>
                        <a href="./php/footer/contatti.php">Contatti</a>
                    </li>

                    <li>
                        <a href="./php/footer/comefunziona.php">Come funziona DmFixIt </a>
                    </li>

                    <li>
                        <a href="./php/footer/relazioneinv.php">Relazione degli investitori</a>
                    </li>

                </ul>
            </div>
            <div class="footer-column">
                <h3>Community</h3>
                <ul class="no-bullets">
                  
                    <li>
                        <a href="./php/footer/assistance.php">Centro assistenza</a>
                    </li>


                    <?php if(isset($_SESSION["email"])) 
          { ?>
                <li>
                    <a href="./php/logout.php" class="nav-element">Logout</a>
                </li>
          <?php 
          } 
          else 
          { ?>
                <li>
                    <a href="./php/login.php" >Accedi</a>
                </li>

                <li>
                    <a href="./php/signup.php">Iscriviti</a>
                </li>
            <?php 
          } ?>

               
                </ul>
            </div>

            <div class="footer-column">
                <h3>Seguici su</h3>
                <ul class="no-bullets">
                    <li>
                    <a href="https://www.youtube.com/channel/UCfGRqs6_9KYnp5S5_378Vqg">
                            <svg viewBox="0 0 16 16" width="18px" height="18px" class="footer-icon">
                                <path d="M6.4 10.472V5.689l4.157 2.391L6.4 10.472Zm9.266-6.23a2 2 0 0 0-1.415-1.409C13.003 2.5 8
                          2.5 8 2.5s-5.003 0-6.251.333a2 2 0 0 0-1.415 1.41C0 5.486 0 8.08 0 8.08s0 2.594.334 3.838a2
                          2 0 0 0 1.415 1.41C2.997 13.66 8 13.66 8 13.66s5.003 0 6.251-.334a2 2 0 0 0 1.415-1.41C16
                          10.675 16 8.08 16 8.08s0-2.594-.334-3.837Z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/davide.m._/">
                            <svg viewBox="0 0 16 16" width="18px" height="18px" class="footer-icon">
                                <path d="M4.687.056c-.851.04-1.433.176-1.94.376-.527.205-.973.48-1.416.925a3.919 3.919 0 0 0-.92 1.418c-.197.509-.33 1.09-.368 1.942C.005 5.57-.003 5.843 0 8.015c.004 2.173.014 2.445.055 3.298.04.852.176 1.433.376 1.941.205.526.48.972.925 1.415.445.444.891.716 1.419.92.509.197 1.09.331 1.942.368.852.037 1.126.046 3.298.042 2.171-.004 2.445-.014 3.298-.054.854-.04 1.432-.177 1.94-.376.526-.206.972-.48 1.415-.925a3.92 3.92 0 0 0 .92-1.42c.197-.508.331-1.09.368-1.94.037-.855.046-1.127.042-3.3-.004-2.172-.014-2.444-.055-3.297-.04-.853-.176-1.432-.375-1.941a3.928 3.928 0 0 0-.925-1.415 3.905 3.905 0 0 0-1.419-.92c-.509-.197-1.09-.331-1.942-.368-.852-.037-1.126-.046-3.298-.042C5.812.005 5.54.014 4.687.056Zm.093 14.462c-.78-.034-1.203-.164-1.486-.272a2.49 2.49 0 0 1-.92-.597 2.465 2.465 0 0 1-.6-.918c-.11-.283-.242-.706-.279-1.486-.04-.843-.048-1.096-.053-3.232-.004-2.135.004-2.388.04-3.232.034-.779.165-1.203.273-1.485.144-.374.317-.64.597-.921a2.47 2.47 0 0 1 .918-.6c.282-.11.705-.241 1.485-.278.844-.04 1.097-.048 3.232-.053 2.136-.005 2.389.003 3.233.04.78.034 1.204.163 1.485.272.374.144.64.317.921.597.282.28.455.545.6.92.111.28.242.703.279 1.483.04.844.049 1.097.053 3.232.004 2.136-.004 2.39-.04 3.232-.035.78-.164 1.204-.273 1.487a2.48 2.48 0 0 1-.597.92c-.28.282-.545.455-.919.6-.281.11-.705.242-1.484.279-.843.04-1.096.048-3.233.053-2.136.004-2.388-.004-3.232-.041Zm6.522-10.794a.961.961 0 1 0 1.922-.004.961.961 0 0 0-1.922.004Zm-7.41 4.284a4.107 4.107 0 1 0 8.215-.016 4.107 4.107 0 0 0-8.215.016Zm1.441-.003a2.667 2.667 0 1 1 5.334-.01 2.667 2.667 0 0 1-5.334.01Z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="./php/maintenance.php">
                            <svg viewBox="0 0 16 16" width="18px" height="18px" class="footer-icon">
                                <path d="M13.637 13.637h-2.405V9.463c0-1.231-.524-1.61-1.199-1.61-.714 0-1.414.536-1.414 1.64v4.144H6.214V5.995h2.313v1.059h.031c.233-.47 1.045-1.273 2.287-1.273 1.342 0 2.792.795 2.792 3.13v4.726ZM3.567 4.93C2.8 4.93 2.18 4.348 2.18 3.55s.62-1.382 1.387-1.382c.766 0 1.386.584 1.386 1.382 0 .798-.62 1.38-1.386 1.38Zm1.202 8.7H2.364V5.989h2.405v7.642ZM14.82 0H1.182C.529 0 0 .53 0 1.182v13.637C0 15.471.53 16 1.182 16h13.637a1.18 1.18 0 0 0 1.182-1.18V1.181C16 .529 15.47 0 14.819 0Z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="./php/maintenance.php">
                            <svg viewBox="0 0 16 16" width="18px" height="18px" class="footer-icon">
                                <path d="M14.362 5.236c.01.141.01.282.01.425 0 4.337-3.302 9.339-9.34
                              9.339v-.003A9.294 9.294 0 0 1 0 13.526a6.592 6.592 0 0 0 4.858-1.36
                              3.287 3.287 0 0 1-3.067-2.28c.492.095 1 .076 1.482-.056A3.283 3.283 0 0 1 .64 6.612v-.041c.457.254.967.395
                              1.49.41A3.286 3.286 0 0 1 1.114 2.6 9.317 9.317 0 0 0 7.88 6.028a3.284 3.284 0 0 1 5.594-2.994 6.587 6.587 0 0 0
                              2.085-.797 3.295 3.295 0 0 1-1.443 1.816A6.53 6.53 0 0 0 16 3.536a6.668 6.668 0 0 1-1.638 1.7Z"></path>
                            </svg>
                        </a>                  
                    </li>
                    <li>
                    <a class="footer-icon" href="https://t.me/davidemcc">
                            
                            <img width="20" height="20" src="https://img.icons8.com/?size=100&id=lUktdBVdL4Kb&format=png&color=FFFFFF" alt="telegram"/>
                          
                      </a>
                    </li>
                    <li>
                    <a href="https://www.facebook.com/profile.php?id=100034550663533">

                        
                            <svg viewBox="0 0 16 16" width="18px" height="18px" class="footer-icon">
                                <path d="m11.469 8-.355 2.313H9.25v5.59a8 8 0 1 0-2.5 0v-5.59H4.719V8H6.75V6.237c0-2.005 1.194-3.112 3.022-3.112a12.034 12.034 0 0 1 1.79.156V5.25h-1.008a2.18 2.18 0 0 0-.179.007c-.853.07-1.125.65-1.125 1.242V8h2.219Z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Seleziona Paese</h3>
                <div class="dropdown">
                    <button class="dropbtn">Italia</button>
                    <div class="dropdown-content">
                        <a href="#">Svizzera</a>
                        <a href="#">Danimarca</a>
                        <a href="#">Germania</a>
                    </div>
                </div>
                <h3>Dove siamo</h3>
                <div style="width:100%; height:300px" id="map"></div>
                
            </div>
        </div>
        <div class="footer-bottom">
            <a href="./php/footer/legalinfo.php">Informazioni legali</a>
            <a href="./php/footer/infoprivacy.php">Informativa sulla privacy</a>
            <a href="./php/footer/termandconditions.php">Termini e Condizioni</a>      
           
            <p id="copyright"> © 2024 DMFixIt A/S. Tutti i diritti riservati.</p>

        </div>

    </footer>

</body>
</html>



