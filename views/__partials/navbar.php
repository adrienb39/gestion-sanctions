<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../assets/css/style.css">
    <script src="./../../assets/js/script.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js">
    </script>

</head>

<body>
    <header class="bg-gray-50 py-4">
        <nav class="flex justify-between 
                    items-center w-[92%]  mx-auto">
            <div class="w-15 font-bold text-red-400">
                Gestion de taches
            </div>
            <div class="nav-links duration-500 md:static 
                        absolute md:min-h-fit min-h-[60vh] 
                        left-0 top-[-100%] md:w-auto  w-full 
                        flex items-center px-5">
                <ul class="flex md:flex-row flex-col 
                           md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="hover:text-gray-500" href="index.php?route=accueil">Accueil</a>
                    </li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li>
                            <a class="hover:text-gray-500" href="index.php?route=create-account">Créer un compte</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-500" href="index.php?route=login">Se connecter</a>
                        </li>
                    <?php else: ?>
                        <li><a class="hover:text-gray-500" href="index.php?route=logout">Se déconnecter</a></li>
                        <li>Vous êtes connecté en tant que <?= $_SESSION['pseudo'] ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer 
                                             md:hidden text-white">
                </ion-icon>
            </div>
        </nav>
    </header>
    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[6%]')
        }
    </script>
</body>

</html>