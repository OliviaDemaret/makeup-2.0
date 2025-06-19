<article class="swiper-slide swiper-slide-bestsellers">
    <a href="fiche-produit.php?id=<?php echo htmlspecialchars($produit['p_id']); ?>">
        <div class="itemimage">
        <?php if (!empty($produit['p_photo1'])): ?>
                <img src="./app/assets/medias/img/products/<?php echo htmlspecialchars($produit['p_photo1']); ?>" alt="<?php echo htmlspecialchars($produit['p_nom']); ?>" width="200" height="200">
            <?php else: ?>
                <img src="./app/assets/medias/img/products/default.png" alt="Image par défaut" width="200" height="200">
            <?php endif; ?>
            <i class="fa-regular fa-heart fa-heart-item" ></i>
        </div>
        <div class="itembody">
            <p class="itembrand"><?php echo htmlspecialchars($produit['p_marque']); ?></p>
            <h3 class="itemtitle"><?php echo htmlspecialchars($produit['p_nom']); ?></h3>
            <p class="itemprice">€<?php echo htmlspecialchars(number_format($produit['p_prix'], 2, ',', ' ')); ?></p>
        </div>
    </a>
</article>