<?php
echo $this->header;

?>
    <div id="main" class="addressDetail">
        <?php if($this->address): ?>
            <h1><?php echo $this->address->firstname; ?> <?php echo $this->address->lastname; ?></h1><br>
            <span class="street"><?php echo $this->address->street; ?></span><br>
            <span class="zip"><?php echo $this->address->zip; ?></span><span class="city"><?php echo $this->address->city; ?></span><br>
            <?php if($this->address->email != ''): ?>
                <a href="mailto:<?php echo $this->address->email; ?>" class="email"><?php echo $this->address->email; ?></a><br>
            <?php endif; ?>
        <?php else: ?>
            <h1>Ungültige Adresse!</h1>
        <?php endif; ?>

    </div>
<?php

echo $this->footer;

?>