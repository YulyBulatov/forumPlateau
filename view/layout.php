<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="public/css/style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title>FORUM</title>
</head>
<body>
    <div id="wrapper"> 
       
        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
                    <div class = header-overlay>
                        <nav>
                            <ul>
                                <li><a href="index.php?ctrl=home&action=index"><span>Accueil</span></a></li>
                                <?php
                                if(App\Session::isAdmin()){
                                    ?>
                                    <li><a href="index.php?ctrl=security&action=users"><span>Voir la liste des gens</span></a></li>
                                
                                    <?php
                                }
                                ?>                    
                                <?php
                                
                                if(App\Session::getUser()){
                                    ?>
                                    <li><a href="index.php?ctrl=security&action=viewProfile&id=<?=$_SESSION['user']->getId()?>"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a></li>
                                    <li><a href="index.php?ctrl=security&action=logout"><span>Déconnexion</span></a></li>
                                    <li><a href="index.php?ctrl=forum&action=listCategories"><span>La liste des categories</span></a></li>
                                    <?php
                                }
                                else{
                                    ?>
                                    <li><a href="index.php?ctrl=security&action=login"><span>Connexion</span></a></li>
                                    <li><a href="index.php?ctrl=security&action=register"><span>Inscription</span></a></li>
                                    <li><a href="index.php?ctrl=forum&action=listCategories"><span> liste des categories</span></a></li>
                                <?php
                                }           
                                ?>
                            </ul>
                        </nav>
                    </div>
            </header>
            
            <main class="forum-main">
                <?= $page ?>
            </main>
        </div>
        <footer>
            <p>&copy; 2020 - Forum CDA - <a href="/home/forumRules.html">Règlement du forum</a> - <a href="">Mentions légales</a></p>
            <!--<button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois-->
        </footer>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>

        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function(){
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })

        

        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
</body>
</html>