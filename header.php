<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<Header class="grandmenu">
    <div class="navbar">
        <div class="logo"><a href="index.php"><img src="logo.png" alt="La Lampe Magique" width="50%" height="35%"></a></div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="apropos.php">À propos</a></li>
                <li><a href="#baspage">Contact</a></li>
            </ul>
        </nav>
        <div class="search-bar"><button type="submit" class="btnmenu"><i class="fa-solid fa-magnifying-glass fa-2xl"></i></button>
            <form action="search_results.php" method="GET">
                
                <input type="text" name="query" placeholder="Rechercher...">
            </form>
        </div>
        
        <div>
            <?php if (!isset($_SESSION['user'])): ?>
                <button class="btnmenu"><a href="inscription.php"><i class="fa-solid fa-user fa-2xl"></i></a></button>
            <?php else: ?>
                <button class="btnmenu"><a href="user_profile.php"><i class="fa-solid fa-user fa-2xl"></i></a></button>
                <button class="btnmenu"><a href="deconnexion.php"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></a></button>
                <?php if (isset($_SESSION['type_compte']) && $_SESSION['type_compte'] === 'admin'): ?>
                    <button class="btnmenu"><a href="hub_admin.php"><i class="fa-solid fa-cogs fa-2xl"></i></a></button>
                <?php endif; ?>
            <?php endif; ?>
            <button class="btnmenu"><a href="cart.php"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a></button>
        </div>
    </div>
    <div class="categories-menu"> 
        <div style="padding-top: 10px; padding-bottom: 10px;">
            <ul>
                
                <li><a href="produits.php?categorie=<?php echo urlencode('Fruits et légumes'); ?>">Fruits et Légumes</a>
                <ul class="submenu">
                    <li><a href="produits.php?categorie=<?php echo urlencode('Fruits et légumes'); ?>&sous_categorie=<?php echo urlencode('Fruits frais'); ?>">Fruits frais</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Fruits et légumes'); ?>&sous_categorie=<?php echo urlencode('Légumes frais'); ?>">Légumes frais</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Fruits et légumes'); ?>&sous_categorie=<?php echo urlencode('Légumes racines'); ?>">Légumes racines</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Fruits et légumes'); ?>&sous_categorie=<?php echo urlencode('Salades et herbes'); ?>">Salades et herbes</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Fruits et légumes'); ?>&sous_categorie=<?php echo urlencode('Champignons'); ?>">Champignons</a></li>
                </ul>
                </li>
                <li><a href="produits.php?categorie=<?php echo urlencode('Epices'); ?>">Epices</a>
                <ul class="submenu">
                    <li><a href="produits.php?categorie=<?php echo urlencode('Epices'); ?>&sous_categorie=<?php echo urlencode('Epices de base'); ?>">Epices de base</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Epices'); ?>&sous_categorie=<?php echo urlencode('Epices exotiques'); ?>">Epices exotiques</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Epices'); ?>&sous_categorie=<?php echo urlencode('Mélange d épices'); ?>">Mélange d épices</a></li>
                </ul></li>
                <li><a href="produits.php?categorie=<?php echo urlencode('Alimentation générale'); ?>">Alimentation Générale</a>
                <ul class="submenu">
                    <li><a href="produits.php?categorie=<?php echo urlencode('Alimentation générale'); ?>&sous_categorie=<?php echo urlencode('Conserves'); ?>">Conserves</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Alimentation générale'); ?>&sous_categorie=<?php echo urlencode('Produits laitiers'); ?>">Produits laitiers</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Alimentation générale'); ?>&sous_categorie=<?php echo urlencode('Huiles et vinaigres'); ?>">Huiles et vinaigres</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Alimentation générale'); ?>&sous_categorie=<?php echo urlencode('Boissons'); ?>">Boissons</a></li>
                </ul>
                </li>
                <li><a href="produits.php?categorie=<?php echo urlencode('Boucherie'); ?>">Boucherie</a>
                <ul class="submenu">
                    <li><a href="produits.php?categorie=<?php echo urlencode('Boucherie'); ?>&sous_categorie=<?php echo urlencode('Boeuf'); ?>">Boeuf</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Boucherie'); ?>&sous_categorie=<?php echo urlencode('Poulet'); ?>">Poulet</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Boucherie'); ?>&sous_categorie=<?php echo urlencode('Abats'); ?>">Abats</a></li>
                </ul>
                </li>
                <li><a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>">Patisserie</a>
                <ul class="submenu">
                <li><a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>&sous_categorie=<?php echo urlencode('Pains'); ?>">Pains</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>&sous_categorie=<?php echo urlencode('Viennoiseries'); ?>">Viennoiseries</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>&sous_categorie=<?php echo urlencode('Gateaux et tartes'); ?>">Gateaux et tartes</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>&sous_categorie=<?php echo urlencode('Chocolat'); ?>">Chocolat</a></li>
                </ul>
                </li>
                <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>">Beauté & Hygiène</a>
                <ul class="submenu">
                    <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Soins du visage'); ?>">Soins du visage</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Soins capillaires'); ?>">Soins capillaires</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Soins du corps'); ?>">Soins du corps</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Hygiène bucco-dentaire'); ?>">Hygiène bucco-dentaire</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Maquillage'); ?>">Maquillage</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Produits pour homme'); ?>">Produits pour homme</a></li>
                </ul>
                </li>
                <li><a href="produits.php?categorie=<?php echo urlencode('Nettoyage'); ?>">Nettoyage</a>
                <ul class="submenu">
                    <li><a href="produits.php?categorie=<?php echo urlencode('Nettoyage'); ?>&sous_categorie=<?php echo urlencode('Produits vaisselles'); ?>">Produits vaisselles</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Nettoyage'); ?>&sous_categorie=<?php echo urlencode('Produits linge'); ?>">Produits linge</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Nettoyage'); ?>&sous_categorie=<?php echo urlencode('Acessoires nettoyage'); ?>">Acessoires nettoyage</a></li>
                    <li><a href="produits.php?categorie=<?php echo urlencode('Nettoyage'); ?>&sous_categorie=<?php echo urlencode('Produits sols'); ?>">Produits sols</a></li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</Header>