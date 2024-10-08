<?php

function inicio_html( $title, $styles ) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
foreach( $styles as $style ) {
    echo "\t\t<link rel='stylesheet' type='text/css' href='$style'>";
};

?>

    <title><?=$title?></title>
</head>
<body>
    
    
<?php
};





function fin_html() { ?>
        
</body>
</html>

<?php
};


?>