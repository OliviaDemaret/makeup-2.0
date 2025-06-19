<div>
    <input
        type="checkbox"
        id="<?php echo htmlspecialchars($filtre['c_slug']); ?>"
        name="categories[]"
        value="<?php echo htmlspecialchars($filtre['c_id']); ?>" 
        <?php
        if (isset($_GET['categories']) && in_array($filtre['c_id'], $_GET['categories'])) :?>checked<?php endif;
        ?>
        />
    <label
        for="<?php echo htmlspecialchars($filtre['c_slug']); ?>"><?php echo ucfirst(htmlspecialchars($filtre['c_nom'])); ?></label>
</div>
