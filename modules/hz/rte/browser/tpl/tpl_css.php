<!--
    @OXID
    CSS über Admin-Controller einbinden

    [Original]
    <link href="css.php?type=<?php echo $this->type ?>" rel="stylesheet" type="text/css" />
    <link href="themes/<?php echo $this->config['theme'] ?>/style.css" rel="stylesheet" type="text/css" />
//-->
<link href="<?php echo $this->config['_browserUrl']; ?>fnc=getBrowserCss&type=<?php echo $this->type ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->config['_browserPath']; ?>themes/<?php echo $this->config['theme'] ?>/style.css" rel="stylesheet" type="text/css" />
