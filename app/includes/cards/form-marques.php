<div>
    <!--<pre>
        
    <?php
    //echo $cpt_marque. "<br>";
    //print_r($marques);
    //print_r($_GET['marques']);
    //?>
    </pre>-->
    <input 
    type="checkbox"
    id="marque-<?php echo $cpt_marque; ?>"
    name="marques[]"
    value="<?php echo htmlspecialchars($marque['p_marque']); ?>"

    <?php if (isset($checked) && $checked) :?>checked<?php endif;?> />
    <label for="marque-<?php echo $cpt_marque; ?>">
        <?php echo ucfirst(htmlspecialchars($marque['p_marque'])); ?>
    </label>
</div>
